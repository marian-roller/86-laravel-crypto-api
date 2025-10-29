<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HashConvertRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'input' => 'required|string',
            'salt' => 'nullable|string',
            'algorithm' => 'required|string', //TODO
        ];
    }
}