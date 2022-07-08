<?php
namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait FormatResponseTrait
{
    // Get Language Of Project
    public function getCurrentLang(): string
    {
        return App()->getLocale();
    }

    // Return Json Request By Error Response
    public function returnError($codeStatus,$msg) :JsonResponse
    {
        return response() ->json([
            'status' => false,
            'errNum' => $codeStatus,
            'msg'    => $msg
        ]);
    }

    // Return Json Request By Success Response
    public function returnSuccessMessage($msg, $codeStatus = 'S000') :JsonResponse
    {
        return response() ->json([
            'status' => true,
            'errNum' => $codeStatus,
            'msg'    => $msg
        ]);
    }

    public function returnData($key,$value,$msg = '') :JsonResponse
    {
        return response() ->json([
            'status' => true,
            'errNum' => 'S000',
            'msg'    => $msg,
            $key => $value
        ]);
    }

}
