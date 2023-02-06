<?php

namespace App\Http\Requests;

use App\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Request as PostRequest;
use App\Http\Controllers\Auth;


class ValidationCheckRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //もとはfalse
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
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|min:5|max:40|unique:users',
            'password' => 'required|string|min:8|max:20|confirmed',
            //'password_confirmation' => 'required|password|string|min:8|max:20|confirmed',
        ];
    }

     /**
     *  バリデーション項目名定義
     * @return array
     */

   public function attributes()
   {
       return [
           'username' => 'ユーザー名',
           'mail' => 'メールアドレス',
           'password' => 'パスワード',
           'password_confirmation' => 'パスワード確認用'
       ];
    }

    public function messages()
    {
        return [
            'mail.required' => ':attributeを入力してください。',
            'mail.max' => ':attributeは40文字以下で入力してください。',
            'user_name.required' => ':attributeを入力してください。',
            'user_name.min' => ':attributeは2文字以上で入力してください。',
            'user_name.max' => ':attributeは12文字以下で入力してください。',
            'password.required' => ':attributeを入力してください。',
            'password.max' => ':attributeは20文字以下で入力してください。',
            'password.min' => ':attributeは8文字以上で入力してください。',
            'password_confirmation.required' => ':attributeを入力してください。',
            'password_confirmation.required.max' => ':attributeは20文字以下で入力してください。',
            'password_confirmation.required.min' => ':attributeは8文字以上で入力してください。',
        ];
    }
}
