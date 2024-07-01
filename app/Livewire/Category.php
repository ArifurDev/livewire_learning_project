<?php

namespace App\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('components\layouts\backend')]
#[Title('Category')]

class Category extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $banner;

    protected $rules = [
        'name' => 'required|unique:categories',
        'image' => 'required|image|max:2048',
        'banner' => 'required|image|max:2048',
    ];

    public function submitForm()
    {
        $this->validate();

        //image file upload
        $imageFileName = Str::random(10).'.'.time().'.'.$this->image->extension();
        $this->image->storeAs('images',$imageFileName,'public'); // Store the image

        //banner file upload
        $bannerFileName = Str::random(10).'.'.time().'.'.$this->image->extension();
        $this->banner->storeAs('banner',$bannerFileName,'public'); // Store the banner

        ModelsCategory::create([
            'name' => $this->name,
            'image' => $imageFileName,
            'banner' => $bannerFileName,
        ]);

        //reset input fild
        $this->reset(['name','image','banner']);

        // Trigger a success notification
        return $this->dispatch('toast', message: 'Category created successfully!', notify:'success' );
    }
    public function render()
    {
        return view('livewire.backend.category.category');
    }
}
