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
                                    <label>Product Name*</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Name" wire:model="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>SKU*</label>
                                    <input type="text" class="form-control" placeholder="FXSK123U" wire:model="barCode">
                                    @error('barCode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Bar Code*</label>
                                    <input type="text" class="form-control" placeholder="Enter Bar code" wire:model="barCode">
                                    @error('barCode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                                    {{-- <div class="drag-area" id="drag-area-category">
                                        <p id="drag-text-category">Drag & Drop your image here or click to upload</p>
                                        <input type="file" id="file-input-category" hidden wire:model="image" multiple>
                                        <div class="thumb-container" id="thumb-container-category"></div>
                                    </div>

                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <p class="fs-6 text-dark">Images Ratio 1:1</p>
                                    <small class="text-muted">Image format : jpg png jpeg | Maximum Size : 2 MB</small> --}}
                                    <div id="fileUpload" class="file-container">
                                        <label for="fileUpload-1" class="file-upload">
                                          <div>
                                            <i class="material-icons-outlined">cloud_upload</i>
                                            <p>Drag &amp; Drop Files Here</p>
                                            <span>OR</span>
                                            <div>Browse Files</div>
                                          </div>
                                          <input type="file" id="fileUpload-1" name="images[]" multiple="" hidden="">
                                        </label>
                                        @error('images')
                                         <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
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
                                    <label>Select Attributes</label>
                                    <select class="form-control mb-3 js-example-basic-multiple" wair:model="selectedAttributes" multiple="multiple">
                                        @foreach ($attributes as $attribute)
                                          <option value="{{ $attribute->name }}">{{ $attribute->name }}</option>
                                        @endforeach
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
                                    <input type="text" class="form-control" placeholder="Enter Product price" wire:model="price">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Unit*</label>
                                    <select class="form-control mb-3 js-example-basic-single" name="unit">
                                        <option value="Kg">Kg</option>
                                        <option value="Gm">Gm</option>
                                        <option value="Ltr">Ltr</option>
                                        <option value="Pc">Pc</option>
                                      </select>
                                      @error('unit')
                                        <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Discount price *</label>
                                    <input type="text" class="form-control" placeholder="Enter Discount" wire:model="discount">
                                    @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Discount Type*</label>
                                    <select class="form-control mb-3 js-example-basic-single" name="discountType">
                                        <option value="Percent">Percent</option>
                                        <option value="Amount">Amount</option>
                                      </select>
                                    @error('discountType')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Stock*</label>
                                    <input type="number" min="0" class="form-control" placeholder="Enter Stock Product" wire:model="stock">
                                    @error('stock')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Category*</label>
                                    <select class="form-control mb-3 js-example-basic-single" name="category" multiple>
                                        <option value="">Select category</option>
                                        @foreach ($categories as $category)
                                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                      </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Status*</label>
                                    <select class="form-control mb-3" name="status">
                                        <option value="Published">Published</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Schedule">Schedule</option>
                                      </select>
                                      @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <livewire:tags-input />
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page end  -->
  </div>



