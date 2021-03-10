<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Flag;

class CreateFlagRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'race_id' => 'required|integer|exists:races,id',
            'tracker_id' => 'required|integer|exists:trackers,id|unique:flags,tracker_id',
            'label' => 'required|string|max:255',
            'role' => 'nullable|string|in:' . implode(',', Flag::ROLES),
            'type' => 'nullable|string|in:' . implode(',', Flag::TYPES),
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
