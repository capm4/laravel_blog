<?php

namespace App\Http\Controllers;

use App\EloquentORM\CategoryORM;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function execute($id)
    {
        if($id==0)
        {
           return redirect()->route('home');
        }
        if ($category = CategoryORM::get($id)) {
            $data = [
                'category' => $category,
                'categories' => CategoryORM::all(),
                'posts' => $category->posts
            ];
            return view('template.category', $data);

        }else{
            return redirect()->back();
        }
    }
}
