@extends('admin.app')
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Role
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Role</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                    @include('admin.inc.message')
                    <!-- form start -->
                        <form role="form" action="{{route('role.update',['id'=>$edit->id])}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="box-body">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="tag">Role Title</label>
                                        <input type="text" class="form-control" id="role" placeholder="Role Title" name="name" value="{{$edit->name}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label>Post Permission</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'post' )
                                                    <div>
                                                        <label class="checkbox"><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                                            @foreach($edit->permissions as $role_permit)
                                                                @if($role_permit->id == $permission->id)
                                                                    checked
                                                                @endif
                                                             @endforeach
                                                            >{{$permission->name}}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            <label>User Permission</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'user' )
                                                    <div>
                                                        <label class="checkbox"><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                                                   @foreach($edit->permissions as $role_permit)
                                                                       @if($role_permit->id == $permission->id)
                                                                       checked
                                                                        @endif
                                                                    @endforeach
                                                            >{{$permission->name}}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Other Permission</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'other' )
                                                    <div>
                                                        <label class="checkbox"><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                                                               @foreach($edit->permissions as $role_permit)
                                                                   @if($role_permit->id == $permission->id)
                                                                   checked
                                                                    @endif
                                                                @endforeach
                                                            >{{$permission->name}}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{route('role.index')}}" class="btn btn-success">Back</a>
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