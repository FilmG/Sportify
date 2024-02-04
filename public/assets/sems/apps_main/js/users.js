var v_fname = 1;
var v_lname = 1;
var v_empnum = 1;
var v_dept = 1;
var v_role = 1;
var v_email = 1;
var v_accounttype = 1;
var v_uname = 1;
var v_pass = 1;

$(document).ready(function() {	
    //alert("App Users JS");

    //ADD : USER - START   
        $(document).on("focusout keyup","#apps_useradd_fname",function(e) {
            var input = $("#apps_useradd_fname").val();
            
            if (input.length == 0) {
                $("#apps_useradd_fname_error").html('First name is blank');
                v_fname = 1;
            } else {
                $("#apps_useradd_fname_error").html('');
                v_fname = 0;
            }
            check_input_useradd();
        });//end of document click  

        $(document).on("focusout keyup","#apps_useradd_lname",function(e) {
            var input = $("#apps_useradd_lname").val();
            
            if (input.length == 0) {
                $("#apps_useradd_lname_error").html('Last name is blank');
                v_lname = 1;
            } else {
                $("#apps_useradd_lname_error").html('');
                v_lname = 0;
            }
            check_input_useradd();
        });//end of document click  

        $(document).on("focusout keyup","#apps_useradd_empnum",function(e) {
            var input = $("#apps_useradd_empnum").val();
            if (input.length == 0) {
                $("#apps_useradd_empnum_error").html('Employee Number is blank');
                v_empnum = 1;
            } else {
                $("#apps_useradd_empnum_error").html('');
                v_empnum = 0;
            }
            check_input_useradd();
        });//end of document click  

        $(document).on("change focusout","#apps_useradd_dept",function(e) {
            var input = $("#apps_useradd_dept").val();
            if (input == "Choose...") {
                $("#apps_useradd_dept_error").html('Invalid Department');
                v_dept = 1;
            } else {
               $("#apps_useradd_dept_error").html('');
               v_dept = 0;
            }
            check_input_useradd();
        });//end of document click

        $(document).on("change focusout","#apps_useradd_role",function(e) {
            var input = $("#apps_useradd_role").val();
            if (input == "Choose...") {
                $("#apps_useradd_role_error").html('Invalid Role');
                v_role = 1;
            } else {
               $("#apps_useradd_role_error").html('');
               v_role = 0;
            }
            check_input_useradd();
        });//end of document click

        $(document).on("focusout","#apps_useradd_email",function(e) {
            var email = $("#apps_useradd_email").val();
            if (email.length == 0) {
                $("#apps_useradd_email_error").html('Email is blank');
                v_email = 1;
            } else {
                if (!EmailIsValid(email)) {
                    $("#apps_useradd_email_error").html('Please provide a valid email address');
                    v_email = 1;
                } else { //else if email is valid
                    //check if email is school email
                    //alert(SchoolEmail(email));
                    if(!SchoolEmail(email)) { 
                        $("#apps_useradd_email_error").html('Invalid school email!');
                        v_email = 1;
                    } else {
                        //$("#apps_useradd_email_error").html('Valid school email!');
                        //check if email is already exist
                        //alert(email);
                        var base_path = base_url + "/Users/check_email_exist"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {email:email},
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'json',
                                beforeSend: function() {
                                                        
                                },
                                success: function(data) {
                                    if(data.status) {
                                        $("#apps_useradd_email_error").html('email address already exist');
                                        v_email = 1;
                                    } else {
                                        $("#apps_useradd_email_error").html('');
                                        v_email = 0;
                                    }
                                    check_input_useradd();
                                }//end success
                        });//ajax 
                    } //end if email is school email

                } //end if email is valid
            }
            check_input_useradd();
        });//end of document click 

        $(document).on("change focusout","#apps_useradd_accounttype",function(e) {
            var input = $("#apps_useradd_accounttype").val();
            if (input == "Choose...") {
                $("#apps_useradd_accounttype_error").html('Invalid Account Type');
                v_accounttype = 1;
            } else {
               $("#apps_useradd_accounttype_error").html('');
               v_accounttype = 0;
            }
            check_input_useradd();
        });//end of document click 

        $(document).on("focusout keyup","#apps_useradd_uname",function(e) {
            var input = $("#apps_useradd_uname").val();
            if (input.length == 0) {
                $("#apps_useradd_uname_error").html('Username is blank');
                v_uname = 1;
            } else {
                //check if username already exist in DB
                var base_path = base_url + "/Users/check_username_exist"; 
                $.ajax({
                    type: "POST",
                    url: base_path,
                    data: {input:input},
                    cache: false,
                    //async:false, //spinner doest work if enable
                    dataType: 'json',
                    beforeSend: function() {
                                                        
                    },
                    success: function(data) {
                        if(data.status) {
                            $("#apps_useradd_uname_error").html('Username address already exist');
                            v_uname = 1;
                        } else {
                            $("#apps_useradd_uname_error").html('');
                            v_uname = 0;
                        }
                        check_input_useradd();
                    }//end success
                });//ajax 
            }
            check_input_useradd();
        });//end of document click  

        $(document).on("focusout keyup","#apps_useradd_pword",function(e) {
            var input = $("#apps_useradd_pword").val();
            if (input.length == 0) {
                $("#apps_useradd_pword_error").html('Password is blank');
                v_pass = 1;
            } else {
                if (verify_password()) {
                    $("#apps_useradd_pword_error").html('');
                    $("#apps_useradd_pword_verify").html('');
                    v_pass = 0;
                } else {
                    $("#apps_useradd_pword_error").html('Password is not verify');
                    $("#apps_useradd_pword_verify_error").html('Password Verify is blank');
                    v_pass = 1;
                }
                
            }
            check_input_useradd();
        });//end of document click  

        $(document).on("focusout keyup","#apps_useradd_pword_verify",function(e) {
            var input = $("#apps_useradd_pword_verify").val();
            if (input.length == 0) {
                
                $("#apps_useradd_pword_verify_error").html('Password Verify is blank');
                v_pass = 1;
            } else {
                if (verify_password()) {
                    $("#apps_useradd_pword_error").html('');
                    $("#apps_useradd_pword_verify_error").html('');
                    v_pass = 0;
                } else {
                    $("#apps_useradd_pword_error").html('Password is not verify');
                    $("#apps_useradd_pword_verify_error").html('Password is not verify');
                    v_pass = 1;
                }
            }
            check_input_useradd();
        });//end of document click  

        $(document).on("click","#btn-close-apps_useradd,#modalx-close-apps_useradd",function(e) {
           // alert("close");
            $("#apps_useradd_fname").val("");
            $("#apps_useradd_mname").val("");
            $("#apps_useradd_lname").val("");
            $("#apps_useradd_empnum").val("");
            $("#apps_useradd_email").val("");
            $("#apps_useradd_uname").val("");
            $("#apps_useradd_pword").val("");
            $("#apps_useradd_pword_verify").val("");

            $("#apps_useradd_suffix").val("Choose...");
            $("#apps_useradd_dept").val("Choose...");
            $("#apps_useradd_role").val("Choose...");
            $("#apps_useradd_accounttype").val("Choose...");

            $("#apps_useradd_fname_error").html('');
            $("#apps_useradd_lname_error").html('');
            $("#apps_useradd_empnum_error").html('');
            $("#apps_useradd_dept_error").html('');
            $("#apps_useradd_email_error").html('');
            $("#apps_useradd_role_error").html('');
            $("#apps_useradd_accounttype_error").html('');
            $("#apps_useradd_uname_error").html('');
            $("#apps_useradd_pword_error").html('');
            $("#apps_useradd_pword_verify_error").html('');
        });//end of document click  

        function check_input_useradd() {
            if (v_fname == 1 || v_lname == 1 || v_dept == 1 || v_role == 1 || v_empnum == 1 ||v_email == 1 || v_accounttype == 1 || v_uname == 1 || v_pass == 1 )   
            { 
                document.getElementById("btn_apps_useradd_save").disabled = true;
                            
            } else {
                document.getElementById("btn_apps_useradd_save").disabled = false;        
            }

        }//end of function
    //ADD : USER - END 

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //EDIT : USER - START

        //SHOW MODAL - START =====================================================================================

            //User Add - Start
                $(document).off('click', '#breadcrumb_application_users_add').on('click', '#breadcrumb_application_users_add', function (event) {
                    event.preventDefault();
                    //alert("Modal Add");
                    //$('#modal_application_user_add').modal('show');  

                    var apps_userid = $("#hid_userid").val();
                    //alert(apps_userid);

                    //Check if Apps user is SA or Admin
                    var sidebar = "Setup";
                    var submenu = "Setup-User";
                    var access = "access_write";
                    var access_value = "Yes";
                    var base_path = base_url + "/Users/get_user_access_onClick"; 
                    $.ajax({
                        type: "POST",
                        url: base_path,
                        data: {apps_userid:apps_userid,sidebar:sidebar,submenu:submenu,access:access,access_value:access_value},
                        cache: false,
                        //async:false, //spinner doest work if enable  image.length == 1
                        dataType: 'json',
                        beforeSend: function() {
                                                                
                        },
                        success: function(data) {
                            //alert(data.status);
                            if(data.status) {
                                    //Filling Dropdown Dept.
                                    var base_path = base_url + "/Users/Fill_Dropdown_dept";
                                    $.ajax({
                                        url: base_path,
                                        method:'POST',
                                        dataType: 'json',
                                        success:function(data) {
                                            //alert(data.length);
                                            var html='';
                                            html += "<option value ='" +"Choose..."+"'>"+"Choose..."+"</option>";
                                            for(var count=0;count < data.length; count++) {  
                                                if(data[count].dept != "SADMIN") {
                                                    html += "<option value ='" +data[count].recid+"'>"+data[count].dept+"</option>";
                                                }
                                            }
                                            $('#apps_useradd_dept').html(html);		
					
                                        }//end of success
                                    });//end of ajax
                                
                                    //Filling Dropdown User Role.
                                    var base_path = base_url + "/Users/Fill_Dropdown_user_role";
                                        $.ajax({
                                            url: base_path,
                                            method:'POST',
                                            dataType: 'json',
                                            success:function(data) {
                                                //alert(data.length);
                                                var html='';
                                                html += "<option value ='" +"Choose..."+"'>"+"Choose..."+"</option>";
                                                for(var count=0;count < data.length; count++) {   
                                                    html += "<option value ='" +data[count].user_role+"'>"+data[count].user_role+"</option>";
                                                }
                                                $('#apps_useradd_role').html(html);	
				
                                            }//end of success
                                        });//end of ajax
                            
                                    $('#modal_application_user_add').modal('show');  

                            } else {
                                //alert("No Access");
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error

                            } //end data.status

                        }//end success
                    });//ajax 

                });//end of document click
            //User Add - End

            //User Edit - Start
                $(document).on('click','.user_edit', function() { 

                    var recid_user = $(this).attr("recid_user");   //ung value ay nsa pag display ng record sa controller
                    
                    var fname = $(this).attr("fname");
                    var mname = $(this).attr("mname");
                    var lname = $(this).attr("lname");
                    var suffix = $(this).attr("suffix");
                    var empnum = $(this).attr("empnum");
                    var email_add = $(this).attr("email_add");
                    var dept = $(this).attr("dept");
                    var user_role = $(this).attr("user_role");
                    var account = $(this).attr("account");
                    var account_date = $(this).attr("account_date");
                    var account_type = $(this).attr("account_type");
                    var username = $(this).attr("username");

                    //alert(dept+user_role);
                    
                    //Check if Apps user is SA or Admin
                    var apps_userid = $("#hid_userid").val();
                    var sidebar = "Setup";
                    var submenu = "Setup-User";
                    var access = "access_modify";
                    var access_value = "Yes";
                    var base_path = base_url + "/Users/get_user_access_onClick"; 
                    $.ajax({
                        type: "POST",
                        url: base_path,
                        data: {apps_userid:apps_userid,sidebar:sidebar,submenu:submenu,access:access,access_value:access_value},
                        cache: false,
                        //async:false, //spinner doest work if enable  image.length == 1
                        dataType: 'json',
                        beforeSend: function() {
                                                                
                        },
                        success: function(data) {
                            //alert(data.status);
                            if(data.status) {
                                //get QRcode of this record
                            //    var base_path = base_url + "/Users/get_user_data"; 
                            //    $.ajax({
                            //        type: "POST",
                            //        url: base_path,
                            //        data: {recid_user:recid_user},
                            //        cache: false,
                                    //async:false, //spinner doest work if enable  image.length == 1
                            //        dataType: 'json',
                            //        beforeSend: function() {
                                                                        
                            //        },
                            //        success: function(data) {
                                        //alert(data.qrcode.length);
                            //            if(data.qrcode.length > 1) {
                                            //Div 
                            //                $("#div_qrcode_display").show();
                            //                $('#qrcode_edit').html(data.qrcode);
                            //            } else {
                                            //Div 
                            //                $("#div_qrcode_display").hide();
                            //            }
                                        
                            //        }//end success
                            //    });//ajax 

                            //Filling Dropdown Dept.
                                var base_path = base_url + "/Users/Fill_Dropdown_dept";
                                $.ajax({
                                    url: base_path,
                                    method:'POST',
                                    dataType: 'json',
                                    success:function(data) {
                                        //alert(data.length);
                                        //for edit record
                                        var html2='';
                                        //html2 += "<option value ='" +"Choose..."+"'>"+"Choose..."+"</option>";
                                        for(var count=0;count < data.length; count++) {   
                                            if(data[count].dept != "SADMIN") {
                                                html2 += "<option value ='" +data[count].dept+"'>"+data[count].dept+"</option>";
                                            }
                                        }
                                        $('#apps_useredit_dept').html(html2);	
                                        $("#apps_useredit_dept").val(dept);				
                                    }//end of success
                                });//end of ajax
                            
                            //Filling Dropdown User Role.
                                var base_path = base_url + "/Users/Fill_Dropdown_user_role";
                                    $.ajax({
                                        url: base_path,
                                        method:'POST',
                                        dataType: 'json',
                                        success:function(data) {
                                            //alert(data.length);
                                            //for edit user
                                            var html2='';
                                            //html2 += "<option value ='" +"Choose..."+"'>"+"Choose..."+"</option>";
                                            for(var count=0;count < data.length; count++) {   
                                                html2 += "<option value ='" +data[count].user_role+"'>"+data[count].user_role+"</option>";
                                            }
                                            $('#apps_useredit_user_role').html(html2);	
                                            $("#apps_useredit_user_role").val(user_role);					
                                        }//end of success
                                    });//end of ajax

                                $('#modal_application_useredit').modal('show');
                                
                                $("#apps_useredit_fname").val(fname);
                                $("#apps_useredit_mname").val(mname);
                                $("#apps_useredit_lname").val(lname);
                                $("#apps_useredit_suffix").val(suffix);
                                $("#apps_useredit_empnum").val(empnum);
                                $("#apps_useredit_email_add").val(email_add);
                                $("#apps_useredit_dept").val(dept);
                                $("#apps_useredit_user_role").val(user_role);
                                $("#apps_useredit_account").val(account);
                                $("#apps_useredit_account_type").val(account_type); 
                                $("#apps_useredit_username").val(username);

                                $("#useredit_sel_recid_user").val(recid_user);
                                $("#useredit_db_fname").val(fname);
                                $("#useredit_db_mname").val(mname);
                                $("#useredit_db_lname").val(lname);
                                $("#useredit_db_suffix").val(suffix);
                                $("#useredit_db_empnum").val(empnum);
                                $("#useredit_db_email_add").val(email_add);
                                $("#useredit_db_dept").val(dept);
                                $("#useredit_db_user_role").val(user_role);
                                $("#useredit_db_account").val(account);
                                $("#useredit_db_account_date").val(account_date);
                                $("#useredit_db_account_type").val(account_type);
                                $("#useredit_db_username").val(username);
                                
                                //$('#qrcode_edit').html('<img src="'+qrcodes+'" width="100" height="100">');

                            } else {
                                //alert("No Access");
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error

                            } //end data.status

                        }//end success
                    });//ajax 

                });//end of document click
            //User Edit - End

            //User Access Edit - Start
                $(document).on('click','.user_access_edit', function() { 

                    var recid_user = $(this).attr("recid_user");   //ung value ay nsa pag display ng record sa controller
                    var fname = $(this).attr("fname");
                    var mname = $(this).attr("mname");
                    var lname = $(this).attr("lname");
                    var suffix = $(this).attr("suffix");
                    
                    var apps_userid = $("#hid_userid").val();
                    //alert(apps_userid);

                    //Check if Apps user is SA or Admin
                    var sidebar = "Setup";
                    var submenu = "Setup-User";
                    var access = "access_useraccess";
                    var access_value = "Yes";
                    var base_path = base_url + "/Users/get_user_access_onClick"; 
                    $.ajax({
                        type: "POST",
                        url: base_path,
                        data: {apps_userid:apps_userid,sidebar:sidebar,submenu:submenu,access:access,access_value:access_value},
                        cache: false,
                        //async:false, //spinner doest work if enable  image.length == 1
                        dataType: 'json',
                        beforeSend: function() {
                                                                
                        },
                        success: function(data) {
                            //alert(data.status);
                            if(data.status) {
                                //get current user access of selected record
                                var base_path = base_url + "/Users/get_user_access"; 
                                $.ajax({
                                    type: "POST",
                                    url: base_path,
                                    data: {recid_user:recid_user},
                                    cache: false,
                                    //async:false, //spinner doest work if enable  image.length == 1
                                    dataType: 'json',
                                    beforeSend: function() {
                                                                        
                                    },
                                    success: function(data) {
                                        setup_user_submenu_access = data.setup_user_submenu_access;            
                                            setup_user_submenu_access_read = data.setup_user_submenu_access_read;
                                            setup_user_submenu_access_write = data.setup_user_submenu_access_write;
                                            setup_user_submenu_access_modify = data.setup_user_submenu_access_modify;
                                            setup_user_submenu_access_suspend = data.setup_user_submenu_access_suspend;
                                            setup_user_submenu_access_useraccess = data.setup_user_submenu_access_useraccess;
                                            
                                        //Menu apps_useraccess_dashboard
                                        $("#apps_useraccess_dashboard").val(data.sidebar_dashboard);
                                        
                                        //Event Request
                                        $("#apps_useraccess_eventRequest").val(data.sidebar_event_request);
                                        if(data.sidebar_event_request == "Yes") {
                                            //Show/Hide submenu Div
                                            $("#div_event_request_priv").show(); //with User privilege
                                            //Start Privilege
                                            if(data.event_request_access_read == "Yes") {
                                                $("#apps_useraccess_event_request_read").prop("checked", true); //uncheck radio checkbox
                                            } else {
                                                $("#apps_useraccess_event_request_read").prop("checked", false); //uncheck radio checkbox
                                            }

                                            if(data.event_request_access_write == "Yes") {
                                                $("#apps_useraccess_event_request_write").prop("checked", true); //uncheck radio checkbox
                                            } else {
                                                $("#apps_useraccess_event_request_wrie").prop("checked", false); //uncheck radio checkbox
                                            }

                                            if(data.event_request_access_modify == "Yes") {
                                                $("#apps_useraccess_event_request_modify").prop("checked", true); //uncheck radio checkbox
                                            } else {
                                                $("#apps_useraccess_event_request_modify").prop("checked", false); //uncheck radio checkbox
                                            }
                                            //End Privilege

                                        } else {
                                            //Show/Hide submenu Div
                                            $("#div_event_request_priv").hide();
                                        }


                                        if(data.sidebar_setup == "Yes") {
                                            //Department
                                            $("#apps_useraccess_setup_department").val(data.setup_department_submenu_access);
                                            if(data.setup_department_submenu_access == "Yes") {
                                                //Show/Hide submenu Div
                                                $("#div_dept_priv").show(); //with User privilege
                                                //Start Privilege
                                                if(data.setup_department_submenu_access_read == "Yes") {
                                                    $("#apps_useraccess_dept_read").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_dept_read").prop("checked", false); //uncheck radio checkbox
                                                }

                                                if(data.setup_department_submenu_access_write == "Yes") {
                                                    $("#apps_useraccess_dept_write").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_dept_wrie").prop("checked", false); //uncheck radio checkbox
                                                }

                                                if(data.setup_department_submenu_access_modify == "Yes") {
                                                    $("#apps_useraccess_dept_modify").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_dept_modify").prop("checked", false); //uncheck radio checkbox
                                                }
                                                //End Privilege

                                            } else {
                                                //Show/Hide submenu Div
                                                $("#div_dept_priv").hide();
                                            }

                                            //Role
                                            $("#apps_useraccess_setup_role").val(data.setup_role_submenu_access);
                                            if(data.setup_role_submenu_access == "Yes") {
                                                //Show/Hide submenu Div
                                                $("#div_role_priv").show(); //with User privilege

                                                //Start Privilege
                                                if(data.setup_role_submenu_access_read == "Yes") {
                                                    $("#apps_useraccess_role_read").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_role_read").prop("checked", false); //uncheck radio checkbox
                                                }

                                                if(data.setup_role_submenu_access_write == "Yes") {
                                                    $("#apps_useraccess_role_write").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_role_wrie").prop("checked", false); //uncheck radio checkbox
                                                }

                                                if(data.setup_role_submenu_access_modify == "Yes") {
                                                    $("#apps_useraccess_role_modify").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_role_modify").prop("checked", false); //uncheck radio checkbox
                                                }
                                                //End Privilege

                                            } else {
                                                //Show/Hide submenu Div
                                                $("#div_role_priv").hide();
                                            }

                                            $("#apps_useraccess_setup").val("Yes");

                                            //Show/Hide submenu Div base on user access   
                                            $("#div_setup_submenu").show();

                                            if(setup_user_submenu_access == "Yes") {
                                                $("#apps_useraccess_setup_user").val("Yes");
                                                $("#div_setup_user_priv").show(); //with User privilege
                                                if(setup_user_submenu_access_read == "Yes") {
                                                    $("#apps_useraccess_setup_user_read").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_setup_user_read").prop("checked", false); //uncheck radio checkbox
                                                }

                                                if(setup_user_submenu_access_write == "Yes") {
                                                    $("#apps_useraccess_setup_user_write").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_setup_user_write").prop("checked", false); //uncheck radio checkbox
                                                }

                                                if(setup_user_submenu_access_modify == "Yes") {
                                                    $("#apps_useraccess_setup_user_modify").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_setup_user_modify").prop("checked", false); //uncheck radio checkbox
                                                }

                                                if(setup_user_submenu_access_suspend == "Yes") {
                                                    $("#apps_useraccess_setup_user_suspend").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_setup_user_suspend").prop("checked", false); //uncheck radio checkbox
                                                }

                                                if(setup_user_submenu_access_useraccess == "Yes") {
                                                    $("#apps_useraccess_setup_useraccess").prop("checked", true); //uncheck radio checkbox
                                                } else {
                                                    $("#apps_useraccess_setup_useraccess").prop("checked", false); //uncheck radio checkbox
                                                }

                                            } else {
                                                $("#apps_useraccess_setup_department").val(data.setup_department_submenu_access);
                                                $("#apps_useraccess_setup_role").val(data.setup_role_submenu_access);

                                                $("#apps_useraccess_setup_user").val("No");
                                                $("#div_setup_user_priv").hide(); //No User privilege
                                            }

                                        } else {
                                            $("#apps_useraccess_setup").val("No");

                                            $("#div_setup_submenu").hide();
                                        }

                                    }//end success
                                });//ajax 

                                $('#modal_application_useraccess').modal('show');
                                
                                $("#apps_useraccess_fname").val(fname+" | "+recid_user);
                                $("#apps_useraccess_mname").val(mname);
                                $("#apps_useraccess_lname").val(lname);
                                $("#apps_useraccess_suffix").val(suffix);

                                $("#useraccess_sel_recid_user").val(recid_user);

                                
                            } else {
                                //alert("No Access");
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error

                            } //end data.status

                        }//end success
                    });//ajax 

                });//end of document click

                $(document).off('change', '#apps_useraccess_eventRequest').on('change', '#apps_useraccess_eventRequest', function (event) {
                    event.preventDefault();
                    var changeVar = $("#apps_useraccess_eventRequest").val();
                    //alert(changeVar);
                    if(changeVar == "Yes") {
                        $("#div_event_request_priv").show(); //User privilege
                        //naka yes ang setup_user, automatic may Rad privilege sya
                        $("#apps_useraccess_event_request_read").prop("checked", true); //uncheck radio checkbox
                        //document.getElementById("apps_useraccess_setup_user_read").disabled = true; //disable checkbox
                    } else {
                        $("#div_event_request_priv").hide(); //User privilege
                        //reset value of setup_user_priv 
                        $("#apps_useraccess_event_request_read").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_event_request_write").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_event_request_modify").prop("checked", false); //uncheck radio checkbox
                    }
                });//end of document click

                $(document).off('change', '#apps_useraccess_setup_department').on('change', '#apps_useraccess_setup_department', function (event) {
                    event.preventDefault();
                    var changeVar = $("#apps_useraccess_setup_department").val();
                    //alert(changeVar);
                    if(changeVar == "Yes") {
                        $("#div_dept_priv").show(); //User privilege
                        //naka yes ang setup_user, automatic may Rad privilege sya
                        $("#apps_useraccess_dept_read").prop("checked", true); //uncheck radio checkbox
                        //document.getElementById("apps_useraccess_setup_user_read").disabled = true; //disable checkbox
                    } else {
                        $("#div_dept_priv").hide(); //User privilege
                        //reset value of setup_user_priv 
                        $("#apps_useraccess_dept_read").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_dept_write").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_dept_modify").prop("checked", false); //uncheck radio checkbox
                    }
                });//end of document click

                $(document).off('change', '#apps_useraccess_setup_role').on('change', '#apps_useraccess_setup_role', function (event) {
                    event.preventDefault();
                    var changeVar = $("#apps_useraccess_setup_role").val();
                    //alert(changeVar);
                    if(changeVar == "Yes") {
                        $("#div_role_priv").show(); //User privilege
                        //naka yes ang setup_user, automatic may Rad privilege sya
                        $("#apps_useraccess_role_read").prop("checked", true); //uncheck radio checkbox
                        //document.getElementById("apps_useraccess_setup_user_read").disabled = true; //disable checkbox
                    } else {
                        $("#div_role_priv").hide(); //User privilege
                        //reset value of setup_user_priv 
                        $("#apps_useraccess_role_read").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_role_write").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_role_modify").prop("checked", false); //uncheck radio checkbox
                    }
                });//end of document click

                $(document).off('change', '#apps_useraccess_setup').on('change', '#apps_useraccess_setup', function (event) {
                    event.preventDefault();
                    var changeVar = $("#apps_useraccess_setup").val();
                    //alert(changeVar);
                    if(changeVar == "Yes") {
                        $("#div_setup_submenu").show();                        
                        $("#div_setup_user_priv").hide(); //No User privilege

                    } else {
                        $("#div_setup_submenu").hide();
                        $("#div_setup_user_priv").hide(); //No User privilege
                        //reset value of setup_user_priv 
                        $("#apps_useraccess_setup_user").val("No");
                        $("#apps_useraccess_setup_user_read").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_setup_user_write").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_setup_user_modify").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_setup_user_suspend").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_setup_user_useraccess").prop("checked", false); //uncheck radio checkbox
                    }
                });//end of document click

                $(document).off('change', '#apps_useraccess_setup_user').on('change', '#apps_useraccess_setup_user', function (event) {
                    event.preventDefault();
                    var changeVar = $("#apps_useraccess_setup_user").val();
                    //alert(changeVar);
                    if(changeVar == "Yes") {
                        $("#div_setup_user_priv").show(); //User privilege
                        //naka yes ang setup_user, automatic may Rad privilege sya
                        $("#apps_useraccess_setup_user_read").prop("checked", true); //uncheck radio checkbox
                        //document.getElementById("apps_useraccess_setup_user_read").disabled = true; //disable checkbox
                    } else {
                        $("#div_setup_user_priv").hide(); //User privilege
                        //reset value of setup_user_priv 
                        $("#apps_useraccess_setup_user_read").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_setup_user_write").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_setup_user_modify").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_setup_user_suspend").prop("checked", false); //uncheck radio checkbox
                        $("#apps_useraccess_setup_user_useraccess").prop("checked", false); //uncheck radio checkbox
                    }
                });//end of document click

                $(document).on("click","#btn-close-apps_useraccess,#modal-btn-close-apps_useraccess",function(e) {
                     //alert("close");
                    $("#apps_useraccess_dashboard").val("");
                    //reset value of checkbox

                    $("#apps_useraccess_eventRequest").val("");
                    //reset value of checkbox
                    $("#apps_useraccess_event_request_read").prop("checked", false); //uncheck radio checkbox
                    $("#apps_useraccess_event_request_write").prop("checked", false); //uncheck radio checkbox
                    $("#apps_useraccess_event_request_modify").prop("checked", false); //uncheck radio checkbox

                    $("#apps_useraccess_setup").val("");
                    //reset value of checkbox

                    $("#apps_useraccess_setup_department").val("");
                    //reset value of checkbox
                    $("#apps_useraccess_dept_read").prop("checked", false); //uncheck radio checkbox
                    $("#apps_useraccess_dept_write").prop("checked", false); //uncheck radio checkbox
                    $("#apps_useraccess_dept_modify").prop("checked", false); //uncheck radio checkbox

                    $("#apps_useraccess_setup_role").val("");
                    //reset value of checkbox
                    $("#apps_useraccess_role_read").prop("checked", false); //uncheck radio checkbox
                    $("#apps_useraccess_role_write").prop("checked", false); //uncheck radio checkbox
                    $("#apps_useraccess_role_modify").prop("checked", false); //uncheck radio checkbox

                    $("#apps_useraccess_setup_user").val("");
                    //reset value of checkbox
                    $("#apps_useraccess_setup_user_read").prop("checked", false); //uncheck radio checkbox
                    $("#apps_useraccess_setup_user_write").prop("checked", false); //uncheck radio checkbox
                    $("#apps_useraccess_setup_user_modify").prop("checked", false); //uncheck radio checkbox
                    $("#apps_useraccess_setup_user_suspend").prop("checked", false); //uncheck radio checkbox
                    $("#apps_useraccess_setup_user_useraccess").prop("checked", false); //uncheck radio checkbox
                    
                 });//end of document click  

            //User Access Edit - End   

		//SHOW MODAL - END =====================================================================================


    //DEPARTMENT - START

        //SHOW MODAL - START =====================================================================================

            //Department Add - Start
            $(document).off('click', '#breadcrumb_application_department_add').on('click', '#breadcrumb_application_department_add', function (event) {
                event.preventDefault();
                //alert("Modal Add");
                //$('#modal_application_user_add').modal('show');  

                var apps_userid = $("#hid_userid").val();
                //alert(apps_userid);

                //Check if Apps user is SA or Admin
                var sidebar = "Setup";
                var submenu = "Setup-Department";
                var access = "submenu_access"; 
                var access_value = "Yes"; 
                var base_path = base_url + "/Users/get_user_access_onClick"; 
                $.ajax({
                    type: "POST",
                    url: base_path,
                    data: {apps_userid:apps_userid,sidebar:sidebar,submenu:submenu,access:access,access_value:access_value},
                    cache: false,
                    //async:false, //spinner doest work if enable  image.length == 1
                    dataType: 'json',
                    beforeSend: function() {
                                                            
                    },
                    success: function(data) {
                        //alert(data.status);
                        if(data.status) {
                            $('#modal_application_deptadd').modal('show');  

                        } else {
                            //alert("No Access");
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: ''+ data.return_msg + '',
                                confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                confirmButtonAriaLabel: 'Thumbs up, great!',
                                //footer: '<a href="">Why do I have this issue?</a>'
                            })//end swall.fire Error

                        } //end data.status

                    }//end success
                });//ajax 

            });//end of document click
            //Department Add - End

            //Department Edit - Start
                $(document).on('click','.department_edit', function() { 

                    var recid_dept = $(this).attr("recid_dept");   //ung value ay nsa pag display ng record sa controller
                    
                    var dept_code = $(this).attr("dept_code");
                    var dept_desc = $(this).attr("dept_desc");
                    var dept_status = $(this).attr("dept_status");
                    
                    //Check if Apps user is SA or Admin
                    var apps_userid = $("#deptedit_user_recid").val();
                    var sidebar = "Setup";
                    var submenu = "Setup-Department";
                    var access = "access_modify";
                    var access_value = "Yes";
                    var base_path = base_url + "/Users/get_user_access_onClick"; 
                    $.ajax({
                        type: "POST",
                        url: base_path,
                        data: {apps_userid:apps_userid,sidebar:sidebar,submenu:submenu,access:access,access_value:access_value},
                        cache: false,
                        //async:false, //spinner doest work if enable  image.length == 1
                        dataType: 'json',
                        beforeSend: function() {
                                                                
                        },
                        success: function(data) {
                            //alert(data.status);
                            if(data.status) {
                                
                                $('#modal_application_deptedit').modal('show');
                                
                                $("#apps_deptedit_code").val(dept_code);
                                $("#apps_deptedit_desc").val(dept_desc);
                                $("#apps_deptedit_status").val(dept_status);
                            
                                $("#deptedit_db_recid").val(recid_dept);
                                $("#deptedit_db_code").val(dept_code);
                                $("#deptedit_db_desc").val(dept_desc);
                                $("#deptedit_db_status").val(dept_status);

                            } else {
                                //alert("No Access");
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error

                            } //end data.status

                        }//end success
                    });//ajax 
                });//end of document click
            //Department Edit - End

            //Role Add - Start
                $(document).off('click', '#breadcrumb_application_role_add').on('click', '#breadcrumb_application_role_add', function (event) {
                    event.preventDefault();
                    //alert("Modal Add");
                    //$('#modal_application_user_add').modal('show');  

                    var apps_userid = $("#hid_userid").val();
                    //alert(apps_userid);

                    //Check if Apps user is SA or Admin
                    var sidebar = "Setup";
                    var submenu = "Setup-Role";
                    var access = "submenu_access"; 
                    var access_value = "Yes"; 
                    var base_path = base_url + "/Users/get_user_access_onClick"; 
                    $.ajax({
                        type: "POST",
                        url: base_path,
                        data: {apps_userid:apps_userid,sidebar:sidebar,submenu:submenu,access:access,access_value:access_value},
                        cache: false,
                        //async:false, //spinner doest work if enable  image.length == 1
                        dataType: 'json',
                        beforeSend: function() {
                                                                
                        },
                        success: function(data) {
                            //alert(data.status);
                            if(data.status) {
                                $('#modal_application_roldadd').modal('show');  

                            } else {
                                //alert("No Access");
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error

                            } //end data.status

                        }//end success
                    });//ajax 

                });//end of document click
            //Role Add - End

            //Role Edit - Start
                $(document).on('click','.role_edit', function() { 

                    var recid_userrole = $(this).attr("recid_userrole");   //ung value ay nsa pag display ng record sa controller
                    
                    var user_role = $(this).attr("user_role");
                    var user_role_sign = $(this).attr("user_role_sign");
                    //alert(user_role_sign);
                    
                    //Check if Apps user is SA or Admin
                    var apps_userid = $("#roleedit_user_recid").val();
                    var sidebar = "Setup";
                    var submenu = "Setup-Role";
                    var access = "access_modify";
                    var access_value = "Yes";

                    var base_path = base_url + "/Users/get_user_access_onClick"; 
                    $.ajax({
                        type: "POST",
                        url: base_path,
                        data: {apps_userid:apps_userid,sidebar:sidebar,submenu:submenu,access:access,access_value:access_value},
                        cache: false,
                        //async:false, //spinner doest work if enable  image.length == 1
                        dataType: 'json',
                        beforeSend: function() {
                                                                
                        },
                        success: function(data) {
                            //alert(data.status);
                            if(data.status) {
                        
                                $('#modal_application_roleedit').modal('show');
                                
                                $("#apps_roleedit_role").val(user_role); 
                                $("#apps_roleedit_role_signatory").val(user_role_sign);
                                
                                $("#roleedit_db_recid").val(recid_userrole);
                                $("#roleedit_db_role").val(user_role); 
                                

                            } else {
                                //alert("No Access");
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error

                            } //end data.status

                        }//end success
                    });//ajax 
                });//end of document click
            //Role Edit - End

        //SHOW MODAL - END =====================================================================================

        //ADD DEPARTMENT | CHECK INPUT - START
            var add_deptcode = 1;
            var add_deptdesc = 1;

            $(document).on("focusout keyup","#apps_deptadd_code",function(e) {
                var input = $("#apps_deptadd_code").val();
                if (input.length == 0) {
                    $("#apps_deptadd_code_error").html('Department Code is blank');
                    add_deptcode = 1;
                } else {
                    //check if Department already exist in DB
                    var tablename = "application_department";
                    var fieldname = "dept";
                    var fieldvalue = input;
                    var base_path = base_url + "/Users/check_record_exist_singleRec"; 
                    $.ajax({
                        type: "POST",
                        url: base_path,
                        data: {tablename:tablename,fieldname:fieldname,fieldvalue:fieldvalue},
                        cache: false,
                        //async:false, //spinner doest work if enable
                        dataType: 'json',
                        beforeSend: function() {
                                                            
                        },
                        success: function(data) {
                            if(data.status) {
                                $("#apps_deptadd_code_error").html('Department Code already exist');
                                add_deptcode = 1;
                            } else {
                                $("#apps_deptadd_code_error").html('');
                                add_deptcode = 0;
                            }
                            //check_input_deptadd();
                        }//end success
                    });//ajax 
                    
                }
                check_input_deptadd();
            });//end of document click  

            $(document).on("focusout keyup","#apps_deptadd_desc",function(e) {
                var input = $("#apps_deptadd_desc").val();
                if (input.length == 0) {
                    $("#apps_deptadd_desc_error").html('Description is blank');
                    add_deptdesc = 1;
                } else {
                    $("#apps_deptadd_desc_error").html('');
                    add_deptdesc = 0;
                }
                check_input_deptadd();
            });//end of document click  

            $(document).on("click","#btn-close-apps_deptadd,#modal-close-apps_deptadd",function(e) {
                // alert("close");
                $("#apps_deptadd_code").val("");
                $("#apps_deptadd_desc").val("");
                
                //$("#apps_useradd_suffix").val("Choose...");
    
                $("#apps_deptadd_code_error").html('');
                $("#apps_deptadd_desc_error").html('');
                
            });//end of document click  
 
            function check_input_deptadd() {
                if (add_deptcode == 1 || add_deptdesc == 1 )   
                { 
                    document.getElementById("btn_apps_deptadd_save").disabled = true;
                                
                } else {
                    document.getElementById("btn_apps_deptadd_save").disabled = false;        
                }
    
            }//end of function
        //ADD DEPARTMENT | CHECK INPUT - END

        //EDIT DEPARTMENT | CHECK INPUT - START
            var deptedit_code = 0;
            var deptedit_desc = 0;
            var deptedit_status = 0;

            $(document).off('focusout keyup', '#apps_deptedit_code').on('focusout keyup', '#apps_deptedit_code', function () {
				//event.preventDefault();
				var newVar = $("#apps_deptedit_code").val();
				var oldVar = $("#deptedit_db_code").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
                    $("#apps_deptedit_code_error").html('');
					deptedit_code = 0;

				} else {
                    //check if Department already exist in DB
                    var tablename = "application_department";
                    var fieldname = "dept";
                    var fieldvalue = newVar;
                    var base_path = base_url + "/Users/check_record_exist_singleRec"; 
                    $.ajax({
                        type: "POST",
                        url: base_path,
                        data: {tablename:tablename,fieldname:fieldname,fieldvalue:fieldvalue},
                        cache: false,
                        //async:false, //spinner doest work if enable
                        dataType: 'json',
                        beforeSend: function() {
                                                            
                        },
                        success: function(data) {
                            //alert(data.status);
                            if(data.status) {
                                $("#apps_deptedit_code_error").html('Department Code already exist');
                                deptedit_code = 0;
                            } else {
                                $("#apps_deptedit_code_error").html('');
                                deptedit_code = 1;
                            }
                            check_deptUpdate_data();
                        }//end success
                    });//ajax 

				}
				check_deptUpdate_data();
			});//end of document click

            $(document).off('focusout keyup', '#apps_deptedit_desc').on('focusout keyup', '#apps_deptedit_desc', function () {
				//event.preventDefault();
				var newVar = $("#apps_deptedit_desc").val();
				var oldVar = $("#deptedit_db_desc").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					deptedit_desc = 0;
				} else {
					deptedit_desc = 1;
				}
				check_deptUpdate_data();
			});//end of document click

            $(document).off('change', '#apps_deptedit_status').on('change', '#apps_deptedit_status', function () {
				//event.preventDefault();
				var newVar = $("#apps_deptedit_status").val();
				var oldVar = $("#deptedit_db_statusc").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					deptedit_status = 0;
				} else {
					deptedit_status = 1;
				}
				check_deptUpdate_data();
			});//end of document click

            $(document).on("click","#btn-close-apps_deptedit, #modal-btn-close-apps_deptedit",function(e) {
                $("#apps_deptedit_code").val('');
                $("#apps_deptedit_code_error").html('');
            });//end of document click 
			
			function check_deptUpdate_data() {
				//If no new record is entered,button update is disabled
                if (deptedit_code == 1 || deptedit_desc == 1 || deptedit_status == 1)
                {
                    document.getElementById("btn_apps_deptedit_update").disabled = false;
                } else {
                    document.getElementById("btn_apps_deptedit_update").disabled = true;
                }
            }//end of function 
        //EDIT DEPARTMENT | CHECK INPUT - END

    //DEPARTMENT - END

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //ROLE - START

        //ADD ROLE | CHECK INPUT - START
            var a_role = 1;

            $(document).on("focusout keyup","#apps_roldadd_role",function(e) {
                var input = $("#apps_roldadd_role").val();
                if (input.length == 0) {
                    $("#apps_roldadd_role_error").html('Role is blank');
                    a_deptcode = 1;
                } else {
                    //check if Department already exist in DB
                    var tablename = "application_user_role";
                    var fieldname = "user_role";
                    var fieldvalue = input;
                    var base_path = base_url + "/Users/check_record_exist_singleRec"; 
                    $.ajax({
                        type: "POST",
                        url: base_path,
                        data: {tablename:tablename,fieldname:fieldname,fieldvalue:fieldvalue},
                        cache: false,
                        //async:false, //spinner doest work if enable
                        dataType: 'json',
                        beforeSend: function() {
                                                            
                        },
                        success: function(data) {
                            if(data.status) {
                                $("#apps_roldadd_role_error").html('Role already exist');
                                a_role = 1;
                            } else {
                                $("#apps_roldadd_role_error").html('');
                                a_role = 0;
                            }
                            check_input_roleadd();
                        }//end success
                    });//ajax 
                    
                }
                check_input_roleadd();
            });//end of document click  


            $(document).on("click","#btn-close-apps_roldadd,#modal-close-apps_roldaddd",function(e) {
                // alert("close");
                $("#apps_roldadd_role").val("");
                
                //$("#apps_useradd_suffix").val("Choose...");

                $("#apps_roldadd_role_error").html('');
                
            });//end of document click  

            function check_input_roleadd() {
                if (a_role == 1 )   
                { 
                    document.getElementById("btn_apps_roldadd_save").disabled = true;
                                
                } else {
                    document.getElementById("btn_apps_roldadd_save").disabled = false;        
                }
            }//end of function
        //ADD ROLE | CHECK INPUT - END

        //EDIT ROLE | CHECK INPUT - START
            var roleedit_role = 0;
            var roleedit_role_sign = 0;
            
            $(document).off('focusout keyup', '#apps_roleedit_role').on('focusout keyup', '#apps_roleedit_role', function () {
                //event.preventDefault();
                var newVar = $("#apps_roleedit_role").val();
                var oldVar = $("#roleedit_db_role").val();
                //alert(newVar+"=new|old="+oldVar);
                if(newVar == oldVar) {
                    $("#apps_roleedit_role_error").html('');
                    roleedit_role = 0;
                } else {
                    //check if Department already exist in DB
                    var tablename = "application_user_role";
                    var fieldname = "user_role";
                    var fieldvalue = newVar;
                    var base_path = base_url + "/Users/check_record_exist_singleRec"; 
                    $.ajax({
                        type: "POST",
                        url: base_path,
                        data: {tablename:tablename,fieldname:fieldname,fieldvalue:fieldvalue},
                        cache: false,
                        //async:false, //spinner doest work if enable
                        dataType: 'json',
                        beforeSend: function() {
                                                            
                        },
                        success: function(data) {
                            if(data.status) {
                                $("#apps_roleedit_role_error").html('Role already exist');
                                roleedit_role = 0;
                            } else {
                                $("#apps_roleedit_role_error").html('');
                                roleedit_role = 1;
                            }
                            check_roleUpdate_data();
                        }//end success
                    });//ajax 

                    roleedit_role = 1;
                }
                check_roleUpdate_data();
            });//end of document click

            $(document).off('change', '#apps_roleedit_role_signatory').on('change', '#apps_roleedit_role_signatory', function () {
                //event.preventDefault();
                var newVar = $("#apps_roleedit_role_signatory").val();
                var oldVar = $("#roleedit_db_role_sign").val();
                //alert(newVar+"=new|old="+oldVar);
                if(newVar == oldVar) {
                    roleedit_role_sign = 0;
                } else {
                    roleedit_role_sign = 1;
                }
                check_roleUpdate_data();
            });//end of document click

            $(document).on("click","#btn-close-apps_roleedit, #modal-btn-close-apps_roleedit",function(e) {
                $("#apps_roleedit_role").val('');
                $("#apps_roleedit_role_error").html('');
            });//end of document click 
            
            function check_roleUpdate_data() {
                //If no new record is entered,button update is disabled
                if (roleedit_role == 1 || roleedit_role_sign == 1)
                {
                    document.getElementById("btn_apps_roleedit_update").disabled = false;
                } else {
                    document.getElementById("btn_apps_roleedit_update").disabled = true;
                }
            }//end of function 
        //EDIT ROLE | CHECK INPUT - END
            
    //ROLE - END

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

        //EDIT USER | CHECK UPDATE FOR NEW VALUE -START
			var e_fname = 0;
			var e_mname = 0;
            var e_lname = 0;
            var e_suffix = 0;
            var e_empnum = 0;
            var e_email = 0;
            var e_dept = 0;
            var e_user_role = 0;
            var e_account = 0;
            var e_account_type = 0;
            var e_username = 0;
            var e_password = 0;
			
			$(document).off('focusout keyup', '#apps_useredit_fname').on('focusout keyup', '#apps_useredit_fname', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_fname").val();
				var oldVar = $("#useredit_db_fname").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					e_fname = 0;
				} else {
					e_fname = 1;
				}
				check_userUpdate_data();
			});//end of document click

			$(document).off('focusout keyup', '#apps_useredit_mname').on('focusout keyup', '#apps_useredit_mname', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_mname").val();
				var oldVar = $("#useredit_db_mname").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					e_mname = 0;
				} else {
					e_mname = 1;
				}
				check_userUpdate_data();
			});//end of document click

            $(document).off('focusout keyup', '#apps_useredit_lname').on('focusout keyup', '#apps_useredit_lname', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_lname").val();
				var oldVar = $("#useredit_db_lname").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					e_lname = 0;
				} else {
					e_lname = 1;
				}
				check_userUpdate_data();
			});//end of document click

            $(document).off('change focusout', '#apps_useredit_suffix').on('change focusout', '#apps_useredit_suffix', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_suffix").val();
				var oldVar = $("#useredit_db_suffix").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					e_suffix = 0;
				} else {
					e_suffix = 1;
				}
				check_userUpdate_data();
			});//end of document click

            $(document).off('focusout keyup', '#apps_useredit_empnum').on('focusout keyup', '#apps_useredit_empnum', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_empnum").val();
				var oldVar = $("#useredit_db_empnum").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					e_empnum = 0;
				} else {
					e_empnum = 1;
				}
				check_userUpdate_data();
			});//end of document click

            $(document).off('focusout keyup', '#apps_useredit_email_add').on('focusout keyup', '#apps_useredit_email_add', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_email_add").val();
                var email = $("#apps_useredit_email_add").val();
				var oldVar = $("#useredit_db_email_add").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					e_email = 0;
				} else {
                    //check if email is school email
                    //alert(SchoolEmail(email));
                    if(!SchoolEmail(email)) { 
                        $("#apps_useredit_email_add_error").html('Invalid school email!');
                        e_email = 0;
                    } else {
                        //check if email is already exist
                        //alert(email);
                        var base_path = base_url + "/Users/check_email_exist"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {email:email},
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'json',
                                beforeSend: function() {
                                                        
                                },
                                success: function(data) {
                                    if(data.status) {
                                        $("#apps_useredit_email_add_error").html('email address already exist');
                                        e_email = 0;
                                    } else {
                                        $("#apps_useredit_email_add_error").html('');
                                        e_email = 1;
                                    }
                                    check_userUpdate_data();
                                }//end success
                        });//ajax 
                    } //end if email is school email
                    
				}
				check_userUpdate_data();
			});//end of document click

            $(document).off('change focusout', '#apps_useredit_dept').on('change focusout', '#apps_useredit_dept', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_dept").val();
				var oldVar = $("#useredit_db_dept").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					e_dept = 0;
				} else {
					e_dept = 1;
				}
				check_userUpdate_data();
			});//end of document click

            $(document).off('change focusout', '#apps_useredit_user_role').on('change focusout', '#apps_useredit_user_role', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_user_role").val();
				var oldVar = $("#useredit_db_user_role").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					e_user_role = 0;
				} else {
					e_user_role = 1;
				}
				check_userUpdate_data();
			});//end of document click

            $(document).off('change focusout', '#apps_useredit_account').on('change focusout', '#apps_useredit_account', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_account").val();
				var oldVar = $("#useredit_db_account").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					e_account = 0;
				} else {
					e_account = 1;
				}
				check_userUpdate_data();
			});//end of document click

            $(document).off('change focusout', '#apps_useredit_account_type').on('change focusout', '#apps_useredit_account_type', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_account_type").val();
				var oldVar = $("#useredit_db_account_type").val();
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
					e_account_type = 0;
				} else {
					e_account_type = 1;
				}
				check_userUpdate_data();
			});//end of document click

            $(document).off('focusout keyup', '#apps_useredit_username').on('focusout keyup', '#apps_useredit_username', function () {
				//event.preventDefault();
				var newVar = $("#apps_useredit_username").val();
				var oldVar = $("#useredit_db_username").val();
                var input = newVar;
				//alert(newVar+"=new|old="+oldVar);
				if(newVar == oldVar) {
                    $("#apps_useredit_username_error").html('');
                    e_username = 0;

				} else {
					//e_username = 1;
                    if (input.length == 0) {
                        $("#apps_useredit_username_error").html('Username is blank');
                        e_username = 0;
                    } else {
                        //check if username already exist in DB
                        var base_path = base_url + "/Users/check_username_exist"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {input:input},
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'json',
                            beforeSend: function() {
                                                                
                            },
                            success: function(data) {
                                if(data.status) {
                                    $("#apps_useredit_username_error").html('Username address already exist');
                                    e_username = 0;
                                } else {
                                    $("#apps_useredit_username_error").html('');
                                    e_username = 1;
                                }
                                check_userUpdate_data();
                            }//end success
                        });//ajax 
                    }//end check input length
                    
				}//end newVar = oldVar

				check_userUpdate_data();
			});//end of document click

            $(document).on("focusout keyup","#apps_useredit_password",function(e) {
                var input = $("#apps_useredit_password").val();
                if (input.length == 0) {
                    $("#apps_useredit_password_error").html('Password is blank');
                    e_password = 0;
                } else {
                    if (verify_password_edit()) {
                        $("#apps_useredit_password_error").html('');
                        $("#apps_useredit_password_verify_error").html('');
                        e_password = 1;
                    } else {
                        $("#apps_useredit_password_error").html('Password is not verify');
                        $("#apps_useredit_password_verify_error").html('Password Verify is blank');
                        e_password = 0;
                    }
                }
                check_userUpdate_data();
            });//end of document click  
    
            $(document).on("focusout keyup","#apps_useredit_password_verify",function(e) {
                var input = $("#apps_useredit_password_verify").val();
                if (input.length == 0) {
                    $("#apps_useredit_password_verify_error").html('Password Verify is blank');
                    e_password = 0;
                } else {
                    if (verify_password_edit()) {
                        $("#apps_useredit_password_error").html('');
                        $("#apps_useredit_password_verify_error").html('');
                        e_password = 1;
                    } else {
                        $("#apps_useredit_password_error").html('Password is not verify');
                        $("#apps_useredit_password_verify_error").html('Password is not verify');
                        e_password = 0;
                    }
                }
                check_userUpdate_data();
            });//end of document click  

            $(document).on("click","#btn-close-apps_useredit",function(e) {
                $("#apps_useredit_password").val('');
                $("#apps_useredit_password_error").html('');
                $("#apps_useredit_password_verify").val('');
                $("#apps_useredit_password_verify_error").html('');

                $("#apps_useredit_email_add_error").html('');
            });//end of document click 
			
			function check_userUpdate_data() {
				//If no new record is entered,button update is disabled
                if (e_fname == 1 || e_mname == 1 || e_lname == 1 || e_suffix == 1 || e_empnum == 1 || e_email == 1 || 
                    e_dept == 1 || e_user_role == 1 || e_account == 1 || e_account_type == 1 || e_username == 1 || e_password == 1)
                {
                    document.getElementById("btn_apps_useredit_update").disabled = false;
                } else {
                    document.getElementById("btn_apps_useredit_update").disabled = true;
                }
            }//end of function 

		//EDIT USER | CHECK UPDATE FOR NEW VALUE -END

    //EDIT : USER - END

    //====================================================================================================
    //SPACER=>
    //====================================================================================================
        
    //EDIT : USER ACCESS  | CHECK UPDATE FOR NEW VALUE - START
        $(document).off('change focusout', '#apps_useraccess_dashboard').on('change focusout', '#apps_useraccess_dashboard', function () {
            //event.preventDefault();
            var newVar = $("#apps_useraccess_dashboard").val();
            var oldVar = $("#useraccess_db_dashboard").val();
            //alert(newVar+"=new|old="+oldVar);
            if(newVar == oldVar) {
                e_account_type = 0;
            } else {
                e_account_type = 1;
            }
            check_userAccess_Update_data()();
        });//end of document click

        function check_userAccess_Update_data() {
            //If no new record is entered,button update is disabled
            if (ua_dashboard == 1 
                )
            {
                document.getElementById("btn_apps_useraccess_update").disabled = false;
            } else {
                document.getElementById("btn_apps_useraccess_update").disabled = true;
            }
        }//end of function 

    //EDIT : USER ACCESS  | CHECK UPDATE FOR NEW VALUE - END

    //====================================================================================================
    //SPACER=>
    //====================================================================================================
    
}); //end of document ready ##############################################################################

function EmailIsValid(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}//end of function

function SchoolEmail(email) {
    var input = email;
    var first_split = input.split("@")[1];
    
    if(first_split == "ncst.edu.ph") { //only domain name is accepted as valid email
        return true;
    } else {
        return false;
    }

    //Gamitin lang ito kapag may suddomain -start
        //var second_split = first_split.split("."); //gamitin lang pag may subdomain ung domain
        //    if(second_split.length == 2) {
                //console.log('domain is : '+first_split);
                
                //return first_split;
        //    } else if(second_split.length > 2) {
                var str = first_split.substring(first_split.indexOf(".") + 1);
                //console.log('domain is : '+str);
        //       return str;
        //   }
    //Gamitin lang ito kapag may suddomain -End

}//end of function

function verify_password() {
    var password = $("#apps_useradd_pword").val();
    var pass_verify = $("#apps_useradd_pword_verify").val();

    if(password == pass_verify) {
        return true;
    } else {
        return false;
    }
}//end of function

function verify_password_edit() {
    var password = $("#apps_useredit_password").val();
    var pass_verify = $("#apps_useredit_password_verify").val();

    if(password == pass_verify) {
        return true;
    } else {
        return false;
    }
}//end of function

