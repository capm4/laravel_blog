<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.03.2018
 * Time: 15:23
 */

namespace App\Contracts;


use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

interface PostDAOInt
{
    public static function save(Request $request, $userId, $categoryId);
    public static function delete(Post $post);
    public static function get($id);
    public static function update(Request $request,$id);
    public static function all();
}