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

    public function show(Request $request)
    {
        $sno = $request->sno;

        $json = file_get_contents('https://tcgbusfs.blob.core.windows.net/blobyoubike/YouBikeTP.json');
        $obj = json_decode($json, true);
        $obj = $obj["retVal"];
        $info = array();
        foreach ($obj as $id) {
//            $info [] = $id['sno'];
            if ($sno == $id['sno']){
                $info['sno'] = $id['sno'];
                $info['sna'] = $id['sna'];
                $info['tot'] = $id['tot'];
                $info['sbi'] = $id['sbi'];
                $info['sarea'] = $id['sarea'];
                $info['mday'] = $id['mday'];
                $info['ar'] = $id['ar'];
                $info['snaen'] = $id['snaen'];
                $info['sareaen'] = $id['sareaen'];
                $info['bemp'] = $id['bemp'];
                $info['act'] = $id['act'];
            }
        }
        return json_encode($info, JSON_UNESCAPED_UNICODE);
    }
}
