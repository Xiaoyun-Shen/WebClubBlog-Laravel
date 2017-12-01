@extends('user/app')

@section('bg-img',Storage::disk('local')->url($post->image))
@section('title',$post->title)
@section('subtitle',$post->subtitle)

@section('main')

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto">
                <small  style="color:royalblue;">Created at {{$post->created_at->diffForHumans()}}</small>

                    @foreach($post->categories as $category)
                        <a href="{{route('category',$category)}}">
                             <small class="pull-right" style="margin-right:10px;">
                                 {{$category->name}}
                             </small>
                        </a>
                    @endforeach
                <hr/>

                {!! htmlspecialchars_decode($post->body) !!}
                   <hr/>
                <!-Tag Clouds->
                <small style="color:royalblue;">Search by Tags:</small>
                @foreach($post->tags as $tag)
                   <a href="{{route('tag',$tag)}}"> <small  style="margin-right:10px;border:1px solid gray;border-radius:5px;padding:3px;">
                             {{$tag->name}}
                        </small>
                   </a>
                @endforeach

                <hr/>
                 <!-show comments->
                <p style="color:royalblue;">Total {{$post->comments()->count()}} comments</p>
                @foreach($post->comments as $comment)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                            <!--    <img class="media-object" src="{{ "https://www.gravatar.com/avatar/" . md5( strtolower( trim( Auth::user()->password ) ) )}}" alt="...">-->
                                 <img class="media-object" style=" width:50px;height:50px;" src="{{asset('user/img/person_icon.jpg')}}" >
                            </a>
                        </div>
                        <div class="media-body" style="margin-left:10px;">
                            <h5 class="media-heading">   {{$comment->name}}</h5>
                            <small>  {{$comment->created_at->diffForHumans()}}</small>
                            <p>  {{  $comment->body }}</p>
                        </div>
                    </div>
                @endforeach

               <form  action= "{{ route('comments.store',$post->slug) }}" method="post" >
                   {{csrf_field()}}
                    <div class="form-group">
                        <label style="color:royalblue;" for="body">Your Comment:</label>
                        <textarea rows="4" cols="50" class="form-control" id="body" name="body" placeholder="Enter your comment"></textarea>
                    </div>

                   <div >
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </div>

               </form>
            </div>

            <!-- Facebook plugin-->
            <!--   <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5"></div> -->



        </div>
    </div>
</article>

<hr>




@endsection