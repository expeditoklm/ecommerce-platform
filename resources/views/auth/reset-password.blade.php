@extends('base')
@section('content')

<main>
    <section class="my-lg-14 my-8">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
            <!-- Image illustration -->
            <img src="{{ asset('assets/images/svg-graphics/fp-g.svg') }}" alt="" class="img-fluid">
          </div>
          <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1 d-flex align-items-center">
            <div>
              <div class="mb-lg-9 mb-5">
                <h1 class="mb-2 h2 fw-bold">Reset your password</h1>
                <p>Please enter your email address and your new password to reset your account password.</p>
              </div>

              <!-- Messages de succès -->
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
              @endif

              <!-- Messages d'erreur -->
              @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="row g-3">
                  <!-- Email Address -->
                  <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="email" 
                           name="email"
                           placeholder="Enter your email" 
                           value="{{ old('email', $request->email) }}"
                           required 
                           autofocus>
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <!-- Password -->
                  <div class="col-12">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" 
                           name="password"
                           placeholder="Enter new password" 
                           required>
                    @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <!-- Confirm Password -->
                  <div class="col-12">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" 
                           class="form-control @error('password_confirmation') is-invalid @enderror" 
                           id="password_confirmation" 
                           name="password_confirmation"
                           placeholder="Confirm new password" 
                           required>
                    @error('password_confirmation')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <!-- Buttons -->
                  <div class="col-12 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                    <a href="{{ route('login') }}" class="btn btn-light">Back to Login</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

@endsection