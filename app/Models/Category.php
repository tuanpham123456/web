<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = ['']; //không bảo vệ trường nào thông thường k update dòng nào thì nhét vào
}
