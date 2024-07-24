<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderInfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components\layouts\backend')]
#[Title('Order Invoice')]
class OrderInvoice extends Component
{
    public $orderID;
    public $dateTime;
    public $authName;

    public function mount($orderId)
    {
        $this->orderID = $orderId;
        $this->authName = auth()->user()->name ?? 'Guest';

        // Get the current date and time
        $this->dateTime =   Carbon::now()->format('Y-m-d h:i:sa');

    }

    public function render()
    {
        $ordersInfo = OrderInfo::with('product')->where('order_id', $this->orderID)->get();
        $order = Order::findOrFail($this->orderID);

        return view('livewire.backend.order.order-invoice',[
            'ordersInfo' => $ordersInfo,
            'order' => $order,
        ]);
    }
}
