<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\EducationUser;
use Session;

class EducationController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Education Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function create()
	{
		return view('user/create_education')->with('menu', 'profile')->with('user', Auth::user());
	}

	public function store(Request $request)
	{
		$educationUser = new EducationUser;
		$educationUser->user_id = Auth::user()->id;
		$educationUser->school = $request->school;
		$educationUser->degree = $request->degree;
		$educationUser->field_of_study = $request->field_of_study;
		$educationUser->until = $request->until;
		$educationUser->from = $request->from;
		$educationUser->save();
		
		Session::flash('message-succes', 'Succes Save Data'); 
        return redirect('education/create');
	}
}
