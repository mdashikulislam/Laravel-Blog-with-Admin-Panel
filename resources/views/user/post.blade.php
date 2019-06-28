@extends('user.app')

@section('bg-image')
    {{asset('user/img/post-bg.jpg')}}
    @endsection
@section('title')
    {{$post->title}}
@endsection
@section('sub-title')
    {{$post->subtitle}}
@endsection
@section('maincontent')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3"></script>
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="uper" style="overflow: hidden">
                        <p class="pull-left" ><strong>Created at : </strong>{{$post->created_at->diffForHumans()}}</p>
                        <p class="pull-right" ><strong>Category :</strong>
                            @foreach($post->categories as $category)
                                <small style="margin-right: 10px;">{{$category->name}}</small>
                                @endforeach
                        </p>
                    </div>
                    {!! htmlspecialchars_decode($post->body)  !!}
                    <div class="down">
                        <h3>Tags</h3>
                        <p>
                            @foreach($post->tags as $tag)
                                <small style="margin-right: 10px;border: 1px solid #ddd; border-radius: 5px; background: gray;color: #fff;padding: 5px;">{{$tag->name}}</small>
                            @endforeach
                        </p>
                    </div>
                    <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>
                </div>
            </div>
        </div>
    </article>

    <hr>
    @endsection