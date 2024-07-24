<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException; //回傳錯誤訊息到前端

class APIRequest extends FormRequest
{
    protected function failedValidation(validator $validator)
    {
        throw new HttpResponseException(response(['errors'=>$validator->errors()],400));
    }
}