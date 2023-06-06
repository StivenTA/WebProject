@extends('base.base')
@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
        </div>
    @endif
    <h1>Transaction</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Transaction Time</th>
                <th scope="col">Detail Transaction</th>
            </tr>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transaction->transaction_time }}</td>
                        <td>
                            <a href="/detail/{{ $transaction->transaction_time }}" class="btn btn-primary"> Check Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>
@endsection