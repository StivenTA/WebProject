<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="https://www.youtube.com/embed/aCgP8BFjrw4?start=0">MbWebCenter</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown" style="margin-right: 10px;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/search">Search Product</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto" style="margin-right: 10px;">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @can('customer')
                  <li><a class="dropdown-item" href="/update">Update Profile</a></li>
                  <li><a class="dropdown-item" href="/transaction">Transaction</a></li>
                  <li><a class="dropdown-item" href="/cart">Cart</a></li>
                @endcan
                @can('admin')
                  <li><a class="dropdown-item" href="/insert">Insert Product</a></li>
                  <li><a class="dropdown-item" href="/user">User Page</a></li>
                @endcan
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"> Logout </button>
                  </form>
                </li>
              </ul>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>