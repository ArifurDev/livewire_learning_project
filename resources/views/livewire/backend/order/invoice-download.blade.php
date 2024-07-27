<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .invoice {
            background: #fff;
            margin: 20px auto;
            padding: 20px;
            max-width: 900px;
            border: 1px solid #ddd;
        }

        .invoice-company {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .invoice-header {
            margin-bottom: 20px;
            padding: 20px;
            /* Increased padding for better spacing */
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            /* Ensures the content wraps on smaller screens */
        }

        /* Styling for the 'from' and 'to' sections */
        .invoice-header .invoice-from,
        .invoice-header .invoice-to {
            width: 45%;
            /* Adjust width as needed */
            padding: 0 10px;
            /* Add some horizontal padding */
        }

        .invoice-header small {
            display: block;
        }

        .invoice-content {
            margin-bottom: 20px;
        }

        .invoice-content .table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-content .table thead tr {
            background: #f8f8f8;
        }

        .invoice-content .table th,
        .invoice-content .table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .invoice-content .table th {
            background: #f4f4f4;
        }

        .invoice-content .table td {
            text-align: right;
        }

        .invoice-note {
            font-size: 12px;
            margin-top: 20px;
        }

        .invoice-footer {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            text-align: center;
            font-size: 12px;
        }

        .invoice-footer span {
            margin-right: 10px;
        }

        .invoice-footer .fa {
            margin-right: 5px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .text-inverse {
            color: #333;
        }

        .m-t-5 {
            margin-top: 5px;
        }

        .m-b-5 {
            margin-bottom: 5px;
        }

        .mb-2 {
            margin-bottom: 2px;
        }

        .f-w-600 {
            font-weight: 600;
        }

    </style>
</head>
<body>
    <!-- begin invoice -->
    <div class="invoice">
        <!-- begin invoice-company -->
        <div class="row d-flex justify-content-end align-items-end bg-dark">
            <div class="col-md-6">
                <img class="mb-2" src="{{ asset('backend/assets/images/logo.png') }}" alt="LOGO" width="30" height="30">
            </div>
            <div class="col-md-6 mt-1">
                <h6 class="text-right">Invoice ID
                    <small>#{{ $order->id }}</small><br>
                    <small style="font-size: 10px" class="text-right">{{ $dateTime }} ({{ $authName }})</small>
                </h6>
            </div>
        </div>
        <!-- end invoice-company -->
        <!-- begin invoice-header -->

        <div class="invoice-header">
            <div class="invoice-from">
                <small>From</small>
                <address class="m-t-5 m-b-5">
                    <strong class="text-inverse">Your Company Name</strong><br>
                    Street Address<br>
                    City, Zip Code<br>
                    Phone: (123) 456-7890<br>
                    Fax: (123) 456-7890
                </address>
            </div>
            <div class="invoice-to">
                <small>To</small>
                <address class="m-t-5 m-b-5">
                    <strong class="text-inverse">{{ $order->customer_name }}</strong><br>
                    {{ $order->customer_address }}<br>
                    Phone: {{ $order->customer_phone }}<br>
                    Email: {{ $order->customer_email }}
                </address>
            </div>
        </div>
        <!-- end invoice-header -->
        <!-- begin invoice-content -->
        <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
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
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><small>{{ $orderInfo->product ? $orderInfo->product->name : 'N/A' }}</small></td>
                            <td class="text-center"><small>{{ $orderInfo->product ? $orderInfo->product->code : 'N/A' }}</small></td>
                            <td class="text-center">{{ $orderInfo->quantity }}</td>
                            <td class="text-right">{{ number_format($orderInfo->unit_price, 2) }}</td>
                            <td class="text-right">{{ number_format($orderInfo->total, 2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-right"><strong>Sub Total</strong></td>
                            <td class="text-right"><strong>{{ number_format($order->sub_total, 2) }} Tk</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-right"><strong>VAT %</strong></td>
                            <td class="text-right"><strong>{{ $order->vat ?? 'N/A' }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-right"><strong>Shipping Charge</strong></td>
                            <td class="text-right"><strong>{{ number_format($order->shipping_charge, 2) ?? 'N/A' }} Tk</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-right"><strong>Total</strong></td>
                            <td class="text-right"><strong>{{ number_format($order->total) }} Tk</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- end table-responsive -->
        </div>
        <!-- end invoice-content -->
        <!-- begin invoice-note -->
        {{-- <div class="invoice-note">
            * Make all cheques payable to [Your Company Name]<br>
            * Payment is due within 30 days<br>
            * If you have any questions concerning this invoice, contact [Name, Phone Number, Email]
        </div> --}}
        <!-- end invoice-note -->
        <!-- begin invoice-footer -->
        {{-- <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">THANK YOU FOR YOUR BUSINESS</p>
            <p class="text-center">
                <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> yourwebsite.com</span>
                <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> your.email@example.com</span>
            </p>
        </div> --}}
        <!-- end invoice-footer -->
    </div>
    <!-- end invoice -->
</body>
</html>
