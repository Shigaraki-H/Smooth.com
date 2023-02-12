<?php

namespace App\Http\Requests;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Request as PostRequest;
use App\Http\Controllers\Auth;
use App\Rules\password_is_vaild;

use Illuminate\Foundation\Http\FormRequest;

class ValidationCheckLogin extends FormRequest
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
            'mail' => 'required|exists:users',
            'password' => ['required',new password_is_vaild],
        ];
    }

     /**
     *  バリデーション項目名定義
     * @return array
     */

   public function attributes()
   {
       return [
           'mail' => 'メールアドレス',
           'password' => 'パスワード',

       ];
    }

    public function messages()
    {
        return [
            'mail.required' => ':attributeを入力してください。',
            'password.required' => ':attributeを入力してください。',
            
        ];
    }
}
