<?php


namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function storeExcel()
    {
        return Excel::store(new UsersExport, 'users.xlsx', 's3');
    }
}
