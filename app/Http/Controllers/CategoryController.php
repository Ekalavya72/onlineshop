<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::query()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request -> all());
        $categories = new category;
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required| max:100',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg |max:2028',
            'status'=>'required'
        ]);
        $fileName = Str::slug($request->name)  . '-' . time() . '.'
        . $request->image->extension();
        $request->image->move(public_path('uploads'), $fileName);

        
        $categories->name = $request->name;
        $categories->slug = $request->slug;
        $categories->image = $fileName;
        $categories->status = $request->status;
        

        $categories->save();
        

        
        return redirect('/admin/category/create')->with('message', 'Your data is submitted ');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories= new category;
        $categories = $categories->where('id', $id)->First();
        return view('admin.category.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories= new category;
        $categories = $categories->where('id', $id)->First();
        return view('admin.category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $categories= new category;
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required| max:100',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg |max:2028',
            'status'=>'required'
        ]);

        

        $categories = $categories->where('id', $id)->First();
        $categories->name = $request->name;
        $categories->slug = $request->slug;
        if ($request->image!= NULL) {
            $category = Str::slug($request->name) . "-" .
                time() . '.' . $request->image->extension();
            File::delete(public_path('uploads/' . $categories->image));
            $request->image->move(public_path('uploads'), $category);
            $categories->image = $category;
        }
        $categories->status = $request->status;
        
        $categories->update();
        return redirect('/admin/category')->with('message', 'Your data have been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categories = new category;
        $categories = $categories->where('id', $id)->first();

        File::delete(public_path('uploads/' . $categories->image));
        $categories->delete();


        return redirect('/admin/category')->with('delete', 'Your data has been deleted');
    }
}
