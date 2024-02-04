<head>
    <!--Google reCaptcha v2.0 -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<style>
    /* recaptcha CENTER on DIV - STart */
    .text-xs-center {
        text-align: center;
    }
     .g-recaptcha {
        display: inline-block;
    }
    /* recaptcha CENTER on DIV - ENd */

    /* Remove ung arrow sa input type number Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
    }

</style>

<!--
Username: <?= $apps_username; ?><br>
recid_sports_activity: <?= $recid_sports_activity; ?><br> 
-->

<div class="alert alert-light col text-center">ADD Schedule</div>

<!-- START FORMS || ADD TEAM -->  
<form method="post" id="submit_addsched_data" name="submit_addsched_data">

<!-- Hidden Modal Variable -->
    <input type="hidden" name="apps_username" id="apps_username" value="<?= $apps_username; ?>"  />
    <input type="hidden" name="recid_sports_activity" id="recid_sports_activity" value="<?= $recid_sports_activity; ?>"  />
    
    <div class="card">
        <div class="card-body">

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Team <font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <select id="addsched_team1" name="addsched_team1" class="custom-select mr-sm-2">
                            
                            </select>
                    <small id="addsched_team1_error" class="input_error_color"></small>
                </div>
            </div>

            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label"></label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Versus" readonly>
                </div>
            </div>
            <br>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Team <font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <select id="addsched_team2" name="addsched_team2" class="custom-select mr-sm-2">
                            
                    </select>
                    <small id="addsched_team2_error" class="input_error_color"></small>
                </div>
            </div>
            <br>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Date<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="date" class="form-control" id="addsched_date" name="addsched_date" maxlength="30" placeholder="" >
                    <small id="addsched_date_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Time<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="time" class="form-control" id="addsched_time" name="addsched_time" maxlength="30" placeholder="" >
                    <small id="addsched_time_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Venue<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addsched_venue" name="addsched_venue" maxlength="30" placeholder="" >
                    <small id="addsched_venue_error" class="input_error_color"></small>
                </div>
            </div>

            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Referee 1</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addsched_ref1" name="addsched_ref1" maxlength="100" placeholder="" >
                    <small id="addsched_ref1_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Referee 2</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addsched_ref2" name="addsched_ref2" maxlength="100" placeholder="" >
                    <small id="addsched_ref2_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Referee 3</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addsched_ref3" name="addsched_ref3" maxlength="100" placeholder="" >
                    <small id="addsched_ref3_error" class="input_error_color"></small>
                </div>
            </div>

            <br>
            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Umpire Officer</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addsched_umpire" name="addsched_umpire" maxlength="100" placeholder="" >
                    <small id="addsched_umpire_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Scorer Officer</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addsched_scorer" name="addsched_scorer" maxlength="100" placeholder="" >
                    <small id="addsched_scorer_error" class="input_error_color"></small>
                </div>
            </div>


            <!--START OF CAPTCHA AND SAVE BUTTON -->
            <br>
            <div id="div_captcha_addsched" class="text-xs-center"> <!--class="text-xs-center" -->
                <!--google reCaptha v2 -->
                
                <div class="g-recaptcha" data-sitekey="6LfBeFIdAAAAAKz9ZcOu2twO7AuDwS46_Cuuqg3G" ></div>
                
                <br>
                <div class="col text-center">
                        <button type="submit" id="btn_addsched_save" class="btn btn-primary">
                            <i class="addsched-loading-icon fa fa-paper-plane"></i>
                            <span class="addsched-btn-text">Submit</span>
                        </button>
                        
                        <!--Progress bar -->
                        <div class="container-fluid">
                            <div id="display_progressbar_addsched" class="progress">
                                <div class="progress-bar progress-bar-striped bg-info" id="progressbar_addsched" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        </div>
                <br>   
                </div>

            </div>
            <!--END OF CAPTCHA AND SAVE BUTTON -->

        </div><!--End Card-Body -->  
    </div><!--End Card -->

</form>
<!-- END FORMS || ADD TEAM -->  

<!--Javascript------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
    //alert("Add Team");

    var add_teamname = 1;
    var add_coach = 1;

    //Hide muna
    $("#display_progressbar_addsched").hide();
    $("#div_captcha_addsched").hide();

    //Filling Dropdown 
    var base_path = base_url + "/Employee/fill_dropdown_team";
    var recid_sports_activity = $("#recid_sports_activity").val();
    
    $.ajax({
        url: base_path,
        data: {recid_sports_activity:recid_sports_activity},
        method:'POST',
        dataType: 'json',
        success:function(data) {
            //alert(data.length);
            var html='';
            html += "<option value ='" +"Choose..."+"'>"+"Choose..."+"</option>";
            for(var count=0;count < data.length; count++) {   
                html += "<option value ='" +data[count].recid_sports_activity_details+"'>"+data[count].team_name+"</option>";
            }
            $('#addsched_team1').html(html);	
            $('#addsched_team2').html(html);					
        }
    });//end of ajax

    //========================================================
    $(document).ready(function(){ 

        //checking text input -start=== 
            var v_addsched_team1 = 1;
            var v_addsched_team2 = 1;
            var v_addsched_date = 1;
            var v_addsched_time = 1;
            var v_addsched_venue = 1;

            $(document).on("change click","#addsched_team1",function(e) {
                var input = $("#addsched_team1").val();
                var input2 = $("#addsched_team2").val();
                if (input == "Choose...") {
                    $("#addsched_team1_error").html('Invalid Team');
                    v_addsched_team1 = 1;
                } else {
                    if(input == input2) {
                        $("#addsched_team1_error").html('Same Team, Please select another team');
                        v_addsched_team1 = 1;
                    }else {
                        $("#addsched_team1_error").html('');
                        v_addsched_team1 = 0;
                    }
                   
                }
                check_input_addschedule();
            });//end of document click  

            $(document).on("change click","#addsched_team2",function(e) {
                var input = $("#addsched_team2").val();
                var input2 = $("#addsched_team1").val();
                if (input == "Choose...") {
                    $("#addsched_team2_error").html('Invalid Team');
                    v_addsched_team2 = 1;
                } else {
                    if(input == input2) {
                        $("#addsched_team2_error").html('Same Team, Please select another team');
                        v_addsched_team2 = 1;
                    }else {
                        $("#addsched_team2_error").html('');
                        v_addsched_team2 = 0;
                    }
                   
                }
                check_input_addschedule();
            });//end of document click  

            //addsched_date
            $(document).on("focusout keyup","#addsched_date",function(e) {
                var input = $("#addsched_date").val();
                if (input.length == 0) {
                    $("#addsched_date_error").html('Schedule Date is blank');
                    v_addsched_date = 1;
                } else {
                    //var s_case = SentenceCase(input);
                    //$("#addplayer_section").val(s_case);
                    $("#addsched_date_error").html('');
                   v_addsched_date = 0;
                }
                check_input_addschedule();
            });//end of document click  

            //addsched_time
            $(document).on("focusout keyup","#addsched_time",function(e) {
                var input = $("#addsched_time").val();
                if (input.length == 0) {
                    $("#addsched_time_error").html('Schedule Time is blank');
                    v_addsched_time = 1;
                } else {
                    //var s_case = SentenceCase(input);
                    //$("#addplayer_section").val(s_case);
                    $("#addsched_time_error").html('');
                   v_addsched_time = 0;
                }
                check_input_addschedule();
            });//end of document click  

            $(document).on("focusout keyup","#addsched_venue",function(e) {
                var input = $("#addsched_venue").val();
                if (input.length == 0) {
                    $("#addsched_venue_error").html('Venue is blank');
                    v_addsched_venue = 1;
                } else {
                    var s_case = SentenceCase(input);
                    $("#addsched_venue").val(s_case);
                    $("#addsched_venue_error").html('');
                    v_addsched_venue = 0;
                }
                check_input_addschedule();
            });//end of document click  

            $(document).on("focusout keyup","#addsched_ref1",function(e) {
                var input = $("#addsched_ref1").val();
                //if (input.length == 0) {
                //    $("#addsched_venue_error").html('Venue is blank');
                //    v_addsched_venue = 1;
                //} else {
                    var s_case = SentenceCase(input);
                    $("#addsched_ref1").val(s_case);
                //    $("#addsched_venue_error").html('');
                //    v_addsched_venue = 0;
                //}
                //check_input_addschedule();
            });//end of document click  

            $(document).on("focusout keyup","#addsched_ref2",function(e) {
                var input = $("#addsched_ref2").val();
                //if (input.length == 0) {
                //    $("#addsched_venue_error").html('Venue is blank');
                //    v_addsched_venue = 1;
                //} else {
                    var s_case = SentenceCase(input);
                    $("#addsched_ref2").val(s_case);
                //    $("#addsched_venue_error").html('');
                //    v_addsched_venue = 0;
                //}
                //check_input_addschedule();
            });//end of document click  

            $(document).on("focusout keyup","#addsched_ref3",function(e) {
                var input = $("#addsched_ref3").val();
                //if (input.length == 0) {
                //    $("#addsched_venue_error").html('Venue is blank');
                //    v_addsched_venue = 1;
                //} else {
                    var s_case = SentenceCase(input);
                    $("#addsched_ref3").val(s_case);
                //    $("#addsched_venue_error").html('');
                //    v_addsched_venue = 0;
                //}
                //check_input_addschedule();
            });//end of document click  

            $(document).on("focusout keyup","#addsched_umpire",function(e) {
                var input = $("#addsched_umpire").val();
                //if (input.length == 0) {
                //    $("#addsched_venue_error").html('Venue is blank');
                //    v_addsched_venue = 1;
                //} else {
                    var s_case = SentenceCase(input);
                    $("#addsched_umpire").val(s_case);
                //    $("#addsched_venue_error").html('');
                //    v_addsched_venue = 0;
                //}
                //check_input_addschedule();
            });//end of document click  

            $(document).on("focusout keyup","#addsched_scorer",function(e) {
                var input = $("#addsched_scorer").val();
                //if (input.length == 0) {
                //    $("#addsched_venue_error").html('Venue is blank');
                //    v_addsched_venue = 1;
                //} else {
                    var s_case = SentenceCase(input);
                    $("#addsched_scorer").val(s_case);
                //    $("#addsched_venue_error").html('');
                //    v_addsched_venue = 0;
                //}
                //check_input_addschedule();
            });//end of document click  

            
            function check_input_addschedule() {
                if (v_addsched_team1 == 1 || v_addsched_team2 == 1 || v_addsched_date == 1 || v_addsched_time == 1 || v_addsched_venue == 1)
                {
                    document.getElementById("btn_addsched_save").disabled = true;
                    $("#div_captcha_addsched").hide();
                } else {
                    document.getElementById("btn_addsched_save").disabled = false;
                    $("#div_captcha_addsched").show();
                }
            }//end of function

        //checking text input -end===

    });//end of document ready function
    //========================================================

    //Submitting Form Data | ADD TEAM  - Start
    $('#submit_addsched_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_addsched").show();
            var base_path = base_url + "/Employee/submit_addsched_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_addsched').html(percentComplete + '%');
                    $('#progressbar_addsched').width(percentComplete + '%');
                    }
                },false);
                return xhr;
            },

            url: base_path,
            method:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            //async:false,
            dataType: 'json',
                beforeSend: function() {
                    document.body.style.cursor = 'wait';
                    document.getElementById("btn_addsched_save").disabled = true;
                    $(".addsched-loading-icon").removeClass('fa fa-paper-plane');
                    $(".addsched-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".addsched-btn-text").text("Submitting Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_addsched_save").disabled = false;
                            $(".addsched-loading-icon").removeClass('spinner-border text-warning');
                            $(".addsched-loading-icon").addClass('fa fa-paper-plane');
                            $(".addsched-btn-text").text("Submit Record");

                            //alert(data.qrcode);
                            if(data.status) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!'
                                }).then((result) => {
                                    if (result.isConfirmed) {          
                                        //ito ang gagamitin pag gusto lang bumalik sa main content
                                        //$("#enlistment-1stsem-registrar_maincontent").load(base_url+"/Enlistment/backToList_registrar_1stsem");

                                        //reset progress bar
                                        $('#progressbar_apps_addsched').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_addsched").hide();

                                            //Update DataTable
                                            $('#table_sports_schedule_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Load List of Event Request Form
                                            //$("#main_content").load(base_url+"/Sidebar_menu/event_request"); 

                                            //reset reCaptha
                                            grecaptcha.reset();

                                            //Disable Button
                                            document.getElementById("btn_addsched_save").disabled = true;
                                            
                                            //Reset Value
                                            $("#addsched_team1").val("Choose...");
                                            $("#addsched_team2").val("Choose...");
                                            $("#addsched_date").val("");
                                            $("#addsched_time").val("");
                                            $("#addsched_venue").val("");
                                            
                                            $("#addsched_ref1").val("");
                                            $("#addsched_ref2").val("");
                                            $("#addsched_ref3").val("");
                                            $("#addsched_umpire").val("");
                                            $("#addsched_scorer").val("");

                                            $("#div_captcha_addsched").hide();

                                            v_addsched_team1 = 1;
                                            v_addsched_team2 = 1;
                                            v_addsched_date = 1;
                                            v_addsched_time = 1;
                                            v_addsched_venue = 1;

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_addsched').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_addsched").hide();

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error

                                //Load List of Event Request Form
                                //$("#main_content").load(base_url+"/Sidebar_menu/event_request"); 
                            }//end of data.status

                        }//end ajax success
                    }); //End of Ajax

        }); //end of submit
    //Submitting Form Data | ADD TEAM  - End

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    function SentenceCase(str) {
        if ((str === null) || (str === ''))
            return '';
        else
            str = str.toString();
    
        return str.replace(/\w\S*/g,
            function (txt) {
                return txt.charAt(0).toUpperCase() +
                    txt.substr(1).toLowerCase();
            });
    }//end of function

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

</script>