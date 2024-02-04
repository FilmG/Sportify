<!--table-striped table-dark   style="width:100%"-->
<table id="table_setup_department_list" class="table table-striped table-sm table-hover" style="width:100%">
    <caption></caption>
    <thead bgcolor="#e9ecef">
        <tr>
          <th>#</th>
          <th>Code</th>
          <th>Description</th>
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
        
        var user_deptid = $("#user_deptid").val();
        //var appointment = "Online"; //di muna gagamitin ang variable

        var table = $('#table_setup_department_list').dataTable({
            rowCallback: function(row, data) { //show tooltip on each row
                  //$(row).attr('title', 'click to edit ' + data[3])
                  $(row).attr('title', 'click this name to edit this record or select action button')
            },
            "stateSave" : true,  //remember page number when refresh or exited 
            "ordering": false,
            "bFilter": true, //remove search box []
            "ajax": { 
                "url" : "<?php echo base_url('Users/table_setup_department_list'); ?>",
                "data" : {user_deptid:user_deptid},
                "type" : "POST"
            },
              "processing": false,
              "serverSide" : true,
              "columns": [
                  { orderable: false},
                  null,
                  null,
                  null,
                  { className: "text-right"},
                ]
                        
        });
	//END OF DISPLAY DATA ON DATA TABLE

</script>