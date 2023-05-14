<?php

namespace App\Http\Traits;


trait ApiTrait
{


    public function successResponse(string $message, $statusCode = 200)
    {

        return response()->json([

            "success" => true,
            "message" => $message,
            "errors" => (object)[],
            "data" => (object)[]

        ], $statusCode);
    }

    public function errorResponse(array $errors = [], $message = "", $statusCode = 422)
    {

        return response()->json([

            "success" => false,
            "message" => $message,
            "errors" => (object)$errors,
            "data" => (object)[]

        ], $statusCode);
    }

    public function data(array $data = [], $message = "", $statusCode = 200)
    {

        return response()->json([

            "success" => true,
            "message" => $message,
            "errors" => (object)[],
            "data" => (object)$data

        ], $statusCode);
    }
}
