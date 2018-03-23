<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use Session;
use Config;

class LangController extends Controller
{
    public function lang($locale){
        if (in_array($locale, \Config::get('app.locales'))) {
            Session::put('locale', $locale);
        }
        return redirect()->back();
    }
}
