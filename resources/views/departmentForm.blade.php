
@extends('layouts.adminLayout')
@section('title',"إضافة قسم")
@section('content')

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
                  <div class="col-lg-6 col-12 mx-auto">
                  <h4 class=""> إضافة قسم</h4>

                      <form method="post" action="{{ route('storeDepartment') }}">
                          @csrf
                          <div class="form-group">
                              <label for="t-text" class="">   إسم القسم</label>
                              <input id="t-text" type="text" name="name" value="{{old('name')}}" placeholder="اسم القسم" class="form-control" >
                              <input type="submit" name="txt" class="mt-4 btn btn-primary">
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