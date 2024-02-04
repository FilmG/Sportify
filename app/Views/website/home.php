<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Dorang landing page.">
    <meta name="author" content="Devcrud">
    <title><?= $app_module_login . " | " . $app_short_name; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>/public/favicon.ico"/>

    <!-- font icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/public/website_assets/vendors/themify-icons/css/themify-icons.css">

    <!-- Bootstrap + Dorang main styles -->
	<link rel="stylesheet" href="<?= base_url(); ?>/public/website_assets/css/dorang.css">

    <!-- core  -->
    <script src="<?= base_url(); ?>/public/website_assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="<?= base_url(); ?>/public/website_assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="<?= base_url(); ?>/public/website_assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Dorang js -->
    <script src="<?= base_url(); ?>/public/website_assets/js/dorang.js"></script>

    <!-- Website js -->
    <script src="<?= base_url(); ?>/public/assets/sems/website/js/website.js"></script>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home" class="dark-theme">
    
    <!-- page navbar -->
    <nav class="page-navbar" data-spy="affix" data-offset-top="10">
        <ul class="nav-navbar container">
            <li class="nav-item"><a href="#" id="website_home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" id="website_basketball" class="nav-link">Basketball</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><img src="<?= base_url(); ?>/public/images/brand/sems-logo1.png" alt=""></a></li>
            <li class="nav-item"><a href="#" id="website_volleyball" class="nav-link">Volleyball</a></li>
            <li class="nav-item"><a href="#" id="website_apps_login" class="nav-link">Login</a></li>
        </ul>
    </nav><!-- end of page navbar -->

    <div class="theme-selector">
        <a href="javascript:void(0)" class="spinner">
            <i class="ti-paint-bucket"></i>
        </a>
        <div class="body">
            <a href="javascript:void(0)" class="light"></a>
            <a href="javascript:void(0)" class="dark"></a>
        </div>
    </div>  

    <!-- website content -start -->
    <div id="website_container">
        <?php
            echo view('website/home_content');
        ?>
    </div>
    <!-- website content -end -->
    
    <!--footer & pre footer -->
    <div class="contact-section">
        <div class="overlay"></div>
        <!-- container -->
        <div class="container">
            <!-- footer -->
            <footer class="footer">
                <p class="infos">&copy; <script>document.write(new Date().getFullYear())</script>, Made with <i class="ti-heart text-danger"></i> by <a href="http://www.devcrud.com">Group Three(3)</a></p>       
                <span>|</span>  
                <div class="links">
                    <a href="#">Basketball</a>
                    <a href="#">Volleyball</a>
                </div>
            </footer><!-- end of footer -->

        </div><!-- end of container -->
    </div><!-- end of pre footer -->

</body>
</html>

<!--Javascript------------------------------------------------------------------------------------------------------->
<!--Javascript - start -->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";

    $(document).ready(function(){ 

    });//end of document click  

    //====================================================================================================
    //SPACER=> 
    //====================================================================================================

</script>
