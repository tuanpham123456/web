<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestMenu;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdminMenuController extends Controller
{
    public function index(){
        $menus  = Menu::all();
        $viewData = [
            'menus' => $menus
        ];
        return view ('admin.menu.index',$viewData);
    }

    public function create(){
        return view ('admin.menu.create');
    }

    public function store(AdminRequestMenu $request){
         //gán data
         $data = $request->except('_token');
         // except lấy tất cả trừ  giá trị 'token' đc thêm
         $data['mn_slug']     = Str::slug($request->mn_name);
         $data['created_at']  = Carbon::now();

         // model
         $id = Menu::InsertGetId($data);

         //
         return redirect()->back();

    }
}
