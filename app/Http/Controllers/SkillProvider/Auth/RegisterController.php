<?php

namespace App\Http\Controllers\SkillProvider\Auth;

use App\SkillProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Front\SkillProviderFrontRegisterFormRequest;

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
    protected $redirectTo = '/skill_provider/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('skill_provider.guest');
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
    protected function register(SkillProviderFrontRegisterFormRequest $request)
    {
        $SkillProvider = new SkillProvider();
        $SkillProvider->name = $request->input('name');
        $SkillProvider->email = $request->input('email');
        $SkillProvider->password = bcrypt($request->input('password'));
        $SkillProvider->is_active = 0;
        $SkillProvider->verified = 0;
        $SkillProvider->save();

        $this->guard()->login($SkillProvider);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('skill_provider');
    }

}
