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
recid_sports_activity_details: <?= $recid_sports_activity_details; ?><br> 
-->

<!-- START FORMS || ADD TEAM -->  
<form method="post" id="submit_addplayer_data" name="submit_addplayer_data">

    <!-- Hidden Modal Variable -->
    <input type="hidden" name="apps_username" id="apps_username" value="<?= $apps_username; ?>"  />
    <input type="hidden" name="recid_sports_activity_details" id="recid_sports_activity_details" value="<?= $recid_sports_activity_details; ?>"  />
    
    
    <div class="card">
        <div class="card-body">

            <div class="alert alert-light col text-center">ADD Player</div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">First Name<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addplayer_fname" name="addplayer_fname" maxlength="100" placeholder="" >
                    <small id="addplayer_fname_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Middle Name<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addplayer_mname" name="addplayer_mname" maxlength="100" placeholder="" >
                    <small id="addplayer_mname_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Last Name<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addplayer_lname" name="addplayer_lname" maxlength="100" placeholder="" >
                    <small id="addplayer_lname_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Suffix</label>
                </div>
                <div class="col-md-9">
                    <select id="addplayer_suffix" name="addplayer_suffix" class="custom-select mr-sm-2">
                            <option selected></option>
                            <option value="JR">JR</option>
                            <option value="SR">SR</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                        </select>
                    <small id="addplayer_suffix_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Position<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <select id="addplayer_position" name="addplayer_position" class="custom-select mr-sm-2">
                            <option selected>Choose...</option>
                            <option value="Point Guard">Point Guard</option>
                            <option value="Shooting Guard">Shooting Guard</option>
                            <option value="Small Forward">Small Forward</option>
                            <option value="Power Forward">Power Forward</option>
                            <option value="Center">Center</option>
                    </select>
                    <small id="addplayer_position_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Height<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <select id="addplayer_height" name="addplayer_height" class="custom-select mr-sm-2">
                            
                    </select>
                    <small id="addplayer_height_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Course<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addplayer_course" name="addplayer_course" maxlength="100" placeholder="" >
                    <small id="addplayer_course_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Section<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addplayer_section" name="addplayer_section" maxlength="30" placeholder="" >
                    <small id="addplayer_section_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Status<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <select id="addplayer_status" name="addplayer_status" class="custom-select mr-sm-2">
                            <option selected>Choose...</option>
                            <option value="Active">Active</option>
                            <option value="Injury">Injured</option>
                            <option value="Suspended">Suspended</option>
                        </select>
                    <small id="addplayer_status_error" class="input_error_color"></small>
                </div>
            </div>


            <!--START OF CAPTCHA AND SAVE BUTTON -->
            <br>
            <div id="div_captcha_addplayer" class="text-xs-center"> <!--class="text-xs-center" -->
                <!--google reCaptha v2 -->
                
                <div class="g-recaptcha" data-sitekey="6LfBeFIdAAAAAKz9ZcOu2twO7AuDwS46_Cuuqg3G" ></div>
                
                <br>
                <div class="col text-center">
                        <button type="submit" id="btn_addplayer_save" class="btn btn-primary">
                            <i class="addplayer-loading-icon fa fa-paper-plane"></i>
                            <span class="addplayer-btn-text">Submit</span>
                        </button>
                        
                        <!--Progress bar -->
                        <div class="container-fluid">
                            <div id="display_progressbar_addplayer" class="progress">
                                <div class="progress-bar progress-bar-striped bg-info" id="progressbar_addplayer" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
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

    var addplayer_fname = 1;
    var addplayer_mname = 1;
    var addplayer_lname = 1;
    var addplayer_suffix = 1;
    var addplayer_pos = 1;
    var addplayer_height = 1;
    var addplayer_course = 1;
    var addplayer_section = 1;
    var addplayer_status = 1;

    //Hide muna
    $("#display_progressbar_addplayer").hide();
    $("#div_captcha_addplayer").hide();

    //Filling Dropdown 
    var base_path = base_url + "/Employee/fill_dropdown_height";
    $.ajax({
        url: base_path,
        method:'POST',
        dataType: 'json',
        success:function(data) {
            //alert(data.length);
            var html='';
            html += "<option value ='" +"Choose..."+"'>"+"Choose..."+"</option>";
            for(var count=0;count < data.length; count++) {   
                html += "<option value ='" +data[count].feet+"'>"+data[count].feet+"</option>";
            }
        $('#addplayer_height').html(html);						}
    });//end of ajax

    //========================================================
    $(document).ready(function(){ 

        //checking text input -start=== 
            $(document).on("focusout keyup","#addplayer_lname",function(e) {
                var input = $("#addplayer_lname").val();
                if (input.length == 0) {
                    $("#addplayer_lname_error").html('Player Lastname is blank');
                    addplayer_lname = 1;
                } else {
                    var s_case = SentenceCase(input);
                    $("#addplayer_lname").val(s_case);
                    $("#addplayer_lname_error").html('');
                    addplayer_lname = 0;
                }
                check_input_addplayer();
            });//end of document click  

            $(document).on("focusout keyup","#addplayer_fname",function(e) {
                var input = $("#addplayer_fname").val();
                if (input.length == 0) {
                    $("#addplayer_fname_error").html('Player Firstname is blank');
                    addplayer_fname = 1;
                } else {
                    var s_case = SentenceCase(input);
                    $("#addplayer_fname").val(s_case);
                    $("#addplayer_fname_error").html('');
                    addplayer_fname = 0;
                }
                check_input_addplayer();
            });//end of document click  

            $(document).on("focusout keyup","#addplayer_mname",function(e) {
                var input = $("#addplayer_mname").val();
                if (input.length == 0) {
                    $("#addplayer_mname_error").html('Player Middle name is blank');
                    addplayer_mname = 1;
                } else {
                    var s_case = SentenceCase(input);
                    $("#addplayer_mname").val(s_case);
                    $("#addplayer_mname_error").html('');
                    addplayer_mname = 0;
                }
                check_input_addplayer();
            });//end of document click  

            $(document).on("change click","#addplayer_position",function(e) {
                var input = $("#addplayer_position").val();
                if (input == "Choose...") {
                    $("#addplayer_position_error").html('Invalid Position');
                    addplayer_pos = 1;
                } else {
                   $("#addplayer_position_error").html('');
                   addplayer_pos = 0;
                }
                check_input_addplayer();
            });//end of document click

            $(document).on("change click","#addplayer_height",function(e) {
                var input = $("#addplayer_height").val();
                if (input == "Choose...") {
                    $("#addplayer_height_error").html('Invalid Height');
                    addplayer_height = 1;
                } else {
                   $("#addplayer_height_error").html('');
                   addplayer_height = 0;
                }
                check_input_addplayer();
            });//end of document click  

            $(document).on("focusout keyup","#addplayer_course",function(e) {
                var input = $("#addplayer_course").val();
                if (input.length == 0) {
                    $("#addplayer_course_error").html('Player Course is blank');
                    addplayer_course = 1;
                } else {
                    $("#addplayer_course").val(input.toUpperCase());
                    $("#addplayer_course_error").html('');
                    addplayer_course = 0;
                }
                check_input_addplayer();
            });//end of document click  

            $(document).on("focusout keyup","#addplayer_section",function(e) {
                var input = $("#addplayer_section").val();
                if (input.length == 0) {
                    $("#addplayer_section_error").html('Player Section is blank');
                    addplayer_section = 1;
                } else {
                    var s_case = SentenceCase(input);
                    $("#addplayer_section").val(s_case);
                    $("#addplayer_section_error").html('');
                    addplayer_section = 0;
                }
                check_input_addplayer();
            });//end of document click  

            $(document).on("change click","#addplayer_status",function(e) {
                var input = $("#addplayer_status").val();
                if (input == "Choose...") {
                    $("#addplayer_status_error").html('Invalid Status');
                    addplayer_status = 1;
                } else {
                   $("#addplayer_status_error").html('');
                   addplayer_status = 0;
                }
                check_input_addplayer();
            });//end of document click  

            function check_input_addplayer() {
                if (addplayer_fname == 1 || addplayer_mname == 1 || addplayer_lname == 1 || addplayer_pos == 1 ||
                    addplayer_height == 1 || addplayer_course == 1 || addplayer_section == 1 || addplayer_status == 1)
                {
                    document.getElementById("btn_addplayer_save").disabled = true;
                    $("#div_captcha_addplayer").hide();
                } else {
                    document.getElementById("btn_addplayer_save").disabled = false;
                    $("#div_captcha_addplayer").show();
                }
            }//end of function

        //checking text input -end===

    });//end of document ready function
    //========================================================

    //Submitting Form Data | ADD TEAM  - Start
    $('#submit_addplayer_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_addplayer").show();
            var base_path = base_url + "/Employee/submit_addplayer_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_addplayer').html(percentComplete + '%');
                    $('#progressbar_addplayer').width(percentComplete + '%');
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
                    document.getElementById("btn_addplayer_save").disabled = true;
                    $(".addplayer-loading-icon").removeClass('fa fa-paper-plane');
                    $(".addplayer-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".addplayer-btn-text").text("Submitting Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_addplayer_save").disabled = false;
                            $(".addplayer-loading-icon").removeClass('spinner-border text-warning');
                            $(".addplayer-loading-icon").addClass('fa fa-paper-plane');
                            $(".addplayer-btn-text").text("Submit Record");

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
                                        $('#progressbar_apps_addplayer').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_addplayer").hide();

                                            //Update DataTable
                                            $('#table_sports_activity_details_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Load List of Event Request Form
                                            //$("#main_content").load(base_url+"/Sidebar_menu/event_request"); 

                                            //reset reCaptha
                                            grecaptcha.reset();

                                            //Disable Button
                                            document.getElementById("btn_addplayer_save").disabled = true;

                                            //Reset value
                                            $("#addplayer_fname").val("");
                                            $("#addplayer_mname").val("");
                                            $("#addplayer_lname").val("");
                                            $("#addplayer_suffix").val("");
                                            $("#addplayer_position").val("Choose...");
                                            $("#addplayer_height").val("Choose...");
                                            $("#addplayer_course").val("");
                                            $("#addplayer_section").val("");
                                            $("#addplayer_status").val("Choose...");

                                            addplayer_fname = 1;
                                            addplayer_mname = 1;
                                            addplayer_lname = 1;
                                            addplayer_suffix = 1;
                                            addplayer_pos = 1;
                                            addplayer_height = 1;
                                            addplayer_course = 1;
                                            addplayer_section = 1;
                                            addplayer_status = 1;

                                            $("#div_captcha_addplayer").hide();

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_addplayer').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_addplayer").hide();

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
            return false;
        else
            str = str.toString();
    
        return str.replace(/\w\S*/g,
            function (txt) {
                return txt.charAt(0).toUpperCase() +
                    txt.substr(1).toLowerCase();
            });
    }//end of function

</script>