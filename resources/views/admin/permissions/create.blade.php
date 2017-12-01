@extends('admin.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Create a permission</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <section class="box box-primary">
                        @include('includes.messages')
                        <form  action="{{route('permissions.store')}}" method="post"  >
                            {{csrf_field()}}
                            <div class="box-body row">
                                <div class="col-md-offset-3 col-md-6">

                                    <div class="form-group">
                                        <label for="for">Permission for</label>
                                        <select class="form-control" id="for" name="for">
                                            <option selected diabled>Select permission for</option>
                                            <option value="Post">Post</option>
                                            <option value="User">User</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Permission</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter a permission">
                                    </div>



                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a  href="{{route('permissions.index')}}"  class="btn btn-warning">Back</a>
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

