<?php

namespace App\Http\Requests\AuthValidations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'birthdate' => 'nullable',
            'referral_user_link' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
            'password' => ['required' , Password::min(8)->letters()->numbers()],
        ];
    }
}
