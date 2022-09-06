
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>تأكيد البريد الالكتروني </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
</head>
<body class="form">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
تم إرسال رابط التحقق إلى البريد
        </div>
        @endif

        <form class="container" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <h6>قبل المتابعة، الرجاء التحقق من عنوان بريدك الالكتروني بالنقر على الرابط المرسل إليك عبر البريد 
                                اذا لم تتلق البريد الالكتروني اضغط اعادة ارسال لتصلك رسالة جديدة  </h6>
                           
                            <br>
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-primary mb-3 "> ارسال</button>
                                </div>
                              
                            </div>

                        </form>
                        <form class="container" method="POST" action="{{ route('logout') }}">
                              @csrf
                        <div class="col">  
                         <button class="btn btn-primary btn-1g" type="submit">تسجيل الخروج</button>
                        </div>

                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>

</body>
</html>


