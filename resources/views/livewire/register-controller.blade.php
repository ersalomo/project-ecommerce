<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-12 col">
                    <div class="wrap d-md-flex">
                        <div class="login-wrap p-3 p-md-3 card m-auto" style="min-width:430px">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-2 text-center">Register</h3>
                                </div>
                            </div>
                            <form wire:submit.prevent="registerHandler()" method="post"
                                class="signin-form form-fieldset">

                                <div class="form-group mb-3">
                                    <label class="label" for="name">Fullname</label>
                                    <input type="text" wire:model="fullName"
                                        class="form-control  @error('fullName') is-invalid @enderror"
                                        placeholder="Enter fullname...">
                                    <div class="invalid-feedback help-block">
                                        @error('fullName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @else
                                            <span class="text-danger is-valid">mantap</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="email" wire:model="email"
                                        class="form-control @error('email') is-invalid @enderror"
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
                                            class="form-control  @error('username') is-invalid @enderror"
                                            {{-- class="form-control {{ Session::get('username') ? 'is-invalid' : 'is-valid' }}" --}} placeholder="username...">
                                        <div class="invalid-feedback">
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="name">Address</label>
                                        <input type="text" wire:model="address"
                                            class="form-control  @error('address') is-invalid @enderror"
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
                                            class="form-control  @error('address') is-invalid @enderror"placeholder="password...">
                                        <div class="invalid-feedback">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="label" for="password">Repeat Password</label>
                                        <input type="password" wire:model="repeated_password"
                                            class="form-control  @error('repeated_password') is-invalid @enderror"
                                            placeholder="repeat password...">
                                        <div class="invalid-feedback">
                                            @error('repeated_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <button
                                            type="submit"class="form-control btn btn-primary rounded submit px-3">Register
                                            now</button>
                                    </div>
                                    <div class="form-group d-md-flex">
                                        <div class="w-50 text-left">
                                            <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="w-50 text-md-right">
                                            <a href="register#">Forgot Password</a>
                                        </div>
                                    </div>
                            </form>
                            <p class="text-center">I have an account
                                <a data-toggle="tab" href="{{ route('login') }}">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
