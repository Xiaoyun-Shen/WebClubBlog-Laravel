@extends('user/app')
@section('headSection')
    <style>
        .pager {
            margin: 20px 0 0;

        }
        .pager li > a,
        .pager li > span {
            font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 1px;
            padding: 15px 25px;
            background-color: white;
            border-radius: 0;
        }
        .pager li > a:hover,
        .pager li > a:focus {
            color: white;
            background-color: #0085A1;
            border: 1px solid #0085A1;
        }
        .pager .disabled > a,
        .pager .disabled > a:hover,
        .pager .disabled > a:focus,
        .pager .disabled > span {
            color: #777777;
            background-color: #333333;
            cursor: not-allowed;
        }
    </style>
@endsection
@section('bg-img',asset('user/img/blog.jpeg'))
@section('title','Web Club')
@section('subtitle','Learn together and grow together')

@section('main')

<div class="container">
    <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                @foreach($posts as $post)
                    <a href="{{route('posts',$post->slug)}}">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$post->subtitle}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#"></a>
                        {{$post->created_at->diffForHumans()}}</p>
                @endforeach
            </div>
            <hr>

            <!-- Pager -->
            <div class="pager clearfix">
                        {{$posts->links()}}
            </div>
        </div>
    </div>
</div>

<hr>
@endsection