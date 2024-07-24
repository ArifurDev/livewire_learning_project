<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderInfo;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components\layouts\backend')]
#[Title('Order Information show')]
class OrderInfoShow extends Component
{
    public $orderID;

    public $editID;
    public $editQuantity;
    public $editUnitPrice;

    public function mount($orderId)
    {
        $this->orderID = $orderId;
    }

    public function edit($id)
    {
        try {
            $this->editID = $id;
            $editOrderInfo = OrderInfo::findOrFail($id);
            $this->editQuantity = $editOrderInfo->quantity;
            $this->editUnitPrice = $editOrderInfo->unit_price;
        } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Order Info not found!', notify: 'error');
        }
    }

    /**
     * update orderInfo
     */
    public function update()
    {
        try {
            $editOrderInfo = OrderInfo::findOrFail($this->editID);
            $editOrderInfo->quantity = $this->editQuantity;
            $editOrderInfo->unit_price = $this->editUnitPrice;

            $editOrderInfo->total = $this->editQuantity * $this->editUnitPrice; //update total price
            $editOrderInfo->save();

            /**
             * call updateOrder method
             * After update orderInfo then update order model
             */
            $this->updateOrder($editOrderInfo);
        } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Order Informations not found!', notify: 'error');
        }
    }

    /**
     * After update orderInfo then update order model
     */
    protected function updateOrder($editOrderInfo)
    {
        $orderID = $editOrderInfo->order_id;

        $orderInfo = OrderInfo::where('order_id', $orderID);

        $Quantites = $orderInfo->sum('quantity');
        $subTotal =  $orderInfo->sum('total');

        $order = Order::findOrFail($orderID);

        $vatAmount = $this->vatCalculator($subTotal, $order->vat);
        $totalAmount = $subTotal + $vatAmount + $order->shiping_charge; //$subTotal + vatAmount + shiping charge
        $dueAmount = $totalAmount - $order->pay; //get due amount

        //set update value in order model
        $order->total_products = $Quantites;
        $order->sub_total = $subTotal;
        $order->total = $totalAmount;
        $order->due = $dueAmount;

        $order->save();

        // Reset edit properties
        $this->reset(['editID', 'editQuantity', 'editUnitPrice']);

        return $this->dispatch('toast', message: 'Order Information Update successfully!', notify: 'success');
    }
    /**
     * if delete order info then decrement order total product and sub total price
     */
    public function delete($id)
    {
        try {
            $orderInfo = OrderInfo::findOrFail($id);
            $orderInfoQuantity = $orderInfo->quantity;
            $orderInfoTotal = $orderInfo->total;

            $orderId = $orderInfo->order_id;
            $order = Order::findOrFail($orderId);

            //calculation
            $Quantity = $order->total_products -  $orderInfoQuantity; //decrement total products
            $subTotal = $order->sub_total -  $orderInfoTotal; //decrement sub total price

            // $vat = round($subTotal * ($order->vat/100),2); //vat %
            $vatAmount = $this->vatCalculator($subTotal, $order->vat);
            $totalAmount = $subTotal + $vatAmount + $order->shiping_charge; //$subTotal + vatAmount + shiping charge

            $dueAmount = $totalAmount - $order->pay; //get due amount

            //set update value
            $order->total_products = $Quantity;
            $order->sub_total = $subTotal;
            $order->total = $totalAmount;
            $order->due = $dueAmount;

            $order->save();
            $orderInfo->delete();

            return $this->dispatch('toast', message: 'Order Information Delete and Order Update successfully!', notify: 'success');
        } catch (\Throwable $e) {
            //throw $e;
            return $this->dispatch('toast', message: 'Somthing with wrong order info show !', notify: 'error');
        }
    }
    protected function vatCalculator($subTotal, $vat)
    {
        return round($subTotal * ($vat / 100), 2);
    }
    public function render()
    {
        $orderInfos = OrderInfo::where('order_id', $this->orderID)->get();
        return view('livewire.backend.order.order-info-show', [
            'ordersInfo' => $orderInfos,
        ]);
    }
}
