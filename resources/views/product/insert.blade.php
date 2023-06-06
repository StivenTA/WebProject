@extends('base.base')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <main class="form-register">
                <form action="/insert" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Insert Product</h1>
                    <div class="input-group mb-3">
                        <select class="form-select @error('category') is-invalid @enderror mt-2" id="category" name="category">
                            <option value="animal">Animal</option>
                            <option value="vegetable">Vegetable</option>
                            <option value="fruit">Fruit</option>
                            <option value="mushroom">Mushroom</option>
                        </select>
                    </div>     
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Title" required value="{{ old('name') }}">
                        <label for="name">Title</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror mt-2" id="description" placeholder="name@example.com" required value="{{ old('description') }}">
                        <label for="description">Description</label>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror mt-2" id="price" placeholder="price" required >
                        <label for="price">Price</label>
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="stocks" class="form-control @error('stocks') is-invalid @enderror mt-2" id="stocks" placeholder="Stocks" required>
                        <label for="stocks">Stocks</label>
                        @error('stocks')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
                </form>
            </main>
        </div>
    </div>   
@endsection