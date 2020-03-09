<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Date : 08-03-2020
     * Description : Membuat fitur register
     * Developer : Ari
     * Status : Create
     */
    public function register(Request $request)
    {
        $hashPassword = Hash::make($request->input("password"));
        $data = [
            "email" => $request->input("email"),
            "password" => $hashPassword
        ];
        
        $insert = DB::table('users')->insert($data);

        if ($insert) {
            $response = [
                "code" => 99,
                "message" => "registrasi berhasil",
            ];
        } else {
            $response = [
                "code" => 00,
                "message" => "registrasi gagal",
            ];
        }
 
        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        $user = DB::table("users")
                    ->where("email", $request->input("email"))
                    ->get()
                    ->first();

        if(!$user) {
            $response = [
                    "code" => 00,
                    "message" => "Login gagal",
                    "token" => null
                ];

            return response()->json($response, 401);
        }

        if(hash::check($request->input("password"), $user->password)){
            $token = $this->generateRandomString();
            
            DB::table('users')->where('id', $user->id)->update(['token' => $token]);

            $response = [
                    "code" => 99,
                    "message" => "Login sukses",
                    "token" => $token
                ];
            return response()->json($response, 200);
        } else {
            $response = [
                    "code" => 00,
                    "message" => "Login gagal",
                    "token" => null
                ];

            return response()->json($response, 401);
        }


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
