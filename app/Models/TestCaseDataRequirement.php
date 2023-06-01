<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TestCaseDataRequirement extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    protected $fillable = [
        'test_case_step_id',
        'field_name',
        'old_value',
        'new_value',
        'user_id',
    ];

    protected $attributes = [
        'test_case_step_id' => NULL,
        'field_name' => NULL,
        'old_value' => NULL,
        'new_value' => NULL,
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

    public function test_case_step()
    {
        $model = $this->hasOne(TestCaseStep::class, 'id', 'test_case_step_id');
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
        }
    }
}
