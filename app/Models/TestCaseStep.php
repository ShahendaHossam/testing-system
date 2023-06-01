<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestCaseStep extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $fillable = [
        'test_case_id',
        'title',
        'description',
        'expected_result',
        'actual_result',
        'status_id',
        'designer_comment',
        'reviewer_comment',
        'executor_comment',
        'user_id',
    ];
    protected $attributes = [
        'test_case_id' => NULL,
        'title' => NULL,
        'description' => NULL,
        'expected_result' => NULL,
        'actual_result' => NULL,
        'status_id' => NULL,
        'designer_comment' => NULL,
        'reviewer_comment' => NULL,
        'executor_comment' => NULL,
        'user_id' => NULL,
    ];
    public function test_case()
    {
        $model = $this->hasOne(TestCase::class, 'id', 'test_case_id');
        if ($model) {
            return $model;
        } else {
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
    public function status()
    {
        $model = $this->hasOne(Status::class, 'id', 'status_id');
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }
    public function user()
    {
        $model = $this->hasOne(User::class, 'id', 'user_id');
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }
}
