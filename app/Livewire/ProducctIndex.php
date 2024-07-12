<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Product List")]
class ProducctIndex extends Component
{
    public function render()
    {
        return view('livewire.backend.product.producct-index',[
            'products' => Product::latest()->get()
        ]);
    }
}
