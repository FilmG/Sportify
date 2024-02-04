<div id="div_event_request_display">
  <div class="pagetitle">
    <h1>Event Request</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">List of Event Request</li>

          <li class="ml-auto btn"><a href="#" id="breadcrumb_event_make_request"><i class="bi bi-vinyl"></i> Make a Request</a></li>
          <!--
          <li class="btn"><a href="#" id="breadcrumb_application_users_upload"><i class="bi bi-vinyl"></i> Batch Upload</a></li>
          -->
        </ol>
      </nav>
  </div><!-- End Page Title -->

  <section class="section">
        <?php
            echo view('employee/event_request/event_request_list');
        ?>
    <p></p>
  </section>

</div>

<!--Javascript------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
    //alert("App Main");

    $(document).ready(function(){ 

        
});//end of document ready function
//========================================================

</script>