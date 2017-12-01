<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Model\User\Post;
use App\Model\User\Comment;
use Auth;
class CommentController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_slug)
    {
        $this->validate($request,[
            'body'=>'required|min:5',
       ]);
        $post=Post::where('slug',$post_slug)->first();
        $comment=new Comment;
        $comment->body=$request->body;
        $comment['name']=Auth::user()->name;
        $comment['post_id']=$post->id;
        $comment->save();
        return redirect()->back();
    }


}
