@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EGEC | Reset Password
    @else
        EGEC | اعادة تعيين كلمة المرور
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

        <div class="container">
            <div class="row justify-content-center align-items-center min-height-responsive my-4">
                <div class="col-md-8">
                    <div class="card">
                        @if(app()->getLocale() == 'en')
                            <div class="card-header">Reset Password</div>
                        @else
                            <div class="card-header text-right">إعادة تعيين كلمة المرور</div>
                        @endif
                        
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row">            
                                    <div class="col-md-12">
                                        @if(app()->getLocale() == 'en')
                                            <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                        @else
                                            <input id="email" placeholder="البريد الالكتروني" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                        @endif

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">            
                                    <div class="col-md-12">
                                        @if(app()->getLocale() == 'en')
                                            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @else
                                            <input id="password" placeholder="كلمة المرور" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @endif
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">            
                                    <div class="col-md-12">
                                        @if(app()->getLocale() == 'en')
                                            <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        @else
                                            <input id="password-confirm" placeholder="تاكيد كلمة المرور" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        @if(app()->getLocale() == 'en')
                                            <button type="submit" class="btn btn-success">
                                                {{ __('Reset Password') }}
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-success">
                                                {{ __('إعادة تعيين كلمة المرور') }}
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include('frontend.layouts.footer-fixed')

@endsection
