<?php

namespace App\http\controllers\auth;

trait apiResponse
{
    public function apiResponse($data=null,$message='',$status=200)
    {
        $array=[
            'success'=>true,
            'status'=>$status,
            'message'=>$message,
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

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
