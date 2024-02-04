<?php 
    $mysession = session(); 
    $mysession->set('Logged_SEMS_Employee',FALSE);     
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
        <!--
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
        -->
        <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/bootstrap-5.3_alpha3/bootstrap.min.css">
        <script src="<?= base_url(); ?>/public/assets/bootstrap-5.3_alpha3/popper.min.js"></script>
        <script src="<?= base_url(); ?>/public/assets/bootstrap-5.3_alpha3/bootstrap.bundle.min.js"></script>
    <!--End Bootstrap 5 -->

    <!--Font Awesome 5.15  -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/fontawesome-free-5.15.1/css/all.css" rel="stylesheet"> 
    
    <!--Own JS and CSS -->
    <script src="<?= base_url(); ?>/public/assets/sems/apps_login/js/login.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/sems/apps_login/css/login.css">

    <!--For QRcode Scanner using webcam -->
    <script src="<?= base_url(); ?>/public/assets/html5_qrcode_scanner/html5-qrcode.min.js"></script>

    <!-- get the required files from 3rd party sources -->
        <!--
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
        -->
        <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/google-font/roboto100.css">
    <!-- use the font -->

    <style>
        body {
            padding: 50px 0;
            /* font-family: 'Poppins', sans-serif; */
            /*font-family: 'Roboto';*/
        } 

        .btn-primary,  .btn-primary:focus, .btn-primary:active, .btn-primary:disabled {
                background-color: <?= $app_header_color; ?>;
                border-color: <?= $app_header_color; ?>;
                box-shadow: none!important;
        }

        .login_background {
            /*background-color: #F8F8F8;*/
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
                    <img src="<?= base_url(); ?>/public/images/brand/<?= $app_logo; ?>" width="100" height="100"  class="rounded-circle">
                    <h4><font color="<?= $app_header_textcolor; ?>"><?= $app_name; ?></font></h4>
                    <div id="textresize">[&ensp; <?= $app_module_login; ?> &ensp;]</div>
                </div>
                
                <div class="card-body">
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="login_username" placeholder="username">
                        <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating">
                        <input type="password" class="form-control" id="login_password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>  

                    <p>
                    <div class="col text-center">
                        <!-- class="input_error_color" -->
                        <small id="app_login_error_msg" class=""></small>
                    </div> 
                    </p>

                    <!-- Hidden Fields input_error_color-->
                    <input type="hidden" name="hidden_tableuser" id="hidden_tableuser" value="<?= $app_tableuser; ?>" />

                    <!--CSRF Token -->
                    <input type="hidden" id="csrf_token" value="<?= csrf_token(); ?>" />
                    <input type="hidden" id="csrf_hash" value="<?= csrf_hash(); ?>" />


                    <div class="col text-center">
                        <button  class="btn btn-primary" id="btn_app_login">
                            <i class="app_login-loading-icon fas fa-sign-in-alt"></i>
                            <span class="app_login-btn-text">Sign in</span>
                        </button>
                    </div> 

                    <br>
                    <div id="div_forgot_password" class="col text-center">
                        <a href="#" id="forgotPassword">Forgot Password</a>
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

    //reload page to clear cache
    windows.location.reload(true)

    //Prevent Forward button================================
    function disableBack() { window.history.forward(); }
    setTimeout("disableBack()", 0);
    window.onunload = function () { null };
    window.beforeunload = function () { null };
    //======================================================

    document.getElementById("login_username").focus();

    $(document).ready(function(){ 

        $(document).off('click', '#forgotPassword').on('click', '#forgotPassword', function (event) {
		    event.preventDefault();

            alert("forgot password");

	    });//end of document click

    });//end of document click  
</script>