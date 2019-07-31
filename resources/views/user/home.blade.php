@extends('user.app')

@section('bg-image')
    {{asset('user/img/home-bg.jpg')}}
@endsection
@section('title')
    Clean Blog
    @endsection
@section('sub-title')
    This is sub title
@endsection
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .fa-thumbs-up{
            color: red;
        }
        .fa-thumbs-up:hover{
            color: #337ab7;
        }
        .pager{
            position: relative;
        }
        .pager ul li:first-child{
            position: absolute;
            left: 0;
        }
        .pager ul li:last-child{
            position: absolute;
            right: 0;
        }
    </style>
@endsection

@section('maincontent')
    <!-- Main Content -->
    <div class="container">
        <div class="row" id="app">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

{{--                @foreach($posts as $post)--}}
{{--                    @if($post->status == 1)--}}
{{--                    <div class="post-preview">--}}
{{--                        <a href="{{route('user.post',['slug'=>$post->slug])}}">--}}
{{--                            <h2 class="post-title">--}}
{{--                                {{$post->title}}--}}
{{--                            </h2>--}}
{{--                            <h3 class="post-subtitle">--}}
{{--                                {{$post->subtitle}}--}}
{{--                            </h3>--}}
{{--                        </a>--}}
{{--                        <p class="post-meta">Posted by--}}
{{--                            <a href="#">Start Bootstrap</a> {{$post->created_at->diffForHumans()}}--}}
{{--                            <a href="">0 <i class="fa fa-thumbs-up"></i></a>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <hr>--}}
{{--                    @endif--}}
{{--                    @endforeach--}}

                <posts
                    v-for="value in blog"
                    :title=value.title
                    :subtitle=value.subtitle
                    :created_at = value.created_at
                    :key=value.index
                    :postid=value.id
                    :likes = value.likes.length
                    login="{{Auth::check()}}"
                    :slug=value.slug
                ></posts>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        {{$posts->links()}}
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <hr>
@endsection
@section('js')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
