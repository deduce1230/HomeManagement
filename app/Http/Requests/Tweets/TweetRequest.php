<?php

namespace App\Http\Requests\Tweets;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
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
        //return [
       //     'rec_id'      => 'required|integer',
       //     'tweet_date'  => 'required|date',
       //     'tweet'       => 'required|max:128',
       //     'ref_url'     => 'nullable|max:256',
       //     'rep_user_id' => 'required|integer',
       // ];
        return [
            'tweet_date'  => 'required|date',
            'tweet'       => 'required|max:128',
            'ref_url'     => 'nullable|max:256',
            'imagedata'   => 'nullable',
        ];
    }
}
