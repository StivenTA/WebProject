@extends('base.base')
@section('container')
    <div style="display:none">{{ $total = 0 }}</div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
        </div>
    @endif
    <h1>Cart</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Item Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Delete</th>
            </tr>
            <tbody>
                @foreach ($transactions as $transaction)  
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{ $transaction->product->price }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->product->price * $transaction->quantity }}</td>
                        <div style="display: none">{{ $total +=  $transaction->product->price * $transaction->quantity}}</div>
                        <td>
                            <form action="/cart/{{ $transaction->id }}" method="POST">
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
    <div class="container-fluid text-end">
        <h3>Grand Total: {{ $total }}</h3>
    </div>
    <div class="d-flex justify-content-end">
        @if(auth()->user()->transactions->contains('payed', 1))
            <form action="/transaction/{{ auth()->user()->id}}" method="POST">
                @method('put')
                @csrf
                <button class="btn btn-primary">Check Out</button>
            </form>
        @else
            <button class="btn btn-primary" disabled>Check Out</button>
        @endif
    </div>
@endsection