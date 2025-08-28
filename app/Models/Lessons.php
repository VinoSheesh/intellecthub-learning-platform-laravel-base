<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'video_url',
        'course_id',
        'duration',
        'order',
    ];

    public function course ()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
}
