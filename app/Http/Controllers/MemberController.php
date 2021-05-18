<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Validation\Validator;

/**
 * @group 使用者
 *
 * 使用者
 */

class MemberController extends BaseController
{
    /**
     * Userinfo
     *
     * @response 200{
     *  "message":"Welcome 1234@gmail.com", "data": { "email" : "1234@gmail.com", "password": "12345678"}
     * }
     *
     * @response 201{
     *  "message":"Welcome Admin", "data": { "total": 2, "user": ["test@1234.com", "test2@222.com"]}
     * }
     */
    public function index()
    {
        $admins = Member::all();
        $members = [
            'email' =>  Auth::user()->email,
            'password' =>  Auth::user()->password,
        ];
        if (Auth::user()->isAdmin) //是管理者，回傳所有會員資料
            return $this->sendResponse($admins->toArray(), 'Members retrieved successfully.');
        else //不是管理者，回傳該會員自己的資料
            $response = array();
            $email = $members['email'];
            $response['message'] = "Welcome $email.";
            $response['data'] =$members;
            return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function adminStore(Request $request) { //管理者註冊的function
        try {
            $request->validate([ //這邊會驗證註冊的資料是否符合格式
                'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
                'password' => ['required', 'string', 'min:6', 'max:12'],
            ]);

            $apiToken = Str::random(10);
            $create = Member::create([
                'email' => $request['email'],
                'password' => $request['password'],
                'isAdmin' => '1',
                'api_token' => $apiToken,
            ]);

            if ($create) {
                $response = array();
                $response['message'] = "Register as an admin. Your Token is $apiToken.";
                $data = array();
                $data['api_token'] = $apiToken;
                $response['data'] = $data;

                return response()->json($response, 200);
            }

        } catch (Exception $e) {
            sendError($e, 'Registered failed.', 500);

        }

    }
    /**
     * Register
     *
     * @bodyParam email String required 電郵 Example: 1234@gmail.com
     * @bodyParam password String required 密碼 Example: 12345678
     * @response {
     *  "message" : "You've registered"
     * }
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password' => ['required', 'string', 'min:6', 'max:12'],
        ]);

        $apiToken = Str::random(10);
        $create = Member::create([
            'email' => $request['email'],
            'password' => $request['password'],
            'api_token' => $apiToken,
        ]);

        if ($create)
            $response = array();
            $response['message'] = "You've registered";
//            $data = array();
//            $data['api_token'] = $apiToken;
//            $response['data'] = $data;

            return response()->json($response, 200);
    }

    /**
     * Update User
     *
     * @bodyParam email String required 電郵 Example: 1234@gmail.com
     * @bodyParam password String required 密碼 Example: 12345678
     * @response 200{
     *  "message":"Member updated successfully!"
     * }
     * @response 201{
     *  "message":"Email or Password doesn't suit data format!"
     * }
     * @param \Illuminate\Http\Request $request
     * @param \App\Member $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $input = $request->all();
        $validator = Validator::make($input, [ //修改會員資料一樣要驗證是否符合格式
            'email' => ['string', 'email', 'max:255', 'unique:members'],
            'password' => ['string', 'min:6', 'max:12'],
        ]);

        if ($validator->fails()) {
            $response = array();
            $response['message'] = "Email or Password doesn't suit data format!";
            return response()->json($response, 201);
//            return $this->sendError('Validation Error.', $validator->errors());
        }
        $member = Auth::user();
        if ($member->update($request->all()))
            $response = array();
            $response['message'] = "Member updated successfully!";
            return response()->json($response, 201);
//            return $this->sendResponse($member->toArray(), 'Member updated successfully.');
    }

    /**
     * Delete User
     *
     * @authenticated
     *
     *
     * @response 200{
     *    "message":"The user id deleted."
     * }
     * @response 201{
     *    "message":"You have no authority to delete!"
     * }
     * @param \App\Member $members
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $members)
    {
        if ( Auth::user()->isAdmin){ //驗證是否為管理者
            if ($members->delete())
                $response = array();
                $response['message'] = "The user id deleted.";
                return response()->json($response, 201);
//                return $this->sendResponse($members->toArray(), 'Member deleted successfully.');
        }
        else
            $response = array();
            $response['message'] = "You have no authority to delete!";
            return response()->json($response, 201);
    }
}
