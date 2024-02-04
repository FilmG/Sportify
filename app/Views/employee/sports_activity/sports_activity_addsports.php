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
recid_event_request: <?= $recid_event_request; ?><br>
-->

<div class="alert alert-light col text-center">ADD Sports</div> 

<!-- START FORMS || ADD TEAM -->  
<form method="post" id="submit_addsports_data" name="submit_addsports_data">

    <!-- Hidden Modal Variable -->
    <input type="hidden" name="apps_username" id="apps_username" value="<?= $apps_username; ?>"  />
    <input type="hidden" name="recid_event_request" id="recid_event_request" value="<?= $recid_event_request; ?>"  />
    
    <div class="card">
        <div class="card-body">

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Title<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="addsports_title" name="addsports_title" maxlength="100" placeholder="" >
                    <small id="addsports_title_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Type<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <select id="addsports_type" name="addsports_type" class="custom-select mr-sm-2">
                        <option selected>Choose...</option>  
                        <option value="Basketball">Basketball</option>    
                        <option value="Volleyball">Volleyball</option>    
                    </select>
                    <small id="addsports_type_error" class="input_error_color"></small>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Number of Group<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <input type="number" value="0" class="form-control" id="addsports_group" name="addsports_group" maxlength="100" placeholder="" >
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="LabelSample" class="col-form-label">Unit<font color="red"><i>*</i></font></label>
                </div>
                <div class="col-md-9">
                    <select id="addsports_unit" name="addsports_unit" class="custom-select mr-sm-2">
                        <option selected>Choose...</option>   
                        <option value="Solol">Solo</option>    
                        <option value="Team">Team</option>    
                    </select>
                    <small id="addsports_unit_error" class="input_error_color"></small>
                </div>
            </div>

            <!--START OF CAPTCHA AND SAVE BUTTON -->
            <br><br><br>
            <div id="div_captcha" class="text-xs-center"> <!--class="text-xs-center" -->
                <!--google reCaptha v2 -->
                
                <div class="g-recaptcha" data-sitekey="6LfBeFIdAAAAAKz9ZcOu2twO7AuDwS46_Cuuqg3G" ></div>
                
                <br>
                <div class="col text-center">
                        <button type="submit" id="btn_addsports_save" class="btn btn-primary">
                            <i class="addsports-loading-icon fa fa-paper-plane"></i>
                            <span class="addsports-btn-text">Submit</span>
                        </button>
                        
                        <!--Progress bar -->
                        <div class="container-fluid">
                            <div id="display_progressbar_addsports" class="progress">
                                <div class="progress-bar progress-bar-striped bg-info" id="progressbar_addsports" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
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

    var add_title = 1;
    var add_type = 1;
    var add_unit = 1;

    document.getElementById("btn_addsports_save").disabled = true;

    //Hide muna
    $("#display_progressbar_addsports").hide();
    $("#div_captcha").hide();
    

    //========================================================
    $(document).ready(function(){ 

        //checking text input -start=== 
            $(document).on("focusout keyup","#addsports_title",function(e) {
                var input = $("#addsports_title").val();
                if (input.length == 0) {
                    $("#addsports_title_error").html('Sports Title is blank');
                    add_title = 1;
                } else {
                    $("#addsports_title").val(input.toUpperCase());
                    $("#addsports_title_error").html('');
                    add_title = 0;
                }
                check_input_addsports();
            });//end of document click  

            $(document).on("change focusout","#addsports_type",function(e) {
                var input = $("#addsports_type").val();
                if (input == "Choose...") {
                    $("#addsports_type_error").html('Invalid Sports Type');
                    add_type = 1;
                } else {
                   $("#addsports_type_error").html('');
                   add_type = 0;
                }
                check_input_addsports();
            });//end of document click

            
            $(document).on("change focusout","#addsports_unit",function(e) {
                var input = $("#addsports_unit").val();
                if (input == "Choose...") {
                    $("#addsports_unit_error").html('Invalid Unit');
                    add_unit = 1;
                } else {
                   $("#addsports_unit_error").html('');
                   add_unit = 0;
                }
                check_input_addsports();
            });//end of document click
        
            function check_input_addsports() {
                if (add_title == 1 || add_type == 1 || add_unit == 1
                    )
                {
                    document.getElementById("btn_addsports_save").disabled = true;
                    $("#div_captcha").hide();
                } else {
                    document.getElementById("btn_addsports_save").disabled = false;
                    $("#div_captcha").show();
                }
            }//end of function

        //checking text input -end===

    });//end of document ready function
    //========================================================


    //Submitting Form Data | ADD TEAM  - Start
    $('#submit_addsports_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_addsports").show();
            var base_path = base_url + "/Employee/submit_addsports_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_addsports').html(percentComplete + '%');
                    $('#progressbar_addsports').width(percentComplete + '%');
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
                    document.getElementById("btn_addsports_save").disabled = true;
                    $(".addsports-loading-icon").removeClass('fa fa-paper-plane');
                    $(".addsports-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".addsports-btn-text").text("Submitting Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_addsports_save").disabled = false;
                            $(".addsports-loading-icon").removeClass('spinner-border text-warning');
                            $(".addsports-loading-icon").addClass('fa fa-paper-plane');
                            $(".addsports-btn-text").text("Submit Record");

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
                                        $('#progressbar_apps_addsports').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_addsports").hide();

                                            //Update DataTable
                                            $('#table_sports_activity_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_addsports_save").disabled = true;

                                            $("#addsports_title").val("");
                                            $("#addsports_type").val("");
                                            $("#addsports_group").val("");
                                            $("#addsports_unit").val("");
                                            $("#div_captcha").hide();

                                            //Reset variables
                                            add_title = 1;
                                            add_type = 1; 
                                            add_unit = 1;

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_addsports').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_addsports").hide();

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