<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="iq-edit-list usr-edit">
                        <ul class="iq-edit-profile d-flex nav nav-pills">
                            <li class="col-md-3 p-0">
                                <a class="nav-link active" data-toggle="pill" href="#general-information">
                                    General Info
                                </a>
                            </li>
                            <li class="col-md-3 p-0">
                                <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                    Change Password
                                </a>
                            </li>
                            <li class="col-md-3 p-0">
                                <a class="nav-link" data-toggle="pill" href="#emailandsms">
                                    Email and SMS
                                </a>
                            </li>
                            <li class="col-md-3 p-0">
                                <a class="nav-link" data-toggle="pill" href="#manage-contact">
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
                                <form wire:submit.prevent="save">
                                    <div class=" row align-items-center">
                                        <div class="form-group col-sm-4">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" id="name" wire:model="name">

                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="email">Email:</label>
                                            <input type="text" class="form-control" id="email" wire:model="email">

                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="phone">Phone:</label>
                                            <input type="text" class="form-control" id="phone" wire:model="phone">

                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Address:</label>
                                            <textarea class="form-control" rows="3" style="line-height: 22px;"
                                                wire:model="address">
                                            37 Cardinal Lane
                                            Petersburg, VA 23803
                                            United States of America
                                            Zip Code: 85001
                                            </textarea>

                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="favicon">Fav icon :</label>
                                            <input type="file" class="form-control" id="favicon" wire:model="favicon">

                                            @error('favicon')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="logo">Logo:</label>
                                            <input type="file" class="form-control" id="logo" wire:model="logo">

                                            @error('logo')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="cpass">Current Password:</label>
                                        <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                        <input type="Password" class="form-control" id="cpass" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="npass">New Password:</label>
                                        <input type="Password" class="form-control" id="npass" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vpass">Verify Password:</label>
                                        <input type="Password" class="form-control" id="vpass" value="">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Email and SMS</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                        <div class="col-md-9 custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="emailnotification"
                                                checked="">
                                            <label class="custom-control-label" for="emailnotification"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                                        <div class="col-md-9 custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="smsnotification"
                                                checked="">
                                            <label class="custom-control-label" for="smsnotification"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3" for="npass">When To Email</label>
                                        <div class="col-md-9">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email01">
                                                <label class="custom-control-label" for="email01">You have new
                                                    notifications.</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email02">
                                                <label class="custom-control-label" for="email02">You're sent a
                                                    direct message</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email03"
                                                    checked="">
                                                <label class="custom-control-label" for="email03">Someone adds you as
                                                    a connection</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                        <div class="col-md-9">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email04">
                                                <label class="custom-control-label" for="email04"> Upon new
                                                    order.</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email05">
                                                <label class="custom-control-label" for="email05"> New membership
                                                    approval</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email06"
                                                    checked="">
                                                <label class="custom-control-label" for="email06"> Member
                                                    registration</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
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
                                        <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" id="email" value="Barryjone@demo.com">
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
