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


    public function store(UsersRequest $request)
    {
        //
        if(trim($request->password)== '')   {
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        if($file = $request->file('photo_id')){
            $name= time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }
        User::create($input);

        return redirect('/login');

    }
}
