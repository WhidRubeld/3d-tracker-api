<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Flag;

class UpdateFlagRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'race_id' => 'integer|exists:races,id',
            'tracker_id' => 'integer|exists:trackers,id|unique:flags,tracker_id',
            'label' => 'string|max:255',
            'role' => 'string|in:' . implode(',', Flag::ROLES),
            'type' => 'string|in:' . implode(',', Flag::TYPES),
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
