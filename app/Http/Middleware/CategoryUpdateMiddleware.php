<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class CategoryUpdateMiddleware
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
            $input['alias']=strtolower($input['alias']);
            $validator = Validator::make($input,
                [
                    'title'=>'required|max:255',
                    'alias'=>'required|max:255|unique:category,alias,'.$input['id'],
                ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }else {
                return $next($request);
            }
        }else
        {
            return $next($request);
        }
    }
}
