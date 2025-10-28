<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlockMineRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'blockId' => 'required|string',
            'data' => 'required|string',
            'hash' => 'required|string',
            'hashStart' => 'required|string',
            'algorithm' => 'required|string|in:sha256',
            'nonce' => 'required|integer|min:0',
        ];
    }
}
