<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Category List</h4>
                    </div>
                    <a  href="{{ route('category.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a>
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
                                        <th>Image</th>
                                        <th>Banner</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="ligth-body">
                                    @foreach ($categories as $categorie)
                                        <tr wire:key={{ $categorie->id }}>
                                            <td>{{ $loop->iteration  }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($categorie->image)
                                                       <img src="{{ Storage::url('public/images/' . $categorie->image) }}" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($categorie->banner)
                                                       <img src="{{ Storage::url('public/banner/' . $categorie->banner) }}" class="mr-3" width="50%" height="auto" alt="image">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $categorie->name }}</td>
                                            <td>
                                                <div class="custom-control custom-switch custom-switch-color">
                                                    <input type="checkbox" class="custom-control-input bg-success" id="customSwitch{{ $categorie->id }}" wire:click="toggleStatus({{ $categorie->id }})" @if($categorie->status == 1) checked @endif>
                                                    <label class="custom-control-label" for="customSwitch{{ $categorie->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $categories->links() }}

                                </tbody>
                            </table>
                       </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Page end  -->
  </div>


