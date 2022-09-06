
@extends( (Auth::user()->role=='admin') ? 'layouts.adminLayout' : 'layouts.employeeLayout')
@section('title',"تحديث الملف الشخصي")
@section('content')
                     

        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
            <br>
            @if (session('status') == "profile-information-updated")
            <div class="alert alert-success">
               تم تحديث المعلومات الشخصية
            </div>
        @endif
                <div class="row layout-top-spacing">
                   

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

<div class="widget-content widget-content-area br-6">


   <div class="row">

    <div class="col-lg-6 col-12 mx-auto">
    <h4 class="">معلومات شخصية</h4>

        <form method="post" action="{{ route('user-profile-information.update') }}">
        
            @csrf
            @method('PUT')

         


            <div class="form-group">
            <label for="name" class="">اسم المستخدم</label>
                <input id="name" type="text" name="name"  value="{{ old('name', Auth::user()->name) }}"   class="form-control @error('name', 'updateProfileInformation') is-invalid @enderror" >
                @error('name', 'updateProfileInformation') 
                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                @enderror

                <label for="email" class="">البريد الإلكتروني</label>
                <input id="email" type="email"  name="email" value="{{old('email', Auth::user()->email)}}"   class="form-control @error('email', 'updateProfileInformation') is-invalid @enderror" >
                @error('email', 'updateProfileInformation') 
                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>

                 @enderror
                 <br>
                <button type="submit" class="btn btn-primary" value="">حفظ التغييرات</button>

            </div>
        </form>
    </div>                                        
   </div>


</div>


    
</div>


<!-- -->



<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
@if (session('status') == "password-updated")
            <div class="alert alert-success">
               تم تحديث كلمة المرور
            </div>
            @endif
<div class="widget-content widget-content-area br-6">

   <div class="row">
    <div class="col-lg-6 col-12 mx-auto">
    <h4 class="">تغيير كلمة المرور </h4>

        <form method="post" action="{{ route('user-password.update') }}">
        @method('PUT')
            @csrf

          

            <div class="form-group">
                <label for="current_password" class="">كلمة المرور الحالية</label>
                <input id="current_password" type="password" name="current_password"  class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" value="{{old('current_password')}}" >
                @error('current_password', 'updatePassword')                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
 @enderror

                <label for="" class="">كلمة المرور الجديدة</label>
                <input id="" type="password" name="password"  class="form-control @error('password', 'updatePassword') is-invalid @enderror" value="{{old('password')}}" >
                @error('password', 'updatePassword')                 <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
 @enderror

                <label for="" class=""> تأكيد كلمة المرور</label>
                <input id="" type="password" name="password_confirmation" value=""  class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" value="{{old('password_confirmation')}}" >
                @error('password_confirmation', 'updatePassword') 
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong> 
                                    </span>
 @enderror

 <br>
                <button type="submit" class="btn btn-primary" value="">حفظ التغييرات</button>
            </div>
        </form>
    </div>                                        
   </div>


</div>

</div>
</div>
</div>
 </div>
 @endsection




