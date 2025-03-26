@extends('layouts.app')
@section('content')
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;700&display=swap" rel="stylesheet">

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4" style="
            font-family: IBM Plex Sans Thai;
            IBM Plex Sans list-style: thai;
        ">
                <h1 style="margin-bottom: 30px;text-align: center;">
                    <img src="img/single_page_logo.png" alt="logo" style="text-align: center;max-width: 100%;height: auto;">
                </h1>

                <p class="text-muted">{{ trans('global.login') }}</p>

                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                {{ trans('global.remember_me') }}
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary px-4">
                                {{ trans('global.login') }}
                            </button>
                        </div>
                        <div class="col-6 text-right">
                            @if(Route::has('password.request'))
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                    {{ trans('global.forgot_password') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- ปุ่มสมัครบัญชีใหม่ อยู่แยกออกมาใต้ฟอร์ม -->
                    @if(Route::has('register'))
                    <div class="text-center mt-3">
                        <span style="color: gray; font-weight: 300;">ยังไม่มีบัญชี?</span>
                        <a class="fw-bold text-decoration-underline" href="http://localhost:8080/register" style="color: rgb(39, 164, 209);">
                            สมัครเลย
                        </a>
                    </div>
                @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
