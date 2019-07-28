<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:posts.category');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = category::all();
        return view('admin.category.index')
            ->with([
                'cats' => $cat
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category'=>'required',
            'slug'=>'required'
        ]);
        $cat = new category();
        $cat->name = $request->category;
        $cat->slug = $request->slug;
        $cat->save();

        return redirect()->route('category.index');
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
        $cat = category::where('id',$id)->first();
        return view('admin.category.edit')
            ->with([
                'cat' => $cat
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
            'category'=>'required',
            'slug'=>'required'
        ]);
        $cat = category::find($id);
        $cat->name = $request->category;
        $cat->slug = $request->slug;
        $cat->save();

        return redirect()->route('category.index')->with([
            'success' => 'Category Update Successfully'
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
        $cat = category::where('id',$id)->delete();
        return redirect()->back();
    }
}
