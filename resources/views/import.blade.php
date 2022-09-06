       
 
@extends( (Auth::user()->role=='admin') ? 'layouts.adminLayout' : 'layouts.employeeLayout')

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

@section('title'," الواردات")
@section('content')




    


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

                                      
                       
                                

                            <div class="searchable-items list">
                                <div class="items items-header-section">
                                    <div class="item-content">
                                        <div class="" >
                                            
                                           رقم المعاملة 
                                        </div>
                                        <div class="" >
                                            
                                            عنوان المعاملة 
                                        </div>
                                        <div class="" >
                                            
                                        القسم المُرسِل
                                        </div>
                                        <div class="" >
                                            
                                        تاريخ المعاملة
                                      </div>
                                      <div class="" >
                                            
                                            الحالة         
                                      </div>
                                        <div class="action-btn">
                                                 الإجراء                               
                                         </div>
                                    </div>
                                </div>


                                @foreach($Import as $Im)

                                <div class="items">
                                    <div class="item-content">
                                        <div class="user-profile">
                                          
                                            <div class="user-meta-info">
                                                <p class="user-work" >{{$Im->num}}</p>
                                            </div>
                                        </div>
                                        <div class="user-email">
                                            <p class="usr-email-addr" >{{$Im->title}}</p>
                                        </div>
                                        <div class="user-location">
                                            <p class="usr-location" >{{$Im->d->name}}</p>
                                        </div>

                                        <div class="user-location">
                                            <p class="usr-location" >{{$Im->date}}</p>
                                        </div>
                                        
                                        <div class="user-location">
                                            <p class="usr-location" >{{$Im->status}}</p>
                                        </div>
                                        <div class="action-btn">
                                          

                                        <a href="{{route('ImportUpdate', $Im->id)}}" class="btn btn-primary mb-3 rounded bs-tooltip" >
                                                      استعراض 
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
