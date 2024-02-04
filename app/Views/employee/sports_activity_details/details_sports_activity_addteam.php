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

sports_type: <?= $sports_type; ?><br> 
-->

<div class="alert alert-light col text-center">ADD Team</div>

<!-- START FORMS || ADD TEAM -->  
<form method="post" id="submit_addteam_data" name="submit_addteam_data">

<!-- Hidden Modal Variable -->
    <input type="hidden" name="apps_username" id="apps_username" value="<?= $apps_username; ?>"  />
    <input type="hidden" name="recid_sports_activity" id="recid_sports_activity" value="<?= $recid_sports_activity; ?>"  />
    <input type="hidden" name="sports_type" id="sports_type" value="<?= $sports_type; ?>"  />
    
    <div class="card">
        <div class="card-body">

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Team Name<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addteam_teamname" name="addteam_teamname" maxlength="100" placeholder="" >
                    <small id="addteam_teamname_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Team Coach<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addteam_teamcoach" name="addteam_teamcoach" maxlength="100" placeholder="" >
                    <small id="addteam_teamcoach_error" class="input_error_color"></small>
                </div>
            </div>


            <!--START OF CAPTCHA AND SAVE BUTTON -->
            <br>
            <div id="div_captcha_addteam" class="text-xs-center"> <!--class="text-xs-center" -->
                <!--google reCaptha v2 -->
                
                <div class="g-recaptcha" data-sitekey="6LfBeFIdAAAAAKz9ZcOu2twO7AuDwS46_Cuuqg3G" ></div>
                
                <br>
                <div class="col text-center">
                        <button type="submit" id="btn_addteam_save" class="btn btn-primary">
                            <i class="addteam-loading-icon fa fa-paper-plane"></i>
                            <span class="addteam-btn-text">Submit</span>
                        </button>
                        
                        <!--Progress bar -->
                        <div class="container-fluid">
                            <div id="display_progressbar_addteam" class="progress">
                                <div class="progress-bar progress-bar-striped bg-info" id="progressbar_addteam" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
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
    $("#display_progressbar_addteam").hide();
    $("#div_captcha_addteam").hide();

    //========================================================
    $(document).ready(function(){ 

        //checking text input -start=== 
            $(document).on("focusout keyup","#addteam_teamname",function(e) {
                var input = $("#addteam_teamname").val();
                if (input.length == 0) {
                    $("#addteam_teamname_error").html('Team name is blank');
                    add_teamname = 1;
                } else {
                    $("#addteam_teamname").val(input.toUpperCase());
                    $("#addteam_teamname_error").html('');
                    add_teamname = 0;
                }
                check_input_addteam();
            });//end of document click  

            $(document).on("focusout keyup","#addteam_teamcoach",function(e) {
                var input = $("#addteam_teamcoach").val();
                if (input.length == 0) {
                    $("#addteam_teamcoach_error").html('Team coach is blank');
                    add_coach = 1;
                } else {
                    $("#addteam_teamcoach").val(input.toUpperCase());
                    $("#addteam_teamcoach_error").html('');
                    add_coach = 0;
                }
                check_input_addteam();
            });//end of document click  

            function check_input_addteam() {
                if (add_teamname == 1 || add_coach == 1 )
                {
                    document.getElementById("btn_addteam_save").disabled = true;
                    $("#div_captcha_addteam").hide();
                } else {
                    document.getElementById("btn_addteam_save").disabled = false;
                    $("#div_captcha_addteam").show();
                }
            }//end of function

        //checking text input -end===

    });//end of document ready function
    //========================================================

    //Submitting Form Data | ADD TEAM  - Start
    $('#submit_addteam_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_addteam").show();
            var base_path = base_url + "/Employee/submit_addteam_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_addteam').html(percentComplete + '%');
                    $('#progressbar_addteam').width(percentComplete + '%');
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
                    document.getElementById("btn_addteam_save").disabled = true;
                    $(".addteam-loading-icon").removeClass('fa fa-paper-plane');
                    $(".addteam-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".addteam-btn-text").text("Submitting Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_addteam_save").disabled = false;
                            $(".addteam-loading-icon").removeClass('spinner-border text-warning');
                            $(".addteam-loading-icon").addClass('fa fa-paper-plane');
                            $(".addteam-btn-text").text("Submit Record");

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
                                        $('#progressbar_apps_addteam').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_addteam").hide();

                                            //Update DataTable
                                            $('#table_sports_activity_details_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_addteam_save").disabled = true;

                                            //Load List of Event Request Form
                                            //$("#main_content").load(base_url+"/Sidebar_menu/event_request"); 

                                            //Disable Button
                                            document.getElementById("btn_addteam_save").disabled = true;

                                            //Reset Value
                                            $("#addteam_teamname").val("");
                                            $("#addteam_teamcoach").val("");
                                            $("#div_captcha_addteam").hide();

                                            add_teamname = 1;
                                            add_coach = 1;

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_addteam').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_addteam").hide();

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

</script>