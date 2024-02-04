<div class="pagetitle">
    <h1>Department</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Setup</a></li>
        <li class="breadcrumb-item active">List of Department</li>

        <li class="ml-auto btn"><a href="#" id="breadcrumb_application_department_add"><i class="bi bi-vinyl"></i> Add Department</a></li>
        <!--
        <li class="btn"><a href="#" id="breadcrumb_application_users_upload"><i class="bi bi-vinyl"></i> Batch Upload</a></li>
        -->
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div id="div_department_form">
      <?php
          echo view('employee/setup/department/department_list');
      ?>
  </div>
</section>