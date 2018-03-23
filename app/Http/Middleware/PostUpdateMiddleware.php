<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class PostUpdateMiddleware
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
                'text'=>'required'
            ]);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            return $next($request);
        }elseif ($request->isMethod('get') or $request->isMethod('delete') )
        {
            return $next($request);
        }else{
            return redirect()->back()->withErrors('something went wrong');
        }
    }
}
