<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Like;
use App\Comment;
use App\Traits\Cron;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    use Cron;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->runCheckPackageValidity();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        $commentIds = Comment::where('user_id',Auth::user()->id)
                            ->where('guard','web')->get()->pluck('id');
        $count = Like::whereIn('comment_id', $commentIds)->get()->count();
        return view('home')
                      ->with('count', $count)
                      ->with('user', $user);
    }

}
