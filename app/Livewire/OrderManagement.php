<?php

namespace App\Livewire;

use App\Models\Order;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Layout('components\layouts\backend')]
#[Title('Order Management')]
class OrderManagement extends Component
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
        $this->editStatus = Order::findOrFail($this->editID)->order_status;
    }

    public function updatedEditStatus()
    {
        try {
            $orderStatus = Order::findOrFail($this->editID);
            $orderStatus->order_status = $this->editStatus;
            $orderStatus->save();

            //after update order status reset fild
            $this->reset(['editID', 'editStatus']);
            return $this->dispatch('toast', message: 'Order Status Update successfully.!', notify: 'success');
        } catch (\Throwable $th) {
            //throw $e;
            return $this->dispatch('toast', message: 'Order not found!', notify: 'error');
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

    public function render()
    {
        $orders = Order::search($this->search)->orderBy($this->sortBy, $this->sortDir)
            ->latest()->paginate($this->perPage);
        return view('livewire.backend.order.order-management', [
            'orders' => $orders
        ]);
    }
}
