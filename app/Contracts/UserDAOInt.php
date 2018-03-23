<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 16.03.2018
 * Time: 13:20
 */

namespace App\Contracts;
use App\User;

interface UserDAOInt
{
    public static function get($id);
    public static function update($id,$data);
    public static function updateRole($id,$roleId);
    public static function deleteRole($id, $roleId);
}