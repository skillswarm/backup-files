<?php

namespace App\Http\Requests\Front;

use Auth;
use App\Http\Requests\Request;

class SkillProviderFrontRegisterFormRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required|max:150',
            'email' => 'required|unique:skill_providers,email|email|max:100',
            'password' => 'required|confirmed|min:6|max:50',
            'terms_of_use' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name is required'),
            'email.required' => __('Email is required'),
            'email.email' => __('The email must be a valid email address'),
            'email.unique' => __('This Email has already been taken'),
            'password.required' => __('Password is required'),
            'password.min' => __('The password should be more than 6 characters long'),
            'terms_of_use.required' => __('Please accept terms of use'),
        ];
    }

}
