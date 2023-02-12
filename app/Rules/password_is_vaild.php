<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class password_is_vaild implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $p = encrypt($value);
        
        //
        if(\DB::table('users')->where('password', "!==", $p)->get()){
            return false;
        }elseif(\DB::table('users')->where('password', "==", $p)->get()){
            return true;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $request = new Request;
        $reMail = preg_match("/password=(\w+)/",$request,$match);
        $match[1];

        $a = \DB::table('users')->where('mail','hiro@gmail.com')->first();
        $username = Crypt::decryptString($a->password);
        return 'パスワードが'.$username.'正しくありません';
    }
}
