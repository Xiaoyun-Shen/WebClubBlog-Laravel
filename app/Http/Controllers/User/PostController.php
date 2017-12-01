<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(){

        return view('user.post');
    }

    public function show(Post $post){
        return view('user.post',compact('post'));
    }
}
