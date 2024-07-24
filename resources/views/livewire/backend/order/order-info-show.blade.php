<div class="container-fluid">
    <div class="row">
        <h4 class="ml-3 mb-2">Order Management</h4>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <div class="row d-flex justify-content-md-between m-2 align-items-end">
                                {{-- <div class="">
                                </div> --}}
                                <div class="input-group mb-3 col-md-3">
                                    <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                </div>
                                {{-- <div class="  ">
                                </div> --}}
                                    <a  class="button btn button-icon btn-primary mb-3 col-md-1"  href="{{ route('order.invoice.show',['orderId' => $orderID]) }}">Invoice</a>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody class="light-body">
                                @if ($ordersInfo->count())
                                @foreach ($ordersInfo as $orderInfo)
                                <tr wire:key="{{ $orderInfo->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $orderInfo->product_id }}</td>
                                    @if($editID == $orderInfo->id)
                                    <td>
                                        <input type="number" class="form-control form-control-sm" wire:model="editQuantity">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" wire:model="editUnitPrice">
                                    </td>
                                    @else
                                    <td>{{ $orderInfo->quantity }}</td>
                                    <td>{{ $orderInfo->unit_price }}</td>
                                    @endif

                                    <td>{{ $orderInfo->total }}</td>
                                    <td>{{ $orderInfo->created_at->diffForHumans() }}</td>
                                    <td>{{ $orderInfo->updated_at->diffForHumans() }}</td>
                                    <td>
                                        @if($editID == $orderInfo->id)
                                            <a class="badge bg-primary mr-2" data-toggle="tooltip" data-placement="top" title="Update" wire:click="update"><i class="ri-check-line mr-0"></i></a>
                                        @else
                                        <div class="btn-group btn-group-toggle">
                                            <button type="button" class="button btn button-icon btn-outline-primary"  wire:click="edit({{ $orderInfo->id }})">Edit</button>
                                            <button type="button" class="button btn button-icon btn-outline-primary"  href="#">Show</button>
                                            <button type="button" class="button btn button-icon btn-outline-primary"  wire:confirm='Are you sure to delete this Order Information?' wire:click="delete({{ $orderInfo->id }})">Delete</button>
                                         </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class="text-center text-danger">No Orders Information found.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Page end  -->
</div>
