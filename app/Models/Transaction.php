<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Transaction extends Model
{
    protected $guarded = [''];

    protected $status = [
        '1' => [
            'class' => 'default',
            'name'  => 'Tiếp nhận',
        ],
        '2' => [
            'class' => 'danger',
            'name'  => 'Đang vận chuyển',
        ],
        '3' => [
            'class' => 'info',
            'name'  => 'Đã bàn giao',
        ],
        '-1' => [
            'class' => 'default',
            'name'  => 'Đã hủy',
        ],
    ];

    public function getStatus(){
        return Arr::get($this->status,$this->tst_status,"[N\A]");
    }
}
