<?php

namespace App\Http\Requests\Cookings;

use Illuminate\Foundation\Http\FormRequest;

class FoodInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
//            'food_id' => 'required|integer',
            'food_nm' => 'required|max:50',
//            'season_s' => 'nullable|max:25',
            'group_num' => 'nullable|integer',
        ];
    }
    public function messages()
    {
        return [
//            'food_id.required' => 'IDを選択してください',
//            'food_id.integer' => 'IDの入力形式が不正です',
            'food_nm.required' => '食材名を入力してください',
            'food_nm.max' => '食材名は50文字以内で入力してください',
            'group_num.integer' => '食品群は半角数字で入力してください',
        ];
    }

}
