<?php

namespace App\Livewire;


use App\Models\Order;
use App\Models\OrderInfo;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

#[Layout('components\layouts\backend')]
#[Title('Invoice Download')]
class InvoiceDownload extends Component
{
    public $orderId;
    public $dateTime;
    public $authName;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->authName = auth()->user()->name ?? 'Guest';
        // Get the current date and time
        $this->dateTime =   Carbon::now()->format('Y-m-d h:i:sa');

        $ordersInfo = OrderInfo::with('product')->where('order_id', $orderId)->get();
        $order = Order::findOrFail($orderId);

        // $pdf = Pdf::loadView('livewire.backend.order.invoice-download', [
        //     'ordersInfo' => $ordersInfo,
        //     'order' => $order,
        //     'dateTime' => now()->format('Y-m-d h:i:sa'),
        //     'authName' => auth()->user()->name ?? 'Guest'
        // ]);

        // return $pdf->download('invoice.pdf');
    }
    // public function render()
    // {
    //     $ordersInfo = OrderInfo::with('product')->where('order_id', $this->orderId)->get();
    //     $order = Order::findOrFail($this->orderId);
    //     return view('livewire.backend.order.invoice-download',[
    //         'ordersInfo' => $ordersInfo,
    //     ]);
    // }
}
