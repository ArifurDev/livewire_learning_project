<?php

namespace App\Livewire;

<<<<<<< HEAD
=======
use App\Models\Attribute;
>>>>>>> ac446c1a869bd18a0010bff172e5c13b26c9f6be
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
<<<<<<< HEAD
use App\Models\Attribute;
=======
>>>>>>> ac446c1a869bd18a0010bff172e5c13b26c9f6be

#[Layout('components\layouts\backend')]
#[Title('Add Product')]

class ProductCreate extends Component
{
<<<<<<< HEAD
=======

>>>>>>> ac446c1a869bd18a0010bff172e5c13b26c9f6be
    public function render()
    {
        return view('livewire.backend.product.product-create',[
            'attributes' => Attribute::latest()->get(),
            'categories' => Category::where('status','1')->latest()->get(),
        ]);
    }
}
