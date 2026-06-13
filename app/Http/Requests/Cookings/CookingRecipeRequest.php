<?php

namespace App\Http\Requests\Cookings;

use Illuminate\Foundation\Http\FormRequest;

class CookingRecipeRequest extends FormRequest
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
            'rec_id'       => 'required|integer',
            'recipe_id'    => 'required|integer',
            'ingredients'  => 'nullable|max:50',
            'food_id'      => 'nullable|integer',
            'amount'       => 'nullable|max:25',
            'for_num'      => 'nullable|max:25',
        ];
    }
}
