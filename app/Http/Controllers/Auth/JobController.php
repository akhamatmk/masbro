<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryJobs;
use App\Models\Province;
use App\Models\JobPosting;
use Auth;
use Session;

class JobController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Job Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function create()
	{
		$types = ["Silahkan Pilih", "Freelance", "Full Time", "Internship", "Part Time", "Temporary", "Internship", "Part Time", "Temporary", "Freelance", "Full Time"];
		$province = Province::get();
		$categories = CategoryJobs::get();
		return view('user/create_job')
		->with('provinces', $province)
		->with('types', $types)
		->with('categories', $categories);
	}

	public function store(Request $request)
	{
		$user = Auth::user();

		$jobPosting = new JobPosting;
		$jobPosting->title = $request->title;
		$jobPosting->user_id = $user->id;
		$jobPosting->category_job_id = $request->category_job_id;
		$jobPosting->type_jobs = $request->type_jobs;
		$jobPosting->job_description = $request->job_description;
		$jobPosting->how_to_apply = $request->how_to_apply;
		$jobPosting->job_requirements = $request->job_requirements;
		$jobPosting->sallary = $request->sallary;
		$jobPosting->type_payment = $request->type_payment;
		$jobPosting->experience = $request->experience;
		$jobPosting->deadline_jobs = $request->deadline_jobs;
		$jobPosting->provincy_id = $request->province_id;
		$jobPosting->regency_id = $request->regency_id;
		$jobPosting->detail_address = $request->addreess;
		$jobPosting->save();
	
		Session::flash('message-succes', 'Succes Save Data'); 
        return redirect('job/create');
	}

	public function list_job_all()
	{
		$jobs = JobPosting::get();
		$types = ["Silahkan Pilih", "Freelance", "Full Time", "Internship", "Part Time", "Temporary", "Internship", "Part Time", "Temporary", "Freelance", "Full Time"];

		return view('user/list_job_all')
		->with('type', $types)
		->with('jobs', $jobs);
	}

	public function detail_job($id)
	{
		$job = JobPosting::find($id);

		return view('user/detail_job')
		->with('job', $job);
	}
}
