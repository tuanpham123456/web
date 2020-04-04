<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestProduct;
use App\Models\Category;

class AdminProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }

    public function create(){
         $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }
    
    public function store(AdminRequestProduct $request){
        $data = $request->except('_token');
        // except lấy tất cả trừ  giá trị 'token' đc thêm
       
        dd($data);
    }
}
