<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\AppUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordFormRequest;
USE Hash;
use Response;

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
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
	public function verify($token)
	{
		$check = \DB::table('app_users')->where('email_token',$token)->first();

        if(!is_null($check)){
            $user = AppUser::find($check->id);

            if($user->is_activated == 1){
                //return redirect()->to('verification')->with('warning',"Your account is already activate.");                
                return redirect()->to('verification')->with('warning',"Din konto er allerede aktiveret.");                
            }
			else
			{
				$user->is_activated = 1;
				$user->save();
                //return redirect()->to('verification')->with('success',"Your account has been successfully activated.");
                return redirect()->to('verification')->with('success',"Din konto er blevet aktiveret.");
			}

           
        }

        //return redirect()->to('verification')->with('warning',"your token is invalid.");
        return redirect()->to('verification')->with('warning',"Din token er ugyldigt.");
    }
	public function verified()
	{
		return view('auth.emailconfirm');
	}	
	public function resetPassword($token)
	{
		
		 $check = \DB::table('app_users')->where('forgot_password_token',$token)->first();
		if(!is_null($check)){
            $user = AppUser::find($check->id);

            if($user->forgot_token_expired == 1){
               // return redirect()->to('change-password')->with('warning',"Your token has been expired");                
                return redirect()->to('change-password')->with('warning',"Dit token er udløbet.");                
            }
			else
			{
				return view('auth.resetPassword',['token'=>$check->forgot_password_token]);
			}
		}
		//return redirect()->to('change-password')->with('warning',"Your token is invalid."); 
		return redirect()->to('change-password-done')->with('warning',"Din token er ugyldigt."); 
		
		
	}
	public function changepassword(ChangePasswordFormRequest $request)
	{
		$token = $request->forgot_password_token;
		$check = \DB::table('app_users')->where('forgot_password_token',$token)->first();
		$user = AppUser::find($check->id);
		$new_password = $request->password;
		$user->forgot_token_expired = 1;
		$user->password = Hash::make($new_password);
		$user->save();
		//return redirect()->to('change-password')->with('success',"Your password has been successfully changed.");
		return redirect()->to('change-password-done')->with('success',"Dit kodeord er blevet ændret.");
	}
	public function afterChangeDone()
	{
		return view('auth.resetpasswordconfermation');
	}
}
