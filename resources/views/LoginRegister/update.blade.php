@extends('base.base')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <main class="form-register">
                <form action="/update" method="post">
                    @method('put')
                    @csrf
                     <h1 class="h3 mb-3 fw-normal">Update Profile</h1>
                     <div class="form-floating">
                         <input type="name" name="name" class="form-control @error('name') is-invalid @enderror mt-2" id="name" placeholder="name@example.com" required value="{{ old('name') }}">
                         <label for="name">User Name</label>
                         @error('name')
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
