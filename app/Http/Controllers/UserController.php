<?php


namespace App\Http\Controllers;

/**
 * @group 使用者
 *
 * 使用者資訊
 */

class UserController
{
    public function show()
    {
        return View::make('admin.login');
    }

}
