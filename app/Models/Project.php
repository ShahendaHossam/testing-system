<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    protected $fillable = [
        'title',
        'description',
        'user_id',

    ];

    public function user()
    {
        $model = $this->hasOne(User::class, 'id', 'user_id');
        if ($model) {
            return $model;
        } else {
        }
    }
}
