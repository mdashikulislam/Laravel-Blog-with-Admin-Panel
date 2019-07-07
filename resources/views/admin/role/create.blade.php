@extends('admin.app')
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create Role
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Create Role</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        @include('admin.inc.message')
                        <!-- form start -->
                        <form role="form" action="{{route('role.store')}}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="role">Role Title</label>
                                        <input type="text" class="form-control" id="role" placeholder="Role Title" name="name">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-info">Reset</button>
                                        <a href="{{route('tag.index')}}" class="btn btn-success">Back</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection