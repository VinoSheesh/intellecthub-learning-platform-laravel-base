<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lessons;

class LessonSort extends Component
{

    public $lessons;

    public function mount()
    {
        $this->lessons = Lessons::orderBy('order')->get();
    }

    public function updateLessonOrder($orders)
    {
        foreach ($orders as $order) {
            Lessons::where('id', $order['value'])->update(['order' => $order['order']]);
        }
    }
    public function render()
    {
        return view('livewire.lesson-sort');
    }
}
