<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Post;
use App\Model\user\Category;
use App\Model\user\Tag;
use Auth;
class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('posts.create')){
            $tags=Tag::all();
            $categories=Category::all();
            return view('admin.posts.create',compact('tags','categories'));
        }

        return redirect(route('admin.home'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
             'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'image'=>'required',
            'body'=>'required',

        ]);
        if($request->hasFile('image')){
            $imageName=$request->image->store('public');
        }else{
            return 'no';
        }

        $post=new Post;
        $post->title=$request->title;
        $post->subtitle=$request->subtitle;
        $post->slug=$request->slug;
        $post->status=$request->status;
        $post->image=$imageName;
        $post->body=$request->body;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('posts.index'));
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
        if(Auth::user()->can('posts.update')){
            $post=Post::with('tags','categories')->where('id',$id)->first();
            $tags=Tag::all();
            $categories=Category::all();
            return view('admin.posts.edit',compact('post','tags','categories'));
        }
        return redirect(route('admin.home'));
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
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required'
        ]);
        $post=Post::find($id);
        if($request->hasFile('image')){
           $imageName=$request->image->store('public');
            $post->image=$imageName;
        }
        $post->title=$request->title;
        $post->subtitle=$request->subtitle;
        $post->slug=$request->slug;

        $post->status=$request->status;
        $post->body=$request->body;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->back();
    }
}
