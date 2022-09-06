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
@section('title',"الأقسام")
@section('content')

        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                      <br>
                      @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('Failure'))
            <div class="alert alert-danger">
                {{ session('Failure') }}
            </div>
        @endif    
                <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                    <div class="col-lg-12">
                        <div class="widget-content searchable-container list">

                                    

                        <div class="btn-add">
                             <a href="{{ route('createDepartment') }}" class="btn btn-primary">إضافة قسم</a>
                        </div>
                        <br>
                                
                                 
                                

                            <div class="searchable-items list">
                                <div class="items items-header-section">
                                    <div class="item-content">
                                        <div class="" >
                                            
                                            <h4>الاسم</h4>
                                        </div>
                                       
                                        <div class="action-btn">
                                                 الإجراء                               
                                         </div>
                                    </div>
                                </div>
                                @foreach($departments as $d)

                                <div class="items">
                                    <div class="item-content">
                                        <div class="departments-profile">
                                          
                                            <div class="departments-meta-info">
                                                <p class="departments-name" >{{ $d->name }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="action-btn">
                                          

                                           <a href="{{ route('deleteDepartment', $d->id) }}"> 
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>

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
