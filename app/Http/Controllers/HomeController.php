<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Database;
use Illuminate\Support\Facades\Log;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $homeposts = Post::latest()->paginate(15);
        return view('home', compact('homeposts'));
        Log::info($homeposts);
    }

    public function adminHome()
    {
        return view('admin/home');
    }
}
