<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()     // 로그인 성공 여부
    {
        return true;       // 인증 성공
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()     // 제한사항
    {
        return [
            'title' => 'required|min:2|max:10',
            'content' => 'required'
        ];
    }
}
