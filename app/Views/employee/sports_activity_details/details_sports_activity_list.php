<!--table-striped table-dark   style="width:100%"-->
<table id="table_sports_activity_details_list" class="table table-striped table-sm table-hover" style="width:100%">
    <caption></caption>
    <thead bgcolor="#e9ecef">
        <tr>
          <th>#</th>
          <th>Logo</th>
          <th>Team</th>
          <th>Coach</th>
          <th>Win</th>
          <th>Loss</th>
          <th>Pct%</th>
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
        
        var recid_event_request = $("#recid_event_request").val();
        var recid_sports_activity = $("#recid_sports_activity").val();
        var sports_title = $("#sports_title").val();
        var group_no = $("#group_no").val();
        var group_unit = $("#group_unit").val();
        var event_title = $("#event_title").val();
        //alert("dataTable:"+event_title); 

        //alert(user_deptid);

        var table = $('#table_sports_activity_details_list').dataTable({
            rowCallback: function(row, data) { //show tooltip on each row
                  //$(row).attr('title', 'click to edit ' + data[3])
                  $(row).attr('title', 'click this name to edit this record or select action button')
            },
            "stateSave" : true,  //remember page number when refresh or exited 
            "ordering": false,
            "bFilter": true, //remove search box []
            "ajax": { 
                "url" : "<?php echo base_url('Employee/table_sports_activity_details_list'); ?>",
                "data" : {recid_event_request:recid_event_request,recid_sports_activity:recid_sports_activity,sports_title:sports_title,
                  group_no:group_no,group_unit:group_unit,event_title:event_title},
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
                  { className: "text-right"},
                ]
                        
        });
	//END OF DISPLAY DATA ON DATA TABLE

</script>