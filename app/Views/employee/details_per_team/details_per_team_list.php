<!--table-striped table-dark   style="width:100%"-->
<table id="table_detail_perteam_list" class="table table-striped table-sm table-hover" style="width:100%">
    <caption></caption>
    <thead bgcolor="#e9ecef">
        <tr>
          <th>#</th>
          <th>Player</th>
          <th>Position</th>
          <th>Height</th>
          <th>Course</th>
          <th>Section</th>
          <th>Status</th>
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
        
        var recid_sports_activity_details = $("#recid_sports_activity_details").val();
        //var event_title = $("#event_title").val();
        //alert("dataTable:"+event_title); 

        //alert(recid_sports_activity_details);

        var table = $('#table_detail_perteam_list').dataTable({
            rowCallback: function(row, data) { //show tooltip on each row
                  //$(row).attr('title', 'click to edit ' + data[3])
                  $(row).attr('title', 'click this name to edit this record or select action button')
            },
            "stateSave" : true,  //remember page number when refresh or exited 
            "ordering": false,
            "bFilter": true, //remove search box []
            "ajax": { 
                "url" : "<?php echo base_url('Employee/table_detail_perteam_list'); ?>",
                "data" : {recid_sports_activity_details:recid_sports_activity_details},
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