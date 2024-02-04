<!--
Username: <?= $apps_username; ?><br> 
recid_sports_activity: <?= $recid_sports_activity; ?><br>
sports_type: <?= $sports_type; ?><br>
-->

<!-- Hidden Modal Variable -->
<input type="hidden" name="recid_event_request" id="recid_event_request" value="<?= $recid_event_request; ?>"  />

<div id="div_sports_schedules">
    <div class="card">
        <div class="card-body">
           
                <div class="pagetitle">
                    <div id="">
                        <a href="#" id="sports_schedule_addsched" recid_sports_activity="<?= $recid_sports_activity; ?>">Add Schedule</a> &emsp;
                    </div>
                </div><!-- End Page Title -->

                <section id="section_sports_schedules_list">
                    <br>
                    <?php
                        echo view('employee/sports_schedules/sports_schedules_list');
                    ?>
                    <p></p>
                </section>
           

        </div><!--End Card-Body -->  
    </div><!--End Card -->
</div><!--End div_sports_activity_details -->