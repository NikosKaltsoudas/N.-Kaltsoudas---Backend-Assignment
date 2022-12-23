<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ShipPositionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            is_array($this->mmsi) ? 'mmsi.*' : 'mmsi' => 'integer',
            'min_latitude' => 'required|numeric|between:-90,90',
            'max_latitude' => 'required|numeric|between:-90,90',
            'min_longtitude' => 'required|numeric|between:-180,180',
            'max_longtitude' => 'required|numeric|between:-180,180',
            'time_from' => 'required|integer|lt:time_to|required_with:time_to',
            'time_to' => 'required|integer|gt:time_from|required_with:time_from'
        ];
    }
    
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
