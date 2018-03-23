<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.03.2018
 * Time: 17:54
 */

namespace App\Contracts;


use App\Category;
use Illuminate\Http\Request;

interface CategoryDAOInt
{
    public static function save(Request $request);
    public static function delete(Category $category);
    public static function get($id);
    public static function update(Request $request,$id);
    public static function all();

}