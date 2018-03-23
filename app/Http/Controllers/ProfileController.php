<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use UserORM;
use Validator;
use Gate;
use Auth;

class ProfileController extends Controller
{
    public function execute(Request $request,$id)
    {
        if(Auth::user()->id == $id or Gate::allows('isAdmin', Auth::user())) {
            $user = UserORM::get($id);
            $userRoles = $user->roles;
            $userRoleName = array();
            foreach ($userRoles as $role) {
                array_push($userRoleName, $role->name);
            }
            $roles = array();
            $rolesAdd = array();
            $arr = Role::all();
            foreach ($arr as $role) {
                if (in_array($role->name, $userRoleName)) {
                    $roles[$role->id] = $role->name;
                } else {
                    $rolesAdd[$role->id] = $role->name;
                }
            }
            $data =
                [
                    'user' => $user,
                    'roles' => $roles,
                    'rolesAdd' => $rolesAdd,
                ];
            return view('template.profile', $data);
        }else{
             return redirect()->back()->with('status', 'You have no such role');
        }

    }


    public function edit(Request $request, $id)
    {
        if(Auth::user()->id == $id) {
            if ($request->isMethod('get')) {
                $data =
                    [
                        'user' => UserORM::get($id),
                    ];
                return view('template.profile_edit', $data);
            } elseif ($request->isMethod('post')) {
                $input = $request->except('_token');
                UserORM::update($id, $input);
                return redirect()->route('profile', array('id' => $id));
            }
        }else{
            return redirect()->back()->with('status', 'You cannot do this');
        }
    }

}
