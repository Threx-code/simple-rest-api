<?php

namespace App\Validators;
use Illuminate\Http\Exceptions\HttpResponseException;

class ValidatorResponse
{
    /**
     * @param $error
     * @param $errorMessage
     * @param $code
     * @return mixed
     */
    public static function validationErrors($error, $errorMessage, $code, $type): mixed
    {
        $errorResponse = response()->json([
            $type => $error,
            'message' => $errorMessage,
        ], $code);

        throw new HttpResponseException($errorResponse);
    }

}
