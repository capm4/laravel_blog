<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 19.03.2018
 * Time: 10:40
 */

namespace App\EloquentORM;


use App\Contracts\RoleDAOInt;
use App\Role;


class RoleORM implements RoleDAOInt
{

    public static function get($id)
    {
        return Role::find($id);
    }

    public static function update($id, $data)
    {
        // TODO: Implement update() method.
    }
}