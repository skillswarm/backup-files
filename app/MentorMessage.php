<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorMessage extends Model
{
    protected $table = 'mentor_messages';

    public function user()
    {
        return $this->belongsTo('App\User', 'candidate_id', 'id');
    }

    public function mentor()
    {
        return $this->belongsTo('App\Mentor', 'mentor_id', 'id');
    }

    public function recommendation()
    {
        return $this->belongsTo('App\Recommendation', 'recommendation_id', 'id');
    }
}
