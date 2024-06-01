<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components\layouts\backend')]
#[Title('Category List')]

class CategoryList extends Component
{
    use WithPagination;

    public $categories;
    public function mount()
    {
        $this->categories =Category::latest()->paginate(10);
    }

    // protected $paginationTheme = 'bootstrap'; // Optional: for pagination styling

    public function toggleStatus($categoryId)
    {
        $category = Category::find($categoryId);
        $category->status = !$category->status;
        $category->save();

        // Trigger a success notification
        return $this->dispatch('toast', message: 'Category status updated successfully.!', notify:'success' );
    }
    public function render()
    {

        // return view('livewire.backend.category.category-list',[
        //     'categories' => Category::latest()->paginate(10)
        // ]);
         return view('livewire.backend.category.category-list');
    }
}
