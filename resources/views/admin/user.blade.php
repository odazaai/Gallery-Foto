@extends('layout.app')

@section('content')
    @include('admin.navadmin')

    <div class="container mt-3">
        <h3 class="mb-5">
            <center>User List</center>
        </h3>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                        <td>
                            <form action="{{ url('admin/' . $user->id . '/delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user?')"
                                    style="border-radius: 15%"><i class="fa-regular fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
@endsection
