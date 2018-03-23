<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 16.03.2018
 * Time: 13:20
 */

namespace App\Contracts;


interface RoleDAOInt
{
    public static function get($id);
    public static function update($id,$data);
}