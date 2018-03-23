<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.03.2018
 * Time: 17:55
 */

namespace App\EloquentORM;


use App\Category;
use App\Contracts\CategoryDAOInt;
use Illuminate\Http\Request;
use Validator;


class CategoryORM implements CategoryDAOInt
{

    public static function save(Request $request)
    {
        $data =
            [   'title' =>$request['title'],
                'alias'=>$request['alias'],
            ];
        $category = new Category();
        $category->fill($data)->save();
    }

    public static function delete(Category $category)
    {
        $category->delete();
    }

    public static function get($id)
    {
        return Category::find($id);
    }

    public static function update(Request $request,$id)
    {
        $input = $request->except('_token');
        $data =
            [   'title' =>$input['title'],
                'alias'=>$input['alias'],
            ];
        $category = Category::find($id);
        $category->fill($data);
        $category->update();

    }

    public static function all()
    {
        if($categories = Category::all())
        {
            return $categories;
        }else{
            abort(404);
        }
    }
}