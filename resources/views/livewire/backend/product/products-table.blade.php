@php
    use Illuminate\Support\Str;
@endphp
<div>


    <div class="table-responsive">
        <table class="table">
            <div class="row d-flex justify-content-md-between m-2">
                <div class="col-md-5"></div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <input type="text" wire:model.live.debounce.300ms="search" class="form-control"
                            placeholder="Search" aria-label="Search
                        " aria-describedby="basic-addon2">
                    </div>
                </div>
            </div>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <!-- <th scope="col">Name</th> -->
                    <!-- <th scope="col">Slug</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Code</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th> -->
                    @include('livewire.backend.product.includes.table-sortable-th', [
                        'name' => 'name',
                        'displayName' => 'Name'
                    ])
                    @include('livewire.backend.product.includes.table-sortable-th', [
                        'name' => 'sku',
                        'displayName' => 'SKU'
                    ])
                    @include('livewire.backend.product.includes.table-sortable-th', [
                        'name' => 'code',
                        'displayName' => 'Code'
                    ])
                    @include('livewire.backend.product.includes.table-sortable-th', [
                        'name' => 'status',
                        'displayName' => 'Status'
                    ])
                    @include('livewire.backend.product.includes.table-sortable-th', [
                        'name' => 'created_at',
                        'displayName' => 'Created'
                    ])
                    @include('livewire.backend.product.includes.table-sortable-th', [
                        'name' => 'updated_at',
                        'displayName' => 'Updated'
                    ])
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <tbody class="light-body">
                @if ($products->count())
                    @foreach ($products as $product)
                        <tr wire:key="{{ $product->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ Str::limit($product->name, 20) }}
                                @if (Str::length($product->name) > 20)
                                    <a href="#" class="read-more">Read More</a>
                                    <span class="full-text" style="display: none;">{{ $product->name }}</span>
                                @endif
                            </td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->code }}</td>
                            <td>
                                @if ($editID == $product->id)
                                <select wire:model.live="editStatus">
                                    <option value="Published" {{ $editStatus === "published" ? 'selected' : ''}}>Published</option>
                                    <option value="Inactive" {{ $editStatus === "Inactive" ? 'selected' : ''}}>Inactive</option>
                                    <option value="Schedule" {{ $editStatus === "Schedule" ? 'selected' : ''}}>Schedule</option>
                                </select>
                                @else
                                <span wire:click="edit({{ $product->id }})">{{ $product->status }}</span>
                                @endif
                            </td>
                            <td>{{ $product->created_at->diffForHumans() }}</td>
                            <td>{{ $product->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group btn-group-toggle">
                                    <a class="button btn button-icon btn-outline-primary" href="{{ route('product.edit',['id'=>$product->id,'slug'=>$product->slug]) }}">Edit</a>
                                    <a class="button btn button-icon btn-outline-primary" href="{{ route('product.show',['id'=>$product->id,'slug'=>$product->slug]) }}">Show</a>
                                    <button type="button" class="button btn button-icon btn-outline-primary"
                                      wire:confirm='Are you sure to delete this Post ?'
                                      wire:click="delete({{ $product->id }})">Delete</button>
                                </div>
                            </td>
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
        {{ $products->links() }}
    </div>



</div>

@script
<script>
    document.querySelectorAll('.read-more').forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            this.style.display = 'none';
            this.nextElementSibling.style.display = 'inline';
        });
    });
</script>

@endscript


