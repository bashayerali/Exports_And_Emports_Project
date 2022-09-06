@extends('layouts.gustLayout')
@section('title',"تسجيل الدخول")

@section('content')


    
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
<br><br><br><br>
                        <h1 class="">سجل دخول الى <a href="index.html"><span class="brand-name">eximpo</span></a></h1>
                        @if ($errors->any())

<ul class="mt-3 list-disc list-inside text-sm text-red-600">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@endif
                        <form class="text-left" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="email" type="email" value="{{old('email')}}" class="form-control" placeholder="اسم المستخدم">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="كلمة السر">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">أظهر كلمة المرور</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">تسجيل الدخول</button>
                                    </div>
                                    
                                </div>

                            

                                <div class="field-wrapper">
 @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-pass-link">هل نسيت كلمة المرور؟</a>
                                        @endif                                </div>

                            </div>
                        </form>                        
                        <p class="terms-conditions">eximpo ©️ 2022. جميع الحقوق محفوظة.</p>

                    </div>                    
                </div>
            </div>
        </div>
        
        <div class="form-image">
        <img src="assets/img/eximport.svg" >
    </div>  
</div>

@endsection
