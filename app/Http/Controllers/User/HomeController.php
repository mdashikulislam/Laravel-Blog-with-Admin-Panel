<?php

namespace App\Http\Controllers\User;

use App\Model\User\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $post = post::where('status',1)->paginate(5);

        return view('user.home')->with([
            'posts' => $post
        ]);
    }
}
