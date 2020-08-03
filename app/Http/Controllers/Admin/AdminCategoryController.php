<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AdminRequestCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
// build model category vào
use App\Models\Category;
use App\Models\Attribute;

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

    public function active($id){
        $category = Category::find($id);
        $category->c_status = ! $category->c_status;
        $category->save();
        return redirect()->back();

    }

    public function hot($id){
        $category = Category::find($id);
        $category->c_hot = ! $category->c_hot;
        $category->save();
        return redirect()->back();

    }

    // edit ,update
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.update',compact('category'));
    }
    public function update(AdminRequestCategory $request, $id)
    {
        $category           = Category::find($id);
        $data               = $request->except('_token');
        $data['c_slug']     = Str::slug($request->c_name);
        $data['updated_at'] = Carbon::now();

        $category->update($data);
        return redirect()->back();
    }
    //delete
    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) $category->delete();

        return redirect()->back();
    }
}
