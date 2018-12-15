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
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Daftar dengan kredensial</small>
              </div>
              <form method="POST" action="{{ route('register') }}">
                  @csrf
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input id="name" type="text" placeholder="Nama" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input id="email" type="email" placeholder="Surel" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password-confirm" placeholder="Konfirmasi Password" type="password" class="form-control" name="password_confirmation" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <p>Daftar sebagai</p>
                  <div class="row">
                    <div class="custom-control custom-radio mb-3 col-md-4">
                      <input name="user_type" class="custom-control-input" id="customRadio1" type="radio" value="Relawan">
                      <label class="custom-control-label" for="customRadio1">
                        <span>Relawan</span>
                      </label>
                    </div>
                    <div class="custom-control custom-radio mb-3 col-md-4">
                      <input name="user_type" class="custom-control-input" id="customRadio2" type="radio" value="Donatur">
                      <label class="custom-control-label" for="customRadio2">
                        <span>Donatur</span>
                      </label>
                    </div>
                  </div>

                </div>
                <!-- <div class="text-muted font-italic">
                  <small>password strength:
                    <span class="text-success font-weight-700">strong</span>
                  </small>
                </div> -->

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Register') }}
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
            <!-- <div class="card-header bg-white pb-5">
              <div class="text-muted text-center mb-3">
                <small>Atau dengan akun</small>
              </div>
              <div class="text-center">
                <a href="#" class="btn btn-neutral btn-icon mr-4">
                  <span class="btn-inner--icon">
                    <img src="../img/icons/common/github.svg">
                  </span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon">
                    <img src="../img/icons/common/google.svg">
                  </span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div> -->
          </div>
          <div class="row mt-3">
            <div class="col-12 text-center">
              <a href="../login" class="text-light">
                <small>Sudah memiliki akun?</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection
