
@extends( (Auth::user()->role=='admin') ? 'layouts.adminLayout' : 'layouts.employeeLayout')
@section('title',"الرد على المعاملة الواردة")
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
                                            <p class="media-text">{{$e->num}}</p>
                                        </div>

                                       
                                        </div>

                                    </div>
                                     <div class="row">

                                    <div class="media">

                                    <div class="media-body mx-3">
                                            <h4 class="media-heading"><span class="media-title"> عنوان المعاملة</span>
                                            </h4>
                                            <p class="media-text">{{$e->title}}</p>
                                        </div>

                                    </div>
                                    </div>
                                    

                                    <div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> تفاصيل المعاملة</span>
        </h4>
        <p class="media-text">{{$e->notes}}</p>
    </div>

</div>
</div>

<div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> حالة المعاملة</span>
        </h4>
        <p class="media-text">{{$e->status}}</p>
    </div>

</div>
</div>


<div class="row">

<div class="media">

<div class="media-body mx-3">
        <h4 class="media-heading"><span class="media-title"> المعاملة مرسلة من قسم</span>
        </h4>
        <p class="media-text">{{$e->d->name}}</p>
    </div>

</div>
</div>



                                    <hr>

   <div class="row">
    <div class="col-lg-6 col-12 mx-auto">
    <form method="post" action="{{route('ImportSave', $e->id)}}">
           @csrf

         


            <div class="form-group">
            

                <label for="notes" class="">ملاحظات  </label>
                <input id="notes" type="text"  name="notes" value="{{old('notes')}}"   class="form-control">
                   
                
                <label for="date">تاريخ الإستلام</label>
                <input type="date" id="date" name="date" value="{{old('date')}}" class="form-control">

                
                 <br>
                <button type="submit" class="btn btn-primary" value="">ارسال</button>

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
