<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col">
                    <div class="wrap d-md-flex">
                        <div class="login-wrap py-3 px-2 p-md-7 card m-auto" style="min-width:430px">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h2 class="mb-2 text-center">Login User</h2>
                                </div>
                            </div>
                            <form wire:submit.prevent="loginHandler()" class="signin-form form-fieldset">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="text" wire:model="login_id" class="form-control"
                                        placeholder="Username">
                                    @error('login_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" wire:model="password" class="form-control"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Login</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 py-2 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <div class="w-100 text-md-right">
                                            <a href="login#!">Forgot Password</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Not Have an Account yes? <a data-toggle="tab"
                                    href="{{ route('register') }}">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
