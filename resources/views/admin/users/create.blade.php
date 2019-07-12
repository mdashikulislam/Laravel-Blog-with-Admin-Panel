@extends('admin.app')
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create User
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Create User</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                    @include('admin.inc.message')
                    <!-- form start -->
                        <form role="form" action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="User Name" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                                    </div>
                                    <div class="form-group" style="display: block;">
                                        <div style="display: block;">
                                            <label for="">Assign Role</label>
                                        </div>

                                       @foreach($roles as $role)
                                            <div class="col-md-3">
                                                <label>
                                                    <input type="checkbox" name="status[]" value="{{$role->id}}"> {{$role->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                        
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-info">Reset</button>
                                        <a href="{{route('user.index')}}" class="btn btn-success">Back</a>
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