<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Request as PostRequest;
use App\Http\Controllers\Auth;

class ValidationCheckUpdateProfile extends FormRequest
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
            'inputName' => 'required|min:2|max:12',
            'inputEmail' => 'required|email|min:5|max:40|unique:users',
            'inputPassword' => 'required|string|min:8|max:20|confirmed',
            'inputBio' => 'required|string|max:150|confirmed',
            'image' => 'mimes:jpg,png,bmp,gif,svg',
        ];
    }

     /**
     *  バリデーション項目名定義
     * @return array
     */

   public function attributes()
   {
       return [
           'inputName' => 'ユーザー名',
           'inputEmail' => 'メールアドレス',
           'inputPassword' => 'パスワード',
           'password_confirmation' => 'パスワード確認用',
           'inputBio' => '自己紹介文',
           'image' => 'プロフィール画像',
       ];
    }

    public function messages()
    {
        return [
            'inputName.required' => ':attributeを入力してください。',
            'inputEmail.max' => ':attributeは40文字以下で入力してください。',
            'inputName.required' => ':attributeを入力してください。',
            'inputName.min' => ':attributeは2文字以上で入力してください。',
            'inputName.max' => ':attributeは12文字以下で入力してください。',
            'inputPassword.required' => ':attributeを入力してください。',
            'inputPassword.max' => ':attributeは20文字以下で入力してください。',
            'inputPassword.min' => ':attributeは8文字以上で入力してください。',
            'password_confirmation.required' => ':attributeを入力してください。',
            'password_confirmation.required.max' => ':attributeは20文字以下で入力してください。',
            'password_confirmation.required.min' => ':attributeは8文字以上で入力してください。',
            'inputBio.required.max' => ':attributeは150文字以内でで入力してください。',
            'inputBio.required.max' => ':attributeは150文字以内でで入力してください。',
        ];
    }
}
