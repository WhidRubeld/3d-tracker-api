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
            'label' => 'required|string|max:255',
            'role' => 'nullable|string|in:' . implode(',', Flag::ROLES),
            'type' => 'nullable|string|in:' . implode(',', Flag::TYPES),
            'color_hex' => 'required|string|regex:/^([A-Fa-f0-9]{6})/i',
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
