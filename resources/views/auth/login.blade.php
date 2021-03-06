@extends('layouts.app')
@section('title')
{{ trans('auth.login') }}
@endsection
@section('content')
<div class="login">

    <div class="main-agileits">
            <div class="form-w3agile">
                <h3>{{ trans('auth.login') }}</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div> --}}


                        {{-- / --}}

                        <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="{{ old('name') }}"  name="name" class="@error('name') is-invalid @enderror" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" required="">
							<div class="clearfix"></div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password"  class="@error('password') is-invalid @enderror" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required autocomplete="current-password" required="">
							<div class="clearfix"></div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<input type="submit" value="{{ trans('auth.login') }}">
                        <div class="forg">
                            @if (Route::has('password.request'))
                                    <a class="forg-left" href="{{ route('password.request') }}">
                                        {{ trans('auth.forget_password') }}
                                    </a>
                                @endif
                            <a href="{{ route('register') }}" class="forg-right">{{ trans('auth.register') }}</a>
                            <div class="clearfix"></div>
                        </div>
                    </form>

                </div>
            </div>
</div>
@endsection
