<div class="container-fluid">
    <div class="row">
        <h4 class="ml-3 mb-2">Attribute Setup</h4>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="submitForm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Attribute Name *</label>
                                    <input type="text" class="form-control" placeholder="Enter Attribute Name" wire:model="name">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end pr-3">
                            <button type="reset" class="btn btn-danger mr-2">Reset</button>
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Variants List</h4>
                </div>
                <a href="{{ route('category.create') }}" class="btn btn-primary add-list"><i
                        class="las la-plus mr-3"></i>Add Category</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive rounded mb-3">
                        <table class="data-table table mb-0 tbl-server-info">
                            <thead class="bg-white text-uppercase">
                                <tr class="ligth ligth-data">
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="light-body">
                                @foreach ($variants as $variant)
                                    <tr wire:key="{{ $variant->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $variant->name }}</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="Delete" wire:click="delete({{ $variant->id }})"><i class="ri-delete-bin-line mr-0"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $variants->links() }}
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Page end  -->
  </div>



