<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin-dashboard.manage_categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.manage_categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|max:500',
            'category_image' => 'required|mimes:jpeg,png,gif,jpg',
        ]);

        if ($request->hasFile('category_image')) {
            $file = $request->category_image;
            $new_file = time().$file->getClientOriginalName();
            $file->move('storage/category_image/', $new_file);
        }
        Category::create([
            "category_name" => $request->category_name,
            "category_image" => 'storage/category_image/' . $new_file

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin-dashboard.updates.category_update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category=Category::find($id);

        if($request->hasFile('category_image')){
            $file=$request->category_image;
            $new_file=time().$file->getClientOriginalName();
            $file->move('storage/category_image/',$new_file);
            $category->category_image='storage/category_image/'.$new_file;
        }

        $category->category_name=$request->category_name;

        $category->update();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        $category=Category::find($request);
        $category->delete();


        return redirect()->route('category.index');
    }
}
