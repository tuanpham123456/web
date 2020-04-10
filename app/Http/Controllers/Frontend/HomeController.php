<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends FrontendController
{
    public function index(){
        return view('frontend.pages.home.index');
    }
}
