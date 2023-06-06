@extends('base.base')
@section('container')
    <div class="row mt-4">
        <div class="col-md-12">
            <form action="/search" method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif 
                <div class="input-group mb-3">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                        <span class="visually-hidden">Category</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/search?category=Animal">Animal</a></li>
                        <li><a class="dropdown-item" href="/search?category=Vegetable">Vegetable</a></li>
                        <li><a class="dropdown-item" href="/search?category=Fruit">Fruit</a></li>
                        <li><a class="dropdown-item" href="/search?category=Mushroom">Mushroom</a></li>
                    </ul>
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>
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