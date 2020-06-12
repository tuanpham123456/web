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
        ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale')
        ->get();

        $productsHot = Product::where([
            'pro_active' => 1,
            'pro_hot'    => 0
        ])
        ->orderByDesc('id')
        ->limit(4)
        ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale')
        ->get();

         //Sản phẩm mua nhiều
         $productsPay = Product::where([
            'pro_active' => 1,
        ])
        ->where('pro_pay','>',0)
        ->orderByDesc('pro_pay')
        ->limit(10)
        ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star')
        ->get();

        $viewData =[
            'productsNew'   =>  $productsNew,
            'productsHot'   =>  $productsHot,
            'productsPay'   =>  $productsPay,
            'title_page'    =>  'Shop Đồng Hồ TP'
        ];
        return view('frontend.pages.home.index',$viewData);
    }
}
