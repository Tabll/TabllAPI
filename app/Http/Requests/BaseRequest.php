<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     *
     * @return mixed
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator);
    }
}
