<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PostORM;
use CategoryORM;
class PostController extends Controller
{
    public function execute(Request $request, $id)
    {
        if($request->isMethod('get'))
        {
            $data=[
              'post'=>PostORM::get($id),
              'categories'=>CategoryORM::all(),
            ];
            return view('template.post',$data);
        }
    }
}
