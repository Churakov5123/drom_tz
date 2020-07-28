<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

abstract class ApiFormRequest extends FormRequest
{

    /**
     * @param Validator $validator
     * Базовый абстрактный класс  спомощью которого мы будем выводить ошибки валидации в формате json
     */
    protected function failedValidation(Validator $validator)
    {
         // все ошибки валидации в формате json
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json([
            'errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

    abstract public function authorize();

    abstract public function rules();

}
