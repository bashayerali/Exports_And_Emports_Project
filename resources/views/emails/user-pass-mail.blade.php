@component('mail::message')

كلمة المرور 
{{$Password}}
<br>
للحساب المسجل بالبريد
{{$Email}}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
LOG IN 
@endcomponent

Thanks<br>
@endcomponent
