<?php
namespace App\Controllers;

use \CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use \App\Models\Users_model;

//Import package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Sidebar_menu extends Controller 
{
	public function __construct(){
		helper(['form','url','date']);
    }

    //START OF GLOBAL
        function check_session_employee() {
            //check if session is empty
            $app_sessionData = session();
            if(!empty($app_sessionData->get('Logged_SEMS_Employee'))) {
                $ses = true; 
            } else {
                $ses = false; 
            }	

            $result_ajax = array(
                "session_status" => $ses
            );
            echo json_encode($result_ajax);
        }//end of function
    //END OF GLOBAL


//SPACER------------------
//=====================================================================================================
    //Use to Display FORMS

    //DASHBOARD MENU
    function dashboard_main() {
        return view('employee/dashboard/home_content_employee');
    }//end of function

    //EVENT REQUEST MENU - START
        function event_request() {
            return view('employee/event_request/event_request_display');
        }//end of function

        function event_request_form() {
            return view('employee/event_request/event_request_form');
        }//end of function
    //EVENT REQUEST MENU - END

    //EVENT APPROVAL MENU - START
        function event_approval_course_adviser() {
            return view('employee/event_approval/event_approval_course_adviser_list');
        }//end of function

        function event_approval_course_coordinator() {
            return view('employee/event_approval/event_approval_course_coordinator_list');
        }//end of function

        function event_approval_psmo() {
            return view('employee/event_approval/event_approval_psmo_list');
        }//end of function

        function event_approval_academic_coordinator() {
            return view('employee/event_approval/event_approval_academic_coordinator_list');
        }//end of function

        function event_approval_osa_coordinator() {
            return view('employee/event_approval/event_approval_osa_coordinator_list');
        }//end of function

        function event_approval_campus_manager() {
            return view('employee/event_approval/event_approval_campus_manager_list');
        }//end of function

        function event_approval_dir_academic() {
            return view('employee/event_approval/event_approval_dir_academic_list');
        }//end of function

        function event_approval_dir_administration() {
            return view('employee/event_approval/event_approval_dir_administration_list');
        }//end of function

        function event_approval_president() {
            return view('employee/event_approval/event_approval_president_list');
        }//end of function
    //EVENT APPROVAL MENU - END

    //EVENT APPROVED - START
        function event_approved_ca() {
            return view('employee/event_approved/event_approved_course_adviser_list');
        }//end of function

        function event_approved_cc() {
            return view('employee/event_approved/event_approved_course_coordinator_list');
        }//end of function

        function event_approved_psmo() {
            return view('employee/event_approved/event_approved_psmo_list');
        }//end of function

        function event_approved_ac() {
            return view('employee/event_approved/event_approved_academic_coordinator_list');
        }//end of function

        function event_approved_osa() {
            return view('employee/event_approved/event_approved_osa_coordinator_list');
        }//end of funciton

        function event_approved_cm() {
            return view('employee/event_approved/event_approved_campus_manager_list');
        }//end of function

        function event_approved_acad() { 
            return view('employee/event_approved/event_approved_dir_academic_list');
        }//end of function

        function event_approved_admin() {
            return view('employee/event_approved/event_approved_dir_administration_list');
        }//end of function

        function event_approved_pres() {
            return view('employee/event_approved/event_approved_president_list');
        }//end of function

    //EVENT APPROVED - END

    //EVENT REJECTED -START
        function event_rejected_ca() {
            return view('employee/event_rejected/event_rejected_course_adviser_list');
        }//end of function

        function event_rejected_cc() {
            return view('employee/event_rejected/event_rejected_course_coordinator_list');
        }//end of function

        function event_rejected_psmo() {
            return view('employee/event_rejected/event_rejected_psmo_list');
        }//end of function

        function event_rejected_ac() {
            return view('employee/event_rejected/event_rejected_academic_coordinator_list');
        }//end of function

        function event_rejected_osa() {
            return view('employee/event_rejected/event_rejected_osa_coordinator_list');
        }//end of funciton

        function event_rejected_cm() {
            return view('employee/event_rejected/event_rejected_campus_manager_list');
        }//end of function

        function event_rejected_acad() { 
            return view('employee/event_rejected/event_rejected_dir_academic_list');
        }//end of function

        function event_rejected_admin() {
            return view('employee/event_rejected/event_rejected_dir_administration_list');
        }//end of funciton

        function event_rejected_pres() {
            return view('employee/event_rejected/event_rejected_president_list');
        }//end of function

    //EVENT REJECTED -END

    //SPORTS ACTIVITY - START
        function sports_activity_display() {
            if ($this->request->isAJAX()) {
                $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING);
                $recid_event_request = service('request')->getPost('recid_event_request',FILTER_SANITIZE_STRING);
                $event_title = service('request')->getPost('event_title',FILTER_SANITIZE_STRING);
                
            }//end isAJAX

            $data = [
                'apps_username' => $apps_username,
                'recid_event_request' => $recid_event_request,
                'event_title' => $event_title
            ];

            return view('employee/sports_activity/sports_activity_display',$data);
        }//end of function

        function sports_activity_addsports() {
            if ($this->request->isAJAX()) {
                $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING); 

                $recid_event_request = service('request')->getPost('recid_event_request',FILTER_SANITIZE_STRING); 

            }//end isAJAX

            $data = [
                'apps_username' => $apps_username,
                'recid_event_request' => $recid_event_request
            ];

            return view('employee/sports_activity/sports_activity_addsports',$data);

        }//end of function

        function view_details_sports_activity() {
            if ($this->request->isAJAX()) {
                $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING); 

                $recid_event_request = service('request')->getPost('recid_event_request',FILTER_SANITIZE_STRING);
                $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING);
                $sports_title = service('request')->getPost('sports_title',FILTER_SANITIZE_STRING);
                $group_no = service('request')->getPost('group_no',FILTER_SANITIZE_STRING);
                $group_unit = service('request')->getPost('group_unit',FILTER_SANITIZE_STRING);
                $event_title = service('request')->getPost('event_title',FILTER_SANITIZE_STRING);

                $sports_type = service('request')->getPost('sports_type',FILTER_SANITIZE_STRING);
            }//end isAJAX

            $data = [
                'apps_username' => $apps_username,
                'recid_event_request' => $recid_event_request,
                'recid_sports_activity' => $recid_sports_activity,
                'sports_title' => $sports_title,
                'group_no' => $group_no,
                'group_unit' => $group_unit,
                'event_title' => $event_title,
                'sports_type' => $sports_type
            ];

            return view('employee/sports_activity_details/details_sports_activity_display',$data);
        }//end of function

        function details_sports_activity_addteam() {
            if ($this->request->isAJAX()) {
                $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING); 
                $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING); 
                
                $sports_type = service('request')->getPost('sports_type',FILTER_SANITIZE_STRING); 
            }//end isAJAX

            $data = [
                'apps_username' => $apps_username,

                'recid_sports_activity' => $recid_sports_activity,
                'sports_type' => $sports_type
            ];

            return view('employee/sports_activity_details/details_sports_activity_addteam',$data);
        }//end of function

        function details_per_team() {
            if ($this->request->isAJAX()) {
                $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING); 

                $recid_sports_activity_details = service('request')->getPost('recid_sports_activity_details',FILTER_SANITIZE_STRING); 
                $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING); 
                $team_name = service('request')->getPost('team_name',FILTER_SANITIZE_STRING); 

                $recid_event_request = service('request')->getPost('recid_event_request',FILTER_SANITIZE_STRING); 
                $sports_title = service('request')->getPost('sports_title',FILTER_SANITIZE_STRING); 
                $group_no = service('request')->getPost('group_no',FILTER_SANITIZE_STRING); 
                $group_unit = service('request')->getPost('group_unit',FILTER_SANITIZE_STRING); 
                $event_title = service('request')->getPost('event_title',FILTER_SANITIZE_STRING); 
                
            }//end isAJAX

            $data = [
                'apps_username' => $apps_username,

                'recid_sports_activity_details' => $recid_sports_activity_details,
                'recid_sports_activity' => $recid_sports_activity,
                'team_name' => $team_name,

                'recid_event_request' => $recid_event_request,
                'sports_title' => $sports_title,
                'group_no' => $group_no,
                'group_unit' => $group_unit,
                'event_title' => $event_title
            ];

            return view('employee/details_per_team/details_per_team_display',$data);
        }//end of function

        function add_player() {
            if ($this->request->isAJAX()) {
                $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING); 
                $recid_sports_activity_details = service('request')->getPost('recid_sports_activity_details',FILTER_SANITIZE_STRING); 
            }//end isAJAX

            $data = [
                'apps_username' => $apps_username,
                'recid_sports_activity_details' => $recid_sports_activity_details
                
            ];

            return view('employee/details_per_team/details_per_team_addplayer',$data);

        }//end of function

        function details_sports_activity_schedule() {
            if ($this->request->isAJAX()) {
                $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING); 
                $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING); 
                
                $sports_type = service('request')->getPost('sports_type',FILTER_SANITIZE_STRING); 
            }//end isAJAX

            $data = [
                'apps_username' => $apps_username,

                'recid_sports_activity' => $recid_sports_activity,
                'sports_type' => $sports_type
            ];

            return view('employee/sports_schedules/sports_schedules_display',$data);
        }//end of function

        function sports_schedule_addsched() {
            if ($this->request->isAJAX()) {
                $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING); 
                $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING); 
                
            }//end isAJAX

            $data = [
                'apps_username' => $apps_username,

                'recid_sports_activity' => $recid_sports_activity
            ];

            return view('employee/sports_schedules/sports_schedules_addsched',$data);

        }//end of function

    //SPORTS ACTIVITY - END

    //SETUP MENU -START
        function setup_department() {
            return view('employee/setup/department/department_display');
        }//end of function
        function setup_role() {
            return view('employee/setup/role/role_display');
        }//end of function
        function setup_user() {
            return view('employee/setup/users/users_display');
        }//end of function
    //SETUP MENU -END

    function setup_user_access() {
        return view('employee/setup/user_access/user_access_form');
    }//end of function

    //User Profiles - Settings -START
        function user_profile() {
            if ($this->request->isAJAX()) {
                $userid = service('request')->getPost('userid',FILTER_SANITIZE_STRING); 
                $user_deptname = service('request')->getPost('user_deptname',FILTER_SANITIZE_STRING); 
                $user_role_sign = service('request')->getPost('user_role_sign',FILTER_SANITIZE_STRING); 
            }//end isAJAX

            $Get_AppsModel = new Users_model();

            $tablename = "application_users";
            $fieldname = "recid_user";
            $value = $userid;
            $status_get = $Get_AppsModel->checkget_one_parameter_one_result($tablename,$fieldname,$value);	
            if($status_get) {
                $name = $status_get['fname'] . " " . $status_get['lname'] . " " . $status_get['suffix'];
                $email = $status_get['email_add'];
                $larawan = $status_get['larawan'];
            }

            $data = [
                'userid' => $userid,
                'user_deptname' => $user_deptname,
                'user_role_sign' => $user_role_sign,
                'name' => $name,
                'email' => $email,

                'larawan' => $larawan
            ];


            return view('employee/account/profile',$data);
        }//end of function

        function account_setting() {
            return view('employee/account/settings');
        }//end of function
    //User Profiles - Settings -END


}//end of Sidebar_menu Controller