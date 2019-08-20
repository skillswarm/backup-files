<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Task;
use App\Job;
use App\TaskNotification;
use App\JobNotification;
use App\Recommendation;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function getNotifications(Request $request)
    {
          $taskNotification = TaskNotification::where('user_id', Auth::user()->id)
                                              ->where('is_seen',0)
                                              ->get()->pluck('task_id')->unique()->count();
          $recommendation = Recommendation :: where('candidate_id', Auth::user()->id)
                                              ->where('is_seen',0)->get()->count();
          return response()->json(['taskNotification' => $taskNotification,'recommendation'=>$recommendation]);
    }

    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        $taskIds = TaskNotification::where('user_id', Auth::user()->id)->get()->pluck('task_id')->unique();
          $tasks = Task::find($taskIds);
        return view('notifications.task_notifications')
                                  ->with('user', $user)
                                  ->with('tasks',$tasks);
    }

    public function taskDetails($id)
    {
        $task = Task::findOrFail($id);
        TaskNotification::where('user_id', Auth::user()->id)->update(['is_seen' => 1]);
        $replyCount = TaskNotification::where('task_id', '=', $task->id)
                                     ->whereNotNull('reply')
                                     ->get()->unique("user_id")->count();
        return view('task.detail')
                        ->with('task', $task)
                        ->with('replyCount', $replyCount);
    }
}
