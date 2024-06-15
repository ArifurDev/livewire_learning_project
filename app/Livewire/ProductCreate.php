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

    public $tags = [];
    public $productTag = '';

    //add multpal tags
    public function addTag($productTag)
    {
        if (!in_array($this->tags,$productTag)) {
            $this->tags[] = $productTag;
        }
        $this->reset($productTag);
    }

    //remove tag
    public function removeTag($tag)
    {
        $this->tags = array_filter($this->tags, function($t) use ($tag) {
            return $t !== $tag;
        });
    }

    public function render()
    {
        return view('livewire.backend.product.product-create',[
            'attributes' => Attribute::latest()->get(),
            'categories' => Category::where('status','1')->latest()->get(),
        ]);
    }
}
