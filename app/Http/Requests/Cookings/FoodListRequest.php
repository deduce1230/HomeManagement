<?php

namespace App\Http\Requests\Cookings;

use Illuminate\Foundation\Http\FormRequest;

class FoodListRequest extends FormRequest
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
            'list_id' => 'required|integer',
            'list_nm' => 'required|max:25',
            'list_type' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
        ];
    }

}
