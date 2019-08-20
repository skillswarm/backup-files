<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id', 'id');
    }

    public function getCompany($field = '')
    {
        if (null !== $company = $this->company()->first()) {
            if (!empty($field)) {
                return $company->$field;
            } else {
                return $company;
            }
        }
    }

    public function taskSkills()
    {
        return $this->hasMany('App\TaskSkillManager', 'task_id', 'id');
    }

    public function getTaskSkillsArray()
    {
        return $this->taskSkills->pluck('skill_id')->toArray();
    }

    public function getTaskSkillsList()
    {
        $str = '';
        if ($this->taskSkills->count()) {
            $taskSkills = $this->taskSkills;
            foreach ($taskSkills as $jobSkillManager) {
                $skill = $jobSkillManager->getJobSkill();
                $str .= '<li><a>' . $skill->job_skill . '</a></li>';
            }
        }
        return $str;
    }

    public function nofitications()
    {
        return $this->hasOne('App\TaskNotification', 'task_id', 'id');
    }
}
