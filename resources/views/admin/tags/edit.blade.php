@extends('admin.app')
@section('main')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Update a tag</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <section class="box box-primary">
                        @include('includes.messages')

                        <form  method="post" action="{{route('tags.update',$tag->id)}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-body row">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Tag Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$tag->name}}" placeholder="Enter name">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Tag Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{$tag->slug}}" placeholder="Enter slug">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a  href="{{route('tags.index')}}"  class="btn btn-warning">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </section>
    </div>

@endsection