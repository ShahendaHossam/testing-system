<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestCase extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $fillable = [
        'title',
        'module_name',
        'project_id',
        'description',
        'dependency_id',
        'priority_id',
        'status_id',
        'test_browser',
        'pre_condition',
        'post_condition',
        'designer_id',
        'designer_comment',
        'reviewer_id',
        'reviewer_comment',
        'reviewed_at',
        'executor_id',
        'executor_comment',
        'executed_at',
    ];


    public function designer(){
        $model = $this->hasOne(User::class, 'id', 'designer_id');
        if($model)
        {
            return $model;
        }
        else
        {
            return false;
        }
    }

    public function status(){
        $model = $this->hasOne(Status::class, 'id', 'status_id');
        if($model)
        {
            return $model;
        }
        else
        {
            return false;
        }
    }

    public function priority(){
        $model= $this->hasone(Priority::class, 'id', 'priority_id');
        if($model)
        {
            return $model;
        }
        else
        {
            return false;
        }
    }

    public function project(){
        $model= $this->hasone(Project::class, 'id', 'project_id');
        if($model)
        {
            return $model;
        }
        else
        {
            return false;
        }
    }

    public function dependency(){
        $model= $this->hasone(TestCase::class, 'id', 'dependency_id');
        if($model)
        {
            return $model;
        }
        else
        {
            return false;
        }
    }
    public function executor(){
        $model = $this->hasOne(User::class, 'id', 'executor_id');
        if($model)
        {
            return $model;
        }
        else
        {
            return false;
        }
    }
    public function reviewer(){
        $model = $this->hasOne(User::class, 'id', 'reviewer_id');
        if($model)
        {
            return $model;
        }
        else
        {
            return false;
        }
    }
    public function test_data()
    {
        $model = $this->hasMany(TestCaseDataRequirement::class, 'test_case_step_id', 'id');
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }
}
