<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login #04</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img"
                            style="background-image: url({{ asset('bootstrap/asset/register-gbr.jpg') }});">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form wire:submit.prevent="registerHandler()" method="post" class="signin-form">

                                <div class="form-group mb-3">
                                    <label class="label" for="name">Fullname</label>
                                    <input type="text" wire:model="fullName"
                                        class="form-control  @error('fullName') is-invalid @enderror is-valid"
                                        placeholder="fullname...">
                                    <div class="invalid-feedback help-block">
                                        @error('fullName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="email" wire:model="email"
                                        class="form-control @error('email') is-invalid @enderror is-valid"
                                        {{ $errors->has('email') ? ' is-invalid' : 'is-valid' }}
                                        placeholder=" email...">
                                    {{-- <span class="">Please correct the error</span> --}}
                                    <div class="invalid-feedback help-block">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="label" for="name">Username</label>
                                        <input type="text" wire:model="username"
                                            class="form-control  @error('username') is-invalid @enderror is-valid"
                                            {{-- class="form-control {{ Session::get('username') ? 'is-invalid' : 'is-valid' }}" --}} placeholder="username...">
                                        <div class="invalid-feedback">
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="name">Address</label>
                                        <input type="text" wire:model="address" class="form-control "
                                            {{ $errors->has('address') ? ' is-invalid' : 'is-valid' }}
                                            placeholder="address...">
                                        <div class="invalid-feedback">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="password">Password</label>
                                        <input type="password" wire:model="password"
                                            class="form-control {{ !Session::get('password') ?? 'is-valid' }}"
                                            placeholder="password...">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="password">Repeat Password</label>
                                        <input type="password" wire:model="repeated_password"
                                            class="form-control  @error('repeated_password')  @enderror"
                                            placeholder="repeat password...">

                                        @error('repeated_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                            class="form-control btn btn-primary rounded submit px-3">Sign
                                            In</button>
                                    </div>
                                    <div class="form-group d-md-flex">
                                        <div class="w-50 text-left">
                                            <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                                <input type="checkbox" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="w-50 text-md-right">
                                            <a href="#">Forgot Password</a>
                                        </div>
                                    </div>
                            </form>

                            <p class="text-center">I have an account <a data-toggle="tab"
                                    href="{{ route('login') }}">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
