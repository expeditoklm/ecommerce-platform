@extends('base')
@section('content')

<main>
    <section class="my-lg-14 my-8">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
            <img src="../assets/images/svg-graphics/fp-g.svg" alt="" class="img-fluid">
          </div>
          <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1 d-flex align-items-center">
            <div>
              <div class="mb-lg-9 mb-5">
                <h1 class="mb-2 h2 fw-bold">Forgot your password?</h1>
                <p>Please enter the email address associated with your account and We will email you a link to reset
                  your password.</p>
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
                  @foreach ($errors->all() as $error)
                    {{ $error }}
                  @endforeach
                </div>
              @endif

              <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row g-3">
                  <div class="col-12">
                    <input type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="inputEmail4" 
                           name="email"
                           placeholder="Email" 
                           value="{{ old('email') }}"
                           required>
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-12 d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                    <a href="{{ route('login') }}" class="btn btn-light">Back</a>
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