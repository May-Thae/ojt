<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Database;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Post;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function searchUser(Request $request)
    {
        $name = $request['name'];
        $email = $request['email'];
        $createdFrom = $request['createdFrom'];
        $createdTo = $request['createdTo'];
        $user = User::when($name, function ($query) use ($name) {
                $query->where('name', 'like', '%' . $name . '%');
                })
                ->when($email, function ($query) use ($email) {
                    $query->orWhere('email', 'like', '%' . $email . '%');
                })
                ->when($createdFrom, function ($query) use ($createdFrom) {
                    $query->orWhere('created_at', '>=', $createdFrom);
                })
                ->when($createdTo, function ($query) use ($createdTo) {
                    $query->where('created_at', '<=', $createdTo);
                })->orderBy('created_at', 'desc')->paginate(5);
        return view('user.list', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function item(Request $request)
    {
        if($request->session('users')){
            $request->session()->forget('users');
         }
        $user = User::latest()->paginate(5);
        return view('user.list', compact('user'));
    }

    /**
     * Display a itemsearch of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function itemSearch(Request $request)
    {
        $search = $request->get()->all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reference($id)
    {
        //
        $user = User::find($id);
        return view('user.reference', compact('user','id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    public function confirm(Request $request)
    {
        $this->validate($request,[
            'profile' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('profile')) {
            $filename = time() . '_' .$request->file('profile')->getClientOriginalName();
            $request->file('profile')->storeAs('profiles' , $filename);

            $user = new User ([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'],
                'profile' => $filename,
                'type' => $request['type'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'dob' => $request['dob'],
                'create_user_id' => 1,
                'updated_user_id' => 1,
                ]);
            $request-> session () -> put ('users', $user);
            return view ('user.confirm', compact ('user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'profile' => $request['profile'],
                'type' => $request['type'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'dob' => $request['dob'],
                'create_user_id' => 1,
                'updated_user_id' => 1,
        ]);
        $user->save();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $user = User::find($id);
        return view('user.edit', compact('user','id'));
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
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->profile = $request->get('profile');
        $user->type = $request->get('type');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->dob = $request->get('dob');
        $user->save();
        return view('user.reference', compact('user','id'));
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
        $user = User::find($id);
        $user->delete();

        return redirect('/user');
    }
}
