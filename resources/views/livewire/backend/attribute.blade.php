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
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h6 class="mb-3">Category List</h6>
                        </div>
                        <div>
                            <input type="search" class="form-control" placeholder="Search attributes..." wire:model.live.debounce.500ms="search">
                        </div>
                    </div>
                    <div class="table-responsive rounded mb-3">
                        <table class="data-table table mb-0 tbl-server-info">
                            <thead class="bg-white text-uppercase ">
                                <tr class="ligth">
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="light-body">
                                @if ($attributes->count())
                                    @foreach ($attributes as $attri)
                                        <tr wire:key="{{ $attri->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $attri->name }}</td>
                                            <td>
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="Delete"
                                                 wire:click="delete({{ $attri->id }})"
                                                 wire:confirm='Are you sure to delete this Attribute?'
                                                 ><i class="ri-delete-bin-line mr-0"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $attributes->links() }}
                                @else
                                <tr>
                                    <td colspan="3" class="text-center text-danger">No attributes found.</td>
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



