
@extends('base')
@section('content')


<main>
    <!-- section -->
    <section class="my-lg-14 my-8">
      <div class="container">
        <!-- row -->
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
            <!-- img -->
            <img src="../assets/images/svg-graphics/signin-g.svg" alt="" class="img-fluid">
          </div>
          <!-- col -->
          <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
            <div class="mb-lg-9 mb-5">
              <h1 class="mb-1 h2 fw-bold">Sign in to FreshCart</h1>
              <p>Welcome back to FreshCart! Enter your email to get started.</p>
            </div>

            <form method="post" action="{{ route('login') }}">
            @csrf
              <div class="row g-3">
                <!-- row -->

                <div class="col-12">
                  <!-- input -->
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="inputEmail4" placeholder="Email" required>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="col-12">
                  <!-- input -->
                  <div class="password-field position-relative">
                    <input type="password" id="fakePassword" name="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" required>
                    <span><i id="passwordToggler" class="bi bi-eye-slash"></i></span>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>

                </div>
                <div class="d-flex justify-content-between">
                  <!-- form check -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember_token" value="" id="flexCheckDefault">
                    <!-- label --> <label class="form-check-label" for="flexCheckDefault">
                      Remember me
                    </label>
                  </div>
                  <div> Forgot password? <a href="{{ route('pages.forgot-password') }}">Reset It</a></div>
                </div>
                <!-- btn -->
                <div class="col-12 d-grid"> <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
                <!-- link -->
                <div>Don’t have an account? <a href="{{ route('register') }}"> Sign Up</a></div>
                
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </main>



@endsection 