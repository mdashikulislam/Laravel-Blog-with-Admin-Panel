@extends('admin.app')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css')}}">
@endsection
@section('maincontent')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create Post

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Create Post</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                    @include('admin.inc.message')
                        <!-- form start -->
                        <form role="form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle">Sub Title</label>
                                        <input type="text" class="form-control" id="subtitle" placeholder="Sub Title" name="subtitle">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <br>
                                    <div class="form-group pull-right">
                                        <label for="image">File input</label>
                                        <input type="file" id="image" name="image">
                                    </div>

                                    <div class="checkbox pull-left" >
                                        <label>
                                            <input type="checkbox" name="status" value="1"> Publish
                                        </label>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label>Select Tag</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Select Tag" style="width: 100%;" name="tag[]">
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                             @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Select Category" style="width: 100%;" name="category[]">
                                            @foreach($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <!-- /.box-body -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Post Body

                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                        {{--                                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
                                        {{--                                    <i class="fa fa-times"></i></button>--}}
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">

                                        <textarea name="body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>

                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-info">Reset</button>
                                <a href="{{route('post.index')}}" class="btn btn-success">Back</a>
                            </div>
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
@section('js')
    <script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $(".select2").select2();
    </script>
@endsection