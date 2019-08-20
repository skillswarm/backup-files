<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Timeline;
use App\Task;
use App\TaskReply;
use App\ProfileSkill;
use App\TaskSkillManager;
use App\TaskNotification;
use App\Helpers\DataArrayHelper;
use App\Http\Requests\Front\TaskFrontFormRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('company', ['except' => ['saveReply']]);
    }

    public function index()
    {
          $company = Auth::guard('company')->user();
          if ((bool)$company->is_active === false) {
               flash(__('Your account is inactive contact site admin to activate it'))->error();
               return \Redirect::route('company.home');
               exit;
           }
          $taskSkills = DataArrayHelper::langJobSkillsArray();
          $taskSkillIds = array();
          return view('task.add_task')
                  ->with('taskSkills', $taskSkills)
                  ->with('taskSkillIds', $taskSkillIds);
    }

   public function createTask(TaskFrontFormRequest $request)
   {
          $company = Auth::guard('company')->user();
          $task = new Task();
          $task->company_id = $company->id;
          $task->title = $request->title;
          $task->description = $request->description;
          $task->save();

          $this->storeTaskSkills($request, $task->id);
          $this->storeTaskSkillsNotifications($request, $task->id);
          // event(new JobPosted($job));
          flash('Task has been added!')->success();
          return \Redirect::route('task.editTask', array($task->id));
   }

     public function editTask($task_id)
     {
           $taskSkills = DataArrayHelper::langJobSkillsArray();

           $task = Task::findOrFail($task_id);
           $taskSkillIds = $task->getTaskSkillsArray();

           return view('task.add_task')
                   ->with('taskSkills', $taskSkills)
                   ->with('taskSkillIds', $taskSkillIds)
                   ->with('task', $task);
     }

     public function updateTask(TaskFrontFormRequest $request, $id)
     {
            $task = Task::findOrFail($id);
            $company = Auth::guard('company')->user();
            $task->company_id = $company->id;
            $task->title = $request->title;
            $task->description = $request->description;
            $task->save();

            $this->storeTaskSkills($request, $task->id);
            $this->storeTaskSkillsNotifications($request, $task->id);

            flash('Job has been updated!')->success();
            return \Redirect::route('task.editTask', array($task->id));
     }

     private function storeTaskSkills($request, $task_id)
     {
         if ($request->has('skills')) {
             TaskSkillManager::where('task_id', '=', $task_id)->delete();
             $skills = $request->input('skills');
             foreach ($skills as $task_skill_id) {
                 $taskSkillManager = new TaskSkillManager();
                 $taskSkillManager->task_id = $task_id;
                 $taskSkillManager->skill_id = $task_skill_id;
                 $taskSkillManager->save();
             }
         }
     }

     private function storeTaskSkillsNotifications($request, $task_id)
     {
         if ($request->has('skills')) {
             TaskNotification::where('task_id', '=', $task_id)->delete();
             $skills = $request->input('skills');

             foreach ($skills as $task_skill_id) {
               $userIds = ProfileSkill::where('job_skill_id', $task_skill_id)->get()->pluck('user_id');
                foreach ($userIds as $user_id){
                  $taskNotification = new TaskNotification();
                  $taskNotification->task_id = $task_id;
                  $taskNotification->skill_id = $task_skill_id;
                  $taskNotification->user_id = $user_id;
                  $taskNotification->save();
                }
             }
         }
     }

     public function postedTasks(Request $request)
     {
         $tasks = Auth::guard('company')->user()->tasks()->paginate(10);
         return view('task.company_posted_tasks')
                         ->with('tasks', $tasks);
     }

     public function taskDetails($id)
     {
         $task = Task::findOrFail($id);
         $replyCount = TaskReply::where('task_id', '=', $task->id)
                                      ->whereNotNull('reply')
                                      ->get()->unique("user_id")->count();
         return view('task.detail')
                         ->with('task', $task)
                         ->with('replyCount', $replyCount);
     }

     public function deleteTask(Request $request)
     {
         $id = $request->input('id');
         try {
             $task = Task::findOrFail($id);
             TaskSkillManager::where('task_id', '=', $id)->delete();
             TaskNotification::where('task_id', '=', $id)->delete();
             $task->delete();
             return 'ok';
         } catch (ModelNotFoundException $e) {
             return 'notok';
         }
     }

     public function viewReply($task_id)
     {
         $task = Task::findOrFail($task_id);
         $replies = TaskReply::where('task_id', '=', $task_id)->get();

         return view('task.task_replies')
                       ->with('task', $task)
                       ->with('replies', $replies);
     }

     public function replyDetails($reply_id)
     {
         $reply = TaskReply::findOrFail($reply_id);
         //$replies = TaskReply::where('task_id', '=', $task_id)->get();
         return view('task.reply_detail')
                       ->with('reply', $reply);
     }

     public function saveReply(Request $request)
     {
         $msgresponse = Array();
         $rules = array(
             'from_name' => 'required|max:100|between:4,70',
             'from_email' => 'required|email|max:100',
             'subject' => 'required|max:200',
             'message' => 'required',
         );
         $rules_messages = array(
             'from_name.required' => __('Name is required'),
             'from_email.required' => __('E-mail address is required'),
             'from_email.email' => __('Valid e-mail address is required'),
             'subject.required' => __('Subject is required'),
             'message.required' => __('Message is required'),
         );
         $validation = Validator::make($request->all(), $rules, $rules_messages);
         if ($validation->fails()) {
             $msgresponse = $validation->messages()->toJson();
             echo $msgresponse;
             exit;
         } else {
             $data['task_id'] = $request->input('task_id');
             $data['user_id'] = $request->input('user_id');
             $data['user_name'] = $request->input('user_name');
             $data['user_email'] = $request->input('from_email');
             $data['subject'] = $request->input('subject');
             $data['reply'] = $request->input('message');

             $msg_save = TaskReply::create($data);

                /*  Activity Log */
                $log = new Timeline();
                $log->user_id = $data['user_id'];
                $log->activity_type = 'SUBMITTED TASK';
                $log->comment = 'Task is submitted successfully.';
                $log->task_id = $data['task_id'];
                $log->save();

             $msgresponse = ['success' => 'success', 'message' => __('Message sent successfully')];
             echo json_encode($msgresponse);
             exit;
         }
     }

}
