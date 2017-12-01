@extends('admin.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Update an admin user</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <section class="box box-primary">
                        @include('includes.messages')
                        <form enctype="multipart/form-data" action="{{route('users.update',$user->id)}}" method="post"  >
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-body row">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="@if(old('name')){{old('name')}}@else {{$user->name}}@endif" placeholder="Enter name">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="emial" name="email" value="@if(old('email')){{old('email')}}@else {{$user->email}}@endif" placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"  value="@if(old('phone')){{old('phone')}}@else {{$user->phone}}@endif" placeholder="Enter phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Status</label>

                                        <div class="form-check">
                                            <div>
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="status"  @if(old('status')==1||$user->status==1) checked @endif  value="1">Status
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label >Assign Roles</label>
                                        <div class="row">
                                            @foreach($roles as $role)
                                                <div class="col-md-3">
                                                    <label>
                                                        <input type="checkbox" name="role[]" value="{{$role->id}}"
                                                        @foreach($user->roles as $user_role)
                                                            @if($user_role->id==$role->id)
                                                                checked
                                                            @endif
                                                        @endforeach

                                                        >{{$role->role}}

                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a  href="{{route('users.index')}}"  class="btn btn-warning">Back</a>
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

