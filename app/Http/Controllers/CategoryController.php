<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){

        $categoryModel = new Category();
        $categories = $categoryModel->getParentCategories();
        $allCategories = $categoryModel->getAllCategories();

        return view('admin.manage-category', compact('categories'));
    }
    public function pageAddCategory(){
        return view('admin.add-category');
    }



     public function addCategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = 0;
        $category->save();


        return redirect('/manage-category/add')->with('success', 'Category added successfully');

    }
     public function index_edit(Request $request)
    {
        return view('admin.edit-category');

    }
}
