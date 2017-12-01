@extends('admin/app')
@section('main')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">


            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">


                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading"> Wellcome!</h4>
                            <p>{{ Auth::user()->name }}</p>
                            <p>You are logged in!</p>
                        </div>
                    </div>
                    <!-- /.box-body -->


                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
  @endsection