<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search   = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage  = '10';

    public $editStatus;
    public $editID;

    public function edit($id)
    {
        $this->editID = $id;
        $this->editStatus = Product::findOrFail($id)->status;
    }
    public function updatedEditStatus()
    {
        try {
            $productStatus = Product::findOrFail($this->editID);
            $productStatus->status = $this->editStatus;
            $productStatus->save();

            //after update product status reset fild
             $this->reset(['editID', 'editStatus']);
            
            return $this->dispatch('toast', message: 'Product Status Update successfully.!', notify: 'success');
        } catch (\Throwable $th) {
            //throw $e;
            return $this->dispatch('toast', message: 'Product not found!', notify: 'error');
        }
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    //delete produt
    public function delete($productId)
    {
        try {
            $product = Product::findOrFail($productId);

            //delete category
            $product->delete();
            return $this->dispatch('toast', message: 'Product Delete successfully.!', notify: 'success');
        } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Product not found!', notify: 'error');
        }
    }

    public function render()
    {
        $products = Product::search($this->search)->orderBy($this->sortBy, $this->sortDir)
            ->latest()->paginate($this->perPage);
        return view('livewire.backend.product.products-table', [
            'products' => $products,
        ]);
    }
}
