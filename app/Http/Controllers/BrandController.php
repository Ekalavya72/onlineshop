<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brand::query()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brands= new Brand;
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required| max:100',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg |max:2028',
            'status'=>'required'
        ]);
        $folderPath = public_path('uploads/brand/image');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true); // Recursive directory creation
            }

        $fileName = Str::slug($request->name)  . '-' . time() . '.' . $request->image->extension();
        $request->image->move($folderPath, $fileName);


        
        $brands->name = $request->name;
        $brands->slug = $request->slug;
        $brands->image = $fileName;
        $brands->status = $request->status;
        

        $brands->save();
        

        
        return redirect('/admin/brand/create')->with('message', 'Your data is submitted ');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $brands = new brand;
        $brands = $brands->where('id', $id)->First();
        return view('admin.brand.show', compact('brands'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brands = new Brand;
        $brands = $brands->where('id', $id)->First();
        return view('admin.brand.edit', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $brands = new Brand;
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required| max:100',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg |max:2028',
            'status'=>'required'
        ]);
        $brands = $brands->where('id', $id)->First();
        $brands->name = $request->name;
        $brands->slug = $request->slug;
        if ($request->image!= NULL) {
            $brand = Str::slug($request->name) . "-" .
                time() . '.' . $request->image->extension();
            File::delete(public_path('uploads/brand/image/' . $brands->image));
            $request->image->move(public_path('uploads/brand/image'), $brand);
            $brands->image = $brand;
        }
        $brands->status = $request->status;
        
        $brands->update();
        return redirect('/admin/brand')->with('message', 'Your data have been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brands = new Brand;
        $brands = $brands->where('id', $id)->First();
        File::delete(public_path('uploads/brand/image/' . $brands->image));
        $brands->delete();
        return redirect('/admin/brand')->with('message', 'Your data have been deleted');
    }
}
