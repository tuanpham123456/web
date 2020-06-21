<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Menu;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Requests\AdminRequestArticle;
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

    public function store(AdminRequestArticle $request)
    {
        $data = $request->except('_token','a_avatar');
        $data['a_slug']     = Str::slug($request->a_name);
        $data['created_at']   = Carbon::now();


        if ($request->a_avatar) {
            $image = upload_image('a_avatar');
            if ($image['code'] == 1)
                $data['a_avatar'] = $image['name'];
        }

        $id = Article::insertGetId($data);

        return redirect()->back();
    }

}
