@extends('base.base')
@section('container')
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

        </button>
    </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mt-1">
                    <div class="card">
                        @if ($product->image)
                        <div style="max-height: 500px; overflow:hidden">
                            <img src="{{ asset('storage/'. $product->image) }}" alt="...">
                        </div>
                        @else
                            <img src="https://source.unsplash.com/500x400/?{{ $product->category }}" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            @can('admin')
                                <a href="/product/update/{{ $product->id }}" class="btn btn-primary bg-danger">Update Product</a>
                            @endcan
                            <a href="/product/{{ $product->id }}" class="btn btn-primary">Product Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach            
        </div>
    </div>
    {{ $products->links() }}
@endsection