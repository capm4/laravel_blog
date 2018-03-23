<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PostORM;
use CategoryORM;
use Auth;
use Validator;
use Mail;

class IndexController extends Controller
{
    public function home(Request $request)
    {
        if($request->isMethod('post'))
        {

        }elseif ($request->isMethod('get'))
        {
            $data = [
                'title'=>'Main Page',
                'posts' =>PostORM::all(),
                'categories'=>CategoryORM::all(),
            ];
            return view('template.index',$data);
        }else
        {
            abort(404);
        }

    }
    public function about()
    {
        $data = [
            'title'=>'About me page',
            'categories'=>CategoryORM::all(),
        ];
        return view('template.about',$data);
    }
    public function contact(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('template.contact');

        }elseif ($request->isMethod('post'))
        {
            $this->validate($request,[
                'name'=>'required|max:255',
                'email'=>'required|email',
                'text'=>'required',
            ]);
            $data = $request->except('_token');
            Mail::send('email.email', ['data'=>$data], function($message) use ($data){
                $message->to('kruhlov_1@ukr.net',"Mr. Alex")->subject('Question');
                $message->from('kruhlov.aleksandr@gmail.com', $data['name']);
            });

            return redirect()->route('home');
        }else
        {
            return redirect()->back();
        }
    }
}
