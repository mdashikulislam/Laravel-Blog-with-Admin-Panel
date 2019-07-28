@extends('admin.app')
@section('breadcum')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>
@endsection
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Users</h3>
                    @can('admin.user.create',Auth::user())
                    <a href="{{route('user.create')}}" class="col-lg-offset-5 btn btn-success">Add Users</a>
                    @endcan
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                @include('admin.inc.message')
                <div class="box-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            @can('admin.user.update',Auth::user())
                            <th>Edit</th>
                            @endcan
                            @can('admin.user.delete',Auth::user())
                                <th>Delete</th>
                            @endcan

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{$role->name}},
                                    @endforeach
                                </td>
                                <td><label style="margin-bottom: 0;padding: 5px;" class="@if($user->status == 1) alert alert-success @else alert  alert-danger @endif">{{$user->status? 'Active':'Not Active'}}</label></td>
                                @can('admin.user.update',Auth::user())
                                <td>
                                    <a href="{{route('user.edit',['id' => $user->id])}}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                                @endcan
                                @can('admin.user.delete',Auth::user())
                                <td>
                                    <form action="{{route('user.destroy',['id'=>$user->id])}}" method="post" style="display: none;" id="delete-form-{{$user->id}}">
                                        @csrf
                                        {{method_field('DELETE')}}
                                    </form>
                                    <a href="" class="btn btn-danger" onclick="
                                            if (confirm('Are you sure, want to delete this ?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$user->id}}').submit();
                                            }else {
                                            event.preventDefault();
                                            }

                                            "><span class="glyphicon glyphicon-trash"></span></a>

                                </td>
                                @endcan
                            </tr>
                        @endforeach



                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            @can('admin.user.update',Auth::user())
                                <th>Edit</th>
                            @endcan
                            @can('admin.user.delete',Auth::user())
                                <th>Delete</th>
                            @endcan
                        </tr>
                        </tfoot>
                    </table>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection
@section('js')
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(window).ready(function () {
            $("#datatable").DataTable();
        });


    </script>
@endsection
