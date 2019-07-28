<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use App\Model\User\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:posts.tag');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = tag::all();
        return view('admin.tag.index')->with([
            'tags'=> $tag
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'tag'=>'required',
            'slug'=> 'required'
        ]);
        $tag = new tag();
        $tag->name = $request->tag;
        $tag->slug = $request->slug;
        $tag->save();
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = tag::where('id',$id)->first();
        return view('admin.tag.edit')
            ->with([
                'tag'=>$tag
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
            'tag'=>'required',
            'slug'=> 'required'
        ]);
        $tag = tag::find($id);
        $tag->name = $request->tag;
        $tag->slug = $request->slug;
        $tag->save();
        return redirect()->route('tag.index')->with([
            'success' => 'Tag update Sucessfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = tag::where('id',$id)->delete();
        return redirect()->back();
    }
}
