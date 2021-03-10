<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRaceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'started_at' => 'required|date',
            'location_name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'location_description' => 'nullable|string|max:255',
            'location_latitude' => 'required|numeric',
            'location_longitude' => 'required|numeric',
            'location_zoom_index' => 'required|integer',
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
