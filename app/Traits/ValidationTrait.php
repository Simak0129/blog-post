<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

trait ValidationTrait
{
    public function failedValidation(Validator $validator)
    {
        $message = '';
        foreach ($validator->errors()->messages() as $error) {
            $message .= $error[0] . "\n";
        }

        throw new HttpResponseException(
            response()->json([
                'message' => $message,
            ], Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
