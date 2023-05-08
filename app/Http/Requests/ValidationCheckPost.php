<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationCheckPost extends FormRequest
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
            'postcomment' => 'required|min:1|max:150',
        ];
    }

     /**
     *  バリデーション項目名定義
     * @return array
     */

   public function attributes()
   {
       return [
           'postcomment' => '投稿内容',
       ];
    }

    public function messages()
    {
        return [
            'postcomment.required' => ':attributeを入力してください。',
            'postcomment.min' => ':attributeは1文字以上で入力してください。',
            'postcomment.max' => ':attributeは150文字以下で入力してください。',
        ];
    }
}
