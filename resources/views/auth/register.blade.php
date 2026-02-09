@extends('base')
@section('content')




<main>
  <!-- section -->

  <section class="my-lg-14 my-8">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
          <!-- img -->
          <img src="../assets/images/svg-graphics/signup-g.svg" alt="" class="img-fluid">
        </div>
        <!-- col -->
        <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="mb-lg-9 mb-5">
            <h1 class="mb-1 h2 fw-bold">Get Start Shopping</h1>
            <p>Welcome to FreshCart! Enter your email to get started.</p>
          </div>
          <!-- form -->
        <form method="post" action="{{ route('register') }}">
  @csrf
  <div class="row g-3">
    <div class="col">
      <input type="text" class="form-control" name="name" 
             value="{{ old('name') }}" 
             placeholder="First name" required>
    </div>

    <div class="col">
      <input type="text" class="form-control" name="surname" 
             value="{{ old('surname') }}" 
             placeholder="Last name" required>
    </div>

    <div class="col-12">
      <input type="email" class="form-control" name="email" 
             value="{{ old('email') }}" 
             id="inputEmail4" placeholder="Email" required>
    </div>

    <div class="col-12">
      <div class="password-field position-relative">
        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
      </div>
    </div>

    <div class="col-12">
      <div class="password-field position-relative">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
      </div>
    </div>

    <div class="col-12 d-grid">
      <button type="submit" class="btn btn-primary">Register</button>
    </div>
  </div>
</form>
        </div>
      </div>
    </div>


  </section>
</main>


@endsection