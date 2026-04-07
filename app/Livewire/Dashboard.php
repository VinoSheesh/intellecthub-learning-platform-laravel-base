<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Courses;
use App\Models\Enrollments;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Dashboard extends Component
{
    public $user;
    public $role;
    public $subscription;
    
    // Statistik
    public $totalEnrolled = 0;
    public $averageProgress = 0;
    public $completedModules = 0;
    public $completedCourses = 0;
    
    // Subscription
    public $subscriptionDaysLeft = 0;
    public $subscriptionExpiringSoon = false;
    
    // Course List
    public $recentCourses = [];

    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->user = Auth::user();
        if (!$this->user) return;
        
        $this->role = $this->user->roles()->first()->name ?? 'Student';
        
        // Cek Subscription aktif
        $this->subscription = Subscription::where('user_id', $this->user->id)
            ->where('ends_at', '>', now())
            ->orderByDesc('ends_at')
            ->first();

        // Hitung sisa hari langganan (dibulatkan integer)
        if ($this->subscription) {
            $this->subscriptionDaysLeft = (int) Carbon::now()->diffInDays(Carbon::parse($this->subscription->ends_at), false);
            $this->subscriptionExpiringSoon = $this->subscriptionDaysLeft < 3;
        }

        // 1. Total Enrolled
        $enrollments = Enrollments::with(['course.lessons'])->where('user_id', $this->user->id)->get();
        $this->totalEnrolled = $enrollments->count();

        // 2. Completed Modules (Hitung dari lesson_user)
        $completedLessonIds = DB::table('lesson_user')
            ->where('user_id', $this->user->id)
            ->where('is_completed', true)
            ->pluck('lesson_id')
            ->toArray();
        $this->completedModules = count($completedLessonIds);

        // 3. Process Courses Progress & Data
        $totalProgressPercentage = 0;
        $courseData = [];
        $completedCount = 0;

        foreach ($enrollments as $enrollment) {
            $course = $enrollment->course;
            if (!$course) continue;

            $totalLessons = $course->lessons->count();
            
            // Hitung modul selesai untuk kursus ini
            $completedCourseLessons = 0;
            foreach ($course->lessons as $lesson) {
                if (in_array($lesson->id, $completedLessonIds)) {
                    $completedCourseLessons++;
                }
            }

            // Persentase Progress Kursus ini
            $progress = $totalLessons > 0 ? round(($completedCourseLessons / $totalLessons) * 100) : 0;
            $totalProgressPercentage += $progress;

            // Hitung kursus yang selesai 100%
            if ($progress >= 100) {
                $completedCount++;
            }

            // Generate Inisial Judul (Contoh: "JavaScript Mastery" jadi "JM")
            $words = explode(' ', $course->title);
            $initials = '';
            foreach ($words as $w) {
                if (mb_strlen($w) > 0) {
                    $initials .= mb_strtoupper(mb_substr($w, 0, 1));
                }
            }
            $initials = mb_substr($initials, 0, 2);

            // Tentukan Status Badges
            $statusLabel = 'Belum Dimulai';
            $statusColor = 'yellow';
            if ($progress >= 100) {
                $statusLabel = 'Completed';
                $statusColor = 'green';
            } elseif ($progress > 0) {
                $statusLabel = 'In Progress';
                $statusColor = 'blue';
            }

            $courseData[] = [
                'id' => $course->id,
                'title' => $course->title,
                'initials' => $initials,
                'progress' => $progress,
                'statusLabel' => $statusLabel,
                'statusColor' => $statusColor,
                'updated_at' => $enrollment->updated_at,
            ];
        }

        // Hitung rata-rata persentase penyelesaian
        $this->averageProgress = $this->totalEnrolled > 0 ? round($totalProgressPercentage / $this->totalEnrolled) : 0;

        // 4. Completed Courses (progress 100%)
        $this->completedCourses = $completedCount;

        // Sorting by Updated (Most Recent First)
        usort($courseData, function($a, $b) {
            return $b['updated_at'] <=> $a['updated_at'];
        });

        // 5. Get 3 Recent Courses
        $this->recentCourses = array_slice($courseData, 0, 3);
    }

    public function render()
    {
        if(session('subscription_updated')) {
            $this->refreshData();
            session()->forget('subscription_updated');
        }
        
        return view('livewire.dashboard')->layout('layouts.app');
    }
}
