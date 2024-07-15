<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
class ProductsTable extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $search   = '';

    #[Url(history:true)]
    public $sortBy = 'created_at';

    #[Url(history:true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage  = '10';


    public function updatedSearch(){
        $this->resetPage();
    }

    public function setSortBy($sortByField)
    {
        if($this->sortBy === $sortByField){
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';   
    }
    public function render()
    {
        $products = Product::search($this->search)->orderBy($this->sortBy,$this->sortDir)
        ->latest()->paginate($this->perPage);
        return view('livewire..backend.product.products-table',[
            'products' => $products,
        ]);
    }
}
