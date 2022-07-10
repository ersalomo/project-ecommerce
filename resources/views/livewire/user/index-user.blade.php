<div class="table-responsive container">
    <table class="table table-vcenter">
        <thead>
            <tr>
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
                    <td class="text-muted"><a href="#" class="text-reset">{{ $user->email }}</a></td>
                    <td class="text-muted">{{ $user->username }}</td>
                    <td class="font-italic">{{ $user->email_verified_At == null ? 'Not verified yet' : 'Verified' }}
                    </td>
                    <td>{{ $user->address }}</td>
                    <td><a href="" class="btn btn-outline-warning"><i class=""></i>Edit</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
