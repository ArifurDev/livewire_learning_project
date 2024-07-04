<div class="container-fluid">
    <div class="row">
        <h4 class="ml-3 mb-2">Add New Product</h4>
    </div>
   <form wire:submit.prevent="submitForm">
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
                                        <input type="text" class="form-control" placeholder="FXSK123U" wire:model="sku">
                                        @error('sku')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Code*</label>
                                        <input type="text" class="form-control" placeholder="Enter code" wire:model="code">
                                        @error('code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="warranty">warranty*</label>
                                        <textarea class="form-control" wire:model="warranty"></textarea>
                                    </div>
                                    @error('warranty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" wire:ignore>
                                        <label for="summernote">Product Description</label>
                                        <textarea class="form-control" id="description" wire:model="description"></textarea>
                                    </div>
                                    @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                        <div id="fileUpload" class="file-container">
                                            <label for="fileUpload-1" class="file-upload">
                                            <div>
                                                <i class="material-icons-outlined">cloud_upload</i>
                                                <p>Drag &amp; Drop Files Here</p>
                                                <span>OR</span>
                                                <div>Browse Files</div>
                                            </div>
                                            <input type="file" id="fileUpload-1" multiple="" hidden="" wire:model="images">
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

    
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <livewire:attribute-selector wire:model.live='selectedOptions' />
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
                                        <select class="form-control mb-3 js-example-basic-single" wire:model="unit">
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
                                        <label>Discount*</label>
                                        <input type="number" min="0" class="form-control" placeholder="Enter Discount" wire:model="discount">
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
                                        <select class="form-control mb-3 js-example-basic-single" wire:model="discountType">
                                            <option value="">Select option</option>
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
                                        <select class="form-control mb-3 js-example-basic-multiple" wire:model="category" multiple>
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
                                        <select class="form-control mb-3" wire:model="status">
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
                                        <livewire:tags-input wire:model.live='tags' />
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="row d-flex justify-content-end p-3">
            <button type="reset" class="btn btn-danger mr-2">Reset</button>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
   </form>
    <!-- Page end  -->
  </div>



  @script
  <script>
        $('#description').summernote({
          placeholder: 'Enter product description',
          tabsize: 2,
          height: 100,
          toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onChange: function(contents, $editable) {
                 @this.set('description',contents)
            }
        }
        });
      </script>
@endscript
