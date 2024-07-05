<?php

namespace App\Http\Controllers;

use App\Utils\ResponseUtil;
use Illuminate\Support\Facades\Response;

class ApiBaseController extends Controller
{
    public function sendResponse( $data, string $message ,bool $mergeToOneArray = false)
    {
        if ($mergeToOneArray)
            return Response::json(ResponseUtil::makeResponseMerged($message, $data));
        else
            return Response::json(ResponseUtil::makeResponse($message, $data));
    }

    public function sendError( string $message ,array $errors = array() ,array $data = array() ,int $code = 400)
    {
        return Response::json(ResponseUtil::makeError($message,$errors, $data), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }

}
