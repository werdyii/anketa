<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PollRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name'=>'required|string|min:3',
            'description'=>'required|string',
            'limit'=>'required|integer|min:3|max:12',
            'status'=>'required|in:preview,run,end',
            'published_at'=>'required|date',
            'expires_at'=>'required|date'
        ];
    }
}
