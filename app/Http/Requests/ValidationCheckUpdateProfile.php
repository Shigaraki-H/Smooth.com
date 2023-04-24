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
            'username' => 'required|min:2|max:12',
            'mail' => 'required|email|min:5|max:40|unique:users',
            'password' => 'required|string|min:8|max:20|confirmed',
            'bio' => 'max:150',
            'images' => 'mimes:jpg,png,bmp,gif,svg',
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
           'password_confirmation' => 'パスワード確認用',
           'bio' => '自己紹介文',
           'images' => 'プロフィール画像',
       ];
    }

    public function messages()
    {
        return [
            'username.required' => ':attributeを入力してください。',
            'mail.max' => ':attributeは40文字以下で入力してください。',
            'mail.required' => ':attributeを入力してください。',
            'username.min' => ':attributeは2文字以上で入力してください。',
            'username.max' => ':attributeは12文字以下で入力してください。',
            'password.required' => ':attributeを入力してください。',
            'password.max' => ':attributeは20文字以下で入力してください。',
            'password.min' => ':attributeは8文字以上で入力してください。',
            'password_confirmation.required' => ':attributeを入力してください。',
            'password_confirmation.required.max' => ':attributeは20文字以下で入力してください。',
            'password_confirmation.required.min' => ':attributeは8文字以上で入力してください。',
            'bio.required.max' => ':attributeは150文字以内でで入力してください。',
            'bio.required.max' => ':attributeは150文字以内でで入力してください。',
        ];
    }
}
