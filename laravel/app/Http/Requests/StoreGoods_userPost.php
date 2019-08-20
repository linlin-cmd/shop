<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreGoods_userPost extends FormRequest
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
            'kao_name'=>[
                'required',
                Rule::unique('kao')->ignore(request()->id, 'kao_id'),
            ],
             'kao_url' => 'required',
        ];
    }
    public function messages(){
        return [
             'kao_name.required' => '网站名称不能为空',
             'kao_name.unique' => '网站名称已存在',
             'kao_url.required' => '网址不能为空',
        ];
    }
}
