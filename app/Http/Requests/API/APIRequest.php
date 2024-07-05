<?php


namespace App\Http\Requests\API;

use App\Utils\ResponseUtil;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
//use Illuminate\Support\Facades\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;



class APIRequest extends FormRequest
{
    /**
     * Get the proper failed validation response for the request.
     *
     * @param array $errors
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
//    public function response(array $errors)
//    {
//        $messages = implode(' ', Arr::flatten($errors));
//
////        return response()->json(ResponseUtil::makeError($messages), Response::HTTP_BAD_REQUEST);
//        return Response::json(ResponseUtil::makeError($message,$errors, $data), 400);
//    }
    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'errors' => $errors
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}
