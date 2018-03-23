<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller
{
   public function update(Request $request)
   {
       $input = $request->except('_token');
       if($input['do'] == 'updateUserLastVisit' ){

           $user = Auth::user();
           $user['updated_at'] = Carbon::now();
           $user->update();

           return Response::json([
               'lastTime' => $user->updated_at
           ], 201);
       }
   }
}
