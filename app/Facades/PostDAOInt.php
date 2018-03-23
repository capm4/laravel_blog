<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.03.2018
 * Time: 15:15
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class PostDAOInt extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'postorm';
    }

}