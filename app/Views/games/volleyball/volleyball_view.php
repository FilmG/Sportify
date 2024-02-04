<br>
<!--
recid_event_request : <?= $recid_event_request; ?><br> 

recid_sports_activity : <?= $recid_sports_activity; ?><br>
sports_name : <?= $sports_name; ?><br>
-->

<!-- Hidden Modal Variable -->
<input type="hidden" name="recid_sports_activity" id="recid_sports_activity" value="<?= $recid_sports_activity; ?>"  />

<div class="container">

    <h4 class="card-title">Schedule</h4>
    <div class="row">

        <!--Column LEFT -start -->
        <div class="col-8">

                <!--two-colum sa loob ng LEFT column - Start -->
                <div class="row">
                    <?php
                        foreach($data_schedule_list as $value) {
                    ?>
                        <div class="col-sm-6">
                            <br>
                            <div class="card">
                                <div class="card-body">

                                    <table style="width:100%">
                                        <tr>
                                            <td colspan="3" style="text-align:right"><?= $value['match_date_text']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:5%"><img id="" src="<?= base_url(); ?>/public/images/team_logo/<?= $value['match_team1_logo']; ?>" class="rounded" width="30" height="30"></td>
                                            <td><?= $value['match_team1_name']; ?></td>
                                            <td><?= $value['team1_standing']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:5%"><img id="" src="<?= base_url(); ?>/public/images/team_logo/<?= $value['match_team2_logo']; ?>" class="rounded" width="30" height="30"></td>
                                            <td><?= $value['match_team2_name']; ?></td>
                                            <td><?= $value['team2_standing']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align:right"><?= $value['match_time_text']; ?> @ <?= $value['match_venue']; ?></td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                        
                </div>
                <!--two-colum sa loob ng LEFT column - Start -->

        </div> <!--end Column LEFT -->


	    <!--Column RIGHT -start -->
         <div class="col">
		
                <div class="alert alert-secondary">Volleyball Team Standing</div>
                <table id="table_volleyball_standing" class="table table-striped table-sm table-hover" style="width:100%">
                    <thead>
                        <tr> <!-- style="display:none" -->
                            <th></th>
                            <th>Team</th>
                            <th style="width:10%; text-align:center">W</th>
                            <th style="width:10%; text-align:center">L</th>         
                            <th style="width:10%; text-align:center">Pct</th>
                        </tr> 
                    </thead>   
                </table>

	    </div> <!--end Column RIGHT -->

    </div> <!--end row -->
</div> <!--end container -->


<!--Javascript------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
    //alert("Volleyball");

    load_volleyball_standing(); //load basketball standing

    $(document).ready(function(){ //-------------------------

    });//end of document ready function
    //=====================================================================

    function load_volleyball_standing() {
        var recid_sports_activity = $("#recid_sports_activity").val();
        //alert("Load Volleyball ="+recid_sports_activity);
        //WORKING AJAX FUNCTION WITH DATA {}
        var base_path = base_url + "/Games/view_volleyball_standing"; 
        $.ajax({
            type: "POST",
            url: base_path,
            data: {recid_sports_activity:recid_sports_activity},
            cache: false,
            //async:false, //spinner doest work if enable
            dataType: 'json', // json or html
                beforeSend: function() {
                                        
                },
                success: function(data) {
                    //alert(data.length);
                    if(data.length > 0) {
                        for(var count=0;count < data.length; count++) { 
                            
                            //add record row on table | style="display:none"
                            $('#table_volleyball_standing').append(
                                '<tr id="row'+count+'" class="border-bottom">'+
                                    '<td style="width:5%">'+'<img src="<?= base_url(); ?>/public/images/team_logo/'+data[count].logo+'" class="rounded" width="30" height="30">'+'</td>'+
                                    '<td style="width:65%">'+data[count].team_name+'</td>'+
                                    '<td style="width:10%; text-align:center">'+data[count].wins+'</td>'+
                                    '<td style="width:10%; text-align:center">'+data[count].loss+'</td>'+
                                    '<td style="width:10%; text-align:center">'+data[count].percentage+'</td>'+
                                '</tr>'
                            );

                        } //end for | <img src="<?= base_url(); ?>/public/images/team_logo/'+data[count].logo+'" class="rounded" width="30" height="30">
                    }//end if data.length > - 
                }//end success
        });//ajax

    }//end of function

</script>