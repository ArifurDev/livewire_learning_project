<div>
    <!-- loader Start -->
<div i
d="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->

<div class="wrapper">
<section class="login-content">
   <div class="container">
      <div class="row align-items-center justify-content-center height-self-center">
         <div class="col-lg-8">
            <div class="card auth-card">
               <div class="card-body p-0">
                  <div class="d-flex align-items-center auth-content">
                     <div class="col-lg-7 align-self-center">
                        <div class="p-3">
                           <h2 class="mb-2">Sign In</h2>
                           <p>Login to stay connected.</p>
                           <form wire:submit.prevent="login">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                       <input class="floating-input form-control " type="email" placeholder=" " wire:model="email">
                                       <label>Email</label>
                                       @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                       <input class="floating-input form-control" type="password" placeholder=" " wire:model="password">
                                       <label>Password</label>
                                       @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="custom-control custom-checkbox mb-3">
                                       <input type="checkbox" class="custom-control-input" id="customCheck1" wire:model="remember">
                                       <label class="custom-control-label control-label-1" for="customCheck1">Remember Me</label>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <a href="auth-recoverpw.html" class="text-primary float-right">Forgot Password?</a>
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-primary">Sign In</button>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-5 content-right">
                        <img src="{{ asset('backend/assets') }}/images/login/01.png" class="img-fluid image-right" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
</div>

</div>
