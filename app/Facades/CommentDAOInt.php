<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.03.2018
 * Time: 19:32
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class CommentDAOInt extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'commentorm';
    }

}