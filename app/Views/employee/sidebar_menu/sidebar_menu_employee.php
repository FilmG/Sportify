<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php
             if($sidebar_dashboard == "Yes" || $user_username == "sadmin") { //check if user has access to setup menu
        ?>
            <li class="nav-item"> <!-- Start Dashboard Nav -->
                <a class="nav-link collapsed" href="#" id="dashboard_employee">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
        <?php
             }
        ?>
        <!-- -->
        
        <?php
             if($sidebar_eventRequest == "Yes" || $user_username == "sadmin") { //check if user has access to setup menu
        ?>
            <li class="nav-item"> <!-- Start Appointment LIst Nav -->
                <a class="nav-link collapsed" href="#" id="event_request_employee">
                    <i class="bi bi-vinyl"></i>
                    <span>Event Request</span>
                </a>
            </li><!-- End Event Request Nav -->
        <?php
             }
        ?>
        <!-- -->

        <!-- Start of Link with Dropdown Nav -->
            <!--Event Approval Menu -->
            <?php
            if($sidebar_event_approval == "Yes" || $user_username == "admin" || $user_username == "sadmin") { //check if user has access to setup menu
            ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#event_approval-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-vinyl"></i><span>Event Approval</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="event_approval-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <?php
                    if($course_adviser_submenu_access == "Yes" || $user_username == "admin" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="event_approval_course_adviser">
                            <i class="bi bi-circle"></i><span>Course Adviser</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($course_coordinator_submenu_access == "Yes" || $user_username == "admin" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="event_approval_course_coordinator">
                            <i class="bi bi-circle"></i><span>Course Coordinator</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($psmo_submenu_access == "Yes" || $user_username == "admin" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="event_approval_psmo">
                            <i class="bi bi-circle"></i><span>PSMO</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($academic_coordinator_submenu_access == "Yes" || $user_username == "admin" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="event_approval_academic_coordinator">
                            <i class="bi bi-circle"></i><span>Academic Coordinator</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($osa_coordinator_submenu_access == "Yes" || $user_username == "admin" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="event_approval_osa_coordinator">
                            <i class="bi bi-circle"></i><span>OSA Coordinator</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($campus_manager_submenu_access == "Yes" || $user_username == "admin" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="event_approval_campus_manager">
                            <i class="bi bi-circle"></i><span>Campus Manager</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($dir_academic_submenu_access == "Yes" || $user_username == "admin" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="event_approval_dir_academic">
                            <i class="bi bi-circle"></i><span>Director for Academic</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($dir_administration_submenu_access == "Yes" || $user_username == "admin" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="event_approval_dir_administration">
                            <i class="bi bi-circle"></i><span>Director for Administration</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($president_submenu_access == "Yes" || $user_username == "admin" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="event_approval_president">
                            <i class="bi bi-circle"></i><span>President</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                </ul>
            </li><!-- End Event Approval Menu Nav -->
            <?php
            } //end of check if user has access to Event Approval menu
            ?>
            <!--Event Approval Menu -->
        <!-- End of Link with Dropdown Nav -->

        <!-- -->

        <!-- Start of Link with Dropdown Nav -->
            <!--Setup Menu -->
            <?php
            if($sidebar_setup == "Yes" || $user_username == "sadmin") { //check if user has access to setup menu
            ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#setup-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear"></i><span>Setup</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="setup-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <?php
                    if($setup_user_submenu_access == "Yes" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="setup_nature_activity">
                            <i class="bi bi-circle"></i><span>Nature Of Activity</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($setup_user_submenu_access == "Yes" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="setup_department">
                            <i class="bi bi-circle"></i><span>Department</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($setup_user_submenu_access == "Yes" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="setup_role">
                            <i class="bi bi-circle"></i><span>Role</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                    if($setup_user_submenu_access == "Yes" || $user_username == "sadmin") { 
                    ?>
                    <li>
                        <a href="#" id="setup_user">
                            <i class="bi bi-circle"></i><span>Users</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </li><!-- End Setup Menu Nav -->
            <?php
            } //end of check if user has access to setup menu
            ?>
            <!--Setup Menu -->
        <!-- End of Link with Dropdown Nav -->

        <!-- Start of single Link Nav -->
            <li class="nav-heading">Pages</li>

             <!--Profile Menu -->
            <?php
                if($sidebar_profile == "Yes" || $user_username == "sadmin") { //check if user has access to setup menu
            ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" id="users_profile" >
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li><!-- End Profile Page Nav -->
            <?php
            } //end of Profile Menu
            ?>
            <!-- End Profile Page Nav -->
        <!-- End of single Link Nav -->

    </ul> <!-- End of UL sidebar Menu -->

</aside><!-- End Sidebar-->

    