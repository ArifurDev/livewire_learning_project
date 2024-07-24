<?php

namespace App\Livewire;

use App\Models\ProductStock;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Layout('components\layouts\backend')]
#[Title('Store Management')]
class StoreManagement extends Component
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


    public $editId = null;
    public $stock = '';

    protected $rules = [
        'stock' => 'required|numeric|min:0',
    ];

    public function edit($id)
    {
        try {
            $this->editId = $id;
            $this->stock = ProductStock::findOrFail($id)->stock;
        } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'product stock not found', notify: 'error');
        }
    }

    public function update()
    {
        $productStock = ProductStock::findOrFail($this->editId);
        $productStock->stock = $this->stock;
        $productStock->save();

        // Reset edit properties
        $this->reset(['editId', 'stock']);
        return $this->dispatch('toast', message: 'Stock Update successfully!', notify: 'success');
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

    public function render()
    {
        $productStock =  ProductStock::orderBy($this->sortBy, $this->sortDir)
            ->latest()->paginate($this->perPage);
        return view('livewire.backend.stock.store-management', [
            'productStocks' => $productStock,
        ]);
    }
}
