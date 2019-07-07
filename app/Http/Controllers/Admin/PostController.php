<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\category;
use App\Model\User\post;
use App\Model\User\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = post::all();
        return view('admin.post.index')
            ->with([
                'posts' => $post
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = tag::all();
        $cat = category::all();
        return view('admin.post.create')->with([
            'cats'=>$cat,
            'tags'=>$tag
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
            'title'=>'required',
            'subtitle'=> 'required',
            'slug'=>'required',
            'body'=>'required',
            'category'=>'required',
            'tag'=>'required',
            'image'=>'required'

        ]);
        if ($request->hasFile('image')){

           $imageName = $request->image->store('public');
        }
        $post = new post();
        $post->title = $request->title;
       $post->image = $imageName;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;

        $post->save();
        $post->tags()->sync($request->category);
        $post->categories()->sync($request->tag);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::with('categories','tags')->where('id',$id)->first();
        $cats = category::all();
        $tags = tag::all();

        return view('admin.post.edit')
            ->with([
                'post' => $post,
                'cats' => $cats,
                'tags'=> $tags
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=> 'required',
            'slug'=>'required',
            'body'=>'required',
            'category'=>'required',
            'tag'=>'required',

        ]);
        if ($request->hasFile('image')){
            $imageName = $request->image->store('public');
            $post = post::find($id);
            $post->title = $request->title;
            $post->image = $imageName;
            $post->subtitle = $request->subtitle;
            $post->slug = $request->slug;
            $post->body = $request->body;
            $post->status = $request->status;
            $post->save();
            $post->tags()->sync($request->category);
            $post->categories()->sync($request->tag);
            return redirect()->route('post.index')->with('success','Post update Successfully');
        }else{
            $post = post::find($id);
            $post->title = $request->title;
            $post->subtitle = $request->subtitle;
            $post->slug = $request->slug;
            $post->body = $request->body;
            $post->status = $request->status;
            $post->save();
            $post->tags()->sync($request->category);
            $post->categories()->sync($request->tag);
            return redirect()->route('post.index')->with('success','Post update Successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::where('id',$id)->delete();
        return redirect()->back()->with('success','Post delete successfully');
    }
}
