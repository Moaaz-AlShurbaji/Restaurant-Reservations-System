<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view("categories.index", compact("categories"));
    }

    public function show($id)
    {
        $category = Category::with("menus")->find($id);
        return view("categories.show", compact("category"));
    }

    public function test()
    {
        return view("categories.test");
    }
}
