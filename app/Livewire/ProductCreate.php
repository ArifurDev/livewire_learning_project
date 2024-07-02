<?php

namespace App\Livewire;

use App\Models\Attribute;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components\layouts\backend')]
#[Title('Add Product')]

class ProductCreate extends Component
{
    public function render()
    {
        return view('livewire.backend.product.product-create',[
            'attributes' => Attribute::latest()->get(),
            'categories' => Category::where('status','1')->latest()->get(),
        ]);
    }
}
