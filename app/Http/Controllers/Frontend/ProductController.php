<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
class ProductController extends FrontendController
{
    public function index(){

        $attributes = $this->syncAttributeGroup();
        $viewData = [
            'attributes' => $attributes
        ];
        return view('frontend.pages.product.index',$viewData);
    }

    public function syncAttributeGroup()
    {
        $attributes     = Attribute::get();
        $groupAttribute = [];

        foreach ($attributes as $key => $attribute) {
            $key = $attribute->gettype($attribute->atb_type)['name'];
            $groupAttribute[$key][] = $attribute->toArray();
        }

        return $groupAttribute;
    }
}
