<?php

namespace App\Http\Requests\Cookings;

use Illuminate\Foundation\Http\FormRequest;

class FoodTypeRequest extends FormRequest
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
            'type_id' => 'required|integer',
            'type_nm' => 'required|max:50',
        ];
    }
    public function messages()
    {
        return [
            'type_id.required' => 'IDを選択してください',
            'type_id.integer' => 'IDの入力形式が不正です',
            'type_nm.required' => '食材タイプ名を入力してください',
            'type_nm.max' => '食材タイプ名は50文字以内で入力してください',
        ];
    }

}
