<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories = Category::where('category_id', 0)->get();
        $allCategories = Category::all();
        $view->with('categories', $categories);
        $view->with('allCategories', $allCategories);
    }
}
