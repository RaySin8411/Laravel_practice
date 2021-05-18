<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Str;
use App\Member;
/**
 * @group 使用者
 *
 * 登出
 */
class LogoutController extends Controller
{

    /**
     * Logout
     * @response {
     *  "message": "You've logged out."
     * }
     */
    public function logout()
    {
        if ( Auth::user()->update(['api_token'=>'logged out'])) { //更新api token
            return "You've logged out";
        }
    }
}
