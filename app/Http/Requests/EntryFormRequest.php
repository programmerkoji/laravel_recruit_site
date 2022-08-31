<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryFormRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'kana' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'tel' => ['required', 'string'],
            'address' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'birth' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '氏名は必ず入力してください',
            'kana.required' => 'ふりがなは必ず入力してください',
            'email.required' => 'メールアドレスは必ず入力してください',
            'tel.required' => '電話番号は必ず入力してください',
            'address.required' => '住所は必ず入力してください',
            'gender.required' => '性別を選択してください',
            'birth.required' => '生年月日は必ず入力してください',
        ];
    }
}
