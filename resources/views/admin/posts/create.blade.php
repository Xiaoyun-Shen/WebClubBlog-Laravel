@extends('admin.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Create a post</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <section class="box box-primary">
                        @include('includes.messages')
                        <form enctype="multipart/form-data" action="{{route('posts.store')}}" method="post"  >
                            {{csrf_field()}}
                            <div class="box-body row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle">Post Subtitle</label>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Post Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Select categories</label>
                                        <select name="categories[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Select tags</label>
                                        <select  name="tags[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a tag" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}" >{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image">Upload image</label>
                                        <input type="file" id="image" name="image">
                                    </div>

                                    @can('posts.publish',Auth::user())
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="status" value=1> Publish
                                            </label>
                                        </div>
                                    @endcan
                                </div>
                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Write post body here</h3>
                                    <div class="box-body pad">
                                          <textarea name="body" id="editor1"
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                            <!-- /.box-body -->
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a  href="{{route('posts.index')}}"  class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('footerSection')

    <script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
            CKEDITOR.replace('editor1');
        });


     </script>
@endsection

