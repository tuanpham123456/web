<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestAttribute;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;


class AdminAttributeController extends Controller
{
    public function index(){
        $attributes = Attribute::with('category:id,c_name')->orderByDesc('id')
        ->get();
        
        $viewData = [
            'attributes' => $attributes
        ];
        return view('admin.attribute.index',$viewData);
    }
    public function create(){
        $categories = Category::select('id','c_name')->get();
        return view('admin.attribute.create',compact('categories'));

    }
    public function store(AdminRequestAttribute $request){

        $data = $request->except('_token');
        // except lấy tất cả trừ  giá trị 'token' đc thêm
        $data['atb_slug']     = Str::slug($request->atb_name);
        $data['created_at']  = Carbon::now();
        
        // model category
        $id = Attribute::InsertGetId($data);
        // 
        return redirect()->back();
    }
}
