       
@extends( (Auth::user()->role=='admin') ? 'layouts.adminLayout' : 'layouts.employeeLayout')
@section('title',"تقارير الصادرات")
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
    <form class="form form-inline search " method="GET" action="{{route('ExportReport')}}" role="search">
        <svg> ... </svg>
        <div class="search-bar ">
@csrf
        <input type="date" id="date" name="dateFrom" value="{{old('dateFrom')}}" class="form-control">
        <input type="date" id="date" name="dateTo" value="{{old('dateTo')}}" class="form-control">

            <button type="submit" class="btn btn-primary" name="searchDate" value="">بحث</button>

        </div>
    </form>

    <form class="form form-inline search " method="GET" action="{{route('ExportReport')}}" role="search">
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
                            @if(Count($Export) != 0)
<div class="row1"  dir="rtl">
   

    <form class="form form-inline search " method="post" action="{{route('printReport1')}}" role="search">
        <svg> ... </svg>
        <div class="search-bar">
            @csrf
            @foreach($Export as $Ex)
        <input type="hidden" name="result[]" value="{{$Ex->id}}">
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
                                                <th>القسم المُرسل إليه</th>
                                                <th>تاريخ المعاملة</th>
                                                <th>الحالة</th>
                                                <th colspan="2" class="text-center">الإجراء</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Export as $Ex)
                                            <tr>
                                                <td class="checkbox-column">{{$Ex->num}}</td>
                                                <td>{{$Ex->title}}</td>
                                                <td>{{$Ex->d1->name}}</td>
                                                <td>{{$Ex->date}}</td>
                                                <td><span class="shadow-none badge badge-warning">{{$Ex->status}}</span></td>
                                                <td class="text-center"><a href="{{route('exportDetails', $Ex->id)}}" class="btn btn-primary mb-3 rounded bs-tooltip" >
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

