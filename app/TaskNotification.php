<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskNotification extends Model
{
    protected $table = 'notification_task';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
