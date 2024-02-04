
<head>
    
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
    <script src="<?= base_url(); ?>/public/assets/sems/apps_main/js/employee.js"></script>
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
            padding: 60px 0;
        } 

        .btn-primary,  .btn-primary:focus, .btn-primary:active, .btn-primary:disabled {
                background-color: <?= $app_header_color; ?>;
                border-color: <?= $app_header_color; ?>;
                box-shadow: none!important;
        }
 
        .input_error_color {
            color: <?= $app_error_color; ?>;
        }
    </style>

</head>

<body>
       
    <div class="container page-container">

        <!--Start Center -->
        <div class=".container-fluid">

            <!-- Hidden Modal Variable -->
            <input type="hidden" name="recid_event_request" id="recid_event_request" value=""  />

            <div class="card">
                <div class="card-body">
                    <span><b>Find your Event</b></span><br><br>
                    <small>[Volleyball]</small>
                    <select id="home_dropdown_event" name="home_dropdown_event" class="form-select form-select-lg mb-3" >
                        <!--fill_dropdown_event --> 
                    </select>
                    
                    <section id="section_activity_view">
                        
                    </section>

                </div><!--End Card-Body -->  
            </div><!--End Card -->
        
        </div>

    </div>
        
</body>


<!--Javascript------------------------------------------------------------------------------------------------------->
<!--Javascript - start -->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";

    //Hide
    $("#section_event_menu").hide();
   
    //Filling Dropdown 
    var base_path = base_url + "/Games/fill_dropdown_event";
    $.ajax({
        url: base_path,
        method:'POST',
        dataType: 'json',
        success:function(data) {
            //alert(data.length);
            var html='';
            html += "<option value ='" +"Choose..."+"'>"+"Choose..."+"</option>";
            for(var count=0;count < data.length; count++) {   
                html += "<option value ='" +data[count].recid_event+"'>"+data[count].event_title+"</option>";
            }
            $('#home_dropdown_event').html(html);						
        }
    });//end of ajax

    //====================================================================================================
    //SPACER=> 
    //====================================================================================================

    $(document).ready(function(){ 
        
        $(document).on("change","#home_dropdown_event",function(e) {
            
            var input = $("#home_dropdown_event").val();
            $("#recid_event_request").val(input);

            var recid_event_request = $("#recid_event_request").val();
            var sports_name = "Volleyball";
            //+alert("Basketball ="+input);
            //WORKING AJAX FUNCTION WITH DATA {}
            var base_path = base_url + "/Games/view_volleyball_activity"; 
            $.ajax({
                type: "POST",
                url: base_path,
                data: {recid_event_request:recid_event_request,sports_name:sports_name},
                cache: false,
                //async:false, //spinner doest work if enable
                dataType: 'html', // json or html
                    beforeSend: function() {
                                            
                    },
                    success: function(data) {
                        //alert(data.return_msg);
                        $("#section_activity_view").html(data);
                    }//end success
            });//ajax

        });//end of document click

    });//end of document click  

    //====================================================================================================
    //SPACER=> 
    //====================================================================================================

</script>