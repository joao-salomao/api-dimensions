<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'content' => 'required|string',
            'dimension_id' => 'required|exists:App\Dimension,id'
        ];
    }
}
