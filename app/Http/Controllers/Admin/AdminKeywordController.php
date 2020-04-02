<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\AdminRequestKeyword;
use Carbon\Carbon;
use App\Models\Keyword;

class AdminKeywordController extends Controller
{
    public function index()
    {
        $keywords = Keyword::paginate(2);
        $viewData =[
            'keywords' => $keywords
        ];
        return view('admin.keyword.index',$viewData);
    }

    public function create()
    {
        return view('admin.keyword.create');   
    }

    public function store(AdminRequestKeyword $request)
    {
        $data               = $request->except('_token');
        $data['k_slug']     = Str::slug($request->k_name);
        $data['created_at'] = Carbon::now();

        $id = Keyword::insertGetId($data);
        return redirect()->back();
    }
} 