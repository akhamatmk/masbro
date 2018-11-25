<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;
use App\Models\CategoryJobs;
use Session;

class HomeController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	public function index()
	{
		$types = ["Silahkan Pilih", "Freelance", "Full Time", "Internship", "Part Time", "Temporary", "Internship", "Part Time", "Temporary", "Freelance", "Full Time"];

		$jobs = JobPosting::get();
		$category = CategoryJobs::get();

		return view('welcome')
		->with('jobs', $jobs)
		->with('categorys', $category)
		->with('type', $types);
	}
}