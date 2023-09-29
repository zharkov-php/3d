<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GetHistoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type' => [
                'required',
                'in:employee,machine'
            ],
            'id' => [
                'required',
                'integer',
            ],
        ];
    }

    public function withValidator($validator)
    {
        $validator->sometimes('id', 'exists:employees,id', function ($input) {
            return $input->type === 'employee';
        });

        $validator->sometimes('id', 'exists:machines,id', function ($input) {
            return $input->type === 'machine';
        });
    }


}
