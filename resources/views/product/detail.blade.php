@extends('base.base')
@section('container')
    @if (session()->has('quantityError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('quantityError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                @if ($products->image)
                    <div style="max-height: 600px; overflow:hidden">
                        <img src="{{ asset('storage/'. $products->image) }}" alt="...">
                    </div>
                @else
                    <img src="https://source.unsplash.com/500x400/?{{ $products->category }}" alt="...">
                @endif
            </div>
            <div class="col">
                <h2>{{ $products->name }}</h2>
                <p>Description : <br> {{ $products->description }}</p>
                <p>Stock : <br> {{ $products->stocks }} piece(s)</p>
                <p>Price : <br> Rp {{ $products->price }},-</p>
                @can('customer')
                    <h2 class="mt-5">Add To Cart</h2>
                    <form action="/product/{{ $products->id }}" method="post">
                        @csrf
                        <p>Quantity: <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Quantity" required value="{{ old('quantity') }}"></p>
                        @error('quantity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
@endsection