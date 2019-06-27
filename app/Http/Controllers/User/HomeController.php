<?php

namespace App\Http\Controllers\User;

use App\Model\User\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $post = post::all();
        return view('user.home')->with([
            'posts' => $post
        ]);
    }
}
