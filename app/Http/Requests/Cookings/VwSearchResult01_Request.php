<?php

namespace App\Http\Requests\Cookings;

use Illuminate\Foundation\Http\FormRequest;

class VwSearchResult01_Request extends FormRequest
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
            'meal_date' => 'required|date',
            'meal_time' => 'required|integer',
            'recipe_nm' => 'required|max:50',
            'ref_url'   => 'nullable|max:1024',
        ];
    }
    public function messages()
    {
        return [
            'meal_date.required' => '日付を入力してください',
            'meal_time.required' => '食事種別を入力してください',
            'recipe_nm.required' => 'メニュー名を入力してください',
            'recipe_nm.max'      => 'メニュー名は50文字以内で入力してください',
            'ref_url.max'        => 'URLは1024文字以内で入力してください',
        ];
    }

}
