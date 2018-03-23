<?php

namespace App\Http\Middleware;

use Closure;
use Validator;

class UserUpdateMiddleware
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
            if ($request->isMethod('get')) {
                return $next($request);
            } elseif ($request->isMethod('post')) {
                $input = $request->except('_token');
                $validator = Validator::make($input, [
                    'name' => 'required|string|max:255',
                    'surname' => 'required|string|max:255',
                    'nick' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                } else {
                    return $next($request);
                }
            }
    }
}
