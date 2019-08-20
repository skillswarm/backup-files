<?php

namespace App\Traits;

use App\JobSkillManager;
use App\JobNotification;
use App\ProfileSkill;

trait Skills
{

    private function storeJobSkills($request, $job_id)
    {
        if ($request->has('skills')) {
            JobSkillManager::where('job_id', '=', $job_id)->delete();
            $skills = $request->input('skills');
            foreach ($skills as $job_skill_id) {
                $jobSkillManager = new JobSkillManager();
                $jobSkillManager->job_id = $job_id;
                $jobSkillManager->job_skill_id = $job_skill_id;
                $jobSkillManager->save();
            }
        }
    }

    private function storeJobSkillsNotifications($request, $job_id)
    {
        if ($request->has('skills')) {
            JobNotification::where('job_id', '=', $job_id)->delete();
            $skills = $request->input('skills');

            foreach ($skills as $job_skill_id) {
              $userIds = ProfileSkill::where('job_skill_id', $job_skill_id)->get()->pluck('user_id');
               foreach ($userIds as $user_id){
                 $jobNotification = new JobNotification();
                 $jobNotification->job_id = $job_id;
                 $jobNotification->skill_id = $job_skill_id;
                 $jobNotification->user_id = $user_id;
                 $jobNotification->save();
               }
            }
        }
    }

}
