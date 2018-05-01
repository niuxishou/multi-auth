<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		if ($this->path() == 'apply'){
            return: true;
		} else {
		    return: false;
		}
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_1' => 'required',
			'name_2' => 'required',
			'name_kana_1' => 'required',
			'name_kana_2' => 'required',
			'post' => 'required',
            'pref' => 'required',
			'address_1' => 'required',
			'address_2' => 'required',
			'address_3' => 'required',
			'gender' => 'required',
			'birthday_1' => 'required',
			'birthday_2' => 'required',
			'birthday_3' => 'required',
			'email' => 'required|email',
			'tel' => 'required',
			'kakuninfile_1' => 'required',
            'shikakufile_1' => 'required',
			'job' => 'required',
			'pr' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => '必須項目です',
			'email' => 'メールアドレスの形式で入力してください',
        ];
    }
}
