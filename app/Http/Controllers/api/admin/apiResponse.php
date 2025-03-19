<?php

namespace App\Http\Controllers\api\admin;

trait apiResponse
{
    public function apiResponse($data=null,$message='',$emailMessage='',$status=200)
    {
        $array=[
            'success'=>true,
            'status'=>$status,
            'message'=>$message,
            'emailMessage'=>$emailMessage,
            'result'=>$data,
        ];
        return response($array);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
