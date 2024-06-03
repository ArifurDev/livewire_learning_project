<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

#[Layout('components\layouts\backend')]
#[Title('Category List')]

class CategoryList extends Component
{
    use WithPagination;
    public $search = '';

    // public function toggleStatus($categoryId)
    // {
    //     $category = Category::find($categoryId);
    //     $category->status = !$category->status;
    //     $category->save();

    //     // Trigger a success notification
    //     return $this->dispatch('toast', message: 'Category status updated successfully.!', notify:'success' );
    // }
    public function delete($categoryId)
    {
        try {
            $category = Category::findOrFail($categoryId);
            /**
             * first check image exists in images foldar
             * delete image in images foldar
             */
            if ( Storage::disk('public')->exists('images/' . $category->image )) {
                // Delete old image in the images folder
                if ($category->image) {
                    Storage::disk('public')->delete('images/' . $category->image);
                }
            }
            /**
             * first check banner exists in banner foldar
             * delete banner in banner foldar
             */
            if ( Storage::disk('public')->exists('banner/' . $category->banner )) {
                // Delete old image in the images folder
                if ($category->banner) {
                    Storage::disk('public')->delete('banner/' . $category->banner);
                }
            }
            //delete category
            $category->delete();
            return $this->dispatch('toast', message: 'Category Delete successfully.!', notify:'success' );
         } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Category not found!', notify:'error');
         }
    }

    public function render()
    {
        $query = Category::query();

        if ($this->search) {
            $query->whereAny(['name','status', ],'LIKE',"%$this->search%")->get();
        }

        $categories = $query->latest()->paginate(10);

        return view('livewire.backend.category.category-list',[
            'categories' => $categories,
        ]);
    }
}
