<!--table-striped table-dark   style="width:100%"-->
<table id="table_event_request_list" class="table table-striped table-sm table-hover" style="width:100%">
    <caption></caption>
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
          <th>Remarks</th>
          <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!--Javascript------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
  var base_url = "<?= base_url() ?>";

    //START DISPLAY DATA ON DATA TABLE
        //alert("display list user");
        
        var user_deptid = $("#user_deptid").val();
        var user_role_sign = $("#hid_user_role_sign").val();
        //alert(user_role_sign);
        //var appointment = "Online"; //di muna gagamitin ang variable
        //alert(user_deptid);

        var table = $('#table_event_request_list').dataTable({
            rowCallback: function(row, data) { //show tooltip on each row
                  //$(row).attr('title', 'click to edit ' + data[3])
                  $(row).attr('title', 'click this name to edit this record or select action button')
            },
            "stateSave" : true,  //remember page number when refresh or exited 
            "ordering": false,
            "bFilter": true, //remove search box []
            "ajax": { 
                "url" : "<?php echo base_url('Employee/table_event_request_list'); ?>",
                "data" : {user_deptid:user_deptid,user_role_sign:user_role_sign},
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
                  null,
                  { className: "text-right"},
                ]
                        
        });
	//END OF DISPLAY DATA ON DATA TABLE

</script>