<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 16.03.2018
 * Time: 13:20
 */

namespace App\EloquentORM;


use App\Role;
use App\User;
use App\Contracts\UserDAOInt;
use Illuminate\Support\Facades\Input;

class UserORM implements UserDAOInt
{

    public static function get($id)
    {
        return User::find($id);
    }

    public static function update($id, $data)
    {
        $user = User::find($id);
        if(array_key_exists('image', $data)){
            $file = Input::file('image');
            $input = $file->getClientOriginalName();
            $file->move(public_path() . '/img/user/' .$user['storeName']. '/', $input);
            $data['image'] = $input;
            $user->fill($data);
            $user->update();
        }else
        {
            $user->fill($data)->update();
        }

    }

    public static function updateRole($id, $roleId)
    {
        $user = UserORM::get($id);
        $role = Role::find($roleId);
        $user->roles()->save($role);
    }
    public static function deleteRole($id, $roleId)
    {
        $user = UserORM::get($id);
        $role = Role::find($roleId);
        $user->roles($role)->detach($roleId);
    }
}