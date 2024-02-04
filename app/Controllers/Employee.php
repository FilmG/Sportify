<?php
namespace App\Controllers;

use \CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use \App\Models\Login_model;
use \App\Models\Employee_model;

//Import package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Employee extends Controller 
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

  //Start of Fill Dropdown
      function fill_dropdown_height() {
        $GetList_Model = new Employee_model();
            $status_GetList = $GetList_Model->getList_dropdown_height();
            foreach($status_GetList as $row) {
                $data[] = array(
                    "feet" => $row['feet']
                );
            }
        echo json_encode($data);
    }//end of function

    function fill_dropdown_team() {
      if ($this->request->isAJAX()) {
        $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING); 
      }//end isAJAX

      $GetList_Model = new Employee_model();
      $status_GetList = $GetList_Model->getList_dropdown_team($recid_sports_activity);
      foreach($status_GetList as $row) {
            $data[] = array(
                "recid_sports_activity_details" => $row['recid_sports_activity_details'],
                "team_name" => $row['team_name']
            );
      }
      echo json_encode($data);
    }//end of function

  //End of Fill Dropdown

//END OF GLOBAL

  function main() {
    $app_sessionData = session();
      $user_userid =  $app_sessionData->get('user_userid');
      $user_fullname = $app_sessionData->get('user_fullname');
      $user_username = $app_sessionData->get('user_username'); 
      $user_larawan = $app_sessionData->get('user_larawan'); 
      $user_deptid = $app_sessionData->get('user_deptid'); 
      $user_role = $app_sessionData->get('user_role'); 
      $login_noactivity = $app_sessionData->get('login_noactivity'); 

      $Get_AppsModel = new Login_model();

    //Get User Department
    $tablename = "application_department";
    $status_getData = $Get_AppsModel->get_user_department($tablename,$user_deptid);
    if($status_getData) {
        foreach($status_getData as $row) {
          $user_deptname = $row['dept'];
        }
      
    } //end of

    //Get application value from database
    $tablename = "sems_apps";
    $status_getData = $Get_AppsModel->get_apps_data($tablename);
    if($status_getData) {
        $app_logo = $status_getData['app_logo'];
        $app_name = $status_getData['app_name'];
        $app_short_name = $status_getData['app_short_name'];
        $app_header_color = $status_getData['app_header_color'];
        $app_header_textcolor = $status_getData['app_header_textcolor'];
        $app_error_color = $status_getData['app_error_color'];
        $copyright = $status_getData['copyright'];
        $designed_by = $status_getData['designed_by'];
    }

    //Get User Access from database
    $tablename = "application_user_access";
    $status_getData2 = $Get_AppsModel->get_user_access_data($user_userid,$tablename);
    if($status_getData2) {
        foreach($status_getData2 as $row) {
          //single sidebar menu
          if($row['sidebar'] == "Dashboard")  {
              $sidebar_dashboard = $row['sidebar_access'];
          } //end dashboard

          if($row['sidebar'] == "Event_Request")  {
            $sidebar_eventRequest = $row['sidebar_access'];
          } //end dashboard

          //sidebar menu with dropdown
          if($row['sidebar'] == "Event_Approval")  {
            $sidebar_event_approval = $row['sidebar_access'];
          
            //submenu access
            if($row['submenu'] == "Course-Adviser")  {
              $course_adviser_submenu_access = $row['submenu_access'];
            }
            if($row['submenu'] == "Course-Coordinator")  {
              $course_coordinator_submenu_access = $row['submenu_access'];
            }
            if($row['submenu'] == "PSMO")  {
              $psmo_submenu_access = $row['submenu_access'];
            }
            if($row['submenu'] == "Academic-Coordinator")  {
              $academic_coordinator_submenu_access = $row['submenu_access'];
            }
            if($row['submenu'] == "OSA-Coordinator")  {
              $osa_coordinator_submenu_access = $row['submenu_access'];
            }
            if($row['submenu'] == "Campus-Manager")  {
              $campus_manager_submenu_access = $row['submenu_access'];
            }
            if($row['submenu'] == "Dir-Academic")  {
              $dir_academic_submenu_access = $row['submenu_access'];
            }
            if($row['submenu'] == "Dir-Administration")  {
              $dir_administration_submenu_access = $row['submenu_access'];
            }
            if($row['submenu'] == "President")  {
              $president_submenu_access = $row['submenu_access'];
            }
          }//end setup menu

          //sidebar menu with dropdown
          if($row['sidebar'] == "Setup")  {
            $sidebar_setup = $row['sidebar_access'];
          
            //submenu access
            if($row['submenu'] == "Setup-User")  {
              $setup_user_submenu_access = $row['submenu_access'];
            }
          }//end setup menu

          //single sidebar menu
          if($row['sidebar'] == "Profile")  {
            $sidebar_profile = $row['sidebar_access'];
          }

        }//end foreach
       
    }//end status_getData2 

    $data = [
      'app_logo' => $app_logo,
      'app_name' => $app_name,
      'app_short_name' => $app_short_name,
      'app_header_color' => $app_header_color,
      'app_header_textcolor' => $app_header_textcolor,
      'app_error_color' => $app_error_color,
      'copyright' => $copyright,
      'designed_by' => $designed_by,
      'user_userid' => $user_userid,
      'user_fullname' => $user_fullname,
      'user_username' => $user_username,
      'user_larawan' => $user_larawan,
      'user_deptid' => $user_deptid, 
      'user_deptname' => $user_deptname,
      'user_role_sign' => $user_role,
      'login_noactivity' => $login_noactivity,

      //start of user access  
      'sidebar_dashboard' => $sidebar_dashboard,

      'sidebar_eventRequest' => $sidebar_eventRequest,
      
      'sidebar_event_approval' => $sidebar_event_approval,
      'course_adviser_submenu_access' => $course_adviser_submenu_access,
      'course_coordinator_submenu_access' => $course_coordinator_submenu_access,
      'psmo_submenu_access' => $psmo_submenu_access,
      'academic_coordinator_submenu_access' => $academic_coordinator_submenu_access,
      'osa_coordinator_submenu_access' => $osa_coordinator_submenu_access,
      'campus_manager_submenu_access' => $campus_manager_submenu_access,
      'dir_academic_submenu_access' => $dir_academic_submenu_access,
      'dir_administration_submenu_access' => $dir_administration_submenu_access,
      'president_submenu_access' => $president_submenu_access,

      'sidebar_setup' => $sidebar_setup,
      'setup_user_submenu_access' => $setup_user_submenu_access,
      
      'Profile' => $sidebar_profile
      //end of user access
    ];
    return view('employee/main',$data);
  }//end of main function

  //====================================================================================================
  //SPACER=>
  //====================================================================================================

  function submit_event_request_data() {
    if ($this->request->isAJAX()) {
      //apps user login
      $apps_userid = service('request')->getPost('event_request_apps_userid',FILTER_SANITIZE_STRING);
      $apps_user_fullname = service('request')->getPost('event_request_apps_user_fullname',FILTER_SANITIZE_STRING);
      $apps_user_deptid = service('request')->getPost('event_request_apps_user_deptid',FILTER_SANITIZE_STRING);
      
      //data inputs -start
      $radio_level_value = service('request')->getPost('event_request_radio-level',FILTER_SANITIZE_STRING);
      $event_request_dept = service('request')->getPost('event_request_dept',FILTER_SANITIZE_STRING);
      $event_request_activity_title = service('request')->getPost('event_request_activity_title',FILTER_SANITIZE_STRING);
      $event_request_activity_theme = service('request')->getPost('event_request_activity_theme',FILTER_SANITIZE_STRING);
      $event_request_activity_obj = service('request')->getPost('event_request_activity_obj',FILTER_SANITIZE_STRING);
      $event_request_nature_activity = service('request')->getPost('event_request_nature_activity',FILTER_SANITIZE_STRING);

      $event_request_date_from = service('request')->getPost('event_request_date_from',FILTER_SANITIZE_STRING);
      $event_request_date_to = service('request')->getPost('event_request_date_to',FILTER_SANITIZE_STRING);
      $event_request_noOfDays = service('request')->getPost('event_request_noOfDays',FILTER_SANITIZE_STRING);
      $event_request_time_from = service('request')->getPost('event_request_time_from',FILTER_SANITIZE_STRING);
      $event_request_time_to = service('request')->getPost('event_request_time_to',FILTER_SANITIZE_STRING);
      $event_request_venue_actvty = service('request')->getPost('event_request_venue_actvty',FILTER_SANITIZE_STRING);
      $event_request_actvty_target_participant = service('request')->getPost('event_request_actvty_target_participant',FILTER_SANITIZE_STRING);
      $event_request_actvty_in_charge = service('request')->getPost('event_request_actvty_in_charge',FILTER_SANITIZE_STRING);
      $event_request_actvty_contact = service('request')->getPost('event_request_actvty_contact',FILTER_SANITIZE_STRING);
      $event_request_actvty_speaker = service('request')->getPost('event_request_actvty_speaker',FILTER_SANITIZE_STRING);
      $event_request_actvty_company_prospect = service('request')->getPost('event_request_actvty_company_prospect',FILTER_SANITIZE_STRING);
      $event_request_actvty_company_person = service('request')->getPost('event_request_actvty_company_person',FILTER_SANITIZE_STRING);
      $event_request_actvty_company_person_contact = service('request')->getPost('event_request_actvty_company_person_contact',FILTER_SANITIZE_STRING);
      
      $event_request_support_letter = service('request')->getPost('event_request_support_letter',FILTER_SANITIZE_STRING);
      
      $radio_event_request_fee = service('request')->getPost('radio_event_request_fee',FILTER_SANITIZE_STRING);
      $event_request_wfee_student_funded = service('request')->getPost('event_request_wfee_student_funded',FILTER_SANITIZE_STRING);
      $event_request_wfee_student_funded_amount = service('request')->getPost('event_request_wfee_student_funded_amount',FILTER_SANITIZE_STRING);
      $event_request_wfee_student_funded_remarks = service('request')->getPost('event_request_wfee_student_funded_remarks',FILTER_SANITIZE_STRING);
      $event_request_wfee_school_funded = service('request')->getPost('event_request_wfee_school_funded',FILTER_SANITIZE_STRING);
      $event_request_wfee_school_funded_amount = service('request')->getPost('event_request_wfee_school_funded_amount',FILTER_SANITIZE_STRING);
      $event_request_wfee_school_funded_remarks = service('request')->getPost('event_request_wfee_school_funded_remarks',FILTER_SANITIZE_STRING);
      $event_request_wfee_org_funded = service('request')->getPost('event_request_wfee_org_funded',FILTER_SANITIZE_STRING);
      $event_request_wfee_org_funded_amount = service('request')->getPost('event_request_wfee_org_funded_amount',FILTER_SANITIZE_STRING);
      $event_request_wfee_org_funded_remarks = service('request')->getPost('event_request_wfee_org_funded_remarks',FILTER_SANITIZE_STRING);
      $event_request_wfee_ext_funded = service('request')->getPost('event_request_wfee_ext_funded',FILTER_SANITIZE_STRING);
      $event_request_wfee_ext_funded_amount = service('request')->getPost('event_request_wfee_ext_funded_amount',FILTER_SANITIZE_STRING);
      $event_request_wfee_ext_funded_remarks = service('request')->getPost('event_request_wfee_ext_funded_remarks',FILTER_SANITIZE_STRING);
      $event_request_wfee_fund_raising = service('request')->getPost('event_request_wfee_fund_raising',FILTER_SANITIZE_STRING);
      $event_request_wfee_fund_raising_amount = service('request')->getPost('event_request_wfee_fund_raising_amount',FILTER_SANITIZE_STRING);
      $event_request_wfee_fund_raising_remarks = service('request')->getPost('event_request_wfee_fund_raising_remarks',FILTER_SANITIZE_STRING);
      $radio_event_request_transpo = service('request')->getPost('radio_event_request_transpo',FILTER_SANITIZE_STRING);
      $event_request_with_transpo_personal = service('request')->getPost('event_request_with_transpo_personal',FILTER_SANITIZE_STRING);
      $event_request_with_transpo_personal_details = service('request')->getPost('event_request_with_transpo_personal_details',FILTER_SANITIZE_STRING);
      $event_request_with_transpo_private = service('request')->getPost('event_request_with_transpo_private',FILTER_SANITIZE_STRING);
      $event_request_with_transpo_private_details = service('request')->getPost('event_request_with_transpo_private_details',FILTER_SANITIZE_STRING);
      $event_request_with_transpo_school = service('request')->getPost('event_request_with_transpo_school',FILTER_SANITIZE_STRING);
      $event_request_with_transpo_school_details = service('request')->getPost('event_request_with_transpo_school_details',FILTER_SANITIZE_STRING);
      $event_request_with_transpo_solicited = service('request')->getPost('event_request_with_transpo_solicited',FILTER_SANITIZE_STRING);
      $event_request_with_transpo_solicited_details = service('request')->getPost('event_request_with_transpo_solicited_details',FILTER_SANITIZE_STRING);

      $event_request_person_venue_request = service('request')->getPost('event_request_person_venue_request',FILTER_SANITIZE_STRING);
      $event_request_person_service_vehicle = service('request')->getPost('event_request_person_service_vehicle',FILTER_SANITIZE_STRING);
      $event_request_person_facequip = service('request')->getPost('event_request_person_facequip',FILTER_SANITIZE_STRING);
      $event_request_person_incharge = service('request')->getPost('event_request_person_incharge',FILTER_SANITIZE_STRING);

      //data inputs -end

      $recaptchaResponse = service('request')->getPost('g-recaptcha-response',FILTER_SANITIZE_STRING);
    }//end isAJAX

    //files
    //File Upload Image | Invitation
    $unique_id = md5(str_shuffle('1234567890'.time()));
    $file_image_request_inside = $this->request->getFile('files');
    if($file_image_request_inside == "") {
      $image_filename_inside = "";
    } else {
      $image_filename_inside = $unique_id . "-psmo.jpg"; //. $file_image_request_inside->getName();
      $image_size_inside = $file_image_request_inside->getSize();
      $file_image_request_inside->move('./public/images/letter_attach', $image_filename_inside);
    }
    
    
    //Start of Transportation Need
    if ($radio_event_request_transpo == "With Transportation Need"){
        $event_request_transpo = "Yes"; //check

        //Check value of Checkbox 
        if (isset($event_request_with_transpo_personal)){
            $event_transpo_personal = "Yes"; //check
        } else {
            $event_transpo_personal = "No"; //uncheck
            $event_request_with_transpo_personal_details = "";
        }

        //Check value of Checkbox 
        if (isset($event_request_with_transpo_private)){
            $event_transpo_private = "Yes"; //check
        } else {
            $event_transpo_private = "No"; //uncheck
            $event_request_with_transpo_private_details = "";
        }

        //Check value of Checkbox 
        if (isset($event_request_with_transpo_school)){
            $event_transpo_school = "Yes"; //check
        } else {
            $event_transpo_school = "No"; //uncheck
            $event_request_with_transpo_school_details = "";
        }

        //Check value of Checkbox 
        if (isset($event_request_with_transpo_solicited)){
            $event_transpo_solicited = "Yes"; //check
        } else {
            $event_transpo_solicited = "No"; //uncheck
            $event_request_with_transpo_solicited_details = "";
        }

    } else {
        $event_request_transpo = "No"; //uncheck

        $event_transpo_personal = "No"; //uncheck
        $event_request_with_transpo_personal_details = "";

        $event_transpo_private = "No"; //uncheck
        $event_request_with_transpo_private_details = "";

        $event_transpo_school = "No"; //uncheck
        $event_request_with_transpo_school_details = "";

        $event_transpo_solicited = "No"; //uncheck
        $event_request_with_transpo_solicited_details = "";
    }
    //End of Transportation Need

    //Start of Activity Funding/Collection
    if ($radio_event_request_fee == "With Activity Fee Collection"){
        $event_request_with_fee = "Yes"; //check

        //Check value of Checkbox 
        if (isset($event_request_wfee_student_funded)){
            $event_wfee_student_funded = "Yes"; //check
        } else {
            $event_wfee_student_funded = "No"; //uncheck
            $event_request_wfee_student_funded_amount = "0.00";
            $event_request_wfee_student_funded_remarks = "";
        }

        //Check value of Checkbox 
        if (isset($event_request_wfee_school_funded)){
            $event_wfee_school_funded = "Yes"; //check
        } else {
            $event_wfee_school_funded = "No"; //uncheck
            $event_request_wfee_school_funded_amount = "0.00";
            $event_request_wfee_school_funded_remarks = "";
        }

        //Check value of Checkbox 
        if (isset($event_request_wfee_org_funded)){
            $event_wfee_org_funded = "Yes"; //check
        } else {
            $event_wfee_org_funded = "No"; //uncheck
            $event_request_wfee_org_funded_amount = "0.00";
            $event_request_wfee_org_funded_remarks = "";
        }

        //Check value of Checkbox 
        if (isset($event_request_wfee_ext_funded)){
            $event_wfee_ext_funded = "Yes"; //check
        } else {
            $event_wfee_ext_funded = "No"; //uncheck
            $event_request_wfee_ext_funded_amount = "0.00";
            $event_request_wfee_ext_funded_remarks = "";
        }

        //Check value of Checkbox 
        if (isset($event_request_wfee_fund_raising)){
            $event_wfee_fund_raising = "Yes"; //check
        } else {
            $event_wfee_fund_raising = "No"; //uncheck
            $event_request_wfee_fund_raising_amount = "0.00";
            $event_request_wfee_fund_raising_remarks = "";
        }


    } else {
        $event_request_with_fee = "No"; //uncheck

        $event_wfee_student_funded = "No"; //uncheck
        $event_request_wfee_student_funded_amount = "0.00";
        $event_request_wfee_student_funded_remarks = "";

        $event_wfee_school_funded = "No"; //uncheck
        $event_request_wfee_school_funded_amount = "0.00";
        $event_request_wfee_school_funded_remarks = "";

        $event_wfee_org_funded = "No"; //uncheck
        $event_request_wfee_org_funded_amount = "0.00";
        $event_request_wfee_org_funded_remarks = "";

        $event_wfee_ext_funded = "No"; //uncheck
        $event_request_wfee_ext_funded_amount = "0.00";
        $event_request_wfee_ext_funded_remarks = "";

        $event_wfee_fund_raising = "No"; //uncheck
        $event_request_wfee_fund_raising_amount = "0.00";
        $event_request_wfee_fund_raising_remarks = "";
    }
    //End of Activity Funding/Collection


    if ($event_request_support_letter == "With Invitation Letter Attached"){
      $event_support_letter = "Yes"; //check

      $unique_id = md5(str_shuffle('1234567890'.time()));
      //File Upload Image | Invitation
      $file_image_request_letter = $this->request->getFile('file-request_letter');
      if($file_image_request_letter == "") {
        $image_filename_letter = "";
      } else {
        $image_filename_letter = $unique_id  . "-invitation.jpg"; //. $file_image_request_letter->getName();
        $image_size = $file_image_request_letter->getSize();
        $file_image_request_letter->move('./public/images/letter_attach', $image_filename_letter);
      }
    } else {
      $event_support_letter = "No"; //uncheck
      $image_filename_letter = "";
    }

    //reCaptcha v2 Google - Start
        //$recaptchaResponse = service('request')->getPost('g-recaptcha-response',FILTER_SANITIZE_STRING);
        
        //Localhost
        //$secret='6LerMCEbAAAAABKu1g2b-TpWbfAibKL9tBKlYtAJ';

        //Domain
        $secret='6LfBeFIdAAAAAMiHOPQZHpD_Nq9ADpwR7j7wvzyS';

        $credential = array(
                'secret' => $secret,
                'response' => $recaptchaResponse
            );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status= json_decode($response, true);
        
        if($status['success']){ 
          //Dito ang code pag Okay ang captcha

          //get date -start =====
              $DateTimeNow = new Time('now'); //get current DateTime
          
              $time = Time::parse($DateTimeNow); //date and time
              $date_ngayun =  $time->toDateString(); // 2016-03-09 date lang ang value
      
              //get date in format Jan 12, 2022
                  $text_date = date("M d, Y ");
      
              //format date to September 01, 2023
                  $text_date_whole = date("F d, Y ");
      
              //get Time in 12 hour format
                  $time_text = date('h:i A', strtotime($DateTimeNow));
      
              //Get the year of the date
                  $year = date("Y");
          
      
              //format date from  y-m-d to September 01, 2023
                $request_date_from_text = date('F d, Y ',strtotime($event_request_date_from));
                $request_date_to_text = date('F d, Y ',strtotime($event_request_date_to));
          
              //Format from 24 Format to 12 format  
                $time_from = date('h:i A', strtotime($event_request_time_from));
                $time_to = date('h:i A', strtotime($event_request_time_to));
          //get date -end ====

          $get_AppsModel = new Employee_model();

          $data = [
            'event_level_ref' => $radio_level_value,
            'event_dept' => $event_request_dept, 
            'recid_dept' => $apps_user_deptid,
            'event_acty_title' => $event_request_activity_title,
            'event_acty_theme' => $event_request_activity_theme,
            'event_acty_obj' => $event_request_activity_obj,
            'event_nature_acty' => $event_request_nature_activity,

            'event_date_from' => $event_request_date_from,
            'event_date_from_text' => $request_date_from_text,
            'event_date_to' => $event_request_date_to,
            'event_date_to_text' => $request_date_to_text,
            'event_no_days' => $event_request_noOfDays,

            'event_time_from' => $event_request_time_from,
            'event_time_from_text' => $time_from,
            'event_time_to' => $event_request_time_to,
            'event_time_to_text' => $time_to,

            'event_venue_acty' => $event_request_venue_actvty,
            'event_participant' => $event_request_actvty_target_participant,
            'event_in_charge' => $event_request_actvty_in_charge,
            'event_contact_num' => $event_request_actvty_contact,

            'event_actvty_speaker' => $event_request_actvty_speaker,
            'event_actvty_company_prospect' => $event_request_actvty_company_prospect,
            'event_actvty_company_person' => $event_request_actvty_company_person,
            'event_actvty_company_person_contact' => $event_request_actvty_company_person_contact,
            'event_support_letter' => $event_support_letter,
            'event_support_letter_attach' => $image_filename_letter,

            'event_request_with_fee' => $event_request_with_fee, 
            'event_wfee_student_funded' => $event_wfee_student_funded,
            'event_wfee_student_funded_amount' => $event_request_wfee_student_funded_amount,
            'event_wfee_student_funded_remarks' => $event_request_wfee_student_funded_remarks,
            'event_wfee_school_funded' => $event_wfee_school_funded,
            'event_wfee_school_funded_amount' => $event_request_wfee_school_funded_amount,
            'event_wfee_school_funded_remarks' => $event_request_wfee_school_funded_remarks,
            'event_wfee_org_funded' => $event_wfee_org_funded,
            'event_wfee_org_funded_amount' => $event_request_wfee_org_funded_amount,
            'event_wfee_org_funded_remarks' => $event_request_wfee_org_funded_remarks,
            'event_wfee_ext_funded' => $event_wfee_ext_funded,
            'event_wfee_ext_funded_amount' => $event_request_wfee_ext_funded_amount,
            'event_wfee_ext_funded_remarks' => $event_request_wfee_ext_funded_remarks,
            'event_wfee_fund_raising' => $event_wfee_fund_raising,
            'event_wfee_fund_raising_amount' => $event_request_wfee_fund_raising_amount,
            'event_wfee_fund_raising_remarks' => $event_request_wfee_fund_raising_remarks,  

            'event_request_transpo' => $event_request_transpo, 
            'event_transpo_personal' => $event_transpo_personal, 
            'event_transpo_personal_details' => $event_request_with_transpo_personal_details,
            'event_transpo_private' => $event_transpo_private, 
            'event_transpo_private_details' => $event_request_with_transpo_private_details,
            'event_transpo_school' => $event_transpo_school, 
            'event_transpo_school_details' => $event_request_with_transpo_school_details,
            'event_transpo_solicited' => $event_transpo_solicited, 
            'event_transpo_solicited_details' => $event_request_with_transpo_solicited_details,

            'event_person_venue_request' => $event_request_person_venue_request,
            'event_person_service_vehicle' => $event_request_person_service_vehicle,
            'event_person_facequip' => $event_request_person_facequip,
            'event_person_incharge' => $event_request_person_incharge,

            'event_inside_attach' => $image_filename_inside,
            
            'course_adviser_sign' => 1,
            'status' => "For Approval by Course Adviser",

            'course_coordinator_sign' => 0,
            'psmo_sign' => 0,
            'acad_coordinator_sign' => 0,
            'osa_sign' => 0,
            'campus_manager_sign' => 0,
            'dir_acad_sign' => 0,
            'dir_admin_sign' => 0,
            'pres_sign' => 0,
          
            'encoded_by' => $apps_user_fullname,
            'username_action' => "add",
            'username_date' => $DateTimeNow
          ];
      
          $insert_AppsModel = new Employee_model();
          $tablename = "event_request";
          $status_insert = $insert_AppsModel->insert_data($tablename,$data);	
          if($status_insert) {
            $lastinserted_id = $status_insert;
            $status = true;
            $return_msg = "Record Successfully Added";
          } else {
            $status = false;
            $return_msg = "Error Adding Record";
          }
          

        }else {
          //error captcha
          $status = false;
          $return_msg = "Please check [ I'm not a robot ]";
        }
    //reCaptcha v2 Google - End


    $result_ajax = array(   
      "status" => $status,
      "return_msg" => $return_msg
    );
    echo json_encode($result_ajax);
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_event_request_list() {
    if ($this->request->isAJAX()) {
      $user_deptid = service('request')->getPost('user_deptid',FILTER_SANITIZE_STRING);
      $user_role_sign = service('request')->getPost('user_role_sign',FILTER_SANITIZE_STRING);
    }//end isAJAX

    //get date -start 
        $DateTimeNow = new Time('now'); //get current DateTime

        $time = Time::parse($DateTimeNow); //date and time
        $date_ngayun =  $time->toDateString(); // 2016-03-09 date lang ang value

        //get current date in format Jan 12, 2022
            $text_date = date("M d, Y ");

        //format current date to September 01, 2023
            $text_date_whole = date("F d, Y ");

        //get current Time in 12 hour format
            $time_text = date('h:i A', strtotime($DateTimeNow));

        //Get the year of the current date
            $year = date("Y");

        //convert format from variable(m/d/y) format to Y-m-d format
            $datevisit = date('Y-m-d',strtotime($datevisit));
        
        //format date from  y-m-d to September 01, 2023
            $date_visit_text = date('F d, Y ',strtotime($date_visit));

    //get date -end

    $Get_AppsModel = new Employee_model();
      
              $GetTotal_event_request_list = $Get_AppsModel->GetTotal_event_request_list($user_deptid);
              $GetFiltered_event_request_list = $Get_AppsModel->GetFiltered_event_request_list($user_deptid);
              $status_GetList = $Get_AppsModel->GetList_event_request_list($user_deptid);

              $result = array();
              $i = $_POST['start'];
                  
              foreach($status_GetList as $value) { 

                if($value->pres_sign >= 2) {
                    
                    if($date_ngayun < $value->event_date_to) {
                        $text_color = "#008000";
                    } else {
                      $text_color = "#E43009";
                    }
                } else {
                    $text_color = "#000";
                }

                  $i++;
                  $row = array();
                  $row[] = $i;         
                  $row[] = '<font color="'.$text_color.'">'.$value->event_acty_title.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->event_dept.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->event_date_from_text.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->event_date_to_text.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->event_venue_acty.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->event_level_ref.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->approval_remarks.'</font>';

                  if($value->pres_sign >= 2) {
                      //Event is approved by president
                        //Check if Event is within the Time Frame
                        if($date_ngayun < $value->event_date_to) {
                                  $row[] = '
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-right">

                                          <button class="dropdown-item view_sports_activity" type="button"  
                                              recid_event_request="'.$value->recid_event_request.'" 
                                              event_title="'.$value->event_acty_title.'" 
                                                              
                                              >Sports Activity
                                          </button>

                                      </div>
                                    </div>
                                  ';
                          } else {
                              $row[] = 'Event is Closed';
                          }


                  } else {
                    //not yet approved -start
                      
                      $row[] = '';
                       

                  }//end of pres_sign

                
                  //--
                  $result[] = $row;         
              }//end foreach

              $output = array(
                  "draw" => $_POST['draw'],
                  "recordsTotal" => $GetTotal_event_request_list->ID,
                  "recordsFiltered" => $GetFiltered_event_request_list->ID,
                  "data" => $result
              );
              echo json_encode($output);
          //Per Department - End

  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_event_approval_course_adviser_list() {
    if ($this->request->isAJAX()) {
      $approved_value = service('request')->getPost('approved_value',FILTER_SANITIZE_STRING);
    }

    if($approved_value == 1) {
        $text_color = "#000";
    } else if($approved_value == 2) {
        $text_color = "#008000";
    } else if($approved_value == 3) {
      $text_color = "#E43009";
    }

    $Get_AppsModel = new Employee_model();
      
    $GetTotal_event_approval_ca = $Get_AppsModel->GetTotal_event_approval_ca($approved_value);
    $GetFiltered_event_approval_ca = $Get_AppsModel->GetFiltered_event_approval_ca($approved_value);
    $status_GetList = $Get_AppsModel->GetList_event_approval_ca($approved_value);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 
        $i++;
        $row = array();
        $row[] = $i;   
                        
        $row[] = '<font color="'.$text_color.'">'.$value->event_acty_title.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_dept.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_from_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_to_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_venue_acty.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_level_ref.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';

        $row[] = '
                  <div class="btn-group">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">

                          <button class="dropdown-item eventrequest_approved" type="button" id="" 
                              recid_event_request="'.$value->recid_event_request.'" 
                              role_sign_as="Course Adviser" submenu="Course-Adviser" approved_value="'.$approved_value.'"
                              
                                                            
                              >View Info
                          </button>

                      </div>
                  </div>
                ';
                
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $GetTotal_event_approval_ca->ID,
          "recordsFiltered" => $GetFiltered_event_approval_ca->ID,
          "data" => $result
      );
    echo json_encode($output);
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_event_approval_course_coordinator_list() {
    if ($this->request->isAJAX()) {
      $approved_value = service('request')->getPost('approved_value',FILTER_SANITIZE_STRING);
    }

    if($approved_value == 1) {
      $text_color = "#000";
    } else if($approved_value == 2) {
        $text_color = "#008000";
    } else if($approved_value == 3) {
      $text_color = "#E43009";
    }

    $Get_AppsModel = new Employee_model();
      
    $GetTotal_event_approval_cc = $Get_AppsModel->GetTotal_event_approval_cc($approved_value);
    $GetFiltered_event_approval_cc = $Get_AppsModel->GetFiltered_event_approval_cc($approved_value);
    $status_GetList = $Get_AppsModel->GetList_event_approval_cc($approved_value);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 
        $i++;
        $row = array();
        $row[] = $i;   
                        
        $row[] = '<font color="'.$text_color.'">'.$value->event_acty_title.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_dept.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_from_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_to_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_venue_acty.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_level_ref.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';

        $row[] = '
                  <div class="btn-group">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">

                          <button class="dropdown-item eventrequest_approved" type="button" id="" 
                              recid_event_request="'.$value->recid_event_request.'" 
                              role_sign_as="Course Coordinator" submenu="Course-Coordinator"
                              approved_value="'.$approved_value.'"
                              
                              >View Info
                          </button>

                      </div>
                  </div>
                ';
                
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $GetTotal_event_approval_cc->ID,
          "recordsFiltered" => $GetFiltered_event_approval_cc->ID,
          "data" => $result
      );
    echo json_encode($output);
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_event_approval_psmo_list() {
    if ($this->request->isAJAX()) {
      $approved_value = service('request')->getPost('approved_value',FILTER_SANITIZE_STRING);
    }

    if($approved_value == 1) {
        $text_color = "#000";
    } else if($approved_value == 2) {
        $text_color = "#008000";
    } else if($approved_value == 3) {
      $text_color = "#E43009";
    }

    $Get_AppsModel = new Employee_model();
      
    $GetTotal_event_approval_psmo = $Get_AppsModel->GetTotal_event_approval_psmo($approved_value);
    $GetFiltered_event_approval_psmo = $Get_AppsModel->GetFiltered_event_approval_psmo($approved_value);
    $status_GetList = $Get_AppsModel->GetList_event_approval_psmo($approved_value);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 
        $i++;
        $row = array();
        $row[] = $i;   
                        
        $row[] = '<font color="'.$text_color.'">'.$value->event_acty_title.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_dept.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_from_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_to_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_venue_acty.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_level_ref.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';

        $row[] = '
                  <div class="btn-group">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">

                          <button class="dropdown-item eventrequest_approved" type="button" id="" 
                              recid_event_request="'.$value->recid_event_request.'" 
                              role_sign_as="PSMO" submenu="PSMO" approved_value="'.$approved_value.'"
                              
                                                            
                              >View Info
                          </button>

                      </div>
                  </div>
                ';
                
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $GetTotal_event_approval_psmo->ID,
          "recordsFiltered" => $GetFiltered_event_approval_psmo->ID,
          "data" => $result
      );
    echo json_encode($output);
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_event_approval_academic_coordinator_list() {
    if ($this->request->isAJAX()) {
      $approved_value = service('request')->getPost('approved_value',FILTER_SANITIZE_STRING);
    }

    if($approved_value == 1) {
        $text_color = "#000";
    } else if($approved_value == 2) {
        $text_color = "#008000";
    } else if($approved_value == 3) {
      $text_color = "#E43009";
    }

    $Get_AppsModel = new Employee_model();
      
    $GetTotal_event_approval_ac = $Get_AppsModel->GetTotal_event_approval_ac($approved_value);
    $GetFiltered_event_approval_ac = $Get_AppsModel->GetFiltered_event_approval_ac($approved_value);
    $status_GetList = $Get_AppsModel->GetList_event_approval_ac($approved_value);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 
        $i++;
        $row = array();
        $row[] = $i;   
                        
        $row[] = '<font color="'.$text_color.'">'.$value->event_acty_title.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_dept.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_from_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_to_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_venue_acty.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_level_ref.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';

        $row[] = '
                  <div class="btn-group">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">

                          <button class="dropdown-item eventrequest_approved" type="button" id="" 
                              recid_event_request="'.$value->recid_event_request.'" 
                              role_sign_as="Academic Coordinator" submenu="Academic-Coordinator"
                              approved_value="'.$approved_value.'"
                              
                                                            
                              >View Info
                          </button>

                      </div>
                  </div>
                ';
                
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $GetTotal_event_approval_ac->ID,
          "recordsFiltered" => $GetFiltered_event_approval_ac->ID,
          "data" => $result
      );
    echo json_encode($output);
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_event_approval_osa_coordinator_list() {
    if ($this->request->isAJAX()) {
      $approved_value = service('request')->getPost('approved_value',FILTER_SANITIZE_STRING);
    }

    if($approved_value == 1) {
        $text_color = "#000";
    } else if($approved_value == 2) {
        $text_color = "#008000";
    } else if($approved_value == 3) {
      $text_color = "#E43009";
    }

    $Get_AppsModel = new Employee_model();
      
    $GetTotal_event_approval_osa = $Get_AppsModel->GetTotal_event_approval_osa($approved_value);
    $GetFiltered_event_approval_osa = $Get_AppsModel->GetFiltered_event_approval_osa($approved_value);
    $status_GetList = $Get_AppsModel->GetList_event_approval_osa($approved_value);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 
        $i++;
        $row = array();
        $row[] = $i;   
                        
        $row[] = '<font color="'.$text_color.'">'.$value->event_acty_title.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_dept.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_from_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_to_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_venue_acty.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_level_ref.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';

        $row[] = '
                  <div class="btn-group">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">

                          <button class="dropdown-item eventrequest_approved" type="button" id="" 
                              recid_event_request="'.$value->recid_event_request.'" 
                              role_sign_as="OSA Coordinator" submenu="OSA-Coordinator" approved_value="'.$approved_value.'"
                              
                              >View Info
                          </button>

                      </div>
                  </div>
                ';
                
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $GetTotal_event_approval_osa->ID,
          "recordsFiltered" => $GetFiltered_event_approval_osa->ID,
          "data" => $result
      );
    echo json_encode($output);
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_event_approval_campus_manager_list() {
    if ($this->request->isAJAX()) {
      $approved_value = service('request')->getPost('approved_value',FILTER_SANITIZE_STRING);
    }

    if($approved_value == 1) {
        $text_color = "#000";
    } else if($approved_value == 2) {
        $text_color = "#008000";
    } else if($approved_value == 3) {
      $text_color = "#E43009";
    }

    $Get_AppsModel = new Employee_model();
      
    $GetTotal_event_approval_cm = $Get_AppsModel->GetTotal_event_approval_cm($approved_value);
    $GetFiltered_event_approval_cm = $Get_AppsModel->GetFiltered_event_approval_cm($approved_value);
    $status_GetList = $Get_AppsModel->GetList_event_approval_cm($approved_value);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 
        $i++;
        $row = array();
        $row[] = $i;   
                        
        $row[] = '<font color="'.$text_color.'">'.$value->event_acty_title.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_dept.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_from_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_to_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_venue_acty.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_level_ref.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';

        $row[] = '
                  <div class="btn-group">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">

                          <button class="dropdown-item eventrequest_approved" type="button" id="" 
                              recid_event_request="'.$value->recid_event_request.'" 
                              role_sign_as="Campus Manager" submenu="Campus-Manager" approved_value="'.$approved_value.'"
                              
                                                            
                              >View Info
                          </button>

                      </div>
                  </div>
                ';
                
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $GetTotal_event_approval_cm->ID,
          "recordsFiltered" => $GetFiltered_event_approval_cm->ID,
          "data" => $result
      );
    echo json_encode($output);
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_event_approval_dir_academic_list() {
    if ($this->request->isAJAX()) {
      $approved_value = service('request')->getPost('approved_value',FILTER_SANITIZE_STRING);
    }

    if($approved_value == 1) {
        $text_color = "#000";
    } else if($approved_value == 2) {
        $text_color = "#008000";
    } else if($approved_value == 3) {
      $text_color = "#E43009";
    }

    $Get_AppsModel = new Employee_model();
      
    $GetTotal_event_approval_dir_acad = $Get_AppsModel->GetTotal_event_approval_dir_acad($approved_value);
    $GetFiltered_event_approval_dir_acad = $Get_AppsModel->GetFiltered_event_approval_dir_acad($approved_value);
    $status_GetList = $Get_AppsModel->GetList_event_approval_dir_acad($approved_value);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 
        $i++;
        $row = array();
        $row[] = $i;   
                        
        $row[] = '<font color="'.$text_color.'">'.$value->event_acty_title.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_dept.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_from_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_to_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_venue_acty.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_level_ref.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';

        $row[] = '
                  <div class="btn-group">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">

                          <button class="dropdown-item eventrequest_approved" type="button" id="" 
                              recid_event_request="'.$value->recid_event_request.'" 
                              role_sign_as="Director for Academic" submenu="Dir-Academic" approved_value="'.$approved_value.'"
                              
                                                            
                              >View Info
                          </button>

                      </div>
                  </div>
                ';
                
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $GetTotal_event_approval_dir_acad->ID,
          "recordsFiltered" => $GetFiltered_event_approval_dir_acad->ID,
          "data" => $result
      );
    echo json_encode($output);
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_event_approval_dir_administration_list() {
    if ($this->request->isAJAX()) {
      $approved_value = service('request')->getPost('approved_value',FILTER_SANITIZE_STRING);
    }

    if($approved_value == 1) {
        $text_color = "#000";
    } else if($approved_value == 2) {
        $text_color = "#008000";
    } else if($approved_value == 3) {
      $text_color = "#E43009";
    }


    $Get_AppsModel = new Employee_model();
      
    $GetTotal_event_approval_dir_admin = $Get_AppsModel->GetTotal_event_approval_dir_admin($approved_value);
    $GetFiltered_event_approval_dir_admin = $Get_AppsModel->GetFiltered_event_approval_dir_admin($approved_value);
    $status_GetList = $Get_AppsModel->GetList_event_approval_dir_admin($approved_value);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 
        $i++;
        $row = array();
        $row[] = $i;   
                        
        $row[] = '<font color="'.$text_color.'">'.$value->event_acty_title.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_dept.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_from_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_to_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_venue_acty.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_level_ref.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';

        $row[] = '
                  <div class="btn-group">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">

                          <button class="dropdown-item eventrequest_approved" type="button" id="" 
                              recid_event_request="'.$value->recid_event_request.'" 
                              role_sign_as="Director for Administration" submenu="Dir-Administration" 
                              approved_value="'.$approved_value.'"
                                                            
                              >View Info
                          </button>

                      </div>
                  </div>
                ';
                
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $GetTotal_event_approval_dir_admin->ID,
          "recordsFiltered" => $GetFiltered_event_approval_dir_admin->ID,
          "data" => $result
      );
    echo json_encode($output);
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_event_approval_president_list() {
    if ($this->request->isAJAX()) {
      $approved_value = service('request')->getPost('approved_value',FILTER_SANITIZE_STRING);
    }

    if($approved_value == 1) {
        $text_color = "#000";
    } else if($approved_value == 2) {
        $text_color = "#008000";
    } else if($approved_value == 3) {
      $text_color = "#E43009";
    }

    $Get_AppsModel = new Employee_model();
      
    $GetTotal_event_approval_pres = $Get_AppsModel->GetTotal_event_approval_pres($approved_value);
    $GetFiltered_event_approval_pres = $Get_AppsModel->GetFiltered_event_approval_pres($approved_value);
    $status_GetList = $Get_AppsModel->GetList_event_approval_pres($approved_value);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 
        $i++;
        $row = array();
        $row[] = $i;   
                        
        $row[] = '<font color="'.$text_color.'">'.$value->event_acty_title.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_dept.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_from_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_date_to_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_venue_acty.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->event_level_ref.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';

        $row[] = '
                  <div class="btn-group">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">

                          <button class="dropdown-item eventrequest_approved" type="button" id="" 
                              recid_event_request="'.$value->recid_event_request.'" 
                              role_sign_as="President" submenu="President" approved_value="'.$approved_value.'"
                              
                                                            
                              >View Info
                          </button>

                      </div>
                  </div>
                ';
                
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $GetTotal_event_approval_pres->ID,
          "recordsFiltered" => $GetFiltered_event_approval_pres->ID,
          "data" => $result
      );
    echo json_encode($output);
  }//end of function



  //====================================================================================================
  //SPACER=>
  //====================================================================================================

  function submit_event_request_approval_data() {
    if ($this->request->isAJAX()) {
      //apps user login
      $apps_user_fullname = service('request')->getPost('eventrequest_approval_apps_user_fullname',FILTER_SANITIZE_STRING);
      $recid_event_request = service('request')->getPost('eventrequest_recid',FILTER_SANITIZE_STRING);

      $event_request_approval = service('request')->getPost('event_request_approval',FILTER_SANITIZE_STRING);
      $event_request_approval_remarks = service('request')->getPost('event_request_approval_remarks',FILTER_SANITIZE_STRING);
      $eventrequest_role_sign_as = service('request')->getPost('eventrequest_role_sign_as',FILTER_SANITIZE_STRING);

    }//end isAJAX  

    //get date -start =====
        $DateTimeNow = new Time('now'); //get current DateTime
                  
        $time = Time::parse($DateTimeNow); //date and time
        $date_ngayun =  $time->toDateString(); // 2016-03-09 date lang ang value

        //get date in format Jan 12, 2022
            $text_date = date("M d, Y ");

        //format date to September 01, 2023
            $text_date_whole = date("F d, Y ");

        //get Time in 12 hour format
            $time_text = date('h:i A', strtotime($DateTimeNow));

        //Get the year of the date
            $year = date("Y");


        //format date from  y-m-d to September 01, 2023
          //$request_date_from_text = date('F d, Y ',strtotime($event_request_date_from));
          //$request_date_to_text = date('F d, Y ',strtotime($event_request_date_to));

        //Format from 24 Format to 12 format  
          //$timevisit = date('h:i A', strtotime($timevisit));

    //get date -end ====


    switch ($eventrequest_role_sign_as) {
      
      case "Course Adviser":
        //code block;
        if($event_request_approval == "Approved") {
          $approved = 2;
          $approved_next = 1;
          $date_approved = $DateTimeNow;
          $status_text = "For Approval by the Course Coordinator";
        } elseif($event_request_approval == "Pending Approval") {
          $approved = 1;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Pending Approval by the Course Adviser";
        } elseif($event_request_approval == "Reject") {
          $approved = 3;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Rejected by the Course Adviser";
        }
        
        $data = [
          'course_adviser_sign' => $approved,
          'course_adviser_sign_date' => $date_approved,
          'status' => $status_text,
          'course_adviser_remarks' => $event_request_approval_remarks,
          'course_coordinator_sign' => $approved_next
        ];
        break;

      case "Course Coordinator":
        //code block
        if($event_request_approval == "Approved") {
          $approved = 2;
          $approved_next = 1;
          $date_approved = $DateTimeNow;
          $status_text = "For Approval by the PSMO";
        } elseif($event_request_approval == "Pending Approval") {
          $approved = 1;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Pending Approval by the Course Coordinator";
        } elseif($event_request_approval == "Reject") {
          $approved = 3;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Rejected by the Course Coordinator";
        }
        $data = [
          'course_coordinator_sign' => $approved,
          'course_coordinator_sign_date' => $date_approved,
          'status' => $status_text,
          'course_coordinator_remarks' => $event_request_approval_remarks,
          'psmo_sign' => $approved_next
        ];
        break;

      case "PSMO":
        //code block
        if($event_request_approval == "Approved") {
          $approved = 2;
          $approved_next = 1;
          $date_approved = $DateTimeNow;
          $status_text = "For Approval by the Academic Coordinator";
        } elseif($event_request_approval == "Pending Approval") {
          $approved = 1;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Pending Approval by the PSMO";
        } elseif($event_request_approval == "Reject") {
          $approved = 3;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Rejected by the PSMO";
        }
        $data = [
          'psmo_sign' => $approved,
          'psmo_sign_date' => $date_approved,
          'status' => $status_text,
          'psmo_remarks' => $event_request_approval_remarks,
          'acad_coordinator_sign' => $approved_next
        ];
        break;

      case "Academic Coordinator":
        //code block
        if($event_request_approval == "Approved") {
          $approved = 2;
          $approved_next = 1;
          $date_approved = $DateTimeNow;
          $status_text = "For Approval by the OSA Coordinator";
        } elseif($event_request_approval == "Pending Approval") {
          $approved = 1;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Pending Approval by the Academic Coordinator";
        } elseif($event_request_approval == "Reject") {
          $approved = 3;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Rejected by the Academic Coordinator";
        }
        $data = [
          'acad_coordinator_sign' => $approved,
          'acad_coordinator_sign_date' => $date_approved,
          'status' => $status_text,
          'acad_coordinator_remarks' => $event_request_approval_remarks,
          'osa_sign' => $approved_next
        ];
        break;

      case "OSA Coordinator":
        //code block
        if($event_request_approval == "Approved") {
          $approved = 2;
          $approved_next = 1;
          $date_approved = $DateTimeNow;
          $status_text = "For Approval by the Campus Manager";
        } elseif($event_request_approval == "Pending Approval") {
          $approved = 1;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Pending Approval the by OSA Coordinator";
        } elseif($event_request_approval == "Reject") {
          $approved = 3;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Rejected by the OSA Coordinator";
        }
        $data = [
          'osa_sign' => $approved,
          'osa_sign_date' => $date_approved,
          'status' => $status_text,
          'osa_remarks' => $event_request_approval_remarks,
          'campus_manager_sign' => $approved_next
        ];
        break;
      
      case "Campus Manager":
        //code block;
        if($event_request_approval == "Approved") {
          $approved = 2;
          $approved_next = 1;
          $date_approved = $DateTimeNow;
          $status_text = "For Approval by the Director for Academic";
        } elseif($event_request_approval == "Pending Approval") {
          $approved = 1;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Pending Approval by the Campus Manager";
        } elseif($event_request_approval == "Reject") {
          $approved = 3;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Rejected by the Campus Manager";
        }
        $data = [
          'campus_manager_sign' => $approved,
          'campus_manager_sign_date' => $date_approved,
          'status' => $status_text,
          'campus_manager_remarks' => $event_request_approval_remarks,
          'dir_acad_sign' => $approved_next
        ];
        break;

      case "Director for Academic":
        //code block;
        if($event_request_approval == "Approved") {
          $approved = 2;
          $approved_next = 1;
          $date_approved = $DateTimeNow;
          $status_text = "For Approval by the Director for Administration";
        } elseif($event_request_approval == "Pending Approval") {
          $approved = 1;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Pending Approval by the Director for Academic";
        } elseif($event_request_approval == "Reject") {
          $approved = 3;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Rejected by the Director for Academic";
        }
        $data = [
          'dir_acad_sign' => $approved,
          'dir_acad_sign_date' => $date_approved,
          'status' => $status_text,
          'dir_acad_remarks' => $event_request_approval_remarks,
          'dir_admin_sign' => $approved_next
        ];
        break;

      case "Director for Administration":
        //code block;
        if($event_request_approval == "Approved") {
          $approved = 2;
          $approved_next = 1;
          $date_approved = $DateTimeNow;
          $status_text = "For Approval by the President";
        } elseif($event_request_approval == "Pending Approval") {
          $approved = 1;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Pending Approval by the Director for Administration";
        } elseif($event_request_approval == "Reject") {
          $approved = 3;
          $approved_next = 0;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Rejected by the Director for Administration";
        }
        $data = [
          'dir_admin_sign' => $approved,
          'dir_admin_sign_date' => $date_approved,
          'status' => $status_text,
          'dir_admin_remarks' => $event_request_approval_remarks,
          'pres_sign' => $approved_next
        ];
        break;

      case "President":
        //code block;
        if($event_request_approval == "Approved") {
          $approved = 2;
          $date_approved = $DateTimeNow;
          $status_text = "Approved by the President [" . $date_approved . " ]";
        } elseif($event_request_approval == "Pending Approval") {
          $approved = 1;
         
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Pending Approval by the President [" . $date_approved . " ]";
        } elseif($event_request_approval == "Reject") {
          $approved = 3;
          $date_approved = "0000-00-00 00:00:00";
          $status_text = "Rejected by the President [" . $date_approved . " ]";
        }
        $data = [
          'pres_sign' => $approved,
          'pres_sign_date' => $date_approved,
          'status' => $status_text,
          'pres_remarks' => $event_request_approval_remarks,
        ];
        break;

      default:
        //code block
    }//end of switch

    $update_AppsModel = new Employee_model();
    $tablename = "event_request";
    $fieldname = "recid_event_request";
    $value = $recid_event_request;
    $status_update = $update_AppsModel->update_one_parameter($tablename,$fieldname,$value,$data);	
    if($status_update) {
      $status = true;
      $return_msg = "Record Successfully Updated";
    } else {
      $status = false;
      $return_msg = "Error Updating Record";
    }

    $result_ajax = array(   
      "role_sign_as" => $eventrequest_role_sign_as,
      "status" => $status,
      "return_msg" => $return_msg 
    );
    echo json_encode($result_ajax);
  }//end of function

  //====================================================================================================
  //SPACER=> Display Form From Data List Menu - Start
  //====================================================================================================

  function eventrequest_approval() {
    if ($this->request->isAJAX()) {
      $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING);

      $recid_event_request = service('request')->getPost('recid_event_request',FILTER_SANITIZE_STRING);
      $role_sign_as = service('request')->getPost('role_sign_as',FILTER_SANITIZE_STRING);

      $approved_value = service('request')->getPost('approved_value',FILTER_SANITIZE_STRING);
    }//end isAJAX  

    $get_AppsModel = new Employee_model();
    $tablename = "event_request";
    $fieldname = "recid_event_request";
    $value = $recid_event_request;
    $status_get = $get_AppsModel->checkget_one_parameter($tablename,$fieldname,$value);	
    if($status_get) {
      $data = [
        'apps_username' => $apps_username,
  
        'recid_event_request' => $recid_event_request,

        'event_level_ref' => $status_get['event_level_ref'],
        'event_dept' => $status_get['event_dept'],
        'event_acty_title' => $status_get['event_acty_title'],
        'event_acty_theme' => $status_get['event_acty_theme'],
        'event_acty_obj' => $status_get['event_acty_obj'],
        'event_nature_acty' => $status_get['event_nature_acty'],
        'event_date_from_text' => $status_get['event_date_from_text'],
        'event_date_to_text' => $status_get['event_date_to_text'],
        'event_no_days' => $status_get['event_no_days'],
        'event_time_from_text' => $status_get['event_time_from_text'],
        'event_time_to_text' => $status_get['event_time_to_text'],
        'event_venue_acty' => $status_get['event_venue_acty'],
        'event_participant' => $status_get['event_participant'],
        'event_in_charge' => $status_get['event_in_charge'],
        'event_contact_num' => $status_get['event_contact_num'],

        'event_actvty_speaker' => $status_get['event_actvty_speaker'],
        'event_actvty_company_prospect' => $status_get['event_actvty_company_prospect'],
        'event_actvty_company_person' => $status_get['event_actvty_company_person'],
        'event_actvty_company_person_contact' => $status_get['event_actvty_company_person_contact'],
        'event_support_letter' => $status_get['event_support_letter'],
        'event_support_letter_attach' => $status_get['event_support_letter_attach'],

        'event_request_with_fee' => $status_get['event_request_with_fee'],
        'event_wfee_student_funded' => $status_get['event_wfee_student_funded'],
        'event_wfee_student_funded_amount' => $status_get['event_wfee_student_funded_amount'],
        'event_wfee_student_funded_remarks' => $status_get['event_wfee_student_funded_remarks'],

        'event_wfee_school_funded' => $status_get['event_wfee_school_funded'],
        'event_wfee_school_funded_amount' => $status_get['event_wfee_school_funded_amount'],
        'event_wfee_school_funded_remarks' => $status_get['event_wfee_school_funded_remarks'],

        'event_wfee_org_funded' => $status_get['event_wfee_org_funded'],
        'event_wfee_org_funded_amount' => $status_get['event_wfee_org_funded_amount'],
        'event_wfee_org_funded_remarks' => $status_get['event_wfee_org_funded_remarks'],

        'event_wfee_ext_funded' => $status_get['event_wfee_ext_funded'],
        'event_wfee_ext_funded_amount' => $status_get['event_wfee_ext_funded_amount'],
        'event_wfee_ext_funded_remarks' => $status_get['event_wfee_ext_funded_remarks'],

        'event_wfee_fund_raising' => $status_get['event_wfee_fund_raising'],
        'event_wfee_fund_raising_amount' => $status_get['event_wfee_fund_raising_amount'],
        'event_wfee_fund_raising_remarks' => $status_get['event_wfee_fund_raising_remarks'],

        'event_request_transpo' => $status_get['event_request_transpo'],
        'event_transpo_personal' => $status_get['event_transpo_personal'],
        'event_transpo_personal_details' => $status_get['event_transpo_personal_details'],

        'event_transpo_private' => $status_get['event_transpo_private'],
        'event_transpo_private_details' => $status_get['event_transpo_private_details'],

        'event_transpo_school' => $status_get['event_transpo_school'],
        'event_transpo_school_details' => $status_get['event_transpo_school_details'],

        'event_transpo_solicited' => $status_get['event_transpo_solicited'],
        'event_transpo_solicited_details' => $status_get['event_transpo_solicited_details'],

        'event_person_venue_request' => $status_get['event_person_venue_request'],
        'event_person_service_vehicle' => $status_get['event_person_service_vehicle'],
        'event_person_facequip' => $status_get['event_person_facequip'],
        'event_person_incharge' => $status_get['event_person_incharge'],

        'approval_remarks' => $status_get['approval_remarks'],
        'event_inside_attach' => $status_get['event_inside_attach'],

        'course_adviser_remarks' => $status_get['course_adviser_remarks'],
        'course_coordinator_remarks' => $status_get['course_coordinator_remarks'],
        'psmo_remarks' => $status_get['psmo_remarks'],
        'acad_coordinator_remarks' => $status_get['acad_coordinator_remarks'],
        'osa_remarks' => $status_get['osa_remarks'],
        'campus_manager_remarks' => $status_get['campus_manager_remarks'],
        'dir_acad_remarks' => $status_get['dir_acad_remarks'],
        'dir_admin_remarks' => $status_get['dir_admin_remarks'],
        'pres_remarks' => $status_get['pres_remarks'],

        'role_sign_as' => $role_sign_as,
        'approved_value' => $approved_value
        //end of user access
      ];

    } else {
        $data = [];
    }//end if

    return view('employee/event_approval/event_request_approval',$data);  
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

  function table_sports_activity_list() {
    if ($this->request->isAJAX()) {
      $event_request_recid = service('request')->getPost('event_request_recid',FILTER_SANITIZE_STRING);
      $event_title = service('request')->getPost('event_title',FILTER_SANITIZE_STRING);
    }//end isAJAX

    $Get_AppsModel = new Employee_model();
      
    $GetTotal_sports_activity_list = $Get_AppsModel->GetTotal_sports_activity_list($event_request_recid);
    $GetFiltered_sports_activity_list = $Get_AppsModel->GetFiltered_sports_activity_list($event_request_recid);
    $status_GetList = $Get_AppsModel->GetList_sports_activity_list($event_request_recid);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 

          $i++;
          $row = array();
          $row[] = $i;         
                  $row[] = '<font color="'.$text_color.'">'.$value->sports_title.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->sports_type.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->group_no.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->group_unit.'</font>';
                    
          
                  $row[] = '
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">

                        <button class="dropdown-item view_details_sports_activity" type="button"  
                            recid_sports_activity="'.$value->recid_sports_activity.'"  recid_event_request="'.$value->recid_event_request.'"
                            sports_title="'.$value->sports_title.'" sports_type="'.$value->sports_type.'" 
                            group_no="'.$value->group_no.'" group_unit="'.$value->group_unit.'" event_title="'.$event_title.'" 
                                                              
                            >View Details 
                        </button>


                        <button class="dropdown-item remove_sports_activity" type="button"  
                            recid_sports_activity="'.$value->recid_sports_activity.'" 
                            sports_title="'.$value->sports_title.'" 
                                                              
                            >Remove
                        </button>

                    </div>
                </div>
            ';
                        
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $GetTotal_sports_activity_list->ID,
            "recordsFiltered" => $GetFiltered_sports_activity_list->ID,
            "data" => $result
        );
    echo json_encode($output);
  }//end of function

  //====================================================================================================
  //SPACER=> 
  //====================================================================================================

    function table_sports_activity_details_list() {
      if ($this->request->isAJAX()) {
        $recid_event_request = service('request')->getPost('recid_event_request',FILTER_SANITIZE_STRING);
        $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING);
        $sports_title = service('request')->getPost('sports_title',FILTER_SANITIZE_STRING);
        $group_no = service('request')->getPost('group_no',FILTER_SANITIZE_STRING);
        $group_unit = service('request')->getPost('group_unit',FILTER_SANITIZE_STRING);
        $event_title = service('request')->getPost('event_title',FILTER_SANITIZE_STRING);
      }//end isAJAX
  
      $Get_AppsModel = new Employee_model();
        
      $GetTotal_sports_activity_details_list = $Get_AppsModel->GetTotal_sports_activity_details_list($recid_sports_activity);
      $GetFiltered_sports_activity_details_list = $Get_AppsModel->GetFiltered_sports_activity_details_list($recid_sports_activity);
      $status_GetList = $Get_AppsModel->GetList_sports_activity_details_list($recid_sports_activity);
  
      $result = array();
      $i = $_POST['start'];
                    
      foreach($status_GetList as $value) { 
            $larawan = '<img src="' . base_url() . '/public/images/team_logo/' .$value->logo.'" class="rounded" width="30" height="30" />';
            $i++;
            $row = array();
            $row[] = $i;         
            $row[] = $larawan;
            $row[] = '<font color="'.$text_color.'">'.$value->team_name.'</font>';
            $row[] = '<font color="'.$text_color.'">'.$value->coach_name.'</font>';
            $row[] = '<font color="'.$text_color.'">'.$value->wins.'</font>';
            $row[] = '<font color="'.$text_color.'">'.$value->loss.'</font>';
            $row[] = '<font color="'.$text_color.'">'.$value->percentage.'</font>';
            
                    $row[] = '
                  <div class="btn-group">
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
  
                          <button class="dropdown-item details_per_team" type="button"  
                              recid_sports_activity_details="'.$value->recid_sports_activity_details.'"  
                              recid_sports_activity="'.$value->recid_sports_activity.'" team_name="'.$value->team_name.'"
                              
                              recid_event_request="'.$recid_event_request.'" sports_title="'.$sports_title.'"
                              group_no="'.$group_no.'" group_unit="'.$group_unit.'" event_title="'.$event_title.'"
                                                                
                              >View Team
                          </button>
  
  
                          <button class="dropdown-item remove_team" type="button"  
                              recid_sports_activity_details="'.$value->recid_sports_activity_details.'"  
                                                                
                              >Remove Team
                          </button>
  
                      </div>
                  </div>
              ';
                          
            //--
            $result[] = $row;         
      }//end foreach
  
      $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $GetTotal_sports_activity_details_list->ID,
              "recordsFiltered" => $GetFiltered_sports_activity_details_list->ID,
              "data" => $result
          );
      echo json_encode($output);
    }//end of function

  //====================================================================================================
  //SPACER=> Display Form From Data List Menu - End
  //====================================================================================================
 
  function submit_addsports_data() {
    if ($this->request->isAJAX()) {
      //apps user login
      $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING);
      $recid_event_request = service('request')->getPost('recid_event_request',FILTER_SANITIZE_STRING);
      
      //data inputs -start
      $sports_title = service('request')->getPost('addsports_title',FILTER_SANITIZE_STRING);
      $sports_type = service('request')->getPost('addsports_type',FILTER_SANITIZE_STRING);
      $group_no = service('request')->getPost('addsports_group',FILTER_SANITIZE_STRING);
      $group_unit = service('request')->getPost('addsports_unit',FILTER_SANITIZE_STRING);
      //data inputs -end

      $recaptchaResponse = service('request')->getPost('g-recaptcha-response',FILTER_SANITIZE_STRING);
    }//end isAJAX

    //File Upload Image
    //$file_image_request_letter = $this->request->getFile('file-request_letter');
    //$image_filename = $file_image_request_letter->getName();
    //$image_size = $file_image_request_letter->getSize();
    //$file_image_request_letter->move('./public/images/letter_attach', $image_filename);

    //reCaptcha v2 Google - Start
        //$recaptchaResponse = service('request')->getPost('g-recaptcha-response',FILTER_SANITIZE_STRING);
        
        //Localhost
        //$secret='6LerMCEbAAAAABKu1g2b-TpWbfAibKL9tBKlYtAJ';

        //Domain
        $secret='6LfBeFIdAAAAAMiHOPQZHpD_Nq9ADpwR7j7wvzyS';

        $credential = array(
                'secret' => $secret,
                'response' => $recaptchaResponse
            );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status= json_decode($response, true);
        
        if($status['success']){ 
          //Dito ang code pag Okay ang captcha

          //get date -start =====
              $DateTimeNow = new Time('now'); //get current DateTime
          
              $time = Time::parse($DateTimeNow); //date and time
              $date_ngayun =  $time->toDateString(); // 2016-03-09 date lang ang value
      
              //get date in format Jan 12, 2022
                  $text_date = date("M d, Y ");
      
              //format date to September 01, 2023
                  $text_date_whole = date("F d, Y ");
      
              //get Time in 12 hour format
                  $time_text = date('h:i A', strtotime($DateTimeNow));
      
              //Get the year of the date
                  $year = date("Y");

              //format date from  y-m-d to September 01, 2023
                //$request_date_from_text = date('F d, Y ',strtotime($event_request_date_from));
                //$request_date_to_text = date('F d, Y ',strtotime($event_request_date_to));
          
              //Format from 24 Format to 12 format  
                //$time_from = date('h:i A', strtotime($event_request_time_from));
                //$time_to = date('h:i A', strtotime($event_request_time_to));
          //get date -end ====

          $data = [
            'recid_event_request' => $recid_event_request,
            'sports_title' => $sports_title,
            'sports_type' => $sports_type,
            'group_no' => $group_no,
            'group_unit' => $group_unit,
            
            'encoded_by' => $apps_username,
            'username_action' => "add",
            'username_date' => $DateTimeNow
          ];
      
          $insert_AppsModel = new Employee_model();
          $tablename = "sports_activity";
          $status_insert = $insert_AppsModel->insert_data($tablename,$data);	
          if($status_insert) {
            $lastinserted_id = $status_insert;
            $status = true;
            $return_msg = "Record Successfully Added";
          } else {
            $status = false;
            $return_msg = "Error Adding Record";
          }
          

        }else {
          //error captcha
          $status = false;
          $return_msg = "Please check [ I'm not a robot ]";
        }
    //reCaptcha v2 Google - End


    $result_ajax = array(   
      "status" => $status,
      "return_msg" => $return_msg
    );
    echo json_encode($result_ajax);

  }//end of function

  //====================================================================================================
  //SPACER=> Display Form From Data List Menu - End
  //====================================================================================================

  function submit_addteam_data() {
    if ($this->request->isAJAX()) {
      //apps user login
      $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING);
      $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING);
      $sports_type = service('request')->getPost('sports_type',FILTER_SANITIZE_STRING);      
      
      //data inputs -start
      $team_name = service('request')->getPost('addteam_teamname',FILTER_SANITIZE_STRING);
      $coach_name = service('request')->getPost('addteam_teamcoach',FILTER_SANITIZE_STRING);
      //data inputs -end

      $recaptchaResponse = service('request')->getPost('g-recaptcha-response',FILTER_SANITIZE_STRING);
    }//end isAJAX

    //File Upload Image
    //$file_image_request_letter = $this->request->getFile('file-request_letter');
    //$image_filename = $file_image_request_letter->getName();
    //$image_size = $file_image_request_letter->getSize();
    //$file_image_request_letter->move('./public/images/letter_attach', $image_filename);

    //reCaptcha v2 Google - Start
        //$recaptchaResponse = service('request')->getPost('g-recaptcha-response',FILTER_SANITIZE_STRING);
        
        //Localhost
        //$secret='6LerMCEbAAAAABKu1g2b-TpWbfAibKL9tBKlYtAJ';

        //Domain
        $secret='6LfBeFIdAAAAAMiHOPQZHpD_Nq9ADpwR7j7wvzyS';

        $credential = array(
                'secret' => $secret,
                'response' => $recaptchaResponse
            );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status= json_decode($response, true);
        
        if($status['success']){ 
          //Dito ang code pag Okay ang captcha

          //get date -start =====
              $DateTimeNow = new Time('now'); //get current DateTime
          
              $time = Time::parse($DateTimeNow); //date and time
              $date_ngayun =  $time->toDateString(); // 2016-03-09 date lang ang value
      
              //get date in format Jan 12, 2022
                  $text_date = date("M d, Y ");
      
              //format date to September 01, 2023
                  $text_date_whole = date("F d, Y ");
      
              //get Time in 12 hour format
                  $time_text = date('h:i A', strtotime($DateTimeNow));
      
              //Get the year of the date
                  $year = date("Y");

              //format date from  y-m-d to September 01, 2023
                //$request_date_from_text = date('F d, Y ',strtotime($event_request_date_from));
                //$request_date_to_text = date('F d, Y ',strtotime($event_request_date_to));
          
              //Format from 24 Format to 12 format  
                //$time_from = date('h:i A', strtotime($event_request_time_from));
                //$time_to = date('h:i A', strtotime($event_request_time_to));
          //get date -end ====

          if($sports_type == "Basketball") {
            $sports_logo = "basketball_logo.png";
          }
          if($sports_type == "Volleyball") {
            $sports_logo = "volleyball_logo.png";
          }

          $data = [
            'recid_sports_activity' => $recid_sports_activity,
            'team_name' => $team_name,
            'coach_name' => $coach_name,
            'logo' => $sports_logo,

            'wins' => "0",
            'loss' => "0",
            'percentage' => ".0",
            
            'encoded_by' => $apps_username,
            'username_action' => "add",
            'username_date' => $DateTimeNow
          ];
      
          $insert_AppsModel = new Employee_model();
          $tablename = "sports_activity_details";
          $status_insert = $insert_AppsModel->insert_data($tablename,$data);	
          if($status_insert) {
            $lastinserted_id = $status_insert;
            $status = true;
            $return_msg = "Record Successfully Added";
          } else {
            $status = false;
            $return_msg = "Error Adding Record";
          }
          

        }else {
          //error captcha
          $status = false;
          $return_msg = "Please check [ I'm not a robot ]";
        }
    //reCaptcha v2 Google - End


    $result_ajax = array(   
      "status" => $status,
      "return_msg" => $return_msg
    );
    echo json_encode($result_ajax);
  }//end of function

  //====================================================================================================
  //SPACER=> Display Form From Data List Menu - End
  //====================================================================================================

  function table_detail_perteam_list() {
    if ($this->request->isAJAX()) {
      $recid_sports_activity_details = service('request')->getPost('recid_sports_activity_details',FILTER_SANITIZE_STRING);
      
    }//end isAJAX

    $Get_AppsModel = new Employee_model();
      
    $GetTotal_players_detail_list = $Get_AppsModel->GetTotal_players_detail_list($recid_sports_activity_details);
    $GetFiltered_players_detail_list = $Get_AppsModel->GetFiltered_players_detail_list($recid_sports_activity_details);
    $status_GetList = $Get_AppsModel->GetList_players_detail_list($recid_sports_activity_details);

    $result = array();
    $i = $_POST['start'];
                  
    foreach($status_GetList as $value) { 
        $player_name = $value->player_lname . ", " . $value->player_fname . " " . $value->player_suffix;
          $i++;
          $row = array();
          $row[] = $i;         
                  $row[] = '<font color="'.$text_color.'">'.$player_name.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->player_position.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->player_height.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->player_course.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->player_section.'</font>';
                  $row[] = '<font color="'.$text_color.'">'.$value->player_status.'</font>';
          
                  $row[] = '
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">

                        <button class="dropdown-item remove_team" type="button"  
                            recid_sports_activity_details="'.$recid_sports_activity_details.'"  
                                                              
                            >Edit Player
                        </button>

                    </div>
                </div>
            ';
                        
          //--
          $result[] = $row;         
    }//end foreach

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $GetTotal_players_detail_list->ID,
            "recordsFiltered" => $GetFiltered_players_detail_list->ID,
            "data" => $result
        );
    echo json_encode($output);
  }//end of function

