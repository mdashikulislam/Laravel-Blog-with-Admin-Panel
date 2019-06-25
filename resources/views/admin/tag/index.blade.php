@extends('admin.app')
@section('breadcum')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tag</li>
        </ol>
    </section>
@endsection
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tags

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Tag</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tags</h3>
                    <a href="{{route('tag.create')}}" class="col-lg-offset-5 btn btn-success">Add Tag</a>
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
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->slug}}</td>
                                <td>
                                    <a href="{{route('tag.edit',['id' => $tag->id])}}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                                <td>
                                    <form action="{{route('tag.destroy',['id'=>$tag->id])}}" method="post" style="display: none;" id="delete-form-{{$tag->id}}">
                                        @csrf
                                        {{method_field('DELETE')}}
                                    </form>
                                        <a href="" class="btn btn-danger" onclick="
                                                if (confirm('Are you sure, want to delete this ?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$tag->id}}').submit();
                                                }else {
                                                    event.preventDefault();
                                                }

                                                "><span class="glyphicon glyphicon-trash"></span></a>

                                </td>
                            </tr>
                        @endforeach



                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
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