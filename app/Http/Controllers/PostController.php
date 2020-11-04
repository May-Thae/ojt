<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Database;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PostsImport;
use App\Exports\PostsExport;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //show latest 3post pagination
        if($request->session('posts')){
            $request->session()->forget('posts');
         }
        $search = $request->get('search');
        if(!empty($search)){
            $posts = Post::where('title', 'like' ,'%'.$search.'%')
                        ->orWhere('description', 'like' ,'%'.$search.'%')
                        ->paginate(5);
         }else{
        //show excel data
        // $posts = Post::where('deleted_at', NULL)->orderBy('id')->paginate(10);
            $posts = Post::latest()->paginate(5);
         }
        return view('post.index', compact('posts'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $post = Post::all();
        return view ('post.create');
    }

    public function confirm(Request $request)
    {
        $post = new Post ($request-> all ());
        $request-> session () -> put ('posts', $post);
        return view ('post.confirm', compact ('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = new Post([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'create_user_id' => auth()->user()->id,
            'updated_user_id' => auth()->user()->id,
          ]);

          $post->save();
          return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $post->status;
        return view('post.edit', compact('post','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->status = $request->get('status');
        $post->save();
        return redirect('/post');
    }

    public function home()
    {
        $user = Auth::user();
        return view('home')->with(['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();

        return redirect('/post')->with('info', 'Post deleted');
    }

    // import export excel
    public function fileImportExport()
    {
       return view('file-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request)
    {
        Excel::import(new PostsImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport()
    {
        return Excel::download(new PostsExport, 'posts-collection.xlsx');
    }
}
