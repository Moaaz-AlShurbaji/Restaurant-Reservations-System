<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Menu;
use App\Models\Category;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::get();
        return view("admin.menus.index", compact("menus"));
    }

    public function create()
    {
        $categories = Category::get();
        return view("admin/menus/create", compact("categories"));
    }

    public function store(MenuRequest $request)
    {
        if($request->validated())
        {
            $image = $request->file("image");
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/menus"),$imageName);

            $menu = Menu::create([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "image" => $imageName
            ]);

            if($request->has("categories"))
            {
                $menu->categories()->attach($request->categories);
            }
        }

        return redirect('admin/menus')->with("message","Menu created successfuly");
    }

    public function edit($id)
    {
        $categories = Category::get();
        $menu = Menu::find($id);
        return view("admin/menus/edit", compact("menu", "categories"));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required"
        ]);

        //$image = $menu->image;
        $imageName = $menu->image;
        
        if($request->hasFile("image"))
        {
            if(File::exists('menus/'.$imageName))
            {
                File::delete('menus/'.$imageName);
            }

            $image = $request->file("image");
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("/menus"),$imageName);
        }


        $menu->update([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $imageName
        ]);

        if($request->has("categories"))
        {
            $menu->categories()->sync($request->categories);
        }

        return redirect("/admin/menus")->with("message","Menu updated successfuly");
    }

    public function delete($id)
    {
        $menu = Menu::find($id);
        File::delete('menus/'.$menu->image);
        $menu->delete();
        return redirect("admin/menus")->with("message","Menu deleted successfuly");
    }
}
