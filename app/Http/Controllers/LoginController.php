<?php

namespace App\Http\Controllers;

use Str;
use App\Member;
use Illuminate\Http\Request;

/**
 * @group 使用者
 *
 * 登入
 */


class LoginController
{
    /**
     * Login
     *
     * @bodyParam email String required 電郵 Example: 1234@gmail.com
     * @bodyParam password String required 密碼 Example: 12345678
     * @response {
     *  "message": "You've logged in"
     * }
     * @response 201{
     *  "message": "Wrong email or password！"
     * }
     */
    public function login(Request $request)
    {
        $member = Member::where('email', $request->email)->where('password', $request->password)->first();
        $apiToken = Str::random(10); //隨機產生一組10個英數字組成的字串
        if($member){
            if ($member->update(['api_token'=>$apiToken])) { //更新 api_token
                if ($member->isAdmin)
                    return "login as admin, your api token is $apiToken";
                else
                    $response = array();
                    $response['message'] = "login as user, your api token is $apiToken";
                    $response['message'] = "You've logged in";
//                    $data = array();
//                    $data['api_token'] = $apiToken;
//                    $response['data'] = $data;

                    return response()->json($response, 200);
            }
        }else return "Wrong email or password！";

    }
}
