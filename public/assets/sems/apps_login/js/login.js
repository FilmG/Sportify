$(document).ready(function() {	
    //alert("External JS Login Appointment");
    //START OF ADMIN LOGIN
        $(document).on("focus","#login_username",function(e) {
            $("#app_login_error_msg").html('');
        });//end of document click
        $(document).on("focus","#login_password",function(e) {
            $("#app_login_error_msg").html('');
        });//end of document click

        $(document).on("keypress","#login_password", function(e){
            if(e.which == 13){
                //var inputVal = $(this).val();
                //alert("You've entered: " + inputVal);
                call_app_login();
            }
        });

        $(document).on("click","#btn_app_login",function(e) {
            //alert("click button login");
            call_app_login();
        });//end of document click
    //END OF ADMIN LOGIN

   
    //START OF NO ACTIVITY LOGIN
        $(document).on("focus keyup","#mainlogin_password",function(e) {
            $("#app_login_error_msg").html('');
        });//end of document click

        $(document).on("keypress","#mainlogin_password", function(e){
            if(e.which == 13){
                //var inputVal = $(this).val();
                //alert("You've entered: " + inputVal);
                call_app_noActiviy_login();
            }
        });

        $(document).on("click","#btn_login_modal_noactivity",function(e) {
            //alert("click button login");
            call_app_noActiviy_login();
        });//end of document click

    //END OF NO ACTIVITY LOGIN

    //FORGOT PASSWORD - START
        $(document).on("click","#forgotPassword",function(e) {
            //alert("click Forgot password");
            //window.location.href=base_url+"/Login/forgot_password","_blank"; //open to same tab

            window.open(base_url+"/Login/forgot_password","_blank"); //open to another tab
        });//end of document click

        $(document).on("keypress","#forgotpassword_email", function(e){
            if(e.which == 13){
                call_submit_email_forgotPassword();
            }
        });

        $(document).on("click","#btn_forgot_password",function(e) {
            //alert("submit email for forgot password");
            //window.location.href=base_url+"/Login/forgot_password","_blank"; //open to same tab
            //window.open(base_url+"/Login/forgot_password","_blank"); //open to another tab
            call_submit_email_forgotPassword();
        });//end of document click

        //Check Inputs -Start
            $(document).on("focusout keyup","#forgotpassword_email",function(e) {
                var email = $("#forgotpassword_email").val();
                //alert(email);
                if (!EmailIsValid(email)) {
                    $("#forgotpassword_email_error").html('Please provide a valid email address');
                    v_email = 1;
                } else {
                    $("#forgotpassword_email_error").html('');
                    v_email = 0;
                }
                check_input_forgot_password();
            });//end of document click

            function check_input_forgot_password() {
                if (v_email == 1 )
                {
                    document.getElementById("btn_forgot_password").disabled = true;   
                } else {
                    document.getElementById("btn_forgot_password").disabled = false;
                }
            }//end of function
        //Check Inputs -End

//FORGOT PASSWORD - END
    
}); //end of document ready
//====================================================================

function call_submit_email_forgotPassword() {
    let csrfToken = $("#csrf_token").val();
    let csrfHash = $("#csrf_hash").val();
    var tableuser = $("#hidden_tableuser").val();

    var user_email = $("#forgotpassword_email").val();

    //alert("csrfToken"+csrfToken);
    //alert("csrfHash"+csrfHash);
    //alert("table user"+tableuser);
    //alert("user email"+user_email);

    var base_path = base_url + "/Login/check_email_forgot_password"; 
    $.ajax({
            type: "POST",
            url: base_path,
            data: {[csrfToken]:csrfHash,tableuser:tableuser,user_email:user_email},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
            beforeSend: function() {
                document.body.style.cursor = 'wait';
                document.getElementById("btn_forgot_password").disabled = true; 
                $(".forgot_password-loading-icon").addClass('fas fa-spinner fa-spin');
                $(".forgot_password-btn-text").text("Checking...");                              
            },
            success: function(data) {
                //alert(data.return_msg);
                document.body.style.cursor = 'default';
                $(".forgot_password-loading-icon").removeClass('fas fa-spinner fa-spin');
                $(".forgot_password-loading-icon").addClass('fas fa-paper-plane');
                $(".forgot_password-btn-text").text("Submit");
                document.getElementById("btn_forgot_password").disabled = false;     
                $("#forgotpassword_email_error").html(data.return_msg);
                
            }//end success
    });//ajax      

}//end of function


