<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskReply extends Model
{
    protected $table = 'task_replies';
    protected $fillable = ['task_id', 'user_id', 'user_name','user_email','subject','reply'];

    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id', 'id');
    }
}
