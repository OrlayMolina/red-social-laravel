<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {

        // Obtener a quienes seguimos
        $id = auth()->user()->followings->pluck('id')->toArray( );
        $posts = Post::whereIn('user_id', $id)->latest()->paginate(8);


        return view('home', [
            'posts' => $posts
        ]);
    }
}
