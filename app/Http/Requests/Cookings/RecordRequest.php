<?php

namespace App\Http\Requests\Cookings;

use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
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
            'rec_id'    => 'required|integer',
            'meal_date' => 'required|date',
            'meal_id'   => 'required|integer',
            'recipe_id' => 'required|integer',
            'flg_sch'   => 'nullable|integer',
            'score'     => 'nullable|integer',
            'memo'      => 'nullable|max:128',
            'eater_id'  => 'nullable|integer',
        ];
    }
    public function messages()
    {
        return [
        ];
    }
}