//====================================================================================================
//SPACER=> Display Form From Data List Menu - End
//====================================================================================================

function submit_addplayer_data() {
  if ($this->request->isAJAX()) {
    //apps user login
    $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING);
    $recid_sports_activity_details = service('request')->getPost('recid_sports_activity_details',FILTER_SANITIZE_STRING);
    
    //data inputs -start
    $addplayer_fname = service('request')->getPost('addplayer_fname',FILTER_SANITIZE_STRING);
    $addplayer_mname = service('request')->getPost('addplayer_mname',FILTER_SANITIZE_STRING);
    $addplayer_lname = service('request')->getPost('addplayer_lname',FILTER_SANITIZE_STRING);
    $addplayer_suffix = service('request')->getPost('addplayer_suffix',FILTER_SANITIZE_STRING);
    $addplayer_position = service('request')->getPost('addplayer_position',FILTER_SANITIZE_STRING);
    $addplayer_height = service('request')->getPost('addplayer_height',FILTER_SANITIZE_STRING);
    $addplayer_course = service('request')->getPost('addplayer_course',FILTER_SANITIZE_STRING);
    $addplayer_section = service('request')->getPost('addplayer_section',FILTER_SANITIZE_STRING);
    $addplayer_status = service('request')->getPost('addplayer_status',FILTER_SANITIZE_STRING);
    //data inputs -end

    $recaptchaResponse = service('request')->getPost('g-recaptcha-response',FILTER_SANITIZE_STRING);
  }//end isAJAX

  //File Upload Image
  //$file_image_request_letter = $this->request->getFile('file-request_letter');
  //$image_filename = $file_image_request_letter->getName();
  //$image_size = $file_image_request_letter->getSize();
  //$file_image_request_letter->move('./public/images/letter_attach', $image_filename);

  //reCaptcha v2 Google - Start
      //$recaptchaResponse = service('request')->getPost('g-recaptcha-response',FILTER_SANITIZE_STRING);
      
      //Localhost
      //$secret='6LerMCEbAAAAABKu1g2b-TpWbfAibKL9tBKlYtAJ';

      //Domain
      $secret='6LfBeFIdAAAAAMiHOPQZHpD_Nq9ADpwR7j7wvzyS';

      $credential = array(
              'secret' => $secret,
              'response' => $recaptchaResponse
          );

      $verify = curl_init();
      curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
      curl_setopt($verify, CURLOPT_POST, true);
      curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
      curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($verify);

      $status= json_decode($response, true);
      
      if($status['success']){ 
        //Dito ang code pag Okay ang captcha

        //get date -start =====
            $DateTimeNow = new Time('now'); //get current DateTime
        
            $time = Time::parse($DateTimeNow); //date and time
            $date_ngayun =  $time->toDateString(); // 2016-03-09 date lang ang value
    
            //get date in format Jan 12, 2022
                $text_date = date("M d, Y ");
    
            //format date to September 01, 2023
                $text_date_whole = date("F d, Y ");
    
            //get Time in 12 hour format
                $time_text = date('h:i A', strtotime($DateTimeNow));
    
            //Get the year of the date
                $year = date("Y");

            //format date from  y-m-d to September 01, 2023
              //$request_date_from_text = date('F d, Y ',strtotime($event_request_date_from));
              //$request_date_to_text = date('F d, Y ',strtotime($event_request_date_to));
        
            //Format from 24 Format to 12 format  
              //$time_from = date('h:i A', strtotime($event_request_time_from));
              //$time_to = date('h:i A', strtotime($event_request_time_to));
        //get date -end ====

        $data = [
          'recid_sports_activity_details' => $recid_sports_activity_details,
          'player_fname' => $addplayer_fname,
          'player_mname' => $addplayer_mname,
          'player_lname' => $addplayer_lname,
          'player_suffix' => $addplayer_suffix,
          'player_position' => $addplayer_position,
          'player_height' => $addplayer_height,
          'player_course' => $addplayer_course,
          'player_section' => $addplayer_section,
          'player_status' => $addplayer_status,
          
          'encoded_by' => $apps_username,
          'username_action' => "add",
          'username_date' => $DateTimeNow
        ];
    
        $insert_AppsModel = new Employee_model();
        $tablename = "player_perteam";
        $status_insert = $insert_AppsModel->insert_data($tablename,$data);	
        if($status_insert) {
          $lastinserted_id = $status_insert;
          $status = true;
          $return_msg = "Record Successfully Added";
        } else {
          $status = false;
          $return_msg = "Error Adding Record";
        }
        

      }else {
        //error captcha
        $status = false;
        $return_msg = "Please check [ I'm not a robot ]";
      }
  //reCaptcha v2 Google - End


  $result_ajax = array(   
    "status" => $status,
    "return_msg" => $return_msg
  );
  echo json_encode($result_ajax);
}//end of function

