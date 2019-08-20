<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskSkillManager extends Model
{
    protected $table = 'manage_task_skills';

    public function jobSkill()
    {
        return $this->belongsTo('App\JobSkill', 'skill_id', 'job_skill_id');
    }

    public function getJobSkill($field = '')
    {
        $jobSkill = $this->jobSkill()->lang()->first();
        if (null === $jobSkill) {
            $jobSkill = $this->jobSkill()->first();
        }
        if (null !== $jobSkill) {
            if (!empty($field)) {
                return $jobSkill->$field;
            } else {
                return $jobSkill;
            }
        }
    }
}
