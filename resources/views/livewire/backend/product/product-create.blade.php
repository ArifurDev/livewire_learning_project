<div class="container-fluid">
    <div class="row">
        <h4 class="ml-3 mb-2">Add New Product</h4>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Product Name *</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Name" wire:model="name">

                                    {{-- @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Bar Code *</label>
                                    <input type="text" class="form-control" placeholder="Enter Bar code" wire:model="bar_code">

                                    {{-- @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summernote">Product Description</label>
                                    <textarea class="form-control" id="summernote"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            {{-- image --}}
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Product Image *</label>
                                    <div class="drag-area" id="drag-area-category">
                                        <p id="drag-text-category">Drag & Drop your image here or click to upload</p>
                                        <input type="file" id="file-input-category" hidden wire:model="image" multiple>
                                        <div class="thumb-container" id="thumb-container-category"></div>
                                    </div>

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <p class="fs-6 text-dark">Images Ratio 1:1</p>
                                    <small class="text-muted">Image format : jpg png jpeg | Maximum Size : 2 MB</small>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            {{-- Attribute --}}
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Default</label>
                                    <select class="form-control mb-3" multiple>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                        <option value="5">Five</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                </div>
            </div>


        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Product price *</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Name" wire:model="name">

                                    {{-- @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
  </div>



