<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Keyword;
class ProductDetailController extends FrontendController
{
    public function getProductDetail(Request $request ,$slug){

        $arraySlug = explode('-', $slug);
        $id = array_pop($arraySlug);
        if ($id) {
            $product = Product::with('category:id,c_name,c_slug','keywords')->FindOrFail($id); //keywords ở belongstomany Product

            $viewData = [
                'product'           => $product,
                'productsSuggest'   => $this->getProductSuggest($product->pro_category_id)
            ];
            return view('frontend.pages.product_detail.index',$viewData);

        }
        return redirect()->to('/');
    }

    //sản phẩm liên quan
    private function getProductSuggest($categoryID){
        $product = Product::where([
            'pro_active'        =>   1,
            'pro_category_id'   =>  $categoryID
        ])
            ->orderByDesc('id')
            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price')
            ->limit(12)
            ->get();

        return $product;
    }
}
