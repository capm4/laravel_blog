<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.03.2018
 * Time: 17:58
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class CategoryDAOInt extends Facade
{
    protected static function getFacadeAccessor()
    {
       return 'categoryorm';
    }

}