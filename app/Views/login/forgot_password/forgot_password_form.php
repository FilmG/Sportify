<?php 
    $mysession = session(); 
    $mysession->set('Logged_SchoolApps_Employee',FALSE);     
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
	<meta charset="UTF-8">
	<title><?= $app_module_login . " | " . $app_short_name; ?></title>
	<meta name="description" content="Startup Company that offer best school system solution">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>/public/favicon.ico"/>

    <!--start JQuery 3.7.0 para gumana ang Jquery Ajax-->
        <script src="<?= base_url(); ?>/public/assets/jquery/j3.7.0/jquery-3.7.0.min.js"></script>
       
    <!--Bootstrap 5.3 Alpha3 -->
        <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/bootstrap-5.3_alpha3/bootstrap.min.css">
        <script src="<?= base_url(); ?>/public/assets/bootstrap-5.3_alpha3/popper.min.js"></script>
        <script src="<?= base_url(); ?>/public/assets/bootstrap-5.3_alpha3/bootstrap.bundle.min.js"></script>
    <!--End Bootstrap 5 -->

    <!--Font Awesome 5.15.1  -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/fontawesome-free-5.15.1/css/all.css" rel="stylesheet"> 
    
    <!--Own JS and CSS -->
    <script src="<?= base_url(); ?>/public/assets/sems/apps_login/js/login.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/sems/apps_login/css/login.css">

    <!-- get the required files from 3rd party sources -->
        <!--
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
        -->
        <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/google-font/roboto300.css">
    <!-- use the font -->

    <style>
        body {
            padding: 50px 0;
            /* font-family: 'Poppins', sans-serif; */
            font-family: 'Roboto';
        } 

        .btn-primary,  .btn-primary:focus, .btn-primary:active, .btn-primary:disabled {
                background-color: <?= $app_header_color; ?>;
                border-color: <?= $app_header_color; ?>;
                box-shadow: none!important;
        }

        .login_background {
            background-color: #F8F8F8;
        }
        
        .input_error_color {
            color: <?= $app_error_color; ?>;
        }
    </style>

</head>
<body onload="setFocus()" class="cover_image h-100">
       
    <!--Start Center -->
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card login_background" style="width: 25rem;">
                <div class=" col text-center">
                    <br>
                    <img src="<?= base_url(); ?>/public/images/brand/<?= $app_logo; ?>" width="100" height="90"  class="rounded-circle">
                    <h4><font color="<?= $app_header_textcolor; ?>"><?= $app_name; ?></font></h4>
                    <br>
                    <b><div id="textresize">&ensp; <?= $app_module_login; ?> &ensp;</div></b>
                </div>
                
                <div class="card-body">
                    
                    <div class="text-center">Please enter your email address so we can send you an email to reset your password.</div>
                    <br>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="forgotpassword_email" placeholder="email">
                        <label for="floatingInput">Email</label>
                    </div>  
                    
                    <p>
                    <div class="col text-center">
                        <small id="forgotpassword_email_error" class="input_error_color"></small>
                    </div> 
                    </p>

                    <!-- Hidden Fields -->
                    <input type="hidden" name="hidden_tableuser" id="hidden_tableuser" value="<?= $app_tableuser; ?>" />

                    <!--CSRF Token -->
                    <input type="hidden" id="csrf_token" value="<?= csrf_token(); ?>" />
                    <input type="hidden" id="csrf_hash" value="<?= csrf_hash(); ?>" />


                    <div class="col text-center">
                        <button  class="btn btn-primary" id="btn_forgot_password">
                            <i class="forgot_password-loading-icon fas fa-paper-plane"></i>
                            <span class="forgot_password-btn-text">Submit</span>
                        </button>
                    </div> 
 
                </div>
            </div><!--End Card -->
        </div><!--End row h-100 -->
    </div><!--End Center -->
    

</body>

<!--Javascript------------------------------------------------------------------------------------------------------->
<!--Javascript - start -->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
    
    var v_email = 1;

    //disable button
    document.getElementById("btn_forgot_password").disabled = true;   

    //reload page to clear cache
    windows.location.reload(true)

    //Prevent Forward button================================
    function disableBack() { window.history.forward(); }
    setTimeout("disableBack()", 0);
    window.onunload = function () { null };
    window.beforeunload = function () { null };
    //======================================================

    document.getElementById("forgotpassword_email").focus();

    $(document).ready(function(){ 

        
    });//end of document click  
    //=============================================

</script>