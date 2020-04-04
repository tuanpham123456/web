<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestProduct;

class AdminProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }

    public function create(){
        return view('admin.product.create');
    }
    public function store(AdminRequestProduct $request){
        $data = $request->except('_token');
        // except lấy tất cả trừ  giá trị 'token' đc thêm
       
        dd($data);
    }
}
