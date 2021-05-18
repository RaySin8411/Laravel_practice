<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController
{
    public function sendResponse($result, $message)
    {
        $response = array();
        $response['success'] = true;
        $response['data'] = $result;


        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = array();
        $response['success'] = false;
        $response['message'] = $error;

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }


}
