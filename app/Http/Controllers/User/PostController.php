<?php

namespace App\Http\Controllers\User;

use App\Model\user\Like;
use App\Model\User\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(post $post)
    {
        return view('user.post')
            ->with([
                'post'=>$post
            ]);
    }

    public function getAllPost(){
       return $post = post::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(5);
    }
    public function savelike(Request $request){

        $likeCount = Like::where(['user_id'=>\Auth::id(),'post_id'=>$request->id])->first();
        if ($likeCount){
            Like::where(['user_id'=>\Auth::id(),'post_id'=>$request->id])->delete();
            return 'deleted';
        }else{
            $like = new Like();
            $like->user_id = \Auth::id();
            $like->post_id = $request->id;
            $like->save();
        }

    }
}
