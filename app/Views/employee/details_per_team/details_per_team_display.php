<!--
Username: <?= $apps_username; ?><br>
recid_sports_activity_details: <?= $recid_sports_activity_details; ?><br> 
recid_sports_activity: <?= $recid_sports_activity; ?><br>
team_name: <?= $team_name; ?><br>

recid_event_request: <?= $recid_event_request; ?><br>
sports_title: <?= $sports_title; ?><br>
group_no: <?= $group_no; ?><br>
group_unit: <?= $group_unit; ?><br>
event_title: <?= $event_title; ?><br>
-->

<!-- Hidden Modal Variable -->
<input type="hidden" name="recid_sports_activity_details" id="recid_sports_activity_details" value="<?= $recid_sports_activity_details; ?>"  />

<div id="div_details_per_team">
    <div class="card">
        <div class="card-body">
           
                <div class="pagetitle">
                    <nav>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item view_details_sports_activity" 
                                recid_event_request="<?= $recid_event_request; ?>" recid_sports_activity="<?= $recid_sports_activity; ?>" sports_title="<?= $sports_title; ?>"
                                group_no="<?= $group_no; ?>" group_unit="<?= $group_unit; ?>" event_title="<?= $event_title; ?>"
                             ><a href="#" id="" ><?= $sports_title; ?></a></li>
                        <li class="breadcrumb-item " recid_event_request="<?= $recid_event_request; ?>"  >Details Per Team</li>
                        <li class="breadcrumb-item active details_per_team" 
                                recid_sports_activity_details="<?= $recid_sports_activity_details; ?>" recid_sports_activity="<?= $recid_sports_activity; ?>" 
                                team_name="<?= $team_name; ?>" recid_event_request="<?= $recid_event_request; ?>" sports_title="<?= $sports_title; ?>"
                                group_no="<?= $group_no; ?>" group_unit="<?= $group_unit; ?>" event_title="<?= $event_title; ?>"
                            ><a href="#" id="" ><?= $team_name; ?></a></li>

                        
                        <li class="ml-auto btn breadcrumb_add_player"
                                recid_sports_activity_details="<?= $recid_sports_activity_details; ?>"
                            ><a href="#"><i class="bi bi-vinyl"></i> Add Player</a></li>
                        
                        <!--
                        <li class="btn"><a href="#" id="breadcrumb_application_users_upload"><i class="bi bi-vinyl"></i> Batch Upload</a></li>
                        -->
                        </ol>
                    </nav>
                </div><!-- End Page Title -->

                <section id="section_details_per_team">
                    <div id="">
                        <a href="#" id="" >Schedule</a> &emsp;
                        <a href="#" id="" >Injuries</a> &emsp;
                        <a href="#" id="" >Statistics</a> &emsp;
                    </div>
                    <br>
                    <?php
                        echo view('employee/details_per_team/details_per_team_list');
                    ?>
                    <p></p>
                </section>
           

        </div><!--End Card-Body -->  
    </div><!--End Card -->
</div><!--End div_sports_activity_details -->