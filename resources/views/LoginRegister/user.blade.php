@extends('base.base')
@section('container')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

        </button>
    </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Username</th>      
        </tr>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>
                        <form action="/user/{{ $user->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn bg-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </thead>
</table>
@endsection