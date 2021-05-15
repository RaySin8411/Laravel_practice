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
     * 秀出特定Ubike資訊
     *
     * @param \App\Ubike $ubike
     * @return \Illuminate\Http\Response Response::HTTP_OK
     */

    public function show()
    {
        $sno = Input::get('sno', false);
//        $sna = Input::get('sna', false);
//        $tot = Input::get('tot', false);
//        $sbi = Input::get('sbi', false);
//        $sarea = Input::get('sarea', false);
//        $mday = Input::get('mday', false);
//        $ar = Input::get('ar', false);
//        $snaen = Input::get('snaen', false);
//        $sarean = Input::get('sarean', false);
//        $bemp = Input::get('bemp', false);
//        $act = Input::get('act', false);

        $json = file_get_contents('https://tcgbusfs.blob.core.windows.net/blobyoubike/YouBikeTP.json');
        $obj = json_decode($json, true);
        $obj = $obj["retVal"];

    }
}
