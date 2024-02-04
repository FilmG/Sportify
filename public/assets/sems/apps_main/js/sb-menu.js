$(document).ready(function() {	
    //alert("App main JS");

    //DASHBOARD==============
    $(document).off('click', '#dashboard_employee').on('click', '#dashboard_employee', function (event) {
        event.preventDefault();
        //alert("alert");
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
                        $("#main_content").load(base_url+"/Sidebar_menu/dashboard_main"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //EVENT REQUEST - START ==============
        $(document).off('click', '#event_request_employee').on('click', '#event_request_employee', function (event) {
            event.preventDefault();
            //alert("alert");
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
                            //check for User Access Muna
                            var apps_userid = $("#hid_userid").val();
                            //alert(apps_userid);

                            //Check if Apps user is SA or Admin
                            var sidebar = "Event_Request";
                            var submenu = "none";
                            var access = "sidebar_access"; 
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
                                        $("#main_content").load(base_url+"/Sidebar_menu/event_request");

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

        $(document).off('click', '#breadcrumb_event_make_request').on('click', '#breadcrumb_event_make_request', function (event) {
            event.preventDefault();
            //alert("alert");
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
                            var sidebar = "Event_Request";
                            var submenu = "none";
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
                                        $("#div_event_request_display").load(base_url+"/Sidebar_menu/event_request_form"); 

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
    //EVENT REQUEST - END ==============

    //====================================================================================================
    //SPACER=>
    //====================================================================================================
    
    //EVENT APPROVAL - START--------------
            $(document).off('click', '#event_approval_course_adviser').on('click', '#event_approval_course_adviser', function (event) {
                event.preventDefault();
                //alert("alert");
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
                                var submenu = "Course-Adviser";
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
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_approval_course_adviser");
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

            //event_approval_course_coordinator
            $(document).off('click', '#event_approval_course_coordinator').on('click', '#event_approval_course_coordinator', function (event) {
                event.preventDefault();
                //alert("alert");
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
                                var submenu = "Course-Coordinator";
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
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_approval_course_coordinator");
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

            //event_approval_psmo
            $(document).off('click', '#event_approval_psmo').on('click', '#event_approval_psmo', function (event) {
                event.preventDefault();
                //alert("alert");
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
                                var submenu = "PSMO";
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
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_approval_psmo");
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

            //event_approval_academic_coordinator
            $(document).off('click', '#event_approval_academic_coordinator').on('click', '#event_approval_academic_coordinator', function (event) {
                event.preventDefault();
                //alert("alert");
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
                                var submenu = "Academic-Coordinator";
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
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_approval_academic_coordinator");
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


            //event_approval_osa_coordinator
            $(document).off('click', '#event_approval_osa_coordinator').on('click', '#event_approval_osa_coordinator', function (event) {
                event.preventDefault();
                //alert("alert");
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
                                var submenu = "OSA-Coordinator";
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
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_approval_osa_coordinator");
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


            //event_approval_campus_manager
            $(document).off('click', '#event_approval_campus_manager').on('click', '#event_approval_campus_manager', function (event) {
                event.preventDefault();
                //alert("alert");
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
                                var submenu = "Campus-Manager";
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
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_approval_campus_manager");
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


            //event_approval_dir_academic
            $(document).off('click', '#event_approval_dir_academic').on('click', '#event_approval_dir_academic', function (event) {
                event.preventDefault();
                //alert("alert");
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
                                var submenu = "Dir-Academic";
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
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_approval_dir_academic");
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


            //event_approval_dir_administration
            $(document).off('click', '#event_approval_dir_administration').on('click', '#event_approval_dir_administration', function (event) {
                event.preventDefault();
                //alert("alert");
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
                                var submenu = "Dir-Administration";
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
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_approval_dir_administration");
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

            
            //event_approval_president
            $(document).off('click', '#event_approval_president').on('click', '#event_approval_president', function (event) {
                event.preventDefault();
                //alert("alert");
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
                                var submenu = "President";
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
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_approval_president");
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



    //EVENT APPROVAL - END----------------

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //SETUP / USER - START
        $(document).off('click', '#setup_user').on('click', '#setup_user', function (event) {
            event.preventDefault();
            //alert("alert");
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
                            $("#main_content").load(base_url+"/Sidebar_menu/setup_user");  
                        } else {
                            window.location.href=base_url+"/Login";
                        }   
                    }//end success
            });//ajax
        });//end of document click

    //SETUP / USER - END

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //SETUP / DEPT - START
        $(document).off('click', '#setup_department').on('click', '#setup_department', function (event) {
            event.preventDefault();
            //alert("Department");
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
                            $("#main_content").load(base_url+"/Sidebar_menu/setup_department");  
                        } else {
                            window.location.href=base_url+"/Login";
                        }   
                    }//end success
            });//ajax
        });//end of document click

    //SETUP / DEPT - END

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //SETUP / ROLE - START
        $(document).off('click', '#setup_role').on('click', '#setup_role', function (event) {
            event.preventDefault();
            //alert("alert");
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
                            $("#main_content").load(base_url+"/Sidebar_menu/setup_role");  
                        } else {
                            window.location.href=base_url+"/Login";
                        }   
                    }//end success
            });//ajax
        });//end of document click

    //SETUP / ROLE - END
    
    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#user_profile', function() { 
        //alert('User Profiles');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        //hid_userid
                        //user_deptname
                        //hid_user_role_sign
                        var userid = $("#hid_userid").val();
                        var user_deptname = $("#user_deptname").val();
                        var user_role_sign = $("#hid_user_role_sign").val();

                        var base_path = base_url + "/Sidebar_menu/user_profile"; 
                        $.ajax({
                            type: "POST",
                            url: base_path,
                            data: {userid:userid,user_deptname:user_deptname,user_role_sign:user_role_sign
                                    },
                            cache: false,
                            //async:false, //spinner doest work if enable
                            dataType: 'html', //json or html
                                beforeSend: function() {
                                                        
                                },
                                success: function(data) {
                                    //alert("section_sports_activity_details");
                                    $("#main_content").html(data);
                                }//end success
                        });//ajax
                       
                        //$("#main_content").load(base_url+"/Sidebar_menu/user_profile"); 
                        
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#account_setting', function() { 
        //alert('User Settings');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        
                        $("#main_content").load(base_url+"/Sidebar_menu/account_setting"); 
                        
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax

    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_approved_ca', function() { 
        //alert('User Settings');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_course_adviser").load(base_url+"/Sidebar_menu/event_approved_ca"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_rejected_ca', function() { 
        //alert('rejected');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_course_adviser").load(base_url+"/Sidebar_menu/event_rejected_ca"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_approved_cc', function() { 
        //alert('User Settings');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_course_coordinator").load(base_url+"/Sidebar_menu/event_approved_cc"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_rejected_cc', function() { 
        //alert('User Settings');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_course_coordinator").load(base_url+"/Sidebar_menu/event_rejected_cc"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_approved_psmo', function() { 
        //alert('User Settings');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_psmo").load(base_url+"/Sidebar_menu/event_approved_psmo"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_rejected_psmo', function() { 
        //alert('User Settings');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_psmo").load(base_url+"/Sidebar_menu/event_rejected_psmo"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_approved_ac', function() { 
        //alert('User Settings');
        //var approved_value = $(this).attr("approved_value");  //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_academic_coordinator").load(base_url+"/Sidebar_menu/event_approved_ac"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click


    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_rejected_ac', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_academic_coordinator").load(base_url+"/Sidebar_menu/event_rejected_ac"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_approved_osa', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_osa_coordinator").load(base_url+"/Sidebar_menu/event_approved_osa"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_rejected_osa', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_osa_coordinator").load(base_url+"/Sidebar_menu/event_rejected_osa"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_approved_cm', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_campus_manager").load(base_url+"/Sidebar_menu/event_approved_cm"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_rejected_cm', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_campus_manager").load(base_url+"/Sidebar_menu/event_rejected_cm"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_approved_acad', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_dir_academic").load(base_url+"/Sidebar_menu/event_approved_acad"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_rejected_acad', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_dir_academic").load(base_url+"/Sidebar_menu/event_rejected_acad"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click


    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_approved_admin', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_dir_administration").load(base_url+"/Sidebar_menu/event_approved_admin"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_rejected_admin', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_dir_administration").load(base_url+"/Sidebar_menu/event_rejected_admin"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_approved_pres', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_president").load(base_url+"/Sidebar_menu/event_approved_pres"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    $(document).on('click','#breadcrumb_event_rejected_pres', function() { 
        //alert('rejected ac');
        //var recid_event_request = $(this).attr("recid_event_request");   //ung value ay nsa pag display ng record sa controller
       
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
                        $("#div_president").load(base_url+"/Sidebar_menu/event_rejected_pres"); 
                    } else {
                        window.location.href=base_url+"/Login";
                    }   
                }//end success
        });//ajax
    });//end of document click

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //START OF LOGOUT
        $(document).off('click', '#btn_app_logout').on('click', '#btn_app_logout', function (event) {
            event.preventDefault();

            var module_login = $("#app_module_login").val();

            Swal.fire({
                title: 'Sign Out?',
                text: "Are you sure!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, sign me out!'
                }).then((result) => {
                if (result.isConfirmed) {
                    //window.location.href=base_url+"/Enlistment/freshman1st_enlist_status";
                
                    window.location.href=base_url+"/Login";
                }
                
            })
        });//end of document click
    //END OF LOGOUT
    
    //====================================================================================================
    //SPACER=>
    //====================================================================================================
    
}); //end of document ready ##############################################################################