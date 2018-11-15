<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

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
   protected $redirectTo = '/home';

   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('guest')->except('logout');
   }

   public function index()
   {
      return view('login');
   }

   public function check_login (Request $request)
   {
       $validatedData = $request->validate([
         'email' => 'required|max:255',
         'password' => 'required',
        ]);


       $userdata = array(
               'email' => $request->email ,
               'password' => $request->password
            );
 
      // attempt to do the login

      if (Auth::attempt($userdata))
         {

            return redirect('home');

         }
        else
         {

            Session::flash('message', 'Wrong email or password'); 
            return redirect('login');
         }
   }
}
