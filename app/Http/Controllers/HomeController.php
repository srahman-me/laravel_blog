<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     *
     *
     *
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
     *
     *
     *
     *
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {

        $posts = Post::paginate(3);
        $comments= Comment::all();
        $replies = CommentReply::all();
        return view('home', compact('posts','comments', 'replies'));
    }


}
