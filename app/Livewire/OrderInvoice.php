<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderInfo;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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

    public $ordersInfo;
    public $order;

    public function mount($orderId)
    {
        $this->orderID = $orderId;
        $this->authName = auth()->user()->name ?? 'Guest';

        // Get the current date and time
        $this->dateTime =   Carbon::now()->format('Y-m-d h:i:sa');

        $this->ordersInfo = OrderInfo::with('product')->where('order_id', $this->orderID)->get();
        $this->order = Order::findOrFail($this->orderID);
    }

    public function render()
    {


        return view('livewire.backend.order.order-invoice', [
            'ordersInfo' => $this->ordersInfo,
            'order' => $this->order,
        ]);
    }
}
