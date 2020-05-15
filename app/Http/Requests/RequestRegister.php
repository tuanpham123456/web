<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'email'     =>  'required|max:190|min:3|unique:users,name,'.$this->id,
            'name'      =>  'required',
            'phone'     =>  'required',
            'password'  =>  'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'    => 'Dữ liệu không được để trống',
            'email.min'         => 'Nhập phải nhiều hơn 3 ký tự',
            'email.unique'      => 'Dữ liệu đã tồn tại',
            'email.max'         => 'Nhập tối đa 190 ký tự',
            'name.required'     => 'Dữ liệu không được để trống',
            'password.required' => 'Dữ liệu không được để trống',
            'phone.required'    => 'Dữ liệu không được để trống'
        ];
    }
}
