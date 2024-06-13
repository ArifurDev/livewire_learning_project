<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components\layouts\backend')]
#[Title('Add Product')]

class ProductCreate extends Component
{
    public function render()
    {
        return view('livewire.backend.product.product-create');
    }
}
