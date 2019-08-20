<?php

namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class SkillProviderFormRequest extends Request
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
        $id = (int) $this->input('id', 0);
        $password = 'required|min:6';
        $id_str = '';
        if ($id > 0) {
            $id_str = ',' . $id;
            $password = '';
        }
        return [
            'name' => 'required|max:150',
            'email' => 'required|unique:skill_providers,email' . $id_str . '|email',
            'password' => $password,
            'ownership_type_id' => 'required',
            "description" => "required",
            "website" => "required|url|max:150",
            "location" => "required|max:150",
            "established_in" => "required|max:12",
            "fax" => "required|max:30",
            "phone" => "required|max:30",
            "logo" => 'image',
            "country_id" => "required",
            "state_id" => "required",
            "city_id" => "required",
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
          'password.min' => __('The password should be more than 3 characters long'),
          'ownership_type_id.required' => __('Please select Ownership Type'),
          'description.required' => __('Description required'),
          'website.required' => __('Website required'),
          'website.url' => __('Complete url of website required'),
          'location.required' => __('Location required'),
          'established_in.required' => __('Established in year required'),
          'fax.required' => __('Fax number required'),
          'phone.required' => __('Phone number required'),
          'logo.image' => __('Only Images can be used as logo'),
          'country_id.required' => __('Please select country'),
          'state_id.required' => __('Please select state'),
          'city_id.required' => __('Please select city'),
        ];
    }

}
