@extends('user/app')
@section('bg-img',asset('user/img/blog.jpeg'))
@section('title','Web Club')
@section('subtitle','Learn together and grow together')
@section('main')
<div class="container">

                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"> Wellcome!</h4>
                        <p>{{ Auth::user()->name }}</p>
                        <p>You are logged in!</p>
                    </div>

</div>
@endsection
