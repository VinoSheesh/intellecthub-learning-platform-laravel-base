<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollments extends Model
{
    protected $fillable = ['user_id', 'course_id', 'status', 'last_lesson_id', 'is_favorite'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function lastLesson()
    {
        return $this->belongsTo(Lessons::class, 'last_lesson_id');
    }
}
