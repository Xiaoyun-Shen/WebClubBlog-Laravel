@extends('admin.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @include('includes.messages')
            <h1> Create a role</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <section class="box box-primary">

                        <form  action="{{route('roles.store')}}" method="post"  >
                            {{csrf_field()}}
                            <div class="box-body row">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <input type="text" class="form-control" id="role" name="role" placeholder="Enter a role">
                                    </div>

                                    <div class="row">
                                        <div class=" col-md-4">
                                            <label>Post permissions</label>
                                            <div class="form-check">
                                                @foreach($permissions as $permission)
                                                    @if($permission->for=='Post')
                                                    <div class="col-md-12">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}
                                                        </label>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                            <div class="col-md-4">
                                                <label>User permissions</label>
                                                <div class="form-check">
                                                    @foreach($permissions as $permission)
                                                        @if($permission->for=='User')
                                                        <div>
                                                            <label class="form-check-label">
                                                                <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}
                                                            </label>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                        <div class="col-md-4">
                                            <label>Other permissions</label>
                                            <div class="form-check">
                                                @foreach($permissions as $permission)
                                                    @if($permission->for=='Other')
                                                        <div>
                                                            <label class="form-check-label">
                                                                <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>







                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a  href="{{route('roles.index')}}"  class="btn btn-warning">Back</a>
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

