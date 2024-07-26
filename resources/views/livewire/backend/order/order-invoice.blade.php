<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end">
                <div class="col-md-8">

                </div>
                <div class="col-md-4">
                    <span class="d-flex justify-content-end">
                        <a href="{{ route('order.invoice.pdf',['orderId'=>$orderID]) }}" class="btn btn-sm btn-light mb-2 me-2">
                            <i class="fa fa-file text-danger me-1"></i> Export as PDF
                        </a>
                        <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-light mb-2">
                            <i class="fa fa-print me-1"></i> Print
                        </a>
                    </span>
                </div>
            </div>
        <!-- BEGIN INVOICE -->
        <div class="col-md-12">
            <div class="row d-flex justify-content-end align-items-end bg-dark">
                <div class="col-md-6">
                    <img class="mb-2" src="{{ asset('backend/assets/images/logo.png') }}" alt="LOGO" srcset="" width="30" height="30">
                </div>
                <div class="col-md-6 mt-1">
                    <h6 class="text-right">invoice ID
                        <small > #1082</small><br>
                        <small style="font-size: 10px" class="text-right">{{ $dateTime}} ({{ $authName }})</small>
                    </h6>
                </div>
            </div>
            <div class="row d-flex justify-content-end ">
                <div class="col-md-6">
                    <span>ecomstore.com, dhaka,bangladesh <br> Email: admin@gmail.com</span>
                </div>
                <div class="col-md-6">
                    <address style="font-size: 13px">
                        <strong>Delivey Address:</strong><br>
                        <abbr title="Name">Name:</abbr> Arifur Rahman Rifat <br>
                        <abbr title="Adddress">Address:</abbr> Wallaby Way, Sidney <br>
                        <abbr title="Phone">Phone:</abbr> +8801727495710
                    </address>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr class="line">
                                <td><strong>Sl</strong></td>
                                <td class="text-center"><strong>Product</strong></td>
                                <td class="text-center"><strong>Code</strong></td>
                                <td class="text-right"><strong>Quantity</strong></td>
                                <td class="text-right"><strong>Unit Price</strong></td>
                                <td class="text-right"><strong>Total Price</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordersInfo as $orderInfo)
                            <tr wire:key="{{ $orderInfo->id}}">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <small>{{ $orderInfo->product ? $orderInfo->product->name : "N/A"  }}</small>
                                </td>
                                <td class="text-center">
                                    <small>{{ $orderInfo->product ? $orderInfo->product->code : "N/A"  }} </small>
                                </td>
                                <td class="text-center">
                                    {{ $orderInfo->quantity }}
                                </td>
                                <td class="text-right">
                                    {{ $orderInfo->unit_price }}
                                </td>
                                <td class="text-right">
                                    {{ $orderInfo->total }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><strong>Sub Total</strong></td>
                                <td class="text-right"><strong> {{ $order->sub_total }} {{ $order->sub_total ? 'Tk' : '' }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><strong>Vat %</strong></td>
                                <td class="text-right"><strong> {{ $order->vat ?? 'N/A'}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><strong>Shiping charge</strong></td>
                                <td class="text-right"><strong> {{ $order->shiping_charge ?? 'N/A'}} {{ $order->shiping_charge ? 'Tk' : '' }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                </td>
                                <td class="text-right"><strong>Total</strong></td>
                                <td class="text-right"><strong>{{ $order->total }} {{ $order->total ? 'Tk' : '' }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- END INVOICE -->
    </div>
</div>
