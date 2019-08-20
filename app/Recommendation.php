<?php

namespace App;
use App\Traits\CountryStateCity;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use CountryStateCity;

    public function course()
    {
        return $this->hasOne('App\Course', 'id', 'course_id');
    }

    public function mentor()
    {
        return $this->hasOne('App\Mentor', 'id', 'mentor_id');
    }

    public function reply()
    {
      return $this->hasOne('App\MentorMessage','recommendation_id','id');
    }
}
