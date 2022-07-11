<div class="container-xl px-4 mt-4 user-profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2"
                        src="{{ strval($user->picture) > 1 ? asset('image/users/' . $user->picture) : asset('image/users/anonymous_user.jpg') }}"
                        alt="">
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <input type="file" name="file" id="changeAuthorPictureFile" class="d-none"
                        onchange="this.dispatchEvent(new InputEvent('input'))">
                    <a href="#" class="btn btn-primary"
                        onclick="event.preventDefault();document.getElementById('changeAuthorPictureFile'). click();">
                        Change Picture
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form action="{{ route('uploadProfile') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                other users on the site)</label>
                            <input class="form-control" id="inputUsername" type="text"
                                placeholder="Enter your username" name="username"
                                value="{{ Auth::user()->username }}">
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="Enter your first name" name="name"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="Enter your last name" value="-">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Email</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter your email address" name="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Address</label>
                                <input class="form-control" id="inputLocation" type="text"
                                    placeholder="Enter your location" name="address"
                                    value="{{ Auth::user()->address }}">
                            </div>
                        </div>
                        <button id="btnUpdate" class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $("#changeAuthorPictureFile").ijaboCropTool({
            preview: '',
            setRatio: 1,
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['CROP', 'QUIT'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: "{{ route('changeImage') }}",
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onSuccess: function(message, element, status) {
                Livewire.emit('UpdaProfileUser');
                toastr.success(message)
            },
            onError: function(message, element, status) {
                toastr.error(message)
            }
        });
    </script>
@endpush
