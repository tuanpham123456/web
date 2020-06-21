<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Menu;
class AdminArticleController extends Controller
{
    public function index(){
        $article    =   Article::paginate(10);
        $viewData   =   [
            'article'   =>   $article
        ];
        return view ('admin.article.index',$viewData);
    }

    public function create(){


        $menus   = Menu::all();

        return view ('admin.article.create',compact('menus'));
    }

//     public function store(AdminRequestMenu $request){
//         //gán data
//         $data = $request->except('_token');
//         // except lấy tất cả trừ  giá trị 'token' đc thêm
//         $data['a_slug']     = Str::slug($request->a_name);
//         $data['created_at']  = Carbon::now();

//         // model
//         dd($data)->all();

//    }
}

