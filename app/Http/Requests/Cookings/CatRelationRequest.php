<?php

namespace App\Http\Requests\Cookings;

use Illuminate\Foundation\Http\FormRequest;

class CatRelationRequest extends FormRequest
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
            'rec_id' => 'required|integer',
            'dish_id' => 'required|integer',
            'cat_id'  => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
        ];
    }
}
