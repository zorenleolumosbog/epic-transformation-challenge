<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|required|exists:users,id|unique:user_profiles,user_id',
            'age' => 'sometimes|required|integer',
            'height' => 'sometimes|required|max:255',
            'weight' => 'sometimes|required|integer',
            'weight_loss_goal' => 'sometimes|required|integer',
            'gym_experience' => 'sometimes|required|max:255',
            'hours_of_sleep_at_night' => 'sometimes|required|integer',
            'stress_level_out_of_10' => 'sometimes|required|integer|in:1,2,3,4,5,6,7,8,9,10',
            'medications_supplements' => 'sometimes|required|max:255',
            'injuries_illnesses' => 'sometimes|required|max:255'
        ];
    }
}