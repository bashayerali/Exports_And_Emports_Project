
@extends('layouts.adminLayout')

@section('links2')

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/apps/contacts.css" rel="stylesheet" type="text/css" />

    @endsection

@section('title',"الموظفين")
@section('content')

          
                <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                      <br>
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif                
                <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                    <div class="col-lg-12">
                        <div class="widget-content searchable-container list">

                                    

                        <div class="btn-add">
                             <a href="{{ route('addEmployee', $departmentId) }}" class="btn btn-primary">إضافة موظف</a>
                        </div>
                        <br>
                                
                                 
                                

                            <div class="searchable-items list">
                                <div class="items items-header-section">
                                    <div class="item-content">
                                        <div class="" >
                                            
                                            <h4>الاسم</h4>
                                        </div>
                                        <div class="user-email">
                                            <h4>البريد الالكتروني</h4>
                                        </div>
                                        <div class="user-location">
                                            <h4 style="margin-left: 0;">القسم</h4>
                                        </div>
                                        <div class="action-btn">
                                                 الإجراء                               
                                         </div>
                                    </div>
                                </div>
                                @foreach($user as $u)

                                <div class="items">
                                    <div class="item-content">
                                        <div class="user-profile">
                                          
                                            <div class="user-meta-info">
                                                <p class="user-name" >{{ $u->name }} </p>
                                                <p class="user-work" >{{ $u->d->name }}</p>
                                            </div>
                                        </div>
                                        <div class="user-email">
                                            <p class="info-title">البريد الالكتروني: </p>
                                            <p class="usr-email-addr" >{{ $u->email }}</p>
                                        </div>
                                        <div class="user-location">
                                            <p class="info-title">القسم: </p>
                                            <p class="usr-location" >{{ $u->d->name }}</p>
                                        </div>
                                        <div class="action-btn">
                                           <a href="{{route('editEmployee', $u->id)}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                               class="feather feather-edit-2 edit">
                                               <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                           </a>

                                           <a href="{{route('deleteEmployee', $u->id)}}">  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                              class="feather feather-user-minus delete">
                                              <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">

                                              </path><circle cx="8.5" cy="7" r="4"></circle>
                                              <line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                              </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                               
                              
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
        <!-- END MAIN CONTAINER -->
    
@endsection

@section('links2')

<script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_1.js"></script>
        @endsection
