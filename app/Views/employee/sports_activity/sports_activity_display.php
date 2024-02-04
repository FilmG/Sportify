
<!--
Username: <?= $apps_username; ?><br>
Event ID: <?= $recid_event_request; ?>
-->

<!-- Hidden Modal Variable -->
<input type="hidden" name="event_request_recid" id="event_request_recid" value="<?= $recid_event_request; ?>"  />
<input type="hidden" name="event_title" id="event_title" value="<?= $event_title; ?>"  />

<div class="col text-center">
    Sports Activity<br> [<?= $event_title; ?>]
</div>

<div id="div_sports_activity">
    <div class="card">
        <div class="card-body">
            
                <div class="pagetitle">
                    <nav>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="#" >Home</a></li>
                        <li class="breadcrumb-item active view_sports_activity" 
                                recid_event_request="<?= $recid_event_request; ?>"  event_title="<?= $event_title; ?>"
                            ><a href="#" >List of Sports Activity</a></li>

                        <li class="ml-auto btn"><a href="#" id="breadcrumb_sports_activity_addsports" 
                                recid_event_request="<?= $recid_event_request; ?>"
                            ><i class="bi bi-vinyl"></i> Add Sports Activity</a></li>
                        <!--
                        <li class="btn"><a href="#" id="breadcrumb_application_users_upload"><i class="bi bi-vinyl"></i> Batch Upload</a></li>
                        -->
                        </ol>
                    </nav>
                </div><!-- End Page Title -->

                <section id="section_sports_activity_list">
                    <?php
                        echo view('employee/sports_activity/sports_activity_list');
                    ?>
                    <p></p>
                </section>
            

        </div><!--End Card-Body -->  
    </div><!--End Card -->
</div><!--End div_list_sports_activity -->

<!--Javascript------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
    //alert("Event Request");

    //=============================================================================
    // SPACES
    //=============================================================================

    $(document).ready(function(){ 



        
    });//end of document ready function
    //========================================================

    //Submitting Form Data | EVENT REQUEST - Start
    $('#submit_event_request_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_event_request").show();
            var base_path = base_url + "/Employee/submit_event_request_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_event_request').html(percentComplete + '%');
                    $('#progressbar_event_request').width(percentComplete + '%');
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
                    document.getElementById("btn_event_request_save").disabled = true;
                    $(".event_request-loading-icon").removeClass('fa fa-paper-plane');
                    $(".event_request-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".event_request-btn-text").text("Submitting Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_event_request_save").disabled = false;
                            $(".event_request-loading-icon").removeClass('spinner-border text-warning');
                            $(".event_request-loading-icon").addClass('fa fa-paper-plane');
                            $(".event_request-btn-text").text("Submit Record");

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
                                        $('#progressbar_apps_event_request').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_event_request").hide();

                                            //Update DataTable
                                            $('#table_event_request_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_event_request_save").disabled = true;

                                            //Load List of Event Request Form
                                            $("#main_content").load(base_url+"/Sidebar_menu/event_request"); 

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_event_request').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_event_request").hide();

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error

                                //Load List of Event Request Form
                                $("#main_content").load(base_url+"/Sidebar_menu/event_request"); 
                            }//end of data.status

                        }//end ajax success
                    }); //End of Ajax

        }); //end of submit
    //Submitting Form Data | EVENT REQUEST - End

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

</script>