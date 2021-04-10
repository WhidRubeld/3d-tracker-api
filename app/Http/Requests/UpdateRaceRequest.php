<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRaceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|max:255',
            'started_at' => 'date',
            'duration' => 'integer|min:1',
            'location_name' => 'string|max:255|required_with:location_latitude,location_longitude,location_zoom_index',
            'location_latitude' => 'numeric|required_with:location_name,location_longitude,location_zoom_index',
            'location_longitude' => 'numeric|required_with:location_name,location_latitude,location_zoom_index',
            'location_zoom_index' => 'integer|required_with:location_name,location_latitude,location_longitude',
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
