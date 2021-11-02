<?php

use App\Events\OrderShipped;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('ubike', 'UbikeController@index');
Route::get('ubike/{sno}', ['as' => 'ubike', 'uses' => 'UbikeController@show']);

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->member();
//});

Route::post('register', 'MemberController@store'); //註冊
Route::post('login', ['as' => 'login', 'uses' => 'LoginController@login']); //登入


Route::middleware('auth:api')->get('user', 'MemberController@index');  //查看
Route::middleware('auth:api')->put('user', 'MemberController@update'); //編輯
Route::middleware('auth:api')->delete('user/{users}', 'MemberController@destroy'); //刪除
Route::middleware('auth:api')->get('logout', 'LogoutController@logout'); //登出

Route::get(
    '/ship',
    function (Request $request) {
        $id = $request->input('id');
        event(new OrderShipped($id)); // 触发事件
        return Response::make('Order Shipped!');
    }
);
