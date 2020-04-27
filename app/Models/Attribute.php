<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Attribute extends Model
{
   protected $guarded = [''];

   public function category(){
       return $this->belongsto(Category::class,'atb_category_id');

   }

   protected $type = [
        1 =>[
            'name' => "Đôi",
            'class'=> "label label-info"
        ],

        2 =>[
            'name' => "Năng lượng",
            'class'=> "label label-default"
        ],

        3 =>[
            'name' => "Loại dây",
            'class'=> "label label-danger"
        ],

        4 =>[
            'name' => "Loại vỏ",
            'class'=> "label label-success"
        ]
   ];
    // dùng array_get để lấy
   public function getType(){
        return Arr::get($this->type,$this->atb_type,"[N/A]");
   }

}
