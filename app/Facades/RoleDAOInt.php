<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 16.03.2018
 * Time: 13:23
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class RoleDAOInt extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'roleorm';
    }
}