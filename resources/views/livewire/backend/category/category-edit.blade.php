<div class="container-fluid">
    <div class="row">
        <h4 class="ml-3 mb-2">Category Edit</h4>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Category Name *</label>
                                    <input type="text" class="form-control" placeholder="Enter Category Name" wire:model="name" value="{{ $category->name }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image *</label>
                                    <div class="drag-area" id="drag-area-category">
                                        <p id="drag-text-category">Drag & Drop your image here or click to upload</p>
                                        <input type="file" id="file-input-category" hidden wire:model="image">
                                        <div class="thumb-container" id="thumb-container-category"></div>
                                    </div>

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <p class="fs-6 text-dark">Images Ratio 1:1</p>
                                    <small class="text-muted">Image format : jpg png jpeg | Maximum Size : 2 MB</small>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group ">
                                    <label>Banner Image *</label>
                                    <div class="drag-area" id="drag-area-banner">
                                        <p id="drag-text-banner">Drag & Drop your image here or click to upload</p>
                                        <input type="file" id="file-input-banner" hidden wire:model="banner">
                                        <div class="thumb-container" id="thumb-container-banner"></div>
                                    </div>

                                    @error('banner')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <p class="fs-6 text-dark ">Banner Images Ratio 8:1</p>
                                    <small class="text-muted">Image format : jpg png jpeg | Maximum Size : 2 MB</small>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end pr-3">
                            <button type="reset" class="btn btn-danger mr-2">Reset</button>
                            <button type="submit" class="btn btn-primary ">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
  </div>
