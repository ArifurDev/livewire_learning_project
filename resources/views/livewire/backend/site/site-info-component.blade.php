<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="iq-edit-list usr-edit">
                        <ul class="iq-edit-profile d-flex nav nav-pills">
                            <li class="col-md-3 p-0">
                                <a class="nav-link active " data-toggle="pill" href="#general-information" >
                                    General Info
                                </a>
                            </li>
                            <li class="col-md-3 p-0 " >
                                <a class="nav-link " data-toggle="pill" href="#Social-Media" >
                                    Social Media
                                </a>
                            </li>
                            <li class="col-md-3 p-0">
                                <a class="nav-link" data-toggle="pill" href="#meta" >
                                    Meta
                                </a>
                            </li>
                            <li class="col-md-3 p-0">
                                <a class="nav-link" data-toggle="pill" href="#manage-contact" >
                                    Manage Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="iq-edit-list-data">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="general-information" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <form wire:submit.prevent="save" enctype="multipart/form-data">
                                    <div class=" row align-items-center">
                                        <div class="form-group col-sm-4">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" id="name" wire:model="name">

                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="email">Email:</label>
                                            <input type="text" class="form-control" id="email"
                                                wire:model="email">

                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="phone">Phone:</label>
                                            <input type="text" class="form-control" id="phone"
                                                wire:model="phone">

                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Address:</label>
                                            <textarea class="form-control" rows="3" style="line-height: 22px;" wire:model="address">
                                            37 Cardinal Lane
                                            Petersburg, VA 23803
                                            United States of America
                                            Zip Code: 85001
                                            </textarea>

                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="favicon">Fav icon:</label>
                                            <input type="file" class="form-control" id="favicon"
                                                wire:model="favicon">

                                            @if ($favicon != null)
                                            <img src="{{ is_string($favicon ) ? Storage::url('public/favicon/' .$favicon) : $favicon->temporaryUrl() }}" alt="Favicon Preview" width="50">
                                            @endif

                                            @error('favicon')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="logo">Logo:</label>
                                            <input type="file" class="form-control" id="logo" wire:model="logo">
                                            @if ($logo != null)
                                            <img src="{{ is_string($logo ) ? Storage::url('public/logo/' .$logo) : $logo->temporaryUrl() }}" alt="logo Preview" width="50">
                                            @endif


                                            @error('logo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Social-Media" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <form wire:submit.prevent="save">
                                    <div class="row align-items-center">
                                        <div class="form-group col-sm-6">
                                            <label for="facebook">Facebook:</label>
                                            <input type="text" class="form-control" id="facebook" wire:model="facebook">

                                            @error('facebook')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="twitter">Twitter:</label>
                                            <input type="text" class="form-control" id="twitter" wire:model="twitter">

                                            @error('twitter')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="instagram">instagram:</label>
                                            <input type="text" class="form-control" id="instagram" wire:model="instagram">

                                            @error('instagram')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="linkedin">Linkedin:</label>
                                            <input type="text" class="form-control" id="linkedin" wire:model="linkedin">

                                            @error('linkedin')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="youtube">YouTube:</label>
                                            <input type="text" class="form-control" id="youtube" wire:model="youtube">

                                            @error('youtube')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="meta" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <form wire:submit.prevent="save">
                                    <div class="row align-items-center">
                                        <div class="form-group col-sm-6">
                                            <label for="meta_title">Meta Title:</label>
                                            <input type="text" class="form-control" id="meta_title" wire:model="meta_title">

                                            @error('meta_title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="meta_description">Meta Description:</label>
                                            <input type="text" class="form-control" id="meta_description" wire:model="meta_description">

                                            @error('meta_description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="meta_keywords">Meta Keywords:</label>
                                            <input type="text" class="form-control" id="meta_keywords" wire:model="meta_keywords">

                                            @error('meta_keywords')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Manage Contact</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="cno">Contact Number:</label>
                                        <input type="text" class="form-control" id="cno"
                                            value="001 2536 123 458">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" id="email"
                                            value="Barryjone@demo.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="url">Url:</label>
                                        <input type="text" class="form-control" id="url"
                                            value="https://getbootstrap.com">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
