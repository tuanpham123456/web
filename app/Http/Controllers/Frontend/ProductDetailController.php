<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductDetailController extends FrontendController
{
    public function getProductDetail(Request $request ,$slug){

        $arraySlug = explode('-', $slug);
        $id = array_pop($arraySlug);
        if ($id) {
            $product = Product::with('category:id,c_name,c_slug')->FindOrFail($id);
            $viewData = [
                'product' => $product
            ];
            return view('frontend.pages.product_detail.index',$viewData);

        }
        return redirect()->to('/');
    }
}
