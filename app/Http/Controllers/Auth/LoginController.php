<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\UserSocialApp;
use Auth;
use Session;
use Socialite;
use Image;

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
       
      if (! Auth::attempt($userdata))
      {
         Session::flash('message', 'Wrong email or password');
         return redirect('login');
      }

      return redirect('home');
   }

   public function redirectToProvider($provider, Request $request)
    {
         // $url = url('/');
         // $urlFull = url()->full();
         // //$temp = str_replace($url, replace, subject)
         // dd(Request::url());

        try {
            $forAuth = $request->input('authFor') ? $request->input('authFor') : null;
            if(isset($forAuth))        
               $request->session()->put('state_form', 'register');
            else
               $request->session()->put('state_form', 'login');
                
            return Socialite::driver($provider)->redirect();    
        } catch (Exception $e) {
            dd($e);
        }
        
    }

    public function handleProviderCallback($provider, Request $request)
    {        
        try {
            $authFor = $request->session()->get('state_form');
            //$request->merge(["key"=>"value"]);

            //$x = pathinfo($url);

            dd($_SERVER['REQUEST_URI']);


            $dataProvider = Socialite::driver($provider)->stateless()->user();

            $request->session()->forget('state_form');
            if($authFor == 'register')
            {
               $user = User::where('email', $dataProvider->email)->first();
               if($user)
               {
                  Session::flash('message', 'Email Sudah Terdaftar'); 
                  return redirect('register');
               }

               $name = explode(" ", $dataProvider->name);
               $maxName = count($name);
               $path = $dataProvider->avatar_original;
               $filename = date("Ymdhis").rand(0, 1000).basename($path);
               Image::make($path)->save(public_path('images/profile-picture-user/' . $filename));

               $user = new User;
               $user->email = $dataProvider->email;
               $user->first_name = $name[0];
               $user->last_name = $name[$maxName-1];
               $user->name = $dataProvider->name;
               $user->profile_image = $filename;
               $user->password = 'admin123';
               $user->save();

               $social = new UserSocialApp;
               $social->user_id = $user->id;
               $social->provider = $provider;
               $social->provider_id = $dataProvider->id;
               $social->save();

               Auth::loginUsingId($user->id);
               return redirect('user/new/password');
            } else {

               $social = UserSocialApp::where('provider_id', $dataProvider->id)->first();
               if(! $social){
                  Session::flash('message', 'Social link tidak ditemukan'); 
                  return redirect('login');
               }

               $user = User::find($social->user_id);
               if(! $user){
                  Session::flash('message', 'User Tidak ditemukan'); 
                  return redirect('login');
               }

               Auth::loginUsingId($user->id);
               return redirect('home');
            }            
        } catch (Exception $e) {
            dd($e);
        } 
    }
}
