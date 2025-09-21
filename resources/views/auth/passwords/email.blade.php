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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="form-group row">            
                                <div class="col-md-12">
                                    @if(app()->getLocale() == 'en')
                                        <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @else
                                        <input id="email" placeholder="البريد الالكتروني" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @endif
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    @if(app()->getLocale() == 'en')
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-success">
                                            {{ __('إرسال رابط إعادة تعيين كلمة السر') }}
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
