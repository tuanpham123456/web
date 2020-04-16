<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestAttribute;
use App\Models\Attribute;
use App\Models\Category;


class AdminAttributeController extends Controller
{
    public function index(){
        return view('admin.attribute.index');
    }
    public function create(){
        $categories = Category::select('id','c_name')->get();
        return view('admin.attribute.create',compact('categories'));

    }
    public function store(AdminRequestAttribute $request){

    }
}
