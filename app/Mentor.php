<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Authenticatable
{
      protected $table = 'mentors';

      protected $fillable = [
          'first_name','middle_name','last_name','email', 'password',
      ];

      protected $hidden = [
          'password', 'remember_token',
      ];

      public function skills()
      {
          return $this->hasMany('App\MentorSkill', 'mentor_id', 'id');
      }

      public function getSkillsArray()
      {
          return $this->skills->pluck('skill_id')->toArray();
      }
}
