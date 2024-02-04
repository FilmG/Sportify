<?php
    
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title><?= $user_deptname . " | " . $app_name; ?></title>
        
        <!-- Favicons -->
        <meta name="description" content="The small framework with powerful features">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>/public/favicon.ico"/>

        <!--start JQuery 3.7.0 para gumana ang Jquery Ajax-->
        <script src="<?= base_url(); ?>/public/assets/jquery/j3.7.0/jquery-3.7.0.min.js"></script>

        <!-- Vendor CSS Files -->
        <link href="<?= base_url(); ?>/public/assets/header_and_sidebar/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/assets/header_and_sidebar/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/assets/header_and_sidebar/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    
        <!-- Template Main CSS File -->
        <link href="<?= base_url(); ?>/public/assets/header_and_sidebar/css/style.css" rel="stylesheet">

        <!--SweetAlert2 -->
        <script src="<?= base_url(); ?>/public/assets/SweetAlert2/sweetalert2@11.js"></script>

        <!--Bootstrap 4.5 -->
        <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/bootstrap-4.5.3/css/bootstrap.min.css"> 
        <script src="<?= base_url(); ?>/public/assets/bootstrap-4.5.3/js/popper.min.js"></script>
        <script src="<?= base_url(); ?>/public/assets/bootstrap-4.5.3/js/bootstrap.min.js"></script>
        

        <!--Data Tables 1.10.21 -START -->
            <!--Data Table offline source -->
            <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/bootstrap-4.5.3/DataTables-1.10.21/css/dataTables.bootstrap4.min.css"> 
            <script language='javascript' src="<?= base_url(); ?>/public/assets/bootstrap-4.5.3/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
            <script language='javascript' src="<?= base_url(); ?>/public/assets/bootstrap-4.5.3/DataTables-1.10.21/js/dataTables.bootstrap4.min.js"></script>
            
        <!--Data Tables 1.10.21 -END -->

        <!--For Font Awesome  -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
        <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/fontawesome-free-5.15.1/css/all.css" rel="stylesheet"> <!--load all styles -->

        <!--Google reCaptcha v2.0 | para sure lagay mo din sa Form kung saan sya ginammit-->
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <!--Own JS and CSS -->
        <!--
        <link href="<?= base_url(); ?>/public/assets/apps_main/css/qrcode.css" rel="stylesheet">
        -->
        <script src="<?= base_url(); ?>/public/assets/sems/apps_main/js/main.js"></script>
        <script src="<?= base_url(); ?>/public/assets/sems/apps_main/js/sb-menu.js"></script>
        <script src="<?= base_url(); ?>/public/assets/sems/apps_main/js/users.js"></script>
        <script src="<?= base_url(); ?>/public/assets/sems/apps_main/js/employee.js"></script>

        <!--Time in Javascript -->
        <script src="<?= base_url(); ?>/public/assets/moment-js/moment.js"></script>

        <!-- get the required files from 3rd party sources -->
            <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/google-font/roboto100.css">
        <!-- use the font -->

        <style>
            body {
                /* font-family: 'Poppins', sans-serif; */
                font-family: roboto;
            } 

            .input_error_color {
                color: <?= $app_error_color; ?>;
            }

        </style>

    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <i class="bi bi-list toggle-sidebar-btn"></i>
                &ensp;
                <a href="#" class="logo d-flex align-items-center">
                    <img src="<?= base_url(); ?>/public/images/brand/<?= $app_logo; ?>" alt="">
                    <span class="d-none d-lg-block"><?= $app_short_name; ?></span>
                </a>
            </div><!-- End Logo -->

            <div class="text-center"> 
                | <?= $user_deptname; ?> [<?= $user_deptid; ?>]
            </div><!-- End App Name $user_role_sign  $user_deptid; -->
    
            <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img id="current_app_profile" src="<?= base_url(); ?>/public/images/application_users/<?= $user_larawan; ?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user_fullname; ?> [<?= $user_userid; ?> |</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                    <h6><?= $user_fullname; ?></h6>
                    <span><?= $user_dept; ?></span>
                    </li>
                    <li>
                    <hr class="dropdown-divider">
                    </li>

                    <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" id="user_profile">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                    </li>
                    <li>
                    <hr class="dropdown-divider">
                    </li>

                    <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" id="account_setting">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                    </li>
                    <li>
                    <hr class="dropdown-divider">
                    </li>

                    <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" id="btn_app_logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
            </nav><!-- End Icons Navigation -->

        </header><!-- End Header -->

        <!-- ======= Sidebar ======= -->
        
            <div id="sidebar_content">
                <?php
                    //List of user access
                    $data = [
                        'user_username' => $user_username,

                        'sidebar_dashboard' => $sidebar_dashboard,

                        'sidebar_setup' => $sidebar_setup,
                        'setup_users_submenu_access' => $setup_users_submenu_access,
                        'setup_users_access_submenu_access' => $setup_users_access_submenu_access,

                        'sidebar_profile' => $sidebar_profile
                  
                      ];
                    echo view('employee/sidebar_menu/sidebar_menu_employee');
                ?>
            </div>

        <!-- Hidden Fields -->
        <input type="hidden" name="hid_user_fullname" id="hid_user_fullname" value="<?= $user_fullname; ?>"/>	
        <input type="hidden" name="hid_userid" id="hid_userid" value="<?= $user_userid; ?>"/>	
        <input type="hidden" name="user_deptid" id="user_deptid" value="<?= $user_deptid; ?>"/>	
        <input type="hidden" name="user_deptname" id="user_deptname" value="<?= $user_deptname; ?>"/>
        <input type="hidden" name="hid_user_role_sign" id="hid_user_role_sign" value="<?= $user_role_sign; ?>"/>

        <!-- ========================================================================== -->
        <main id="main" class="main"> <!-- Start of Main Dashboard Content and index.php-->
            <div id="main_content">
                <?php
                    //echo view('employee/dashboard/home_content_employee');
                ?>
            </div>
        </main><!-- End of Main Dashboard Content and index.php-->
        <!-- ========================================================================== -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
            &copy; Copyright <strong><span><?= $copyright; ?></span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            <!-- Designed by <a href="https://bootstrapmade.com/"><?= $designed_by; ?></a>  -->
            Programmed and Designed by <a href="https://bootstrapmadexxx.com/"><?= $designed_by; ?></a>
            </div>
        </footer><!-- End Footer -->

        <!-- Arrow Up sa Lower Right para mapunta sa Top page -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        
        <!-- Vendor JS Files -->
        <script src="<?= base_url(); ?>/public/assets/header_and_sidebar/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="<?= base_url(); ?>/public/assets/header_and_sidebar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        <!-- Template Main JS File -->
        <script src="<?= base_url(); ?>/public/assets/header_and_sidebar/js/main.js"></script>
        
    </body>
</html>



