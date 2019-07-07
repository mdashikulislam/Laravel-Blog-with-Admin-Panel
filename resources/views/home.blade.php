@extends('user.app')

@section('bg-image')
    {{asset('user/img/home-bg.jpg')}}
@endsection
@section('title')
    Welcome
@endsection

@section('maincontent')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                welcome  {{Auth::user()->name}}
            </div>
        </div>
    </div>

    <hr>

@endsection