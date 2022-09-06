       
 
@extends( (Auth::user()->role=='admin') ? 'layouts.adminLayout' : 'layouts.employeeLayout')
@section('title'," إضافة معاملة صادرة")
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
@if (session()->has('Failure'))
            <div class="alert alert-danger">
                {{ session('Failure') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif

                <div class="row layout-top-spacing">
                   

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                
<div class="widget-content widget-content-area br-6">


   <div class="row">
    <div class="col-lg-6 col-12 mx-auto">
    <h4 class=""> إضافة معاملة صادرة</h4>

        <form method="post" action="{{route('ExportStore')}}">
           @csrf

         


            <div class="form-group">
            <label for="name" class="">عنوان المعاملة </label>
                <input id="name" type="text" name="title"  value="{{ old('title') }}"   class="form-control" >
                

                <label for="notes" class="">تفاصيل المعاملة </label>
                <input id="notes" type="text"  name="notes" value="{{old('notes')}}"   class="form-control">
                   
                <label for="num" class="">رقم المعاملة </label>
                <input id="num" type="number"  name="num" value="{{old('num')}}"   class="form-control">

                <label for="date">التاريخ</label>
                <input type="date" id="date" name="date" value="{{old('date')}}" class="form-control">

                <label for="receiver_department" class="">القسم المرسل إليه المعاملة  </label>
                <select name="receiver_department" id="" class="form-control">
                @foreach($departments as $d)
                @if($d->id != Auth::user()->department_id)
                <option value="{{ $d->id }}"
                 @if($d->id == old('receiver_department')) selected @endif>
                  {{ $d->name }}
                </option>
                 @endif
                 @endforeach
                </select>
                

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
