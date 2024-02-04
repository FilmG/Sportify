<!--
Username: <?= $apps_username; ?><br>
recid_event_request: <?= $recid_event_request; ?><br>
recid_sports_activity: <?= $recid_sports_activity; ?><br>
sports_title: <?= $sports_title; ?><br>
group_no: <?= $group_no; ?><br>
group_unit: <?= $group_unit; ?> <br>
event_title: <?= $event_title; ?>
-->

<!-- Hidden Modal Variable -->
<input type="hidden" name="recid_event_request" id="recid_event_request" value="<?= $recid_event_request; ?>"  />
<input type="hidden" name="recid_sports_activity" id="recid_sports_activity" value="<?= $recid_sports_activity; ?>"  />
<input type="hidden" name="sports_title" id="sports_title" value="<?= $sports_title; ?>"  />
<input type="hidden" name="group_no" id="group_no" value="<?= $group_no; ?>"  />
<input type="hidden" name="group_unit" id="group_unit" value="<?= $group_unit; ?>"  />
<input type="hidden" name="event_title" id="event_title" value="<?= $event_title; ?>"  />

<input type="hidden" name="sports_type" id="sports_type" value="<?= $sports_type; ?>"  />

<div id="div_sports_activity_details">
    <div class="card">
        <div class="card-body">
           
                <div class="pagetitle">
                    <nav>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item view_sports_activity" recid_event_request="<?= $recid_event_request; ?>" event_title="<?= $event_title; ?>" ><a href="#" id="" >List of Sports Activity</a></li>
                        <li class="breadcrumb-item active view_details_sports_activity" 
                                recid_event_request="<?= $recid_event_request; ?>" recid_sports_activity="<?= $recid_sports_activity; ?>" sports_title="<?= $sports_title; ?>"
                                group_no="<?= $group_no; ?>" group_unit="<?= $group_unit; ?>" event_title="<?= $event_title; ?>" sports_type="<?= $sports_type; ?>"
                            ><a href="#"><?= $sports_title; ?></a></li>

                        <li class="ml-auto btn breadcrumb_details_sports_activity_addteam"
                                recid_sports_activity="<?= $recid_sports_activity; ?>" sports_type="<?= $sports_type; ?>"
                            ><a href="#"><i class="bi bi-vinyl"></i> Add Team</a></li>

                        
                        <li class="btn breadcrumb_details_sports_activity_schedule"
                                recid_sports_activity="<?= $recid_sports_activity; ?>" sports_type="<?= $sports_type; ?>"
                            ><a href="#" id=""><i class="bi bi-vinyl"></i> Schedule</a></li>
                        
                        </ol>
                    </nav>
                </div><!-- End Page Title -->

                <section id="section_sports_activity_details">
                    <br>

                    <?php
                        echo view('employee/sports_activity_details/details_sports_activity_list');
                    ?>
                    <p></p>
                </section>
           

        </div><!--End Card-Body -->  
    </div><!--End Card -->
</div><!--End div_sports_activity_details -->