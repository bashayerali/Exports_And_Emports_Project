       


            
@extends( (Auth::user()->role=='admin') ? 'layouts.adminLayout' : 'layouts.employeeLayout')
@section('title',"تقارير الواردات")
@section('content')
                     
        
       <!--  BEGIN CONTENT AREA  -->
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

                        <div class="row1" style="display:flex; ">
    <form class="form form-inline search " method="GET" action="{{route($type)}}" role="search">
        <svg> ... </svg>
        <div class="search-bar ">
@csrf
        <input type="date" id="date" name="dateFrom" value="{{old('dateFrom')}}" class="form-control">
        <input type="date" id="date" name="dateTo" value="{{old('dateTo')}}" class="form-control">

            <button type="submit" class="btn btn-primary" name="searchDate" value="">بحث</button>

        </div>
    </form>
    <form class="form form-inline search " method="GET" action="{{route($type)}}" role="search">
        <svg> ... </svg>
        <div class="search-bar">
            @csrf
           
              <select name="status" id="" class="form-control">
<option value="تم التسليم">تم التسليم</option>
<option value="معلقه">معلقه</option>

              </select>
            <button type="submit" class="btn btn-primary" name="searchStatus" value="">بحث</button>

        </div>
    </form>
      </div>

                                </div>
                                </div>
                                </div>




                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        
                        <div class="widget-content widget-content-area br-6">
                            @if(Count($Import) != 0)
<div class="row1"  dir="rtl">
   

    <form class="form form-inline search " method="post" action="{{route('printReport')}}" role="search">
        <svg> ... </svg>
        <div class="search-bar">
            @csrf
            @foreach($Import as $Im)
        <input type="hidden" name="result[]" value="{{$Im->id}}">
@endforeach
            <button type="submit"  class="btn btn-primary" name="printStatus" value="">تصدير النتائج PDF</button>
            <pre>                                                                                                                                                                                                       </pre>

        </div>
    </form>     
                        </div>
@endif

                            <div class="table-responsive mb-4 mt-4">
                                <table id="alter_pagination" class="table table-hover" style="width:100%">
                                <thead>
                                            <tr>
                                                <th class="checkbox-column">رقم المعاملة </th>
                                                <th>عنوان المعاملة</th>
                                                <th>القسم المُرسِل</th>
                                                @if(Auth::user()->role=='admin')
                                                <th>القسم المُرسَل إليه</th>
                                                @endif
                                                <th>تاريخ المعاملة</th>
                                                <th>الحالة</th>
                                                <th colspan="2" class="text-center">الإجراء</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Import as $Im)
                                            <tr>
                                                <td class="checkbox-column">{{$Im->num}}</td>
                                                <td>{{$Im->title}}</td>
                                                <td>{{$Im->d->name}}</td>
                                                @if(Auth::user()->role=='admin')
                                                <td>{{$Im->d1->name}}</td>
                                                @endif
                                                <td>{{$Im->date}}</td>
                                                <td><span class="shadow-none badge badge-warning">{{$Im->status}}</span></td>
                                                <td class="text-center"><a href="{{route('importDetails', $Im->id)}}" class="btn btn-primary mb-3 rounded bs-tooltip" >
                                                      استعراض التفاصيل
                                                
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                   
                                </table>
                                </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>

                @endsection




                