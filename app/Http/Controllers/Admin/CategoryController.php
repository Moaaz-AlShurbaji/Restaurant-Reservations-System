<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view("admin.categories.index", compact("categories"));
    }

    public function create()
    {
        return view("admin.categories.create");
    }

    public function store(CategoryRequest $request)
    {
        if($request->validated())
        {

            $image = $request->file("image");
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/categories"),$imageName);
            
            Category::create([
                "name" => $request->name,
                "description" => $request->description,
                "image" => $imageName
            ]);
        }
        
        return redirect("admin/categories")->with("message","Category Created Successfuly");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view("admin.categories.edit", compact("category"));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $request->validate([
            "name" => "required",
            "description" => "required"
        ]);

        $imageName = $category->image;

        //dd($request->hasFile("image"));
        //dd($image);
        //dd(File::exists('categories/'.$image));
        //dd(Storage::disk("public")->exists('categories/'.$image));
        if($request->hasFile("image"))
        {
            if(File::exists('categories/'.$imageName))
            {
                //dd("found");
                File::delete('categories/'.$imageName);
                //dd("deleted");
            }
            
            //Storage::disk("public")->delete('categories/'.$image)

            $image = $request->file("image");
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/categories"),$imageName);
        }


        $category->update([
            "name" => $request->name,
            "description" => $request->description,
            "image" => $imageName
        ]);

        return redirect("/admin/categories")->with("message","Category updated successfuly");
    }

    public function delete($id)
    {
        $category = Category::find($id);
        File::delete('categories/'.$category->image);
        $category->delete();
        return redirect("admin/categories")->with("message","Category deleted successfuly");
    }
}
