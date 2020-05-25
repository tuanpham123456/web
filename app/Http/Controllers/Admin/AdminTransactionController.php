<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class AdminTransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::orderByDesc('id')
        ->paginate(10);

        $viewData = [
            'transactions' => $transactions,
        ];
        return view ('admin.transaction.index',$viewData);
    }
    public function getTransactionDetail(Request $request, $id)
    {

        if ($request->ajax()) {
            $orders = Order::with('product:id,pro_name,pro_slug,pro_avatar')->where('od_transaction_id', $id)
                ->get();

            $html = view("components.orders", compact('orders'))->render();

            return response([
                'html' => $html
            ]);
        }
    }
    public function deleteOrderItem(Request $request, $id)
    {
        if ($request->ajax()) {
            $order = Order::find($id);
            if ($order) {
                $money = $order->od_qty * $order->od_price;
                //
                \DB::table('transactions')
                    ->where('id', $order->od_transaction_id)
                    ->decrement('tst_total_money', $money); // giảm cột 
                // sau khi giảm xog
                $order->delete();
            }

            return response(['code' => 200]);
        }
    }

    public function delete($id){
        $transactions = Transaction::find($id);
        if ($transactions) {
            $transactions ->delete();
            \DB::table('orders')->where('od_transaction_id',$id)
            ->delete();
        }

        return redirect()->back();
    }
}
