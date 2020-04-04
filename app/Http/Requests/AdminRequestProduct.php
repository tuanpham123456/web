<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pro_name'          => 'required|max:190|min:3|unique:products,pro_name,'.$this->id,
            'pro_price'         => 'required',
            'pro_description'   => 'required',
            'pro_category_id'   => 'required',
            'pro_content'       => 'required',
        ];
    }
}
