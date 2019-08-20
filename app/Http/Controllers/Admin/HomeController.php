<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Company;
use App\Job;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now();
        $totalActiveUsers = User::where('is_active', 1)->count();
        $totalVerifiedUsers = User::where('verified', 1)->count();
        $totalActiveEmployers = Company::where('is_active', 1)->count();
        $totalVerifiedEmployers = Company::where('verified', 1)->count();
        $totalActiveJobs = Job::where('is_active', 1)->count();
        $newJobs = Job::where('is_seen', 0)->count();
        $recentUsers = User::orderBy('id', 'DESC')->take(25)->get();
        $recentJobs = Job::orderBy('id', 'DESC')->take(25)->get();

        $totalTodaysUsers = User::where('created_at', 'like', $today->toDateString() . '%')->count();
        $totalFeaturedJobs = Job::where('is_featured', 1)->count();
        $totalTodaysJobs = Job::where('created_at', 'like', $today->toDateString() . '%')->count();

        return view('admin.home')
                        ->with('totalActiveUsers', $totalActiveUsers)
                        ->with('totalVerifiedUsers', $totalVerifiedUsers)
                        ->with('totalActiveEmployers', $totalActiveEmployers)
                        ->with('totalVerifiedEmployers', $totalVerifiedEmployers)
                        ->with('totalActiveJobs', $totalActiveJobs)
                        ->with('newJobs', $newJobs)
                        ->with('recentUsers', $recentUsers)
                        ->with('recentJobs', $recentJobs)
                        ->with('totalFeaturedJobs', $totalFeaturedJobs)
                        ->with('totalTodaysJobs', $totalTodaysJobs);

    }

    public function getNewUser()
    {
      $newUsers = User::where('is_seen', 0)->count();
      $newEmployers = Company::where('is_seen', 0)->count();
      $newJobs = Job::where('is_seen', 0)->count();
      return response()->json(['newUsers'=>$newUsers,'newEmployers'=>$newEmployers,'newJobs'=>$newJobs]);
    }

}
