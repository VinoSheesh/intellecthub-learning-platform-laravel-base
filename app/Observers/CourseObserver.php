<?php

namespace App\Observers;

use App\Models\Courses;
use App\Models\Enrollments;

class CourseObserver
{
    /**
     * Handle the Courses "updated" event.
     */
    public function updated(Courses $course): void
    {
        // Jika course berubah menjadi draft
        if ($course->isDirty('is_published') && !$course->is_published) {
            // otomatis detach relasi favorites dengan set is_favorite = false
            Enrollments::where('course_id', $course->id)
                ->where('is_favorite', true)
                ->update(['is_favorite' => false]);
        }
    }
}
