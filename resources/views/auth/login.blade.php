@extends('layouts.guest')

@section('content')
<div class="card">
    <div class="card-header text-center bg-navy" style="background: url('images/polkadot.png') right;opacity: 0.9;position: cover;background-size: 60%;100%;background-repeat: no-repeat">
        <img src="images/logo.png" alt="" style="width: 100px"><br>
        <label style="font-size: 18px">KOPERASI KARYAWAN <br>
            JAMAAH INSAN MULIA</label>
    </div>
    <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan masuk untuk memulai sesi Anda</p>

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" id="password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPassword" name="checkboxPassword">
                        <label for="checkboxPassword">
                            {{ __('Show Password') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
        </form>
        <br>
        @if (Route::has('password.request'))
        <p class="mb-1">
            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>

        </p>
        @endif
    </div>
    <!-- /.login-card-body -->
    @endsection

    @section ('scripts')
    <script>
    $(document).ready(function() {
        $('#checkboxPassword').on('change', function() {
            $('#password').attr('type', $('#checkboxPassword').prop('checked') == true ? "text" : "password");
        });
    });
</script>
@endsection