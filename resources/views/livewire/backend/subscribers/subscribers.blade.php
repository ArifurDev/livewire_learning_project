<div class="container-fluid">
    <div class="row">
        <h4 class="ml-3 mb-2">Subscribers</h4>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h6 class="mb-3">Subscribers List</h6>
                        </div>
                        <div>
                            <input type="search" class="form-control" placeholder="Search Subscribers..." wire:model.live.debounce.500ms="search">
                        </div>
                    </div>
                    <div class="table-responsive rounded mb-3">
                        <table class="data-table table mb-0 tbl-server-info">
                            <thead class="bg-white text-uppercase ">
                                <tr class="ligth">
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="light-body">
                                @if ($subscribers->count())
                                @foreach ($subscribers as $subscribe)
                                <tr wire:key="{{ $subscribe->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($editID === $subscribe->id)
                                            <input type="text"
                                                class="form-control form-control-sm" wire:model="editName">

                                            @error('editName')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        @else
                                            {{ $subscribe->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($editID === $subscribe->id)
                                            <input type="text"
                                                class="form-control form-control-sm" wire:model="editEmail">

                                            @error('editEmail')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        @else
                                            {{ $subscribe->email }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($editID === $subscribe->id)
                                        <select wire:model.live="editStatus">
                                            <option value="desable" {{ $editStatus === "desable" ? 'selected' : ''}}>Desable</option>
                                            <option value="enable" {{ $editStatus === "enable" ? 'selected' : ''}}>enable</option>
                                        </select>

                                        @error('editStatus')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    @else
                                        {{ $subscribe->status }}
                                    @endif
                                    </td>
                                    <td>{{ $subscribe->created_at->diffForHumans() }}</td>
                                    <td>{{ $subscribe->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            @if ($editID === $subscribe->id)
                                            <a class="badge bg-primary mr-2" data-toggle="tooltip" data-placement="top" title="Save" wire:click="update"><i class="ri-check-line mr-0"></i></a>
                                            @else
                                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" wire:click="edit({{ $subscribe->id }})"><i class="ri-pencil-line mr-0"></i></a>
                                            @endif
                                            <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="Delete" wire:click="delete({{ $subscribe->id }})" wire:confirm='Are you sure to delete this Route list?'><i class="ri-delete-bin-line mr-0"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="text-center text-danger">No Subscribers found.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $subscribers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>
