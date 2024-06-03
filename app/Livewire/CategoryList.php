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
        $category = Category::find($categoryId);
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
    }

    public function render()
    {

        return view('livewire.backend.category.category-list',[
            'categories' => Category::latest()->paginate(10)
        ]);
    }
}
