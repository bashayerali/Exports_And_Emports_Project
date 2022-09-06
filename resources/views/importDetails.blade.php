
@extends( (Auth::user()->role=='admin') ? 'layouts.adminLayout' : 'layouts.employeeLayout')
@section('title',"تفاصيل المعاملةالواردة")
@section('content')

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <br>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="row layout-top-spacing">
                   

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            
<div class="widget-content widget-content-area br-6">
<div class="row">
<div class="media">
                                        

                                        <div class="media-body mx-3">
                                            <h4 class="media-heading"><span class="media-title"> رقم المعاملة</span>
                                            </h4>
                                            <p class="media-text">{{$im->num}}</p>
                                        </div>

                                       
                                        </div>

                                    </div>
                                     <div class="row">

                                    <div class="media">

                                    <div class="media-body mx-3">
                                            <h4 class="media-heading"><span class="media-title"> عنوان المعاملة</span>
                                            </h4>
                                            <p class="media-text">{{$im->title}}</p>
                                        </div>

                                    </div>
                                    </div>
                                    
                                    <div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> تاريخ إرسال المعاملة</span>
        </h4>
        <p class="media-text">{{$im->date}}</p>
    </div>

</div>
</div>

                                    <div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> تفاصيل المعاملة</span>
        </h4>
        <p class="media-text">{{$im->notes}}</p>
    </div>

</div>
</div>

<div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> حالة المعاملة</span>
        </h4>
        <p class="media-text">{{$im->status}}</p>
    </div>

</div>
</div>


<div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> المعاملة مرسلة من قسم</span>
        </h4>
        <p class="media-text">{{$im->d->name}}</p>
    </div>

</div>
</div>


@if(Auth::user()->role=='admin')
<div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title">المعاملة مرسلة إلى قسم</span>
        </h4>
        <p class="media-text">{{$im->d1->name}}</p>
    </div>

</div>
</div>
@endif
<div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> اسم الموظف المُرسِل</span>
        </h4>
        <p class="media-text">{{$im->sender_name}}</p>
    </div>

</div>
</div>


<hr>
<h3> تفاصيل الرد على المعاملة الواردة</h3>
<div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> ملاحظات</span>
        </h4>
        <p class="media-text">{{$im->im->comment}}</p>
    </div>

</div>
</div>
<div class="row">

<div class="media">


<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> اسم الموظف</span>
        </h4>
        <p class="media-text">{{$im->im->receiver_name}}</p>
    </div>

</div>
</div>

<div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> تاريخ الرد على المعاملة</span>
        </h4>
        <p class="media-text">{{$im->im->received_date}}</p>
    </div>

</div>
</div>


</div>

</div>


 </div>

  </div>
</div>

@endsection
