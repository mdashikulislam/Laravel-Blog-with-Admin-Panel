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
@section('maincontent')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                @foreach($posts as $post)
                    @if($post->status == 1)
                    <div class="post-preview">
                        <a href="{{route('user.post',['slug'=>$post->slug])}}">
                            <h2 class="post-title">
                                {{$post->title}}
                            </h2>
                            <h3 class="post-subtitle">
                                {{$post->subtitle}}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> {{$post->created_at->diffForHumans()}}</p>
                    </div>
                    <hr>
                    @endif
                    @endforeach

                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        {{$posts->links()}}
                    </li>
                </ul>
                    <style>
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
            </div>
        </div>
    </div>

    <hr>

@endsection