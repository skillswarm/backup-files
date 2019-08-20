<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $table = 'user_timeline';

    public function getTaskTitle($task_id)
    {
        $task = Task::find($task_id);
        return $task->title;
    }

    public function getJobTitle($job_id)
    {
        $job = Job::find($job_id);
        return $job->title;
    }

}
