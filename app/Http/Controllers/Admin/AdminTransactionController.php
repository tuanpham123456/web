<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

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
}
