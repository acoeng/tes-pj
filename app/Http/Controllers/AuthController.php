<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        
    }

    function generateRandomString($length = 80)
    {
        $char = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length_char = strlen($char);
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $char[rand(0, $length_char - 1)];
        }
        return $str;
    }

}
