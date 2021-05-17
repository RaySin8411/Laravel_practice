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
        $sarea = array();
        foreach ($obj as $id) {
            $sarea [] = $id['sarea'];

        }
        $sarea = array_unique($sarea);
        foreach ($obj as $id) {
            foreach ($sarea as $group){
                if ($group == $id['sarea']){
                    $sno = array();

                    $sno['站點代號']= $id['sno'];
                    $sno['是否暫停營運']= (boolean)$id['act'];
                    $sno['場站名稱']= $id['sna'];
                    $sno['可借車位數']= (int)$id['sbi'];
                    $sno['可還空位數']= (int)$id['bemp'];
                    $sno['資料更新時間']= date('F jS, Y h:i:s', strtotime($id['mday']));
                    $sna[$group] [] = $sno;
                    break;
                }

            }

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
                $info['站點代號'] = $id['sno'];
                $info['場站區域'] = $id['sarea'];
//                $info['英文場站區域'] = $id['sareaen'];
                $info['場站名稱'] = $id['sna'];
//                $info['英文場站名稱'] = $id['snaen'];
                $info['地址'] = $id['ar'];
//                $info['英文地址'] = $id['aren'];
//                $info['場站總停車格'] = $id['tot'];
                $info['可借車位數'] = (int)$id['sbi'];
                $info['可還空位數'] = (int)$id['bemp'];
                $info['是否暫停營運'] = (boolean)$id['act'];
                $info['資料更新時間'] = date('F jS, Y h:i:s', strtotime($id['mday']));
            }
        }
        return json_encode($info, JSON_UNESCAPED_UNICODE);
    }
}
