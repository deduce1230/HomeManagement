<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'todo_mission' => 'required|max:128',
        ];
    }
    public function messages()
    {
        return [
            'todo_mission.required' => 'TODO内容を入力してください',
            'todo_mission.max'      => 'TODO内容は128文字以内で入力してください',
        ];
    }

}
