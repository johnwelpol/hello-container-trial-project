<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bl_number' => [
                'sometimes',
                'string'
            ],
            'bl_release_user_id' => [
                'sometimes',
                'string'
            ],
            'bl_release_date' => [
                'sometimes',
                'date',
                'date_format:Y-m-d'
            ],
            'freight_payer_self' => [
                'sometimes',
                'in:1,0'
            ],
            'contract_number' => [
                'sometimes',
                'string'
            ],
        ];
    }
}
