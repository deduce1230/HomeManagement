<?php

namespace App\Http\Requests\Cookings;

use Illuminate\Foundation\Http\FormRequest;

class CookingRequest extends FormRequest
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
            'recipe_id' => 'required|integer',
            'recipe_nm' => 'nullable|max:50',
            'ref_url'   => 'nullable|max:1024',
            'recommend' => 'nullable|integer',
            'dish_id'   => 'nullable|integer',
            'kind_id'   => 'nullable|integer',
            'cat_id'    => 'nullable|integer',
            'hashtag'   => 'nullable|max:1024',
        ];
    }
}
