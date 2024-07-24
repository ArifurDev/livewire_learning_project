<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderInfo;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components\layouts\backend')]
#[Title('Order Invoice')]
class OrderInvoice extends Component
{
    public $orderID;

    public function mount($orderId)
    {
        $this->orderID = $orderId;
    }

    public function render()
    {
        $ordersInfo = OrderInfo::where('order_id', $this->orderID)->get();
        $order = Order::findOrFail($this->orderID);
        
        return view('livewire.order-invoice',[
            'ordersInfo' => $ordersInfo,
            'order' => $order,
        ]);
    }
}
