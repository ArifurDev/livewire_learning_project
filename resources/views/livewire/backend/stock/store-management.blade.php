@php
    use Illuminate\Support\Str;
@endphp


<div class="container-fluid">
    <div class="row">
        <h4 class="ml-3 mb-2">Stock Management</h4>
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
                                        <input type="text" wire:model.live.debounce.300ms="search"
                                            class="form-control" placeholder="Search" aria-label="Search"
                                            aria-describedby="basic-addon2">
                                    </div>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    {{-- <th scope="col">Product Name</th>
                                    <th scope="col">Variant Name</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th> --}}
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                        'name' => 'product_id',
                                        'displayName' => 'Product Name',
                                    ])
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                        'name' => 'sub_variant_id',
                                        'displayName' => 'Variant Name',
                                    ])
                                    @include('livewire.backend.product.includes.table-sortable-th', [
                                        'name' => 'stock',
                                        'displayName' => 'Stock',
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
                                @if ($productStocks->count())
                                    @foreach ($productStocks as $product)
                                        <tr wire:key="{{ $product->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->product_id }}</td>
                                            <td>{{ $product->sub_variant_id }}</td>

                                            <td>
                                                @if ($editId === $product->id)
                                                    <input type="number" min="0"
                                                        class="form-control form-control-sm" wire:model="stock">

                                                    @error('stock')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                @else
                                                    {{ $product->stock == 0 ? 'stock out' : $product->stock }}
                                                @endif
                                            </td>

                                            <td>{{ $product->created_at->diffForHumans() }}</td>
                                            <td>{{ $product->updated_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($product->id === $editId)
                                                    <a class="badge bg-primary mr-2" data-toggle="tooltip"
                                                        data-placement="top" title="Save" wire:click="update"><i
                                                            class="ri-check-line mr-0"></i></a>
                                                @else
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Edit"
                                                        wire:click="edit({{ $product->id }})"><i
                                                            class="ri-pencil-line mr-0"></i></a>
                                                @endif
                                            </td>
                                            {{-- <td>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                class="btn btn-light dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Acction
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" href="">Edit</a>
                                                <a class="dropdown-item" href="">Show</a>
                                                <button class="dropdown-item" type="button"
                                                    wire:confirm='Are you sure to delete this Post ?'
                                                    wire:click="delete({{ $product->id }})">Delete</button>
                                            </div>
                                        </div>
                                    </td> --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center text-danger">No Products found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="flex">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                <select wire:model.live='perPage'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                                </select>
                            </div>
                        </div>
                        {{ $productStocks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Page end  -->
</div>
