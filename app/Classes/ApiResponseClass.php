<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiResponseClass
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function rollback($e, $message = "Bir Şeyler Ters Gitti,İşlem Tamamlanmadı")
    {
        DB::rollBack();
        self::throw($e, $message);
    }

    public static function throw($e, $message)
    {
        Log::info($e);
        throw new HttpResponseException(
            response()->json(
                [
                    "message" => $message
                ]
            )
        );

    }

    public static function sendResponse($result, $message, $code = 200)
    {
        $response = [
            'success' => true,
            'data' => $result
        ];
        if (!empty($message)) {
            $response['message'] = $message;
        }
        return response()->json($response, $code);
    }
}
