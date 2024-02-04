
<div id="">
  <div class="pagetitle">
    <h1>Event Approval [Course Adviser]</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">List of Event Request for Approval</li>
          
          <li class="ml-auto btn"><a href="#" id="breadcrumb_event_approved_ca"><i class="bi bi-vinyl"></i> Approved</a></li>
          <li class="btn"><a href="#" id="breadcrumb_event_rejected_ca"><i class="bi bi-vinyl"></i> Rejected</a></li>
        </ol>
      </nav>
  </div><!-- End Page Title -->

</div>

<div id="div_course_adviser">
    <!--table-striped table-dark   style="width:100%"-->
    <table id="table_event_approval_course_adviser_list" class="table table-striped table-sm table-hover" style="width:100%">
        <caption>List of Event for Approval</caption>
        <thead bgcolor="#e9ecef">
            <tr>
              <th>#</th>
              <th>Activity Title</th>
              <th>Department</th>
              <th>Date From</th>
              <th>Date To</th>
              <th>Venue of Activity</th>
              <th>Level of Reference</th>
              <th>Status</th>
              <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!--Javascript------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
  var base_url = "<?= base_url() ?>";

    //START DISPLAY DATA ON DATA TABLE
        //alert("display list user");
        
        //var user_deptid = $("#user_deptid").val();
        //var user_role_sign = $("#hid_user_role_sign").val();
        var approved_value = 1;
        
        var table = $('#table_event_approval_course_adviser_list').dataTable({
            rowCallback: function(row, data) { //show tooltip on each row
                  //$(row).attr('title', 'click to edit ' + data[3])
                  $(row).attr('title', 'click this name to edit this record or select action button')
            },
            "stateSave" : true,  //remember page number when refresh or exited 
            "ordering": false,
            "bFilter": true, //remove search box []
            "ajax": { 
                "url" : "<?php echo base_url('Employee/table_event_approval_course_adviser_list'); ?>",
                //"data" : {user_deptid:user_deptid,user_role_sign:user_role_sign,approved_value:approved_value},
                "data" : {approved_value:approved_value},
                "type" : "POST"
            },
              "processing": false,
              "serverSide" : true,
              "columns": [
                  { orderable: false},
                  null,
                  null,
                  null,
                  null,
                  null,
                  null,
                  null,
                  { className: "text-right"},
                ]
                        
        });
	//END OF DISPLAY DATA ON DATA TABLE

</script>