<div class="container-fluid">
    <div class="row">
        <!-- BEGIN INVOICE -->
        {{-- <div class="col-xs-12">
            <div class="grid invoice">
                <div class="grid-body">
                    <div class="invoice-title">
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="http://vergo-kertas.herokuapp.com/assets/img/logo.png" alt=""
                                    height="35">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                <h2>invoice<br>
                                    <span class="small">order #1082</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                Twitter, Inc.<br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Shipped To:</strong><br>
                                Elaine Hernandez<br>
                                P. Sherman 42,<br>
                                Wallaby Way, Sidney<br>
                                <abbr title="Phone">P:</abbr> (123) 345-6789
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Payment Method:</strong><br>
                                Visa ending **** 1234<br>
                                h.elaine@gmail.com<br>
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Order Date:</strong><br>
                                17/06/14
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>ORDER SUMMARY</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr class="line">
                                        <td><strong>#</strong></td>
                                        <td class="text-center"><strong>PROJECT</strong></td>
                                        <td class="text-center"><strong>HRS</strong></td>
                                        <td class="text-right"><strong>RATE</strong></td>
                                        <td class="text-right"><strong>SUBTOTAL</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><strong>Template Design</strong><br>A website template is a pre-designed
                                            webpage, or set of webpages, that anyone can modify with their own content
                                            and images to setup a website.</td>
                                        <td class="text-center">15</td>
                                        <td class="text-center">$75</td>
                                        <td class="text-right">$1,125.00</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><strong>Template Development</strong><br>Web development is a broad term for
                                            the work involved in developing a web site for the Internet (World Wide Web)
                                            or an intranet (a private network).</td>
                                        <td class="text-center">15</td>
                                        <td class="text-center">$75</td>
                                        <td class="text-right">$1,125.00</td>
                                    </tr>
                                    <tr class="line">
                                        <td>3</td>
                                        <td><strong>Testing</strong><br>Take measures to check the quality, performance,
                                            or reliability of (something), especially before putting it into widespread
                                            use or practice.</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">$75</td>
                                        <td class="text-right">$150.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="text-right"><strong>Taxes</strong></td>
                                        <td class="text-right"><strong>N/A</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                        </td>
                                        <td class="text-right"><strong>Total</strong></td>
                                        <td class="text-right"><strong>$2,400.00</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right identity">
                            <p>Designer identity<br><strong>Jeffrey Williams</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

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
