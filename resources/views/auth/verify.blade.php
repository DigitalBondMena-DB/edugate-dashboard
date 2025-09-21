@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EGEC | Email Verification
    @else
        EGEC | تأكيد بواسطة البريد الالكتروني
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
                        <div class="card-header">Email Verification</div>
                    @else
                        <div class="card-header text-right">تأكيد بواسطة البريد الالكتروني</div>
                    @endif
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                @if(app()->getLocale() == 'en')
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                @else
                                    {{ __('تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.') }}
                                @endif
                            </div>
                        @endif
    
                        @if(app()->getLocale() == 'en')
                            <h4 style="color: black">
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }}, 
                                <a style="color: #3db166" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                            </h4>
                        @else
                            <h4 style="color: black">
                                {{ __('قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق.') }}
                                {{ __('إذا لم تستلم البريد الإلكتروني') }}, 
                                <a style="color: #3db166" href="{{ route('verification.resend') }}">{{ __('انقر هنا لطلب آخر') }}</a>.
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.layouts.footer-fixed')

@endsection
