@extends('base.base')
@section('container')
    <div style="display:none">{{ $total = 0 }}</div>
    <h1>Transaction Detail</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Item Name</th>
                <th class="col">Item Detail</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
            </tr>
            <tbody>       
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $transactions->product->name }}</td>
                    <td>{{ $transactions->product->description }}</td>
                    <td>{{ $transactions->product->price }}</td>
                    <td>{{ $transactions->quantity }}</td>
                    <td>{{ $transactions->product->price * $transactions->quantity }}</td>
                    <div style="display: none">{{ $total +=  $transactions->product->price * $transactions->quantity}}</div>
                </tr>
            </tbody>
        </thead>
    </table>
    <div class="container-fluid text-end">
        <h3>Grand Total: {{ $total }}</h3>
    </div>
@endsection