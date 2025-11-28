<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses as CoursesModel;
use App\Models\Categories;

class Courses extends Component
{
    public $search = '';
    public $category = '';
    public $categories;

    public function mount()
    {
        $this->categories = Categories::all();
    }

    public function deleteCourse($courseId)
    {
        $course = CoursesModel::find($courseId);

        if ($course) {
            // Hapus file thumbnail jika ada
            if (file_exists(public_path($course->thumbnail))) {
                unlink(public_path($course->thumbnail));
            }

            $course->delete();
            
            // Dispatch event ke JavaScript untuk menampilkan alert
            $this->dispatch('courseDeleted');
            session()->flash('success', 'Kursus berhasil dihapus!');
        }
    }

    public function render()
    {
        $query = CoursesModel::with('category');

        if (!empty($this->category)) {
            $query->where('category_id', $this->category);
        }

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $courses = $query->get();

        return view('livewire.courses', compact('courses'))->layout('layouts.app');
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->category = '';
    }
}
