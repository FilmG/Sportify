$(document).ready(function() {	
    //alert("App Employee JS");

    $(document).on('click','.eventrequest_approved', function() { 
        var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
        var role_sign_as = $(this).attr("role_sign_as");
        var submenu_v = $(this).attr("submenu");
        var approved_value = $(this).attr("approved_value");
        
        //alert(approved_value); 
        var apps_username = $("#hid_user_fullname").val();
       
        //WORKING AJAX FUNCTION WITH DATA {}
        var base_path = base_url + "/Sidebar_menu/check_session_employee"; 
        $.ajax({
            type: "POST",
            url: base_path,
            //data: {recid:recid},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
                beforeSend: function() {
                                        
                },
                success: function(data) {
                    //alert(data.session_status);
                    if(data.session_status) {
                        var apps_userid = $("#hid_userid").val();
                        //alert(apps_userid);

                        //Check if Apps user is SA or Admin
                        var sidebar = "Event_Approval";
                        var submenu = submenu_v;
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
                                    //alert(role_sign_as);

                                    //WORKING AJAX FUNCTION WITH DATA {}
                                    var base_path = base_url + "/Employee/eventrequest_approval"; 
                                    $.ajax({
                                        type: "POST",
                                        url: base_path,
                                        data: {recid_event_request:recid_event_request,role_sign_as:role_sign_as,apps_username:apps_username,approved_value:approved_value},
                                        cache: false,
                                        //async:false, //spinner doest work if enable
                                        dataType: 'html',
                                            beforeSend: function() {
                                                                    
                                            },
                                            success: function(data) {
                                                //alert(data.return_msg);
                                                //$("#div_event_request_display").load(base_url+"/Employee/eventrequest_approval"); 
                                                if(role_sign_as == "Course Adviser") {
                                                    $("#div_course_adviser").html(data); 
                                                }
                                                if(role_sign_as == "Course Coordinator") {
                                                    $("#div_course_coordinator").html(data); 
                                                }
                                                if(role_sign_as == "PSMO") {
                                                    $("#div_psmo").html(data); 
                                                }
                                                if(role_sign_as == "Academic Coordinator") {
                                                    $("#div_academic_coordinator").html(data); 
                                                }
                                                if(role_sign_as == "OSA Coordinator") {
                                                    $("#div_osa_coordinator").html(data); 
                                                }
                                                if(role_sign_as == "Campus Manager") {
                                                    $("#div_campus_manager").html(data); 
                                                }
                                                if(role_sign_as == "Director for Academic") {
                                                    $("#div_dir_academic").html(data); 
                                                }
                                                if(role_sign_as == "Director for Administration") {
                                                    $("#div_dir_administration").html(data); 
                                                }
                                                if(role_sign_as == "President") {
                                                    $("#div_president").html(data); 
                                                }

                                            }//end success
                                    });//ajax
                                    


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
                         
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click
   
    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','.view_sports_activity', function() { 
        //alert('sport activity');
        var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
        var event_title = $(this).attr("event_title"); 
        
        var apps_username = $("#hid_user_fullname").val();

        //alert("view sports activity");

        //WORKING AJAX FUNCTION WITH DATA {}
        var base_path = base_url + "/Sidebar_menu/check_session_employee"; 
        $.ajax({
            type: "POST",
            url: base_path,
            //data: {recid:recid},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
                beforeSend: function() {
                                        
                },
                success: function(data) {
                    //alert(data.session_status);
                    if(data.session_status) {
                        
                        //WORKING AJAX FUNCTION WITH DATA {}
                        var base_path = base_url + "/Sidebar_menu/sports_activity_display"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {recid_event_request:recid_event_request,apps_username:apps_username,event_title:event_title},
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'html', //json or html
                                beforeSend: function() {
                                                        
                                },
                                success: function(data) {
                                    //alert(data.return_msg);
                                    $("#div_event_request_display").html(data);
                                }//end success
                        });//ajax
                        
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_sports_activity_addsports', function() { 
        var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
        var apps_username = $("#hid_user_fullname").val();

        //alert("add sports activity");
       
        //WORKING AJAX FUNCTION WITH DATA {}
        var base_path = base_url + "/Sidebar_menu/check_session_employee"; 
        $.ajax({
            type: "POST",
            url: base_path,
            //data: {recid:recid},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
                beforeSend: function() {
                                        
                },
                success: function(data) {
                    //alert(data.session_status);
                    if(data.session_status) {
                        
                        //WORKING AJAX FUNCTION WITH DATA {}
                        var base_path = base_url + "/Sidebar_menu/sports_activity_addsports"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {apps_username:apps_username,recid_event_request:recid_event_request},
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'html', //json or html
                                beforeSend: function() {
                                    //alert("beforeSend: sports_activity_addsports");                
                                },
                                success: function(data) {
                                    //alert(data.return_msg);
                                    $("#section_sports_activity_list").html(data);
                                }//end success
                        });//ajax
                        
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','.view_details_sports_activity', function() { 
        var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
        var recid_sports_activity = $(this).attr("recid_sports_activity");   //ung value ay nsa pag display ng record sa controller
        var sports_title = $(this).attr("sports_title"); 
        var group_no = $(this).attr("group_no"); 
        var group_unit = $(this).attr("group_unit"); 
        var event_title = $(this).attr("event_title");

        var sports_type = $(this).attr("sports_type");
        
        var apps_username = $("#hid_user_fullname").val();

        //alert("view details sports activity ");

        //WORKING AJAX FUNCTION WITH DATA {}
        var base_path = base_url + "/Sidebar_menu/check_session_employee"; 
        $.ajax({
            type: "POST",
            url: base_path,
            //data: {recid:recid},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
                beforeSend: function() {
                                        
                },
                success: function(data) {
                    //alert(data.session_status);
                    if(data.session_status) {
                        
                        //WORKING AJAX FUNCTION WITH DATA {}
                        var base_path = base_url + "/Sidebar_menu/view_details_sports_activity"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {recid_event_request:recid_event_request,recid_sports_activity:recid_sports_activity,sports_title:sports_title,
                                group_no:group_no,group_unit:group_unit,event_title:event_title,apps_username:apps_username,sports_type:sports_type},
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'html', //json or html
                                beforeSend: function() {
                                                        
                                },
                                success: function(data) {
                                    //alert(data.return_msg);
                                    $("#div_sports_activity").html(data);
                                }//end success
                        });//ajax
                        
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','.breadcrumb_details_sports_activity_addteam', function() { 
        var recid_sports_activity= $(this).attr("recid_sports_activity");   //ung value ay nsa pag display ng record sa controller
        var sports_type = $(this).attr("sports_type"); 
        
        var apps_username = $("#hid_user_fullname").val();

        //WORKING AJAX FUNCTION WITH DATA {}
        var base_path = base_url + "/Sidebar_menu/check_session_employee"; 
        $.ajax({
            type: "POST",
            url: base_path,
            //data: {recid:recid},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
                beforeSend: function() {
                                        
                },
                success: function(data) {
                    //alert(data.session_status);
                    if(data.session_status) {
                        
                        //WORKING AJAX FUNCTION WITH DATA {}
                        var base_path = base_url + "/Sidebar_menu/details_sports_activity_addteam"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {apps_username:apps_username,recid_sports_activity:recid_sports_activity,sports_type:sports_type
                                    },
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'html', //json or html
                                beforeSend: function() {
                                                        
                                },
                                success: function(data) {
                                    //alert("section_sports_activity_details");
                                    $("#section_sports_activity_details").html(data);
                                }//end success
                        });//ajax
                        
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','.details_per_team', function() { 
        var recid_sports_activity_details = $(this).attr("recid_sports_activity_details");   //ung value ay nsa pag display ng record sa controller
        var recid_sports_activity = $(this).attr("recid_sports_activity");   //ung value ay nsa pag display ng record sa controller
        var team_name = $(this).attr("team_name"); 
        
        var recid_event_request = $(this).attr("recid_event_request");
        var sports_title = $(this).attr("sports_title"); 
        var group_no = $(this).attr("group_no"); 
        var group_unit = $(this).attr("group_unit"); 
        var event_title = $(this).attr("event_title");
        
        
        var apps_username = $("#hid_user_fullname").val();

        //alert("details per Team ="+event_title);

        //WORKING AJAX FUNCTION WITH DATA {}
        var base_path = base_url + "/Sidebar_menu/check_session_employee"; 
        $.ajax({
            type: "POST",
            url: base_path,
            //data: {recid:recid},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
                beforeSend: function() {
                                        
                },
                success: function(data) {
                    //alert(data.session_status);
                    if(data.session_status) {
                        
                        //WORKING AJAX FUNCTION WITH DATA {}
                        var base_path = base_url + "/Sidebar_menu/details_per_team"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {apps_username:apps_username,recid_sports_activity_details:recid_sports_activity_details,recid_sports_activity:recid_sports_activity,
                                team_name:team_name,recid_event_request:recid_event_request,sports_title:sports_title,group_no:group_no,group_unit:group_unit,
                                event_title:event_title
                                },
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'html', //json or html
                                beforeSend: function() {
                                                        
                                },
                                success: function(data) {
                                    //alert(data.return_msg);
                                    $("#div_sports_activity_details").html(data);
                                }//end success
                        });//ajax
                        
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','.breadcrumb_add_player', function() { 
        var recid_sports_activity_details = $(this).attr("recid_sports_activity_details");   //ung value ay nsa pag display ng record sa controller
        
        var apps_username = $("#hid_user_fullname").val();

        //alert("Add Player per Team ="+recid_sports_activity_details);

        //WORKING AJAX FUNCTION WITH DATA {}
        var base_path = base_url + "/Sidebar_menu/check_session_employee"; 
        $.ajax({
            type: "POST",
            url: base_path,
            //data: {recid:recid},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
                beforeSend: function() {
                                        
                },
                success: function(data) {
                    //alert(data.session_status);
                    if(data.session_status) {
                        
                        //WORKING AJAX FUNCTION WITH DATA {}
                        var base_path = base_url + "/Sidebar_menu/add_player"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {apps_username:apps_username,recid_sports_activity_details:recid_sports_activity_details
                                },
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'html', //json or html
                                beforeSend: function() {
                                                        
                                },
                                success: function(data) {
                                    //alert(data.return_msg);
                                    $("#section_details_per_team").html(data);
                                }//end success
                        });//ajax
                        
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','.breadcrumb_details_sports_activity_schedule', function() { 
        var recid_sports_activity= $(this).attr("recid_sports_activity");   //ung value ay nsa pag display ng record sa controller
        var sports_type = $(this).attr("sports_type"); 
       

        var apps_username = $("#hid_user_fullname").val();

        //WORKING AJAX FUNCTION WITH DATA {}
        var base_path = base_url + "/Sidebar_menu/check_session_employee"; 
        $.ajax({
            type: "POST",
            url: base_path,
            //data: {recid:recid},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
                beforeSend: function() {
                                        
                },
                success: function(data) {
                    //alert(data.session_status);
                    if(data.session_status) {
                        
                        //WORKING AJAX FUNCTION WITH DATA {}
                        var base_path = base_url + "/Sidebar_menu/details_sports_activity_schedule"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {apps_username:apps_username,recid_sports_activity:recid_sports_activity,sports_type:sports_type
                                    },
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'html', //json or html
                                beforeSend: function() {
                                                        
                                },
                                success: function(data) {
                                    //alert("section_sports_activity_details");
                                    $("#section_sports_activity_details").html(data);
                                }//end success
                        });//ajax
                        
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#sports_schedule_addsched', function() { 
        var recid_sports_activity= $(this).attr("recid_sports_activity");   //ung value ay nsa pag display ng record sa controller
    
        var apps_username = $("#hid_user_fullname").val();

        //WORKING AJAX FUNCTION WITH DATA {}
        var base_path = base_url + "/Sidebar_menu/check_session_employee"; 
        $.ajax({
            type: "POST",
            url: base_path,
            //data: {recid:recid},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json',
                beforeSend: function() {
                                        
                },
                success: function(data) {
                    //alert(data.session_status);
                    if(data.session_status) {
                        
                        //WORKING AJAX FUNCTION WITH DATA {}
                        var base_path = base_url + "/Sidebar_menu/sports_schedule_addsched"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {apps_username:apps_username,recid_sports_activity:recid_sports_activity
                                    },
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'html', //json or html
                                beforeSend: function() {
                                                        
                                },
                                success: function(data) {
                                    //alert("section_sports_activity_details");
                                    $("#section_sports_schedules_list").html(data);
                                }//end success
                        });//ajax
                        
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================
    
}); //end of document ready ##############################################################################