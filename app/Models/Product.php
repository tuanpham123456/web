<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [''];

    protected $country = [
        "0" => "[N\A]",
        "1" =>  "Việt Nam",
        "2" =>  "Anh",
        "3" =>  "Thụy Sỹ",
        "4" =>  "Mỹ"

    ];

    public function getCountry(){
        return Arr::get($this->country,$this->pro_country,"[N\A]");
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'pro_category_id');
    }

}
