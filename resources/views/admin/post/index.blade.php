@extends('admin.app')
@section('breadcum')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@endsection
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Post

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Post</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Post</h3>
                    @can('posts.create',Auth::user())
                        <a href="{{route('post.create')}}" class="btn btn-success col-lg-offset-5">Add Post</a>
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
                            <th>SL No</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Slug</th>
                            <th>Body</th>
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
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->subtitle}}</td>
                                <td> {{$post->slug}}</td>
                                <td>{{$post->body}}</td>
                                @can('posts.update',Auth::user())
                                <td>
                                    <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                                @endcan
                                @can('posts.delete',Auth::user())
                                <td>
                                    <form action="{{route('post.destroy',['id'=>$post->id])}}" id="delete-data-{{$post->id}}" style="display: none;" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                    </form>
                                    <a href="" onclick="
                                        if (confirm('Are you sure, want to delete this ?')){
                                            event.preventDefault();
                                            document.getElementById('delete-data-{{$post->id}}').submit();
                                        } else {
                                            event.preventDefault();
                                        }
                                    " class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                                    @endcan
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL No</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Slug</th>
                            <th>Body</th>
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
