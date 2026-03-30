<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Enrollments;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function download($courseId)
    {
        $user = Auth::user();
        $course = Courses::with('lessons')->findOrFail($courseId);

        $enrollment = Enrollments::where('user_id', $user->id)
            ->where('course_id', $courseId)
            ->firstOrFail();

        // Check if course is actually completed
        $completedCount = $user->lessonProgress()
            ->where('lesson_user.is_completed', true)
            ->where('lessons.course_id', $courseId)
            ->count();

        $totalLessons = $course->lessons->count();

        if ($totalLessons === 0 || $completedCount < $totalLessons) {
            abort(403, 'Course belum selesai.');
        }

        $completedAt = $enrollment->updated_at;

        $pdf = Pdf::loadView('pdf.certificate', [
            'user' => $user,
            'course' => $course,
            'completedAt' => $completedAt,
        ])->setPaper('a4', 'landscape');

        return $pdf->download("Sertifikat-{$course->title}.pdf");
    }
}
