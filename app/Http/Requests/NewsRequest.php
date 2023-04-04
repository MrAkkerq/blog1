<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:5', 'max:50'],
            'body' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