//====================================================================
function call_app_noActiviy_login() {
    var app_userid = $("#app_userid").val();
    var app_username = $("#app_username").val();
    var userpass = $("#mainlogin_password").val();
    //alert("userid="+app_userid+ " userpass="+userpass);

    var base_path = base_url + "/MainApplication/check_password"; 
    $.ajax({
            type: "POST",
            url: base_path,
            data: {app_userid:app_userid,userpass:userpass,app_username:app_username},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
            beforeSend: function() {
                                            
            },
            success: function(data) {
                    //alert(data.return_msg);
                    if(data.status) {
                        $('#login_modal').modal('hide'); 
                        $("#mainlogin_password").val('');
                        $("#app_login_error_msg").html('');   
                    } else {
                        $("#app_login_error_msg").html("Invalid Login");
                    }
            }//end success
    });//ajax      
}//end of function

//====================================================================
function call_app_login() {
    //alert("Appointment Login");
    
    let csrfToken = $("#csrf_token").val();
    let csrfHash = $("#csrf_hash").val();

    var tableuser = $("#hidden_tableuser").val();
    //alert(tableuser);

    var uname = $("#login_username").val();
    var upass = $("#login_password").val();
     
        var base_path = base_url + "/Login/check_login_data"; 
        $.ajax({
                type: "POST",
                url: base_path,
                data: {[csrfToken]:csrfHash,uname:uname,upass:upass,tableuser:tableuser},
                cache: false,
                //async:false, //spinner doest work if enable
                dataType: 'json',
                     beforeSend: function() {
                        document.body.style.cursor = 'wait';
                        document.getElementById("btn_app_login").disabled = true; 
                        $(".app_login-loading-icon").addClass('fas fa-spinner fa-spin');
                        $(".app_login-btn-text").text("Checking...");
                     },
                     success: function(data) {
                        //alert(data.user_dept);
                        if(data.status) {
                            document.body.style.cursor = 'default';
                            $(".app_login-loading-icon").removeClass('fas fa-spinner fa-spin');
                            $(".app_login-loading-icon").addClass('fas fa-sign-in-alt');
                            $(".app_login-btn-text").text("Login");
                            //document.getElementById("btn_app_login").disabled = false;  
                            $("#div_forgot_password").hide();   
                            $("#app_login_error_msg").html('<p style="color:green">'+data.return_msg+'</p>');
                            
                            //if(data.user_dept == "ADMIN") { //di muna gagamitin, kasi pinag iisipan pa pano gamitin
                                //sessionStorage.setItem('reloaded_queuing', 'no'); // could be anything
                            //    window.location.href=base_url+"/Admin/main"; //open to same tab
                            //} else {
                                //sessionStorage.setItem('reloaded_queuing', 'no'); // could be anything
                                setTimeout(function(){
                                    window.location.href=base_url+"/Employee/main"; //open to same tab
                                }, 2000);
                            //}
                            
                            
                        }else {
                            document.body.style.cursor = 'default'; 
                            $(".app_login-loading-icon").removeClass('fas fa-spinner fa-spin');
                            $(".app_login-loading-icon").addClass('fas fa-sign-in-alt');
                            $(".app_login-btn-text").text("Login");
                            document.getElementById("btn_app_login").disabled = false; 
                            $("#app_login_error_msg").html('<p style="color:red">'+data.return_msg+'</p>');
                        }
                        
                    }//end of success
        });//ajax
}//end of function

