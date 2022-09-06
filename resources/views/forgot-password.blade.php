@extends('layouts.gustLayout')
@section('title'," إعادة تعيين كلمة المرور")

@section('content')


<div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <br><br>

                        <h1 class="">إعادة تعيين كلمة المرور</h1>
                        <p class="signup-link">أدخل عنوان البريد الإلكتروني وسنرسل لك رسالة إلكترونية تحتوي على إرشادات لإعادة تعيين كلمة المرور.
                        </p>


                        @if ($errors->any())

<ul class="mt-3 list-disc list-inside text-sm text-red-600">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@endif

@if (session('status'))
                      <div class="mb-4 font-medium text-sm text-green-600">
                       تم إرسال الرابط إلى بريدك 
                      </div>
                      @endif
                      
                        <form class="text-left" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form">
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="text" class="form-control" value="{{old('email')}}" placeholder="Email"   autofocus>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value=""> إعادة تعيين كلمة المرور</button>
                                    </div>                                    
                                </div>

                            </div>
                        </form>                        
                        <p class="terms-conditions">eximpo ©️ 2022. جميع الحقوق محفوظة.</p>

                    </div>                    
                </div>
            </div>
        </div>
        <!--
        <div class="form-image">
            <div class="l-image">
            </div>
        </div> -->
    </div>



 @endsection
