<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories= SubCategory::query()->paginate(5);
        return view('admin.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::query()->get();
        return view('admin.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subcategories = new SubCategory;
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required| unique:sub_categories',
            'category'=>'required',
            'status'=>'required'
        ]);
        

        
        $subcategories->name = $request->name;
        $subcategories->slug = $request->slug;
        $subcategories->category_id = $request->category;
        $subcategories->status = $request->status;
        

        $subcategories->save();
        

        
        return redirect('/admin/subcategory/create')->with('message', 'Your data is submitted ');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories= Category::query()->get();
        $subcategories= new subcategory;
        $subcategories = $subcategories->where('id', $id)->First();
        return view('admin.subcategory.show', compact('categories','subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories= Category::query()->get();
        $subcategories= new subcategory;
        $subcategories = $subcategories->where('id', $id)->First();
        return view('admin.subcategory.edit', compact('subcategories','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $subcategories= new subcategory;
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required| unique:sub_categories',
            'category'=>'required',
            'status'=>'required'
        ]);

        

        $subcategories = $subcategories->where('id', $id)->First();
        $subcategories->name = $request->name;
        $subcategories->slug = $request->slug;
        $subcategories->category_id = $request->category;
        $subcategories->status = $request->status;
        
        $subcategories->update();
        return redirect('/admin/subcategory')->with('message', 'Your data have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subcategories = new Subcategory;
        $subcategories = $subcategories->where('id', $id)->first();
        $subcategories->delete();
        return redirect('/admin/subcategory')->with('message', 'Your data have been deleted');
    }
}
