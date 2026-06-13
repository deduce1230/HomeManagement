<?php

namespace App\Http\Requests\Cookings;

use Illuminate\Foundation\Http\FormRequest;

class MealCategoryRequest extends FormRequest
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
            'cat_id' => 'required|integer',
            'cat_nm' => 'required|max:50',
        ];
    }
}
