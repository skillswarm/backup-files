<?php

namespace App\Http\Controllers\Mentor\Auth;

use App\Mentor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Front\MentorFrontRegisterFormRequest;

class RegisterController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

     use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/mentor/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('mentor.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(MentorFrontRegisterFormRequest $request)
    {
        $mentor = new Mentor();
        $mentor->first_name = $request->input('first_name');
        $mentor->middle_name = $request->input('middle_name');
        $mentor->last_name = $request->input('last_name');
        $mentor->email = $request->input('email');
        $mentor->password = bcrypt($request->input('password'));
        $mentor->is_active = 0;
        $mentor->verified = 0;
        $mentor->save();

        $this->guard()->login($mentor);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('mentor');
    }

}
