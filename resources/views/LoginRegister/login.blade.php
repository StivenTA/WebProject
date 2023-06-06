@extends('base.base')

@section('container')
<div class="row justify-content-center">
   <div class="col-md-4">

       @if (session()->has('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('success') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

               </button>
           </div>
       @endif
       
       @if (session()->has('loginError'))
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
               {{ session('loginError') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

               </button>
           </div>
       @endif

       <main class="form-signin">
           <form action="/login" method="POST">
               @csrf
               <h1 class="h3 mb-3 fw-normal">Sign in</h1>
   
               <div class="form-floating">
                   <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ Cookie::get('email') }}">
                   <label for="email">Email address</label>
                   @error('email')
                       <div class="invalid-feedback">
                           {{ $message }}
                       </div>
                   @enderror
               </div>
               <div class="form-floating">
                   <input type="password" name="password" class="form-control" id="password" placeholder="Password" required value="{{ Cookie::get('password') }}">
                   <label for="password">Password</label>
               </div>
   
               <div class="checkbox mb-3">
                   <label>
                       <input type="checkbox" value="rememberme" name="rememberme" id="rememberme"> Remember me
                   </label>
               </div>
               <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
               <p>Don't have an account? <a href="/register">Register here</a></p>
           </form>
       </main>
   </div>
</div>
@endsection
