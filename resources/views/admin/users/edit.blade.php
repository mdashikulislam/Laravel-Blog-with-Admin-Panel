@extends('admin.app')
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit User
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit User</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                    @include('admin.inc.message')
                    <!-- form start -->
                        <form role="form" action="{{route('user.update',['id'=>$user->id])}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="User Name" name="name" value="@if(old('name')){{old('name')}}@else{{$user->name}}@endif">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="@if(old('email')){{old('email')}}@else{{$user->email}}@endif">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" value="@if(old('phone')){{old('phone')}}@else{{$user->phone}}@endif">
                                    </div>
                                    <div class="form-group">
                                        <label >Status</label>
                                        <label class="checkbox" style="margin-left: 20px;">
                                            <input type="checkbox" name="status" value="1" @if($user->status == 1) checked @endif>Status
                                        </label>
                                    </div>
                                    <div class="form-group" style="display: block;">
                                        <div style="display: block;">
                                            <label for="">Assign Role</label>
                                        </div>

                                       @foreach($roles as $role)
                                            <div class="col-md-3">
                                                <label>
                                                    <input type="checkbox" name="role[]" value="{{$role->id}}" @foreach($user->roles as $user_roles) @if($user_roles->id == $role->id) checked @endif @endforeach> {{$role->name}}
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