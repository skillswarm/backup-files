<?php

namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class MentorFormRequest extends Request
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email' . $id_str . '|email',
            'password' => $password,
            'father_name' => 'max:80',
            'gender_id' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'phone' => 'numeric|digits:11',
            'mobile_num' => 'required|numeric|digits:10',
            'job_experience_id' => 'required',
            'current_salary' => 'max:11',
            'expected_salary' => 'max:11',
            'salary_currency' => 'max:5',
            'street_address' => 'required|max:250',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required',
            'middle_name.required' => 'Middle Name is required',
            'last_name.required' => 'Last Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'This Email has already been taken.',
            'password.required' => 'Password is required',
            'password.min' => 'The password should be more than 3 characters long.',
            'father_name.required' => 'Father Name is required',
            'date_of_birth.required' => 'Date of birth is required',
            'gender_id.required' => 'Please select gender',
            'marital_status_id.required' => 'Please select marital status',
            'nationality_id.required' => 'Please select nationality',
            'national_id_card_number.required' => 'national ID card# required',
            'country_id.required' => 'Please select country',
            'state_id.required' => 'Please select state',
            'city_id.required' => 'Please select city',
            'phone.required' => 'Please enter phone',
            'mobile_num.required' => 'Please enter mobile number',
            'job_experience_id.required' => 'Please select experience',
            'career_level_id.required' => 'Please select career level',
            'industry_id.required' => 'Please select industry',
            'functional_area_id.required' => 'Please select functional area',
            'current_salary.required' => 'Please enter current salary',
            'expected_salary.required' => 'Please enter expected salary',
            'salary_currency.required' => 'Please select salary currency',
            'street_address.required' => 'Please enter street address',
            'image.image' => 'Only images can be uploaded.',
        ];
    }

}
