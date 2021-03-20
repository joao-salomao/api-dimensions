<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{

    public function rules()
    {
        return [
            'content' => 'filled|string',
            'active' => 'filled|boolean',
            'dimension_id' => 'filled|exists:App\Dimension,id'
        ];
    }
}
