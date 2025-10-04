<?php

namespace App\Http\View;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer 
{
     protected $categories;

     public function compose(View $view)
     {
          $categories = Category::whereNull('category_id')->get();
          $view->with('categories' , $categories);
     }
}