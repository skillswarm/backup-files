<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class SkillProvider extends Authenticatable
{
    protected $table = 'skill_providers';
}
