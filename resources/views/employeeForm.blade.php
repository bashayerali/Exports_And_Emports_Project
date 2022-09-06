
@extends('layouts.adminLayout')
@section('title',"إضافة موظف")
@section('content')

        <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
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

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
              
                   <div class="widget-content widget-content-area br-6">

                      <div class="row">
                        <div class="col-lg-6 col-12 mx-auto">
                        <h4 class="">إضافة موظف </h4>

                            <form method="post" action="{{ route('storeEmployee') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="t-text" type="hidden" name="departmentId" value="{{$departmentId}}" class="form-control" >
                                    <label for="t-text" class="">اسم الموظف</label>
                                    <input id="t-text" type="text" name="name" placeholder="الاسم" value="{{old('name')}}" class="form-control" >
                                    <label for="t-text" class="">الإيميل </label>
                                    <input id="t-text" type="email" name="email" placeholder="الايميل" value="{{old('email')}}" class="form-control" >
                                    <input type="submit" name="txt" class="mt-4 btn btn-primary">
                                </div>
                            </form>
                         </div>                                        
                        </div>
                    </div>
                </div>

                </div>

            </div>
@endsection
         

