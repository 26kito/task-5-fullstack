<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function responseOk($result, $code=200, $message='Success')
    {
        $response = [
            'code' => $code,
            'data' => $result,
            'message' => $message
        ];
        
        return response()->json($response, $code);
    }

    public function responseError($error, $code=422, $errorDetails=[])
    {
        $response = [
            'code' => $code,
            'error' => $error
        ];

        if ($errorDetails) {
            $response['errorDetails'] = $errorDetails;
        }

        return response()->json($response, $code);
    }
}
