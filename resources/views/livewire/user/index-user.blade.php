<div class="table-responsive container">
    <table class="table table-center">
        <thead>
            <tr class="">
                <th>#</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Email Verified</th>
                <th>Alamat</th>
                <th></th>
                <th class="w-1"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <th>
                        <img src="{{ strval($user->picture) > 0 ? asset('image/products/' . $user->picture) : asset('image/users/anonymous_user.jpg') }}"
                            alt="" style="width:80px">
                    </th>
                    <td>{{ $user->name }}</td>
                    <td class=""><a href="#" class="text-reset">{{ $user->email }}</a></td>
                    <td class="">{{ $user->username }}</td>
                    <td class="">
                        <cite>
                            <strong>

                                {{ $user->email_verified_At == null ? 'Not verified yet' : 'Verified' }}
                            </strong>
                        </cite>
                    </td>
                    <td>{{ $user->address }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
