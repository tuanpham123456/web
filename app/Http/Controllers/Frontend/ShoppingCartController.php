<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
            'price'     =>    number_price($product->pro_price, $product->pro_sale),
            'weight'    =>    '1',
            'options'   => [
                'sale'      => $product->pro_sale,
                'price_old' => $product->pro_price,
                'image'     => $product->pro_avatar,
            ]

            ]);
            // thông báo thêm giỏ hàng
            \Session::flash('toastr' ,[
                'type'      => 'success',
                'message'   => 'Thêm giỏ hàng thành công'
            ]);
        return redirect()->back();


    }
    public function postPay(Request $request){
        $data = $request->except('_token');
        if (isset(\Auth::user()->id)) {
            $data['tst_user_id'] = Auth::user()->id;
        }

        $data['tst_total_money'] = str_replace(',','', \Cart::subtotal(0));
        $data['created_at']      = Carbon::now();
        $transactionID = Transaction::insertGetId($data);
        if ($transactionID){
            $shopping = \Cart::content();
            foreach ($shopping as $key => $item){
                // lưu chi tiết đơn hàng
                Order::insert([
                    'od_transaction_id' => $transactionID,
                    'od_product_id'     => $item->id,
                    'od_sale'           => $item->options->sale,
                    'od_qty'            => $item->qty,
                    'od_price'          => $item->price,
                ]);
                // tăng pay (số lượt mua của sản phẩm đó)
                \DB::table('products')
                    ->where('id',$item->id)
                    ->increment("pro_pay");
            }
        }// thông báo lưu đơn hàng
        \Session::flash('toastr' ,[
            'type'      => 'success',
            'message'   => 'Đơn hàng bạn đã được lưu'
        ]);
        \Cart::destroy();

        return redirect()->to('/');
    }

    // xóa giỏ hàng
    public function delete($rowId){
        //thông báo xóa giỏ hàng
        \Session::flash('toastr' ,[
            'type'      => 'success',
            'message'   => 'Xóa sản phẩm khỏi đơn hàng thành công'
        ]);

        \Cart::remove($rowId);
        return redirect()->back();

    }
}
