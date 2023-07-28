<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sentSuccessResponse($data = '', $message = 'success', $status = 200)
    {
        return \response()->json([
            'data' => $data,
            'success' => true,
            'status' => $status,
            'text' => $message,
            'message' => $message,
            'time' => date("d/m/Y h:i:s")
        ], $status);
    }

    public function sentFailResponse($data = '', $message = 'fail', $status = 500)
    {
        return \response()->json([
            'error' => $data,
            'success' => false,
            'status' => $status,
            'text' => $message,
            'message' => $message,
            'time' => date("d/m/Y h:i:s")
        ], $status);
    }
}
