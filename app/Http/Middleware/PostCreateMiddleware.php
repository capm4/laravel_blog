<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class PostCreateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->isMethod('post'))
        {
            $input = $request->except('_token');
            $validator = Validator::make($input,[
                'title'=>'required|max:255',
                'alias'=>'required|unique:post|max:255',
                'text'=>'required'
            ]);
            if($validator->fails())
            {

                return redirect(route('admin_create_post'))->withErrors($validator)->withInput();
            }
            return $next($request);
        }elseif ($request->isMethod('get'))
        {
            return $next($request);
        }else{
            return redirect()->back()->withErrors('something went wrong');
        }
    }
}