<!-- START OF MODAL FORM -->

    <!--  END OF USERS MODAL -->
    <!-- START FORMS || SETUP / ADD USER -->  
    <form method="post" id="submit_application_useradd_data" name="submit_application_useradd_data">
        <div class="modal fade " id="modal_application_user_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Setup / User / Add</h5>
                <button type="button" id="modalx-close-apps_useradd" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">First name</label><font color="red"><i>*</i></font>
                            <input type="text" class="form-control" id="apps_useradd_fname" name="apps_useradd_fname" maxlength="60" placeholder="">
                            <small id="apps_useradd_fname_error" class="input_error_color"></small>
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Middle name</label>
                            <input type="text" class="form-control" id="apps_useradd_mname" name="apps_useradd_mname" maxlength="60" placeholder="">
                            <small id="apps_useradd_mname_error" class="input_error_color"></small>
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Last name</label><font color="red"><i>*</i></font>
                            <input type="text" class="form-control" id="apps_useradd_lname" name="apps_useradd_lname" maxlength="60" placeholder="">
                            <small id="apps_useradd_lname_error" class="input_error_color"></small>
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Suffix [JR,SR,II]</label>
                            <select id="apps_useradd_suffix" name="apps_useradd_suffix" class="custom-select mr-sm-2">
                                <option selected></option>
                                <option value=" "> </option>
                                <option value="JR">JR</option>
                                <option value="SR">SR</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                            </select>
                        </div> 
                    </div><!-- End form-row -->
                    
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            &nbsp;<label for="newUser">Employee Number</label><font color="red"><i>*</i></font>
                            <input type="text" class="form-control" id="apps_useradd_empnum" name="apps_useradd_empnum" maxlength="60" placeholder="">
                            <small id="apps_useradd_empnum_error" class="input_error_color"></small>
                        </div>

                        <div class="form-group col-md-4">
                            &nbsp;<label for="newUser">School Email <small>[only school email is allowed]</small></label><font color="red"><i>*</i></font>
                            <input type="text" class="form-control" id="apps_useradd_email" name="apps_useradd_email" maxlength="60" placeholder="">
                            <small id="apps_useradd_email_error" class="input_error_color"></small>
                        </div>

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Department</label><font color="red"><i>*</i></font>
                            <select id="apps_useradd_dept" name="apps_useradd_dept" class="custom-select mr-sm-2" onChange="myDept_Function(this);">
                                
                            </select>
                            <small id="apps_useradd_dept_error" class="input_error_color"></small>
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Role</label><font color="red"><i>*</i></font>
                            <select id="apps_useradd_role" name="apps_useradd_role" class="custom-select mr-sm-2" onChange="myRole_Function(this);">
                                
                            </select>
                            <small id="apps_useradd_role_error" class="input_error_color"></small>
                        </div>
                    </div><!-- End form-row -->
                    
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            &nbsp;<label for="newUser">Account Type</label><font color="red"><i>*</i></font>
                            <select id="apps_useradd_accounttype" name="apps_useradd_accounttype" class="custom-select mr-sm-2">
                                <option selected>Choose...</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            <small id="apps_useradd_accounttype_error" class="input_error_color"></small>
                        </div> 
                    </div><!-- End form-row -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            &nbsp;<label for="newUser">Username</label><font color="red"><i>*</i></font>
                            <input type="text" class="form-control" id="apps_useradd_uname" name="apps_useradd_uname" maxlength="50" placeholder="">
                            <small id="apps_useradd_uname_error" class="input_error_color"></small>
                        </div>

                        <div class="form-group col-md-4">
                            &nbsp;<label for="newUser">Password</label><font color="red"><i>*</i></font>
                            <input type="password" class="form-control" id="apps_useradd_pword" name="apps_useradd_pword" maxlength="150" placeholder="">
                            <small id="apps_useradd_pword_error" class="input_error_color"></small>
                        </div>

                        <div class="form-group col-md-4">
                            &nbsp;<label for="newUser">Verify Password</label><font color="red"><i>*</i></font>
                            <input type="password" class="form-control" id="apps_useradd_pword_verify" name="apps_useradd_pword_verify" maxlength="60" placeholder="">
                            <small id="apps_useradd_pword_verify_error" class="input_error_color"></small>
                        </div>
                    </div><!-- End form-row -->
                    

            </div><!-- End modal-body -->

            <!-- Hidden Modal Variable -->
            <input type="hidden" name="apps_useradd_recid" id="apps_useradd_recid"  value="<?= $user_userid; ?>" />
            <input type="hidden" name="apps_useradd_fullname" id="apps_useradd_fullname"  value="<?= $user_fullname; ?>" />
            <input type="hidden" name="apps_useradd_dept_id" id="apps_useradd_dept_id"  value="<?= $user_deptid; ?>" />
            
            <div class="modal-footer">
                <button type="button" id="btn-close-apps_useradd" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!--
                <button type="submit" class="btn btn-primary" onclick="btn_purposevisit_save()">Save</button>
                -->
                <button type="submit" id="btn_apps_useradd_save" class="btn btn-primary">
                    <i class="apps_useradd-loading-icon fa fa-paper-plane"></i>
                    <span class="apps_useradd-btn-text">Submit Record</span>
                </button>
            </div>

                <!--Progress bar -->
                <div class="container-fluid">
                    <div id="display_progressbar_apps_useradd" class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" id="progressbar_apps_useradd" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>
                <br>

            </div>
        </div>
        </div>
    </form>
    <!-- END FORMS || SETUP / ADD USER -->  

    <!-- =====MODAL SPACER============================================================== -->

    <!-- START FORMS || SETUP / EDIT USER-->  
    <form method="post" id="submit_application_useredit_data" name="submit_application_useradd_data">
        <div class="modal fade " id="modal_application_useredit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Setup / User / Edit</h5>
                <button type="button" id="btn-close-apps_useredit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">First name</label>
                            <input type="text" class="form-control" id="apps_useredit_fname" name="apps_useredit_fname" maxlength="50" placeholder="">
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Middle name</label>
                            <input type="text" class="form-control" id="apps_useredit_mname" name="apps_useredit_mname" maxlength="50" placeholder="">
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Last name</label>
                            <input type="text" class="form-control" id="apps_useredit_lname" name="apps_useredit_lname" maxlength="50" placeholder="">
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Suffix [JR,SR,II]</label>
                            <select id="apps_useredit_suffix" name="apps_useredit_suffix" class="custom-select mr-sm-2">
                                <option value=" "> </option>
                                <option value="JR">JR</option>
                                <option value="SR">SR</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                            </select>
                        </div> 
                    </div><!-- End form-row -->
                    
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            &nbsp;<label for="newUser">Employee Number</label>
                            <input type="text" class="form-control" id="apps_useredit_empnum" name="apps_useredit_empnum" maxlength="60" placeholder="">
                        </div>

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">School Email</label>
                            <input type="text" class="form-control" id="apps_useredit_email_add" name="apps_useredit_email_add" maxlength="60" placeholder="">
                            <small id="apps_useredit_email_add_error" class="input_error_color"></small>
                        </div>

                        <div class="form-group col-md-4">
                            &nbsp;<label for="newUser">Department</label>
                            <select id="apps_useredit_dept" name="apps_useredit_dept" class="custom-select mr-sm-2" onChange="myDept_Function(this);">
                                
                            </select>
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Role</label>
                            <select id="apps_useredit_user_role" name="apps_useredit_user_role" class="custom-select mr-sm-2" onChange="myRole_Function(this);">
                                
                            </select>
                        </div>
                    </div><!-- End form-row -->
                    
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            &nbsp;<label for="newUser">Account Status</label>
                            <select id="apps_useredit_account_status" name="apps_useredit_account_status" class="custom-select mr-sm-2">
                                <option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                            </select>
                        </div> 

                        <div class="form-group col-md-2">
                            &nbsp;<label for="newUser">Account Type</label>
                            <select id="apps_useredit_account_type" name="apps_useredit_account_type" class="custom-select mr-sm-2">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Username</label>
                            <input type="text" class="form-control" id="apps_useredit_username" name="apps_useredit_username" maxlength="50" placeholder="">
                            <small id="apps_useredit_username_error" class="input_error_color"></small>
                        </div> 

                        <div class="form-group col-md-2">
                            &nbsp;<label for="newUser">Password</label>
                            <input type="password" class="form-control" id="apps_useredit_password" name="apps_useredit_password" maxlength="50" placeholder="">
                            <small id="apps_useredit_password_error" class="input_error_color"></small>
                        </div> 

                        <div class="form-group col-md-2">
                            &nbsp;<label for="newUser">Password</label>
                            <input type="password" class="form-control" id="apps_useredit_password_verify" name="apps_useredit_password_verify" maxlength="50" placeholder="">
                            <small id="apps_useredit_password_verify_error" class="input_error_color"></small>
                        </div> 

                        
                    </div><!-- End form-row -->

                    <br>
                    <div class="form-row">
                        <div id="div_qrcode_display" class="form-group col-md-2">
                            <!--  remove muna para di makita ang QRcode 
                            &nbsp;<label for="newUser">QRcode</label>
                            <span id="qrcode_edit"></span>
                            -->
                        </div> 
                    </div><!-- End form-row -->
                    
            </div><!-- End modal-body -->

            <!-- Hidden Modal Variable -->
            <input type="hidden" name="useredit_user_recid" id="useredit_user_recid"  value="<?= $user_userid; ?>" />
            <input type="hidden" name="useredit_user_fullname" id="useredit_user_fullname"  value="<?= $user_fullname; ?>" />
            <input type="hidden" name="useredit_user_dept_id" id="useredit_user_dept_id"  value="<?= $user_deptid; ?>" />
            
            <input type="hidden" name="useredit_sel_recid_user" id="useredit_sel_recid_user" />

            <input type="hidden" name="useredit_db_fname" id="useredit_db_fname" />
            <input type="hidden" name="useredit_db_mname" id="useredit_db_mname" />
            <input type="hidden" name="useredit_db_lname" id="useredit_db_lname" />
            <input type="hidden" name="useredit_db_suffix" id="useredit_db_suffix" />
            <input type="hidden" name="useredit_db_empnum" id="useredit_db_empnum" />
            <input type="hidden" name="useredit_db_email_add" id="useredit_db_email_add" />
            <input type="hidden" name="useredit_db_dept" id="useredit_db_dept" />
            <input type="hidden" name="useredit_db_user_role" id="useredit_db_user_role" />
            <input type="hidden" name="useredit_db_account" id="useredit_db_account" />
            <input type="hidden" name="useredit_db_account_date" id="useredit_db_account_date" />
            <input type="hidden" name="useredit_db_account_type" id="useredit_db_account_type" />
            <input type="hidden" name="useredit_db_username" id="useredit_db_username" />

            <div class="modal-footer">
                <button type="button" id="btn-close-apps_useredit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!--
                <button type="submit" class="btn btn-primary" onclick="btn_purposevisit_save()">Save</button>
                -->
                <button type="submit" id="btn_apps_useredit_update" class="btn btn-primary">
                    <i class="apps_useredit-loading-icon fa fa-paper-plane"></i>
                    <span class="apps_useredit-btn-text">Update Record</span>
                </button>
            </div>

                <!--Progress bar -->
                <div class="container-fluid">
                    <div id="display_progressbar_apps_useredit" class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" id="progressbar_apps_useredit" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>
                <br>

            </div>
        </div>
        </div>
    </form>
    <!-- END FORMS || SETUP / EDIT USER-->  
    
    <!-- =====MODAL SPACER============================================================== -->

    <!-- START FORMS || SETUP / EDIT USER ACCESS--> 
    <form method="post" id="submit_application_useraccess_data" name="submit_application_useredit_useraccess_data">
        <div class="modal fade " id="modal_application_useraccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Scrollable modal -->
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Setup / User Access / Edit</h5>
                <button type="button" id="modal-btn-close-apps_useraccess" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">First name</label>
                            <input type="text" class="form-control" id="apps_useraccess_fname" name="apps_useraccess_fname" maxlength="50" placeholder="" disabled>
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Middle name</label>
                            <input type="text" class="form-control" id="apps_useraccess_mname" name="apps_useraccess_mname" maxlength="50" placeholder="" disabled>
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Last name</label>
                            <input type="text" class="form-control" id="apps_useraccess_lname" name="apps_useredit_lname" maxlength="50" placeholder="" disabled>
                        </div> 

                        <div class="form-group col-md-3">
                            &nbsp;<label for="newUser">Suffix</label>
                            <input type="text" class="form-control" id="apps_useraccess_suffix" name="apps_useredit_suffix" maxlength="50" placeholder="" disabled>
                        </div> 
                    </div><!-- End form-row -->

                    <div class="alert alert-dark"><h6 class="card-title">Menu</h6>
                        <!--Inline div - Start 1 -->
                        <div class="row g-3 align-items-center">
                            
                            <div class="card" style="width: 10rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Dashboard</h5>
                                    &nbsp;<label for="newUser">Allow</label>
                                    <select id="apps_useraccess_dashboard" name="apps_useraccess_dashboard" class="custom-select mr-sm-2">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card" style="width: 20rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Event Request</h5>
                                    &nbsp;<label for="newUser">Allow</label>
                                    <select id="apps_useraccess_eventRequest" name="apps_useraccess_eventRequest" class="custom-select mr-sm-2">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>

                                    <p>
                                    <!--Inline User Privilege - Start -->
                                        <div id="div_event_request_priv">
                                            <!--Start form checkbox inline -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="apps_useraccess_event_request_read" name="apps_useraccess_event_request_read" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Read</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="apps_useraccess_event_request_write" name="apps_useraccess_event_request_write" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">Write</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="apps_useraccess_event_request_modify" name="apps_useraccess_event_request_modify" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">Modify</label>
                                            </div>
                                            <!--End form checkbox inline -->
                                        </div>
                                    <!--Inline User Privilege - End -->
                                    </p>

                                </div>
                            </div>

                            <div class="card" style="width: 10rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Setup</h5>
                                    &nbsp;<label for="newUser">Allow</label>
                                    <select id="apps_useraccess_setup" name="apps_useraccess_setup" class="custom-select mr-sm-2">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>

                            
                        </div><!--Inline div - End 1 -->
                    </div><!--Alert - End 1 -->

                    <!--div_setup_submenu - Start -->
                    <div id="div_setup_submenu">
                        <div class="alert alert-secondary"><h6 class="card-title">Sub Menu</h6>
                            <!--Inline div Submenu of Setup | User - Start 2 -->
                            <div class="row g-3 align-items-center">
                                
                                <div id="div_setup_department" class="card" style="width: 20rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Setup / Department</h5>
                                        &nbsp;<label for="newUser">Allow</label>
                                        <select id="apps_useraccess_setup_department" name="apps_useraccess_setup_department" class="custom-select mr-sm-2">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>

                                        <p>
                                        <!--Inline User Privilege - Start -->
                                            <div id="div_dept_priv">
                                                <!--Start form checkbox inline -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="apps_useraccess_dept_read" name="apps_useraccess_dept_read" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Read</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="apps_useraccess_dept_write" name="apps_useraccess_dept_write" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Write</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="apps_useraccess_dept_modify" name="apps_useraccess_dept_modify" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Modify</label>
                                                </div>
                                                <!--End form checkbox inline -->
                                            </div>
                                        <!--Inline User Privilege - End -->
                                        </p>

                                    </div><!--End Card-body -->
                                </div><!--End Card -->

                                <div id="div_setup_role" class="card" style="width: 20rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Setup / Role</h5>
                                        &nbsp;<label for="newUser">Allow</label>
                                        <select id="apps_useraccess_setup_role" name="apps_useraccess_setup_role" class="custom-select mr-sm-2">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>

                                        <p>
                                        <!--Inline User Privilege - Start -->
                                            <div id="div_role_priv">
                                                <!--Start form checkbox inline -->
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="apps_useraccess_role_read" name="apps_useraccess_role_read" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Read</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="apps_useraccess_role_write" name="apps_useraccess_role_write" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Write</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="apps_useraccess_role_modify" name="apps_useraccess_role_modify" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Modify</label>
                                                </div>
                                                <!--End form checkbox inline -->
                                            </div>
                                        <!--Inline User Privilege - End -->
                                        </p>

                                    </div><!--End Card-body -->
                                </div><!--End Card -->

                            </div><!--Inline div Submenu of Setup | User - End 2 -->

                        </div><!--Alert - End 2 -->

                        <div class="alert alert-secondary"><h6 class="card-title">Sub Menu</h6>
                            <!--Inline div Submenu of Setup | User - Start 3 -->
                            <div class="row g-3 align-items-center">
                                
                                <div id="div_setup_user" class="card" style="width: 20rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Setup / User</h5>
                                        &nbsp;<label for="newUser">Allow</label>
                                        <select id="apps_useraccess_setup_user" name="apps_useraccess_setup_user" class="custom-select mr-sm-2">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                        <p>
                                        <!--Inline User Privilege - Start -->
                                        <div id="div_setup_user_priv">
                                            <!--Start form checkbox inline -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="apps_useraccess_setup_user_read" name="apps_useraccess_setup_user_read" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Read</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="apps_useraccess_setup_user_write" name="apps_useraccess_setup_user_write" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">Write</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="apps_useraccess_setup_user_modify" name="apps_useraccess_setup_user_modify" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">Modify</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="apps_useraccess_setup_user_suspend" name="apps_useraccess_setup_user_suspend" value="option3">
                                                <label class="form-check-label" for="inlineCheckbox3">Suspend</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="apps_useraccess_setup_useraccess" name="apps_useraccess_setup_useraccess" value="option3">
                                                <label class="form-check-label" for="inlineCheckbox3">User Access</label>
                                            </div>
                                            <!--End form checkbox inline -->
                                        </div>
                                        <!--Inline User Privilege - End -->
                                        </p>

                                    </div><!--End Card-body -->
                                </div><!--End Card -->

                            </div><!--Inline div Submenu of Setup | User - End 2 -->
                        </div><!--Alert - End 3 -->

                    </div><!--div_setup_submenu - End -->
                    
            </div><!-- End modal-body -->

            <!-- Hidden Modal Variable -->
            <input type="hidden" name="useraccess_user_recid" id="useraccess_user_recid"  value="<?= $user_userid; ?>" />
            <input type="hidden" name="useraccess_fullname" id="useraccess_fullname"  value="<?= $user_fullname; ?>" />
            <input type="hidden" name="useraccess_dept_id" id="useraccess_dept_id"  value="<?= $user_deptid; ?>" />

            <input type="hidden" name="useraccess_sel_recid_user" id="useraccess_sel_recid_user" /> <!-- recid of selected user -->
            
            <div class="modal-footer">
                <button type="button" id="btn-close-apps_useraccess" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!--
                <button type="submit" class="btn btn-primary" onclick="btn_purposevisit_save()">Save</button>
                -->
                <button type="submit" id="btn_apps_useraccess_update" class="btn btn-primary">
                    <i class="apps_useraccess-loading-icon fa fa-paper-plane"></i>
                    <span class="apps_useraccess-btn-text">Update Access</span>
                </button>
            </div>

                <!--Progress bar -->
                <div class="container-fluid">
                    <div id="display_progressbar_apps_useraccess" class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" id="progressbar_apps_useraccess" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>
                <br>

            </div>
        </div>
        </div>
    </form>
    <!-- END FORMS || SETUP / EDIT USER ACCESS--> 
    <!--  END OF USERS MODAL -->

    <!-- =====MODAL SPACER============================================================== -->

    <!-- START FORMS || SETUP / DEPARTMENT -->
        <!--  Add Department - Start -->
        <form method="post" id="submit_application_deptadd_data" name="submit_application_deptadd_data">
            <div class="modal fade " id="modal_application_deptadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Setup / Department / Add</h5>
                    <button type="button" id="modal-close-apps_deptadd" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                &nbsp;<label for="newUser">Department Code</label><font color="red"><i>*</i></font>
                                <input type="text" class="form-control" id="apps_deptadd_code" name="apps_deptadd_code" maxlength="50" placeholder="">
                                <small id="apps_deptadd_code_error" class="input_error_color"></small>
                            </div>

                            <div class="form-group col-md-8">
                                &nbsp;<label for="newUser">Description</label><font color="red"><i>*</i></font>
                                <input type="text" class="form-control" id="apps_deptadd_desc" name="apps_deptadd_desc" maxlength="150" placeholder="">
                                <small id="apps_deptadd_desc_error" class="input_error_color"></small>
                            </div>

                        </div><!-- End form-row -->
                        
                </div><!-- End modal-body -->

                <!-- Hidden Modal Variable -->
                <input type="hidden" name="apps_deptadd_user_fullname" id="apps_deptadd_user_fullname"  value="<?= $user_fullname; ?>" />
                
                
                <div class="modal-footer">
                    <button type="button" id="btn-close-apps_deptadd" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!--
                    <button type="submit" class="btn btn-primary" onclick="btn_purposevisit_save()">Save</button>
                    -->
                    <button type="submit" id="btn_apps_deptadd_save" class="btn btn-primary">
                        <i class="apps_deptadd-loading-icon fa fa-paper-plane"></i>
                        <span class="apps_deptadd-btn-text">Submit Record</span>
                    </button>
                </div>

                    <!--Progress bar -->
                    <div class="container-fluid">
                        <div id="display_progressbar_apps_deptadd" class="progress">
                            <div class="progress-bar progress-bar-striped bg-info" id="progressbar_apps_deptadd" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                    </div>
                    <br>

                </div>
            </div>
            </div>
        </form>
        <!--  Add Department - End -->

        <!-- Edit Department - Start -->
            <form method="post" id="submit_application_deptedit_data" name="submit_application_deptedit_data">
                <div class="modal fade " id="modal_application_deptedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Setup / Department / Edit</h5>
                        <button type="button" id="modal-btn-close-apps_deptedit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    &nbsp;<label for="newUser">Code</label>
                                    <input type="text" class="form-control" id="apps_deptedit_code" name="apps_deptedit_code" maxlength="50" placeholder="">
                                    <small id="apps_deptedit_code_error" class="input_error_color"></small>
                                </div> 

                                <div class="form-group col-md-3">
                                    &nbsp;<label for="newUser">Description</label>
                                    <input type="text" class="form-control" id="apps_deptedit_desc" name="apps_deptedit_desc" maxlength="150" placeholder="">
                                    <small id="apps_deptedit_desc_error" class="input_error_color"></small>
                                </div> 

                                <div class="form-group col-md-3">
                                    &nbsp;<label for="newUser">Status</label>
                                    <select id="apps_deptedit_status" name="apps_deptedit_status" class="custom-select mr-sm-2">
                                        <option value="Active">Active</option>
                                        <option value="Disable">Disable</option>
                                    </select>
                                    <small id="apps_deptedit_status_error" class="input_error_color"></small>
                                </div> 
                            </div><!-- End form-row -->
                                
                    </div><!-- End modal-body -->

                    <!-- Hidden Modal Variable -->
                    <input type="hidden" name="deptedit_user_recid" id="deptedit_user_recid"  value="<?= $user_userid; ?>" />
                    <input type="hidden" name="deptedit_user_fullname" id="deptedit_user_fullname"  value="<?= $user_fullname; ?>" />
                    <input type="hidden" name="deptedit_user_dept_id" id="deptedit_user_dept_id"  value="<?= $user_deptid; ?>" />
                    
                    <input type="hidden" name="deptedit_db_recid" id="deptedit_db_recid" />
                    <input type="hidden" name="deptedit_db_code" id="deptedit_db_code" />
                    <input type="hidden" name="deptedit_db_desc" id="deptedit_db_desc" />
                    <input type="hidden" name="deptedit_db_status" id="deptedit_db_status" />

                    <div class="modal-footer">
                        <button type="button" id="btn-close-apps_deptedit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!--
                        <button type="submit" class="btn btn-primary" onclick="btn_purposevisit_save()">Save</button>
                        -->
                        <button type="submit" id="btn_apps_deptedit_update" class="btn btn-primary">
                            <i class="apps_deptedit-loading-icon fa fa-paper-plane"></i>
                            <span class="apps_deptedit-btn-text">Update Record</span>
                        </button>
                    </div>

                        <!--Progress bar -->
                        <div class="container-fluid">
                            <div id="display_progressbar_apps_deptedit" class="progress">
                                <div class="progress-bar progress-bar-striped bg-info" id="progressbar_apps_deptedit" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        </div>
                        <br>

                    </div>
                </div>
                </div>
            </form>
        <!-- Edit Department - End -->

    <!-- END FORMS || SETUP / DEPARTMENT -->

    <!-- =====MODAL SPACER============================================================== -->

    <!-- START FORMS || SETUP / ROLE -->

        <!--  Add Role - Start -->
            <form method="post" id="submit_application_roldadd_data" name="submit_application_roldadd_data">
                <div class="modal fade " id="modal_application_roldadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Setup / Role / Add</h5>
                        <button type="button" id="modal-close-apps_roldadd" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                            
                            <div class="form-row"><!-- Start form-row -->
                                <div class="form-group col-md-8">
                                    &nbsp;<label for="newUser">Role</label><font color="red"><i>*</i></font>
                                    <input type="text" class="form-control" id="apps_roldadd_role" name="apps_roldadd_role" maxlength="50" placeholder="">
                                    <small id="apps_roldadd_role_error" class="input_error_color"></small>
                                </div>

                                <div class="form-group col-md-8">
                                    &nbsp;<label for="newUser">Event Request Signatory as</label>
                                    <select id="apps_roldadd_role_signatory" name="apps_roldadd_role_signatory" class="custom-select mr-sm-2">
                                        <option selected>-</option>
                                        <option value="Event Request">Event Request</option>
                                        <option value="PCSA">PCSA</option>
                                        <option value="Course Adviser">Course Adviser</option>
                                        <option value="Course Coordinator">Course Coordinator</option>
                                        <option value="PSMO">PSMO</option>
                                        <option value="Academic Coordinator">Academic Coordinator</option>
                                        <option value="OSA Coordinator">OSA Coordinator</option>
                                        <option value="Campus Manager">Campus Manager</option>
                                        <option value="Director for Academic">Director for Academic</option>
                                        <option value="Director for Administration">Director for Administration</option>
                                        <option value="President">President</option>
                                    </select>
                                    <small id="apps_roldadd_role_signatory_error" class="input_error_color"></small>
                                </div> 

                            </div><!-- End form-row -->
                            
                    </div><!-- End modal-body -->

                    <!-- Hidden Modal Variable -->
                    <input type="hidden" name="apps_roldadd_user_fullname" id="apps_roldadd_user_fullname"  value="<?= $user_fullname; ?>" />
                    
                    
                    <div class="modal-footer">
                        <button type="button" id="btn-close-apps_roldadd" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!--
                        <button type="submit" class="btn btn-primary" onclick="btn_purposevisit_save()">Save</button>
                        -->
                        <button type="submit" id="btn_apps_roldadd_save" class="btn btn-primary">
                            <i class="apps_roldadd-loading-icon fa fa-paper-plane"></i>
                            <span class="apps_roldadd-btn-text">Submit Record</span>
                        </button>
                    </div>

                        <!--Progress bar -->
                        <div class="container-fluid">
                            <div id="display_progressbar_apps_roldadd" class="progress">
                                <div class="progress-bar progress-bar-striped bg-info" id="progressbar_apps_roldadd" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        </div>
                        <br>

                    </div>
                </div>
                </div>
            </form>
        <!--  Add Role - End -->

        <!--  Edit Role - Start -->
            <form method="post" id="submit_application_roleedit_data" name="submit_application_roleedit_data">
                <div class="modal fade " id="modal_application_roleedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Setup / Role / Edit</h5>
                        <button type="button" id="modal-btn-close-apps_roleedit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                            <div class="form-row"> <!-- Start form-row -->
                                <div class="form-group col-md-8">
                                    &nbsp;<label for="newUser">Role</label>
                                    <input type="text" class="form-control" id="apps_roleedit_role" name="apps_roleedit_role" maxlength="50" placeholder="">
                                    <small id="apps_roleedit_role_error" class="input_error_color"></small>
                                </div> 

                                <div class="form-group col-md-8">
                                    &nbsp;<label for="newUser">Event Request Signatory as</label>
                                    <select id="apps_roleedit_role_signatory" name="apps_roleedit_role_signatory" class="custom-select mr-sm-2">
                                        <option selected>-</option>
                                        <option value="Event Request">Event Request</option>
                                        <option value="PCSA">PCSA</option>
                                        <option value="Course Adviser">Course Adviser</option>
                                        <option value="Course Coordinator">Course Coordinator</option>
                                        <option value="PSMO">PSMO</option>
                                        <option value="Academic Coordinator">Academic Coordinator</option>
                                        <option value="OSA Coordinator">OSA Coordinator</option>
                                        <option value="Campus Manager">Campus Manager</option>
                                        <option value="Director for Academic">Director for Academic</option>
                                        <option value="Director for Administration">Director for Administration</option>
                                        <option value="President">President</option>
                                    </select>
                                    <small id="apps_roleedit_role_signatory_error" class="input_error_color"></small>
                                </div> 
                            </div><!-- End form-row -->
                            
                                
                    </div><!-- End modal-body -->

                    <!-- Hidden Modal Variable -->
                    <input type="hidden" name="roleedit_user_recid" id="roleedit_user_recid"  value="<?= $user_userid; ?>" />
                    <input type="hidden" name="roleedit_user_fullname" id="roleedit_user_fullname"  value="<?= $user_fullname; ?>" />
                    <input type="hidden" name="roleedit_user_dept_id" id="roleedit_user_dept_id"  value="<?= $user_deptid; ?>" />
                    
                    <input type="hidden" name="roleedit_db_recid" id="roleedit_db_recid" />
                    <input type="hidden" name="roleedit_db_role" id="roleedit_db_role" />
                    <input type="hidden" name="roleedit_db_role_sign" id="roleedit_db_role_sign" />

                    <div class="modal-footer">
                        <button type="button" id="btn-close-apps_roleedit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!--
                        <button type="submit" class="btn btn-primary" onclick="btn_purposevisit_save()">Save</button>
                        -->
                        <button type="submit" id="btn_apps_roleedit_update" class="btn btn-primary">
                            <i class="apps_roleedit-loading-icon fa fa-paper-plane"></i>
                            <span class="apps_roleedit-btn-text">Update Record</span>
                        </button>
                    </div>

                        <!--Progress bar -->
                        <div class="container-fluid">
                            <div id="display_progressbar_apps_roleedit" class="progress">
                                <div class="progress-bar progress-bar-striped bg-info" id="progressbar_apps_roleedit" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        </div>
                        <br>

                    </div>
                </div>
                </div>
            </form>
        <!--  Edit Role - End -->

    <!-- END FORMS || SETUP / ROLE -->

    <!-- =====MODAL SPACER============================================================== -->
    

