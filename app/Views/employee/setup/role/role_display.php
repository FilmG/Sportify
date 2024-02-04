<div class="pagetitle">
    <h1>Role</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Setup</a></li>
        <li class="breadcrumb-item active">List of Role</li>

        <li class="ml-auto btn"><a href="#" id="breadcrumb_application_role_add"><i class="bi bi-vinyl"></i> Add Role</a></li>
        <!--
        <li class="btn"><a href="#" id="breadcrumb_application_users_upload"><i class="bi bi-vinyl"></i> Batch Upload</a></li>
        -->
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div id="div_role_form">
      <?php
          echo view('employee/setup/role/role_list');
      ?>
  </div>
</section>