<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categories;
use Livewire\WithPagination;

class ManageCategories extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    
    public $categoryId;
    public $name;
    
    public $isModalOpen = false;

    protected $queryString = ['search'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'name' => 'required|min:3|max:30|unique:categories,name',
    ];

    public function create()
    {
        $this->resetFields();
        $this->isModalOpen = true;
    }

    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        
        // Update rules to ignore unique check for the current category
        $this->rules['name'] = 'required|min:3|unique:categories,name,' . $this->categoryId;
        
        $this->isModalOpen = true;
    }

    public function save()
    {
        // Ignore unique check for updates
        $rules = [
            'name' => 'required|min:3|max:30|unique:categories,name' . ($this->categoryId ? ',' . $this->categoryId : ''),
        ];
        $this->validate($rules);

        Categories::updateOrCreate(
            ['id' => $this->categoryId],
            ['name' => $this->name]
        );

        $action = $this->categoryId ? 'diperbarui' : 'ditambahkan';
        $this->dispatch('swal:success', [
            'title' => 'Berhasil!', 
            'text' => "Kategori berhasil $action."
        ]);

        $this->closeModal();
    }

    public function deleteCategory($id)
    {
        $category = Categories::find($id);
        if ($category) {
            $category->delete();
            $this->dispatch('swal:success', [
                'title' => 'Berhasil!', 
                'text' => 'Kategori berhasil dihapus.'
            ]);
        }
    }

    public function closeModal()
    {
        $this->resetFields();
        $this->isModalOpen = false;
        $this->resetValidation();
    }

    private function resetFields()
    {
        $this->categoryId = null;
        $this->name = '';
    }

    public function render()
    {
        $categories = Categories::when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'asc')
            ->paginate($this->perPage);

        return view('livewire.manage-categories', [
            'categories' => $categories
        ])->layout('layouts.app');
    }
}
