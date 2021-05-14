<?php


namespace App\Http\Controllers;

use App\Ubike;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Ubike
 *
 * Ubike
 */
class UbikeController extends Controller
{
    /**
     * 所有Ubike資訊
     *
     * @return \Illuminate\Http\Response Response::HTTP_OK
     */
    public function index()
    {
        $json = file_get_contents('https://tcgbusfs.blob.core.windows.net/blobyoubike/YouBikeTP.json');
        $obj = json_decode($json, true);
        $obj = $obj["retVal"];
        $sna = array();
        foreach ($obj as $id) {
            $sna [] = $id['sna'];

        }
        return json_encode($sna, JSON_UNESCAPED_UNICODE);
    }

    /**
     * 秀出建立Ubike的列表
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * 儲存新的Ubike資訊
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response Response::HTTP_CREATED
     */
    public function store(Request $request)
    {
        $ubike = Ubike::create($request->all());

        return response($ubike, Response::HTTP_CREATED);
    }

    /**
     * 秀出特定Ubike資訊
     *
     * @param \App\Ubike $ubike
     * @return \Illuminate\Http\Response Response::HTTP_OK
     */
    public function show(Ubike $ubike)
    {
        return response($ubike, Response::HTTP_OK);
    }

    /**
     * 編輯Ubike資訊
     *
     * @param \App\Ubike $ubike
     * @return \Illuminate\Http\Response
     */
    public function edit(Ubike $ubike)
    {
        //
    }

    /**
     * 更新Ubike資訊
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Ubike $ubike
     * @return \Illuminate\Http\Response Response::HTTP_OK
     */
    public function update(Request $request, Ubike $ubike)
    {
        $ubike->update($request->all());
        return response($ubike, Response::HTTP_OK);
    }

    /**
     * 移除Ubike資訊
     *
     * @param \App\Ubike $ubike
     * @return \Illuminate\Http\Response Response::HTTP_NO_CONTENT
     */
    public function destroy(Ubike $ubike)
    {
        // 刪除
        $ubike->delete();
        // 回傳null 並且給予 204 狀態碼
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
