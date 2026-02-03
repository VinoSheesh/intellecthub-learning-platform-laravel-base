<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Lessons;
use Livewire\WithPagination;

class ManageCourses extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = ['search'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function deleteCourse($courseId)
    {
        $course = Courses::find($courseId);
        
        if ($course) {
            // Delete related lessons first
            $course->lessons()->delete();
            
            $course->delete();
            session()->flash('success', 'Kursus berhasil dihapus!');
        }
    }

    public function render()
    {
        $courses = Courses::with('category')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.manage-courses', [
            'courses' => $courses
        ])->layout('layouts.app');
    }
}
