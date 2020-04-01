<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AdminRequestCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
// build model category vào
use App\Models\Category;

use Illuminate\Http\Request;

class AdminCategoryController extends AdminController
{
    public function index(){
        $categories = Category::paginate(2);
        $viewData =[
            'categories' => $categories
        ];
       return view('admin.category.index',$viewData);
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(AdminRequestCategory $request){
        //gán data
        $data = $request->except('_token');
        // except lấy tất cả trừ  giá trị 'token' đc thêm
        $data['c_slug']     = Str::slug($request->c_name);
        $data['created_at']  = Carbon::now();
        
        // model category
        $id = Category::InsertGetId($data);

        // 
        return redirect()->back();
    }
}
