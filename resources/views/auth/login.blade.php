@extends('auth.layout')

@section('content')
<main>
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 bg-gradient-default">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container pt-lg-md">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <center>
                    <p>{{ $message }}</p>
                  </center>
              </div>
          @endif
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Masuk dengan kredensial</small>
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input id="email" type="email" placeholder="Username" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <!-- <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    {{ __('Remember Me') }}
                  </label>
                </div> -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">
                      {{ __('Login') }}
                  </button>
                </div>
              </form>
            </div>
            <div class="card-header bg-white pb-5">
              <div class="text-muted text-center mb-3">
                <small>Sistem ini didukung oleh</small>
              </div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon">
                    <img src="../img/icons/common/bitbucket.svg">
                  </span>
                  <span class="btn-inner--text">Bitbucket</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon">
                    <img src="../img/icons/common/laravel.svg">
                  </span>
                  <span class="btn-inner--text">Laravel</span>
                </a>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <!-- <a href="../password/reset" class="text-light">
                <small>Lupa password?</small>
              </a> -->
            </div>
            <div class="col-6 text-right">
              <a href="../register" class="text-light">
                <small>Buat akun baru</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
