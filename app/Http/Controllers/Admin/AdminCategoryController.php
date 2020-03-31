<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminCategoryController extends AdminController
{
    public function index(){
       return view('admin.category.index');
    }
    public function create(){
        return view('admin.category.create');
    }
}
