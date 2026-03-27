<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'course_id',
        'order',
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function completedUsers()
    {
        return $this->belongsToMany(User::class, 'lesson_user', 'lesson_id', 'user_id')
                    ->withPivot('is_completed')
                    ->withTimestamps();
    }
}
