<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
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
    $this->middleware('guest')->except('logout');
  }

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function login(Request $request)
  {
    $credentials =  $request->validate([
      'email' => 'required|string|email',
      'password' => 'required|string'
    ]);

    $user = User::where('email', $request->email)->first();
    $remember = $request->remember;

    if (\Auth::attempt($credentials, $remember)) {
      if ($user->hasRole('admin')) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
      }

      if ($user->hasRole('author')) {
        $request->session()->regenerate();
        return redirect()->intended('/');
      }

      return redirect()->back()->with('error', 'Sorry your login was not successful');
    }

    return redirect()->back()->with('error', 'Password / Email Wrong.');
  }
}
