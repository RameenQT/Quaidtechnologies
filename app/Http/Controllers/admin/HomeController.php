<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
Use Auth;
use App\User;
USE Hash;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('home');
    }
	public function changePassword()
	{
		return view('auth.changepassword');
	}
	public function changePasswordstore($data)
	{
		$fullstring = $data; 
		$breakstring=   explode("qat",$fullstring);
		$old_password = $breakstring[0];
		$new_password = $breakstring[1];
		$conform_password = $breakstring[2];
		
		$userpassword = Auth::user()->password;
		$id = Auth::user()->id;
		if(\Hash::check($old_password, $userpassword))
		{
			
			$user = new User();
			$user = User::findOrFail(Auth::user()->id);
			$user->password = Hash::make($new_password);
            $user->save();
			$Response =  'Password Changed successfully';
		}
		else
		{
			$Response =  '<b>Old Password is incorrect!</b>';
		}
		
		return $Response;
	}
}
