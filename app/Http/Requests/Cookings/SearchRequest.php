<?php

namespace App\Http\Requests\Cookings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

class SearchRequest extends FormRequest
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
          //  'search_word' => 'required|max:128',
        ];
    }

public function withValidator(Validator $validator)
{
    $validator->sometimes('search_word', 'nullable|max:128', function () {
        return $this->search_type > 2;
    });
    $validator->sometimes('search_word', 'required|max:128', function () {
        return $this->search_type <= 2;
    });
}

    public function messages()
    {
        return [
            'search_word.required' => '検索文字列を入力してください',
            'search_word.max'      => '検索文字列は128文字以内で入力してください',
        ];
    }

}
