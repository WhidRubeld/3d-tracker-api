<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeMovementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tracker_id' => 'required|integer|exists:trackers,id',
            'password' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'altitude' => 'required|numeric',
            'speed' => 'nullable|numeric',
            'battery' => 'nullable|integer',
            'bearing' => 'nullable|numeric',
            'generated_at' => 'required|date',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
