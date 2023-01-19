<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
  protected $redirectTo = RouteServiceProvider::HOME;

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
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  protected function register(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'username' => 'required|string|unique:users,username',
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    User::create([
      'name'          => $request['name'],
      'username'      => '@' . \Str::slug($request['username'], '_'),
      'email'         => $request['email'],
      'password'      => \Hash::make($request['password']),
      'avatar'        => null,
      'uuid'          => \Str::uuid(),
      'user_type_id'  => 2,
      'created_at'    => new \DateTime(),
      'updated_at'    => new \DateTime(),
    ]);

    return redirect('/login')
      ->with('success', 'Success Register Your Account.');
  }
}
