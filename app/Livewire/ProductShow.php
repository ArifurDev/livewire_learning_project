<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components\layouts\backend')]
#[Title('Product show')]
class ProductShow extends Component
{
    public $productEditID;
    public $productEditSlug;

    public function mount($id,$slug)
    {
        $this->productEditID = $id;
        $this->productEditSlug = $slug;
    }

    public function render()
    {
        return view('livewire.product-show',[
            'product' => Product::findOrfail($this->productEditID)
        ]);
    }
}
