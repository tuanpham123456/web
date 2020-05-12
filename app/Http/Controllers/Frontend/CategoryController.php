<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request,$slug){
        $arraySlug = explode('-', $slug);
        $id = array_pop($arraySlug);
        if ($id) {
            $products = Product::where([
                'pro_active'    => 1,
                'pro_category'  => $id,
            ])
            ->orderByDesc('id')
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale')
            ->paginate(12);

            $viewData = [
                'products' => $products
            ];

            return view ('frontend.pages.product.index',$viewData);
        }


    }
}
