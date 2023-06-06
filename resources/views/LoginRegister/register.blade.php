@extends('base.base')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <main class="form-register">
                <form action="/register" method="post">
                    @csrf
                     <h1 class="h3 mb-3 fw-normal">Register</h1>
                     <div class="form-floating">
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                         <label for="name">Name</label>
                         @error('name')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>
                     <div class="form-floating">
                         <input type="email" name="email" class="form-control @error('email') is-invalid @enderror mt-2" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                         <label for="email">E-mail address</label>
                         @error('email')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>
                     <div class="form-floating">
                         <input type="password" name="password" class="form-control @error('password') is-invalid @enderror mt-2" id="password" placeholder="Password" required >
                         <label for="password">Password</label>
                         @error('password')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>
                     <div class="form-floating">
                         <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror mt-2" id="password_confirmation" placeholder="Confirm Password" required>
                         <label for="password_confirmation">Confirm Password</label>
                         @error('password')
                             <div class="invalid-feedback">
                                 {{ $message }}
                             </div>
                         @enderror
                     </div>
                     <div class="input-group mb-3">
                         <select class="form-select @error('gender') is-invalid @enderror mt-2" id="gender" name="gender">
                             <option value="male">Male</option>
                             <option value="female">Female</option>
                         </select>
                     </div>         
                     <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
            </main>
        </div>
    </div>
@endsection
