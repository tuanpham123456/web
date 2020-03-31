<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AdminRequestCategory;

use Illuminate\Http\Request;

class AdminCategoryController extends AdminController
{
    public function index(){
       return view('admin.category.index');
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(AdminRequestCategory $request){
        dd($request->all());

    }
}
