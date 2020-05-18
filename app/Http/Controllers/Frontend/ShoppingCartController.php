<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index(){
        // lấy danh sách xử dụng hàm trong package
        $shopping = \Cart::content();

        return view ('frontend.pages.shopping.index',compact('shopping'));
    }
    // Thêm giỏ hàng
    public function add($id){
        $product    = Product::find($id);
        if (!$product) return redirect()->to('/');

        \Cart::add([
            'id'        =>    $product->id,
            'name'      =>    $product->pro_name,
            'qty'       =>    1,
            'price'     =>    $product->pro_price,
            'weight'    =>    '1',
            'options'   => [
                'sale'  => $product->pro_sale,
                'image' => $product->pro_avatar,
            ]

            ]);
        return redirect()->back();


    }
}
