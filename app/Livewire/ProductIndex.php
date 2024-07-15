<?php

namespace App\Livewire;


use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Product List")]
#[Layout('components\layouts\backend')]
class ProductIndex extends Component
{
    public function render()
    {
        return view('livewire.backend.product.product-index');
    }
}
