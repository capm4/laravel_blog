<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function isAdmin(User $user)
    {
        foreach ($user->roles as $role){
            if($role->name == 'admin'){
                return true;
            }
        }
        return false;
    }
    public function postEdit(User $user)
    {
        foreach ($user->roles as $role){
            if($role->name == 'moderator' or $role->name == 'admin' ){
                return true;
            }
        }
        return false;
    }
}
