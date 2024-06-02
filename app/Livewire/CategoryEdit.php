<?php

namespace App\Livewire;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('components\layouts\backend')]
#[Title('Category Edit')]
class CategoryEdit extends Component
{
    use WithFileUploads;
    public $categoryId;

    public $name;
    public $image;
    public $banner;

    //validation rules hear
    protected $rules = [
        'name' => 'required|unique:categories,name',
        'image' => 'required|image|max:2048',
        'banner' => 'required|image|max:2048',
    ];

    public function mount($id)
    {
        $this->categoryId = $id;
    }

    public function update()
    {
        $this->validate();
        
        $category = Category::find($this->categoryId);

        $category->name = $this->name;

        //image
        if ($this->image && Storage::disk('public')->exists('images/' . $category->image)) {
            // Delete old image in the images folder
            if ($category->image) {
                Storage::disk('public')->delete('images/' . $category->image);
            }
             //image file upload
            $imageFileName = Str::random(10).'.'.time().'.'.$this->image->extension();
            $this->image->storeAs('images',$imageFileName,'public'); // Store the image

            //set
            $category->image = $imageFileName;
        }

        //banner
        if ($this->banner && Storage::disk('public')->exists('banner/' . $category->banner)) {
            // Delete old image in the images folder
            if ($category->banner) {
                Storage::disk('public')->delete('banner/' . $category->banner);
            }
             //image file upload
             $bannerFileName = Str::random(10).'.'.time().'.'.$this->banner->extension();
             $this->banner->storeAs('banner',$bannerFileName,'public'); // Store the banner

             //set
             $category->banner = $bannerFileName;
        }

        //save data
        $category->save();

        // Trigger a success notification
        return $this->dispatch('toast', message: 'Category Update successfully!', notify:'success' );
    }
    public function render()
    {
        return view('livewire.backend.category.category-edit',[
            'category' => Category::find($this->categoryId)
        ]);
    }
}
