<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Skill;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->slug = str_slug($data['name']);
        $user->save();
        $skill = new Skill;
        if (isset($data['html'])) {
          $skill->html = $data['html'];
        }
        if (isset($data['css'])) {
          $skill->css = $data['css'];
        }
        if (isset($data['php'])) {
          $skill->php = $data['php'];
        }
        if (isset($data['laravel'])) {
          $skill->laravel = $data['laravel'];
        }
        if (isset($data['javascript'])) {
          $skill->javascript = $data['javascript'];
        }
        if (isset($data['bootstrap'])) {
          $skill->bootstrap = $data['bootstrap'];
        }
        if (isset($data['vuejs'])) {
          $skill->vuejs = $data['vuejs'];
        }
        $skill->user_id = $user->id;
        $skill->save();
        return $user;
    }
}
