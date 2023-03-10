<!-- Bootstrap Link Css -->
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<!-- Bootstrap Start Header -->
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Curriculum</a></li>
          <li><a href="{{ route('students.index') }}" class="nav-link px-2 text-white">Students</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Teacher</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About Us</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search" aria-label="Search">
        </form>

        <div class="text-end">
          <a href="{{ route('login') }}" type="button" class="btn btn-outline-light me-2">Login</a>
        </div>
      </div>
    </div>
  </header>
<!-- Bootstrap End Header -->

@yield('content')