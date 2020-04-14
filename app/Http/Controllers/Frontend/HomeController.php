<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends FrontendController
{
    public function index(){
        $productsNew = Product::where([
            'pro_active' => 1,
        ])
        ->orderByDesc('id')
        ->limit(4)
        ->select('id','pro_name','pro_slug','pro_avatar','pro_price')
        ->get();

        $productsHot = Product::where([
            'pro_active' => 1,
            'pro_hot'    => 0
        ])
        ->orderByDesc('id')
        ->limit(4)
        ->select('id','pro_name','pro_slug','pro_avatar','pro_price')
        ->get();
        $viewData =[
            'productsNew' => $productsNew,
            'productsHot' => $productsHot
        ];
        return view('frontend.pages.home.index',$viewData);
    }
}
