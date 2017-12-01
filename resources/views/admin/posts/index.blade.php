@extends('admin/app')

@section('headSection')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @include('includes.messages')
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Posts</h3>

                    @can('posts.create',Auth::user())
                        <a href="{{route('posts.create')}}" class="col-lg-offset-5 btn btn-success">Add new</a>

                    @endcan


                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Slug</th>
                                    <th>Created at</th>
                                    @can('posts.update',Auth::user())
                                        <th>Edit</th>
                                    @endcan
                                    @can('posts.delete',Auth::user())
                                        <th>Delete</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach($posts as $post)
                                          <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$post->title}} </td>
                                                <td>{{$post->subtitle}} </td>
                                                <td>{{$post->slug}}</td>
                                                <td>{{$post->created_at}}</td>

                                              @can('posts.update',Auth::user())
                                                  <td> <a href="{{route('posts.edit',$post->id)}}"><i class="fa fa-fw fa-edit"></i></a></td>

                                              @endcan


                                              @can('posts.delete',Auth::user())

                                                  <td>

                                                      <form id="form-{{$post->id}}" action="{{route('posts.destroy',$post->id)}}" method="post" style="display:none;">
                                                          {{csrf_field()}}
                                                          {{method_field('delete')}}
                                                      </form>
                                                      <a href="" onclick="
                                                              if(confirm('Are you sure? You want to delete this? ')){
                                                              event.preventDefault();
                                                              document.getElementById('form-{{$post->id}}').submit();
                                                              }else{
                                                              event.preventDefault();
                                                              }
                                                              " >

                                                          <i class="fa fa-fw fa-trash"></i></a>

                                                  </td>
                                              @endcan


                                            </tr>
                                        @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Slug</th>
                                    <th>Created at</th>
                                    @can('posts.update',Auth::user())
                                        <th>Edit</th>
                                    @endcan
                                    @can('posts.delete',Auth::user())
                                        <th>Delete</th>
                                    @endcan
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footerSection')
    <!-- DataTables -->
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection