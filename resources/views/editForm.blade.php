

@extends('layouts.adminLayout')
@section('title',"تحديث معلومات الموظف ")
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
    <div class="col-lg-6 col-12 mx-auto">
    <h4 class="">تحديث معلومات الموظف </h4>

        <form method="post" action="{{ route('updateEmployee', $user->id) }}">
            @csrf
            <div class="form-group">
                <input id="t-text" type="hidden" name="departmentId" value="{{$user->department_id}}" class="form-control" >
                
                <label for="t-text" class="">اسم الموظف</label>
                <input id="t-text" type="text" name="name" placeholder="الاسم" value="{{old('name', $user->name)}}" class="form-control" >
                <label for="t-text" class="">الإيميل </label>
                <input id="t-text" type="email" name="email" placeholder="الايميل" value="{{old('email', $user->email)}}" class="form-control" >
                <label for="t-text" class="">القسم </label>
                <select name="NewDepartmentId"  class="form-control">
               
                @foreach($departments as $d)
                @if($d->id!=1) 
                

                <option value="{{ $d->id }}" @if($d->id == old('NewDepartmentId', $user->department_id)) selected @endif> {{ $d->name }}
                </option>

                @endif
                @endforeach
                </select>

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
