<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends FrontendController
{
    public function index(){
        return view('frontend.pages.product.index');
    }
}