<!-- END OF MODAL FORM -->

<!--Javascript------------------------------------------------------------------------------------------------------->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
    //alert("App Main");

    //button disable | 
    document.getElementById("btn_apps_useradd_save").disabled = true;
    document.getElementById("btn_apps_useredit_update").disabled = true;
    //document.getElementById("btn_apps_useraccess_update").disabled = true;

    document.getElementById("btn_apps_deptadd_save").disabled = true;
    document.getElementById("btn_apps_deptedit_update").disabled = true;

    document.getElementById("btn_apps_roldadd_save").disabled = true; 
    document.getElementById("btn_apps_roleedit_update").disabled = true;

    //Progress bar | 
    $("#display_progressbar_apps_useradd").hide();
    $("#display_progressbar_apps_useredit").hide();
    $("#display_progressbar_apps_useraccess").hide(); 

    $("#display_progressbar_apps_deptadd").hide(); 
    $("#display_progressbar_apps_deptedit").hide();

    $("#display_progressbar_apps_roldadd").hide();
    $("#display_progressbar_apps_roleedit").hide();

    //Prevent back button
    function disableBack() { window.history.forward(); }
    setTimeout("disableBack()", 0);
    window.onunload = function () { null };
    window.beforeunload = function () { null };
    //------------------------------------------------------------

	$(document).ready(function(){ 

        
    });//end of document ready function
    //========================================================

    //----------------------------------------------------------

    //Submitting Form Data | USER ADD - Start
        $('#submit_application_useradd_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_apps_useradd").show();
            var base_path = base_url + "/Users/submit_application_useradd_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_apps_useradd').html(percentComplete + '%');
                    $('#progressbar_apps_useradd').width(percentComplete + '%');
                    }
                },false);
                return xhr;
            },

            url: base_path,
            method:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            //async:false,
            dataType: 'json',
                beforeSend: function() {
                    document.body.style.cursor = 'wait';
                    document.getElementById("btn_apps_useradd_save").disabled = true;
                    $(".apps_useradd-loading-icon").removeClass('fa fa-paper-plane');
                    $(".apps_useradd-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".apps_useradd-btn-text").text("Adding Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_apps_useradd_save").disabled = false;
                            $(".apps_useradd-loading-icon").removeClass('spinner-border text-warning');
                            $(".apps_useradd-loading-icon").addClass('fa fa-paper-plane');
                            $(".apps_useradd-btn-text").text("Submit Record");

                            //alert("save");
                            if(data.status) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!'
                                }).then((result) => {
                                    if (result.isConfirmed) {          
                                        //ito ang gagamitin pag gusto lang bumalik sa main content
                                        //$("#enlistment-1stsem-registrar_maincontent").load(base_url+"/Enlistment/backToList_registrar_1stsem");

                                        //reset progress bar
                                        $('#progressbar_apps_useradd').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_apps_useradd").hide();

                                            //Update DataTable
                                            $('#table_setup_users_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_apps_useradd_save").disabled = true;

                                            //Reset Form Value
                                            $("#apps_useradd_fname").val("");
                                            $("#apps_useradd_mname").val("");
                                            $("#apps_useradd_lname").val("");
                                            $("#apps_useradd_empnum").val("");
                                            $("#apps_useradd_email").val("");
                                            $("#apps_useradd_uname").val("");
                                            $("#apps_useradd_pword").val("");
                                            $("#apps_useradd_pword_verify").val("");

                                            $("#apps_useradd_suffix").val("Choose...");
                                            $("#apps_useradd_dept").val("Choose...");
                                            $("#apps_useradd_role").val("Choose...");
                                            $("#apps_useradd_accounttype").val("Choose...");

                                            //$('#modal_application_user_add').modal('hide');  

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_apps_useradd').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_apps_useradd").hide();

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error
                            }//end of data.status

                        }//end ajax success
                    }); //End of Ajax

        }); //end of submit
    //Submitting Form Data | USER ADD - End

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //Submitting Form Data | USER EDIT - Start
        $('#submit_application_useredit_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_apps_useredit").show();
            var base_path = base_url + "/Users/submit_application_useredit_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_apps_useredit').html(percentComplete + '%');
                    $('#progressbar_apps_useredit').width(percentComplete + '%');
                    }
                },false);
                return xhr;
            },

            url: base_path,
            method:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            //async:false,
            dataType: 'json',
                beforeSend: function() {
                    document.body.style.cursor = 'wait';
                    document.getElementById("btn_apps_useredit_update").disabled = true;
                    $(".apps_useredit-loading-icon").removeClass('fa fa-paper-plane');
                    $(".apps_useredit-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".apps_useredit-btn-text").text("Updating Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_apps_useredit_update").disabled = false;
                            $(".apps_useredit-loading-icon").removeClass('spinner-border text-warning');
                            $(".apps_useredit-loading-icon").addClass('fa fa-paper-plane');
                            $(".apps_useredit-btn-text").text("Update Record");

                            //alert(data.qrcode);
                            if(data.status) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!'
                                }).then((result) => {
                                    if (result.isConfirmed) {          
                                        //ito ang gagamitin pag gusto lang bumalik sa main content
                                        //$("#enlistment-1stsem-registrar_maincontent").load(base_url+"/Enlistment/backToList_registrar_1stsem");

                                        //reset progress bar
                                        $('#progressbar_apps_useredit').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_apps_useredit").hide();

                                            //Update DataTable
                                            $('#table_setup_users_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_apps_useredit_update").disabled = true;

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_apps_useredit').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_apps_useredit").hide();

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error
                            }//end of data.status

                        }//end ajax success
                    }); //End of Ajax

        }); //end of submit
    //Submitting Form Data | USER EDIT - End

    //====================================================================================================
    //SPACER=>
    //====================================================================================================

    //Submitting Form Data | USER ACCESS EDIT - Start
    $('#submit_application_useraccess_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_apps_useraccess").show();
            var base_path = base_url + "/Users/submit_application_useraccess_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_apps_useraccess').html(percentComplete + '%');
                    $('#progressbar_apps_useraccess').width(percentComplete + '%');
                    }
                },false);
                return xhr;
            },

            url: base_path,
            method:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            //async:false,
            dataType: 'json',
                beforeSend: function() {
                    document.body.style.cursor = 'wait';
                    document.getElementById("btn_apps_useraccess_update").disabled = true;
                    $(".apps_useraccess-loading-icon").removeClass('fa fa-paper-plane');
                    $(".apps_useraccess-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".apps_useraccess-btn-text").text("Updating User Access...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_apps_useraccess_update").disabled = false;
                            $(".apps_useraccess-loading-icon").removeClass('spinner-border text-warning');
                            $(".apps_useraccess-loading-icon").addClass('fa fa-paper-plane');
                            $(".apps_useraccess-btn-text").text("Update Access");

                            //alert(data.qrcode);
                            if(data.status) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!'
                                }).then((result) => {
                                    if (result.isConfirmed) {          
                                        //ito ang gagamitin pag gusto lang bumalik sa main content
                                        //$("#enlistment-1stsem-registrar_maincontent").load(base_url+"/Enlistment/backToList_registrar_1stsem");

                                        //reset progress bar
                                        $('#progressbar_apps_useraccess').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_apps_useraccess").hide();

                                            //Update DataTable
                                            //$('#table_setup_users_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            //document.getElementById("btn_apps_useraccess_update").disabled = true;

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_apps_useraccess').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_apps_useraccess").hide();

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error
                            }//end of data.status

                        }//end ajax success
                    }); //End of Ajax

        }); //end of submit
    //Submitting Form Data | USER ACCESS EDIT - End
    
    //====================================================================================================
    //SPACER=> 
    //====================================================================================================
    
    //Submitting Form Data | DEPARTMENT ADD - Start
    $('#submit_application_deptadd_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_apps_deptadd").show();
            var base_path = base_url + "/Users/submit_application_deptadd_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_apps_deptadd').html(percentComplete + '%');
                    $('#progressbar_apps_deptadd').width(percentComplete + '%');
                    }
                },false);
                return xhr;
            },

            url: base_path,
            method:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            //async:false,
            dataType: 'json',
                beforeSend: function() {
                    document.body.style.cursor = 'wait';
                    document.getElementById("btn_apps_deptadd_save").disabled = true;
                    $(".apps_deptadd-loading-icon").removeClass('fa fa-paper-plane');
                    $(".apps_deptadd-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".apps_deptadd-btn-text").text("Adding Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_apps_deptadd_save").disabled = false;
                            $(".apps_deptadd-loading-icon").removeClass('spinner-border text-warning');
                            $(".apps_deptadd-loading-icon").addClass('fa fa-paper-plane');
                            $(".apps_deptadd-btn-text").text("Submit Record");

                            //alert("save");
                            if(data.status) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!'
                                }).then((result) => {
                                    if (result.isConfirmed) {          
                                        //ito ang gagamitin pag gusto lang bumalik sa main content
                                        //$("#enlistment-1stsem-registrar_maincontent").load(base_url+"/Enlistment/backToList_registrar_1stsem");

                                        //reset progress bar
                                        $('#progressbar_apps_deptadd').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_apps_deptadd").hide();

                                            //Update DataTable
                                            $('#table_setup_department_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_apps_deptadd_save").disabled = true;

                                            //Reset Form Value
                                            $("#apps_deptadd_code").val("");
                                            $("#apps_deptadd_desc").val("");
                                           
                                            //$('#modal_application_user_add').modal('hide');  

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_apps_deptadd').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_apps_deptadd").hide();

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error
                            }//end of data.status

                        }//end ajax success
                    }); //End of Ajax

        }); //end of submit
    //Submitting Form Data | DEPARTMENT ADD - End

    //====================================================================================================
    //SPACER=> 
    //====================================================================================================

    //Submitting Form Data | DEPARTMENT EDIT - Start
    $('#submit_application_deptedit_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_apps_deptedit").show();
            var base_path = base_url + "/Users/submit_application_deptedit_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_apps_deptedit').html(percentComplete + '%');
                    $('#progressbar_apps_deptedit').width(percentComplete + '%');
                    }
                },false);
                return xhr;
            },

            url: base_path,
            method:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            //async:false,
            dataType: 'json',
                beforeSend: function() {
                    document.body.style.cursor = 'wait';
                    document.getElementById("btn_apps_deptedit_update").disabled = true;
                    $(".apps_deptedit-loading-icon").removeClass('fa fa-paper-plane');
                    $(".apps_deptedit-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".apps_deptedit-btn-text").text("Updating Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_apps_deptedit_update").disabled = false;
                            $(".apps_deptedit-loading-icon").removeClass('spinner-border text-warning');
                            $(".apps_deptedit-loading-icon").addClass('fa fa-paper-plane');
                            $(".apps_deptedit-btn-text").text("Update Record");

                            //alert(data.qrcode);
                            if(data.status) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!'
                                }).then((result) => {
                                    if (result.isConfirmed) {          
                                        //ito ang gagamitin pag gusto lang bumalik sa main content
                                        //$("#enlistment-1stsem-registrar_maincontent").load(base_url+"/Enlistment/backToList_registrar_1stsem");

                                        //reset progress bar
                                        $('#progressbar_apps_deptedit').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_apps_deptedit").hide();

                                            //Update DataTable
                                            $('#table_setup_department_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_apps_deptedit_update").disabled = true;

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_apps_deptedit').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_apps_deptedit").hide();

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error
                            }//end of data.status

                        }//end ajax success
                    }); //End of Ajax

        }); //end of submit
    //Submitting Form Data |  DEPARTMENT EDIT - End

    //====================================================================================================
    //SPACER=> 
    //====================================================================================================

    //Submitting Form Data | ROLE ADD - Start
    $('#submit_application_roldadd_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_apps_roldadd").show();
            var base_path = base_url + "/Users/submit_application_roldadd_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_apps_roldadd').html(percentComplete + '%');
                    $('#progressbar_apps_roldadd').width(percentComplete + '%');
                    }
                },false);
                return xhr;
            },

            url: base_path,
            method:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            //async:false,
            dataType: 'json',
                beforeSend: function() {
                    document.body.style.cursor = 'wait';
                    document.getElementById("btn_apps_roldadd_save").disabled = true;
                    $(".apps_roldadd-loading-icon").removeClass('fa fa-paper-plane');
                    $(".apps_roldadd-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".apps_roldadd-btn-text").text("Adding Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_apps_roldadd_save").disabled = false;
                            $(".apps_roldadd-loading-icon").removeClass('spinner-border text-warning');
                            $(".apps_roldadd-loading-icon").addClass('fa fa-paper-plane');
                            $(".apps_roldadd-btn-text").text("Submit Record");

                            //alert("save");
                            if(data.status) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!'
                                }).then((result) => {
                                    if (result.isConfirmed) {          
                                        //ito ang gagamitin pag gusto lang bumalik sa main content
                                        //$("#enlistment-1stsem-registrar_maincontent").load(base_url+"/Enlistment/backToList_registrar_1stsem");

                                        //reset progress bar
                                        $('#progressbar_apps_roldadd').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_apps_roldadd").hide();

                                            //Update DataTable
                                            $('#table_setup_role_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_apps_roldadd_save").disabled = true;

                                            //Reset Form Value
                                            $("#apps_roldadd_role").val("");
                                           
                                            //$('#modal_application_user_add').modal('hide');  

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_apps_roldadd').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_apps_roldadd").hide();

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error
                            }//end of data.status

                        }//end ajax success
                    }); //End of Ajax

        }); //end of submit
    //Submitting Form Data | ROLE ADD - End

    //====================================================================================================
    //SPACER=> 
    //====================================================================================================

    //Submitting Form Data | ROLE EDIT - Start
        $('#submit_application_roleedit_data').submit(function(e){
            e.preventDefault(); 

            $("#display_progressbar_apps_roleedit").show();
            var base_path = base_url + "/Users/submit_application_roleedit_data";
            $.ajax({
            //progress bar while uploading images
            xhr:function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt) {
                if(evt.lengthComputable) {
                    var percentComplete = evt.loaded/evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('#progressbar_apps_roleedit').html(percentComplete + '%');
                    $('#progressbar_apps_roleedit').width(percentComplete + '%');
                    }
                },false);
                return xhr;
            },

            url: base_path,
            method:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            //async:false,
            dataType: 'json',
                beforeSend: function() {
                    document.body.style.cursor = 'wait';
                    document.getElementById("btn_apps_roleedit_update").disabled = true;
                    $(".apps_roleedit-loading-icon").removeClass('fa fa-paper-plane');
                    $(".apps_roleedit-loading-icon").addClass('spinner-border text-warning spinner-border-sm');
                    $(".apps_roleedit-btn-text").text("Updating Records...");
                },
                success: function(data) {
                            document.body.style.cursor = 'default';
                            document.getElementById("btn_apps_roleedit_update").disabled = false;
                            $(".apps_roleedit-loading-icon").removeClass('spinner-border text-warning');
                            $(".apps_roleedit-loading-icon").addClass('fa fa-paper-plane');
                            $(".apps_roleedit-btn-text").text("Update Record");

                            //alert(data.qrcode);
                            if(data.status) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!'
                                }).then((result) => {
                                    if (result.isConfirmed) {          
                                        //ito ang gagamitin pag gusto lang bumalik sa main content
                                        //$("#enlistment-1stsem-registrar_maincontent").load(base_url+"/Enlistment/backToList_registrar_1stsem");

                                        //reset progress bar
                                        $('#progressbar_apps_roleedit').css('width', '0%').attr('aria-valuenow', 0);
                                        
                                        setTimeout(function(){
                                            $("#display_progressbar_apps_roleedit").hide();

                                            //Update DataTable
                                            $('#table_setup_role_list').DataTable().ajax.reload(null, false); //dataTable Reload - (null,false) - stay on page after updating record

                                            //Disable Button
                                            document.getElementById("btn_apps_roleedit_update").disabled = true;

                                        }, 1000);
                                    }
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                }) //end swal      

                                
                            } else {
                                //reset progress bar
                                $('#progressbar_apps_roleedit').css('width', '0%').attr('aria-valuenow', 0);
                                $("#display_progressbar_apps_roleedit").hide();

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: ''+ data.return_msg + '',
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> OK',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    //footer: '<a href="">Why do I have this issue?</a>'
                                })//end swall.fire Error
                            }//end of data.status

                        }//end ajax success
                    }); //End of Ajax

        }); //end of submit
    //Submitting Form Data |  ROLE EDIT - End


    //====================================================================================================
    //SPACER=> 
    //====================================================================================================

</script>
