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
                            <div class="row d-flex justify-content-md-between m-2">
                                <div class="col-md-5"></div>
                                <div class="col-md-3">
                                    <div class="input-group mb-3">
                                        <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    {{-- <th scope="col">Customer Name</th>
                                    <th scope="col">pay</th>
                                    <th scope="col">due</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Charge</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th> --}}
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                    'name' => 'customer_id',
                                    'displayName' => 'Customer Name',
                                    ])
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                    'name' => 'pay',
                                    'displayName' => 'Pay',
                                    ])
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                    'name' => 'due',
                                    'displayName' => 'Due',
                                    ])
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                    'name' => 'payment_status',
                                    'displayName' => 'Payment',
                                    ])
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                    'name' => 'shiping_charge',
                                    'displayName' => 'Charge',
                                    ])
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                    'name' => 'order_status',
                                    'displayName' => 'status',
                                    ])
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                    'name' => 'created_at',
                                    'displayName' => 'Created',
                                    ])
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                    'name' => 'updated_at',
                                    'displayName' => 'Updated',
                                    ])

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody class="light-body">
                                @if ($orders->count())
                                @foreach ($orders as $order)
                                <tr wire:key="{{ $order->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->customer_id }}</td>
                                    <td>{{ $order->pay }}</td>
                                    <td>{{ $order->due }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->shiping_charge }}</td>
                                    <td>
                                        @if ($editID == $order->id)
                                        <select wire:model.live="editStatus">
                                            <option value="panding" {{ $editStatus == 'panding' ? 'selected' : '' }}>
                                                Panding</option>
                                            <option value="processing" {{ $editStatus == 'processing' ? 'selected' : '' }}>
                                                Processing</option>
                                            <option value="packging" {{ $editStatus == 'packging' ? 'selected' : '' }}>
                                                Packging</option>
                                        </select>
                                        @else
                                        <span wire:click="edit({{ $order->id }})">{{ $order->order_status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                    <td>{{ $order->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Acction
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" href="{{ route('order.invoice.pdf',['orderId'=>$order->id]) }}">Export as PDF</a>
                                                <a class="dropdown-item" href="">Edit</a>
                                                <a class="dropdown-item" href="{{ route('order.info.show', ['orderId' => $order->id]) }}">Show</a>
                                                <button class="dropdown-item" type="button" wire:confirm='Are you sure to delete this Post ?' wire:click="delete({{ $order->id }})">Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class="text-center text-danger">No Orders found.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="flex">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                <select wire:model.live='perPage' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                                </select>
                            </div>
                        </div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Page end  -->
</div>