//====================================================================================================
//SPACER=> Display Form From Data List Menu - End
//====================================================================================================

function table_sports_schedule_list() {
  if ($this->request->isAJAX()) {
    $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING);
    
  }//end isAJAX

  $Get_AppsModel = new Employee_model();
    
  $GetTotal_sports_schedule_list = $Get_AppsModel->GetTotal_sports_schedule_list($recid_sports_activity);
  $GetFiltered_sports_schedule_list = $Get_AppsModel->GetFiltered_sports_schedule_list($recid_sports_activity);
  $status_GetList = $Get_AppsModel->GetList_sports_schedule_list($recid_sports_activity);

  $result = array();
  $i = $_POST['start'];
                
  foreach($status_GetList as $value) { 
        
        //Check if Game is Finish
        if($value->finish_match == "Yes") {
            //get team scores
            $team1_scores = $value->match_team1_scores;
            $team2_scores = $value->match_team2_scores;

            $team1 = $value->match_team1_name . "  [ " . $team1_scores . " ]";
            $team2 = $value->match_team2_name . "  [ " . $team2_scores . " ]";

            if($team1_scores > $team2_scores) {
              $text_color1 = "#008000";
            } else {
              $text_color2 = "#008000"; //#E43009
            }
        } else {
          $team1 = $value->match_team1_name;
          $team2 = $value->match_team2_name;
        } //end if finish match


        $larawan1 = '<img src="' . base_url() . '/public/images/team_logo/' .$value->match_team1_logo.'" class="rounded" width="30" height="30" />';
        $larawan2 = '<img src="' . base_url() . '/public/images/team_logo/' .$value->match_team2_logo.'" class="rounded" width="30" height="30" />';
        $versus = "vs";
        $i++;
        $row = array();
        $row[] = $i;         
        //$row[] = $larawan;
        $row[] = $larawan1;
        $row[] = '<font color="'.$text_color1.'">'.$team1.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$versus.'</font>';
        $row[] = $larawan2;
        $row[] = '<font color="'.$text_color2.'">'.$team2.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->match_date_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->match_time_text.'</font>';
        $row[] = '<font color="'.$text_color.'">'.$value->match_venue.'</font>';
        
        if($value->finish_match == "Yes") {
          $row[] = 'Game Finish';

        } else {
          $row[] = '
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">

                        <button class="dropdown-item details_per_team" type="button"  
                            recid_sports_activity_details="'.$value->recid_sports_activity_details.'"  
                            recid_sports_activity="'.$value->recid_sports_activity.'" team_name="'.$value->team_name.'"
                            
                            recid_event_request="'.$recid_event_request.'" sports_title="'.$sports_title.'"
                            group_no="'.$group_no.'" group_unit="'.$group_unit.'" event_title="'.$event_title.'"
                                                              
                            >Edit Schedule
                        </button>


                        <button class="dropdown-item remove_team" type="button"  
                            recid_sports_activity_details="'.$value->recid_sports_activity_details.'"  
                                                              
                            >Remove Schedule
                        </button>

                    </div>
                </div>
          ';
        } //end if finish match
                      
        //--
        $result[] = $row;         
  }//end foreach

  $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $GetTotal_sports_schedule_list->ID,
          "recordsFiltered" => $GetFiltered_sports_schedule_list->ID,
          "data" => $result
      );
  echo json_encode($output);
}//end of function

//====================================================================================================
//SPACER=> Display Form From Data List Menu - End
//====================================================================================================

function submit_addsched_data() {
  if ($this->request->isAJAX()) {
    //apps user login
    $apps_username = service('request')->getPost('apps_username',FILTER_SANITIZE_STRING);
    $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING);
    
    //data inputs -start
    $addsched_team1 = service('request')->getPost('addsched_team1',FILTER_SANITIZE_STRING);
    $addsched_team2 = service('request')->getPost('addsched_team2',FILTER_SANITIZE_STRING);
    $addsched_date = service('request')->getPost('addsched_date',FILTER_SANITIZE_STRING);
    $addsched_time = service('request')->getPost('addsched_time',FILTER_SANITIZE_STRING);
    $addsched_venue = service('request')->getPost('addsched_venue',FILTER_SANITIZE_STRING);

    $addsched_ref1 = service('request')->getPost('addsched_ref1',FILTER_SANITIZE_STRING);
    $addsched_ref2 = service('request')->getPost('addsched_ref2',FILTER_SANITIZE_STRING);
    $addsched_ref3 = service('request')->getPost('addsched_ref3',FILTER_SANITIZE_STRING);
    $addsched_umpire = service('request')->getPost('addsched_umpire',FILTER_SANITIZE_STRING);
    $addsched_scorer = service('request')->getPost('addsched_scorer',FILTER_SANITIZE_STRING);
    //data inputs -end

    $recaptchaResponse = service('request')->getPost('g-recaptcha-response',FILTER_SANITIZE_STRING);
  }//end isAJAX

  //File Upload Image
  //$file_image_request_letter = $this->request->getFile('file-request_letter');
  //$image_filename = $file_image_request_letter->getName();
  //$image_size = $file_image_request_letter->getSize();
  //$file_image_request_letter->move('./public/images/letter_attach', $image_filename);

  //reCaptcha v2 Google - Start
      //$recaptchaResponse = service('request')->getPost('g-recaptcha-response',FILTER_SANITIZE_STRING);
      
      //Localhost
      //$secret='6LerMCEbAAAAABKu1g2b-TpWbfAibKL9tBKlYtAJ';

      //Domain
      $secret='6LfBeFIdAAAAAMiHOPQZHpD_Nq9ADpwR7j7wvzyS';

      $credential = array(
              'secret' => $secret,
              'response' => $recaptchaResponse
          );

      $verify = curl_init();
      curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
      curl_setopt($verify, CURLOPT_POST, true);
      curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
      curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($verify);

      $status= json_decode($response, true);
      
      if($status['success']){ 
        //Dito ang code pag Okay ang captcha

        //get date -start =====
            $DateTimeNow = new Time('now'); //get current DateTime
        
            $time = Time::parse($DateTimeNow); //date and time
            $date_ngayun =  $time->toDateString(); // 2016-03-09 date lang ang value
    
            //get date in format Jan 12, 2022
                $text_date = date("M d, Y ");
    
            //format date to September 01, 2023
                $text_date_whole = date("F d, Y ");
    
            //get Time in 12 hour format
                $time_text = date('h:i A', strtotime($DateTimeNow));
    
            //Get the year of the date
                $year = date("Y");

            //format date from  y-m-d to September 01, 2023
              $date_text = date('F d, Y ',strtotime($addsched_date));
              //$request_date_to_text = date('F d, Y ',strtotime($event_request_date_to));
        
            //Format from 24 Format to 12 format  
              $time_text = date('h:i A', strtotime($addsched_time));
              //$time_to = date('h:i A', strtotime($event_request_time_to));
        //get date -end ====

        $get_AppsModel = new Employee_model();
        $tablename = "sports_activity_details";
        $fieldname = "recid_sports_activity_details";
        $value1 = $addsched_team1;
        $status_get = $get_AppsModel->checkget_one_parameter($tablename,$fieldname,$value1);	
        if($status_get) {
          //$team1_recid_sports_activity_details = $status_get['recid_sports_activity_details'];
          $team1_name = $status_get['team_name'];
          $team1_logo = $status_get['logo'];
        } else {
          $team1_recid_sports_activity_details = "";
          $team1_name = "Not Found";
          $team1_logo = "";
        }

        $value2 = $addsched_team2;
        $status_get2 = $get_AppsModel->checkget_one_parameter($tablename,$fieldname,$value2);	
        if($status_get2) {
          //$team2_recid_sports_activity_details = $status_get['recid_sports_activity_details'];
          $team2_name = $status_get2['team_name'];
          $team2_logo = $status_get2['logo'];
        } else {
          $team2_recid_sports_activity_details = "";
          $team2_name = "Not Found";
          $team2_logo = "";
        }

        $data = [
          'recid_sports_activity' => $recid_sports_activity,
          'match_team1_name' => $team1_name,
          'match_team2_name' => $team2_name,
          'match_team1_logo' => $team1_logo,
          'match_team2_logo' => $team2_logo,
          'match_date' => $addsched_date,
          'match_date_text' => $date_text,
          'match_time' => $addsched_time,
          'match_time_text' => $time_text,
          'match_venue' => $addsched_venue,
          'match_team1_scores' => 0,
          'match_team2_scores' => 0,
          'ref1_name' => $addsched_ref1,
          'ref2_name' => $addsched_ref2,
          'ref3_name' => $addsched_ref3,
          'umpire_official' => $addsched_umpire,
          'scorer_official' => $addsched_scorer,
         
          'encoded_by' => $apps_username,
          'username_action' => "add",
          'username_date' => $DateTimeNow
        ];
    
        $insert_AppsModel = new Employee_model();
        $tablename = "sports_schedules_team";
        $status_insert = $insert_AppsModel->insert_data($tablename,$data);	
        if($status_insert) {
          $lastinserted_id = $status_insert;

          //Add Player to the Schedule per Team
          //TEAM 1
          //$team1_recid_sports_activity_details = $status_get['recid_sports_activity_details'];
          //$team1_name = $status_get['team_name'];
          $tablename = "player_perteam";
          $fieldname = "recid_sports_activity_details";
          $value = $addsched_team1;
          //$ctr = 0;
          $status_getplayer1 = $insert_AppsModel->checkget_one_parameter_return_more($tablename,$fieldname,$value);	
          if($status_getplayer1) {
            foreach($status_getplayer1 as $value) {
              //$ctr++;
              $player_name = $value['player_fname'] . " " . $value['player_lname'];
              $data1 = [
                'recid_sports_schedules_team' => $lastinserted_id,
                'recid_sports_activity_details' => $addsched_team1,
                'team_name' => $team1_name,
                'recid_player_per_team' => $value['recid_player_per_team'],
                'player_name' => $player_name,
                'player_position' => $value['player_position'],
                'player_height' => $value['player_height']
              ];
              $tablename = "sports_schedules_team_players";
              $status_insert_player1 = $insert_AppsModel->insert_data($tablename,$data1);
            }
          }

          //TEAM 2
          //$team2_recid_sports_activity_details = $status_get['recid_sports_activity_details'];
          //$team2_name = $status_get['team_name'];
          $tablename = "player_perteam";
          $fieldname = "recid_sports_activity_details";
          $value = $addsched_team2;
          $ctr = 0;
          $status_getplayer2 = $insert_AppsModel->checkget_one_parameter_return_more($tablename,$fieldname,$value);	
          if($status_getplayer2) {
            foreach($status_getplayer2 as $value) {
              $ctr++;
              $player_name2 = $value['player_fname'] . " " . $value['player_lname'];
              $data2 = [
                'recid_sports_schedules_team' => $lastinserted_id,
                'recid_sports_activity_details' => $addsched_team2,
                'team_name' => $team2_name,
                'recid_player_per_team' => $value['recid_player_per_team'],
                'player_name' => $player_name2,
                'player_position' => $value['player_position'],
                'player_height' => $value['player_height']
              ];
              $tablename = "sports_schedules_team_players";
              $status_insert_player2 = $insert_AppsModel->insert_data($tablename,$data2);
            }
          }
          

          $status = true;
          $return_msg = "Record Successfully Added";
        } else {
          $status = false;
          $return_msg = "Error Adding Record";
        }
        

      }else {
        //error captcha
        $status = false;
        $return_msg = "Please check [ I'm not a robot ]";
      }
  //reCaptcha v2 Google - End


  $result_ajax = array(   
    "status" => $status,
    "return_msg" => $return_msg
  );
  echo json_encode($result_ajax);
}//end of function

//====================================================================================================
//SPACER=> Display Form From Data List Menu - End
//====================================================================================================

}//end of Employee Controller
