<?php
namespace App\Controllers;

use \CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use \App\Models\Users_model;

//Import package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

//QRCode Generator
use SimpleSoftwareIO\QrCode\Generator;


class Users extends Controller 
{
	public function __construct(){
		helper(['form','url','date']);
    }

    //START OF GLOBAL ====================================================================
        //check if session is empty - START
        function check_session_employee() {
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
        //check if session is empty - END

        //===========================================================================================
        //SPACER ----->
        //===========================================================================================

        //Fill Dropdown - START 
            function Fill_Dropdown_dept() {
                $GetList_Model = new Users_model();
                    $status_GetList = $GetList_Model->getList_dropdown_dept();
                    foreach($status_GetList as $row) {
                        $data[] = array(
                            "recid" => $row['recid_dept'],
                            "dept" => $row['dept'],
                            "desc" => $row['description']
                        );
                    }
                echo json_encode($data);
            }//end of function

            function Fill_Dropdown_user_role() {
                $GetList_Model = new Users_model();
                    $status_GetList = $GetList_Model->getList_dropdown_user_role();
                    foreach($status_GetList as $row) {
                        $data[] = array(
                            "recid" => $row['recid_userrole'],
                            "user_role" => $row['user_role']
                        );
                    }
                echo json_encode($data);
            }//end of function
        //Fill Dropdown - END

        //Get Record - Start =======================================
            function get_dept_single_record() {
                if ($this->request->isAJAX()) {
                    $user_deptid = service('request')->getPost('user_deptid',FILTER_SANITIZE_STRING);
                }//end isAJAX

                $get_AppsModel = new Users_model();
                $tablename = "application_department";
                $fieldname = "recid_dept";
                $value = $user_deptid;
                $get_status = $get_AppsModel->get_single_record_with_one_parameter($tablename,$fieldname,$value);
                if($get_status) {
                    $dept_desc = $get_status['description'];
                }//end of function

                $result_ajax = array(   
                    "dept_desc" => $dept_desc
                );
                echo json_encode($result_ajax);
            }//end of function

        //Get Record - End =========================================
    //END OF GLOBAL =======================================================================

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    function check_email_exist() {
        if ($this->request->isAJAX()) {
            $email_add = service('request')->getPost('email',FILTER_SANITIZE_STRING);
        }

        $Check_AppsModel = new Users_model();
        $check_status = $Check_AppsModel->check_email_exist($email_add);
        if($check_status) {
            $status = true;
        } else {
            $status = false;
        }

        $result_ajax = array(   
            "status" => $status
            //"return_msg" => $return_msg
        );
        echo json_encode($result_ajax);

    }//end of function

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    function check_username_exist() {
        if ($this->request->isAJAX()) {
            $uname = service('request')->getPost('input',FILTER_SANITIZE_STRING);
        }

        $Check_AppsModel = new Users_model();
        $check_status = $Check_AppsModel->check_username_exist($uname);
        if($check_status) {
            $status = true;
        } else {
            $status = false;
        }

        $result_ajax = array(   
            "status" => $status
            //"return_msg" => $return_msg
        );
        echo json_encode($result_ajax);
    }//end of function

    function check_record_exist_singleRec() {
        if ($this->request->isAJAX()) {
            $tablename = service('request')->getPost('tablename',FILTER_SANITIZE_STRING);
            $fieldname = service('request')->getPost('fieldname',FILTER_SANITIZE_STRING);
            $fieldvalue = service('request')->getPost('fieldvalue',FILTER_SANITIZE_STRING);
        }

        $Check_AppsModel = new Users_model();
        $check_status = $Check_AppsModel->check_record_exist_singleRec($tablename,$fieldname,$fieldvalue);
        if($check_status) {
            $status = true;
        } else {
            $status = false;
        }

        $result_ajax = array(   
            "status" => $status
        );
        echo json_encode($result_ajax);
    }//end of function

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    //START OF SETUP / USER LIST
        //Start of Display Table list 
            function table_setup_users_list() {
                if ($this->request->isAJAX()) {
                    $user_deptid = service('request')->getPost('user_deptid',FILTER_SANITIZE_STRING);
                }

                $Get_AppsModel = new Users_model();

                $GetTotal_setup_user_list = $Get_AppsModel->GetTotal_setup_user_list($user_deptid);
                $GetFiltered_setup_user_list = $Get_AppsModel->GetFiltered_setup_user_list($user_deptid);
                $status_GetList = $Get_AppsModel->GetList_setup_user_list($user_deptid);

                $result = array();
                $i = $_POST['start'];
                    
                foreach($status_GetList as $value) {   
                    $account = $value->account_status . " [ ". $value->account_date . " ]"             ;
                    $i++;
                    $row = array();
                    $row[] = $i;   
                    
                    $row[] = '<font color="'.$text_color.'">'.$value->fullname.'</font>';
                    $row[] = '<font color="'.$text_color.'">'.$value->user_role.'</font>';
                    $row[] = '<font color="'.$text_color.'">'.$value->dept.'</font>';
                    $row[] = '<font color="'.$text_color.'">'.$value->account_type.'</font>';
                    $row[] = '<font color="'.$text_color.'">'.$account.'</font>';
                    $row[] = '<font color="'.$text_color.'">'.$value->created_date.'</font>';
                    //$row[] = '<font color="'.$text_color.'">'.$value->qrcode.'</font>';
                    
                    $row[] = '
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
    
                                    <button class="dropdown-item user_edit" type="button"  
                                        recid_user="'.$value->recid_user.'" 
                                        lname="'.$value->lname.'" fname="'.$value->fname.'" mname="'.$value->mname.'" suffix="'.$value->suffix.'" 
                                        empnum="'.$value->employee_number.'" email_add="'.$value->email_add.'" dept="'.$value->dept.'"
                                        user_role ="'.$value->user_role.'" account="'.$value->account.'"  account_type="'.$value->account_type.'" 
                                        account_date="'.$value->account_date.'" username="'.$value->username.'" 
                                        
                                        >Edit Info
                                    </button>

                                    <button class="dropdown-item user_access_edit" type="button"  
                                        recid_user="'.$value->recid_user.'" 
                                        lname="'.$value->lname.'" fname="'.$value->fname.'" mname="'.$value->mname.'" suffix="'.$value->suffix.'" 
                                        
                                        >Access
                                    </button>
                                            
                                </div>
                            </div>
                            ';
                    //--
                    $result[] = $row;         
                }//end foreach

                $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $GetTotal_setup_user_list->ID,
                    "recordsFiltered" => $GetFiltered_setup_user_list->ID,
                    "data" => $result
                );
                echo json_encode($output);
            }//end of function
        //End of Display Table list 

    //END OF SETUP / USER LIST

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    function submit_application_useradd_data() {
        if ($this->request->isAJAX()) {
            $fname = service('request')->getPost('apps_useradd_fname',FILTER_SANITIZE_STRING);
            $mname = service('request')->getPost('apps_useradd_mname',FILTER_SANITIZE_STRING);
            $lname = service('request')->getPost('apps_useradd_lname',FILTER_SANITIZE_STRING);
            $suffix = service('request')->getPost('apps_useradd_suffix',FILTER_SANITIZE_STRING);
            $empnum = service('request')->getPost('apps_useradd_empnum',FILTER_SANITIZE_STRING);
            $email_add = service('request')->getPost('apps_useradd_email',FILTER_SANITIZE_STRING);
            $dept_id = service('request')->getPost('apps_useradd_dept',FILTER_SANITIZE_STRING);
            $user_role = service('request')->getPost('apps_useradd_role',FILTER_SANITIZE_STRING);
            $account_type = service('request')->getPost('apps_useradd_accounttype',FILTER_SANITIZE_STRING);
            $username = service('request')->getPost('apps_useradd_uname',FILTER_SANITIZE_STRING);
            $password = service('request')->getPost('apps_useradd_pword',FILTER_SANITIZE_STRING);
            
            $user_recid = service('request')->getPost('apps_useradd_recid',FILTER_SANITIZE_STRING);
            $user_fullname = service('request')->getPost('apps_useradd_fullname',FILTER_SANITIZE_STRING);
          } 
      
          //get date -start 
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
          //get date -end
      
          //format date from  y-m-d to September 01, 2023
            //$date_visit_text = date('F d, Y ',strtotime($datevisit));
      
          //Format from 24 Format to 12 format  
            //$timevisit = date('h:i A', strtotime($timevisit));
          
          $fname = ucwords($fname);
          $mname = ucwords($mname);
          $lname = ucwords($lname);
          $fullname = $fname . " " . $lname . " " . $suffix;

          //hash password
          $pass_hash = password_hash($password,PASSWORD_DEFAULT);

          $data = [
            'dept_id' => $dept_id,
            'employee_number' => $empnum,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'suffix' => $suffix,
            'fullname' => $fullname,
            'larawan' => "user.png",
            'email_add' => $email_add,
            'account_date' => $DateTimeNow,
            'account_type' => $account_type,
            'user_role' => $user_role,
            'sems_access' => 1,
           
            'username' => $username,
            'password' => $pass_hash,
           
            'encoded_by' => $user_fullname,
            'username_action' => "add",
            'username_date' => $DateTimeNow
           
          ];
      
          $insert_model = new Users_model();
          $tablename = "application_users";
          $status_insert = $insert_model->insert_data($tablename,$data);	
          if($status_insert) {
            $lastinserted_id = $status_insert;
            $status = true;
            $return_msg = "Record Successfully Added";

            //Add User Role for Event Approval - Start   $user_role
            //Table : application_user_access
            if($user_role == "COURSE ADVISER") {
                $submenu = "Course-Adviser";
            } 
            if($user_role == "COURSE COORDINATOR") {
                $submenu = "Course-Coordinator";
            } 
            if($user_role == "PSMO") {
                $submenu = "PSMO";
            } 
            if($user_role == "ACADEMIC COORDINATOR") {
                $submenu = "Academic-Coordinator";
            } 
            if($user_role == "OSA COORDINATOR") {
                $submenu = "OSA-Coordinator";
            } 
            if($user_role == "CAMPUS MANAGER") {
                $submenu = "Campus-Manager";
            }
            if($user_role == "DIRECTOR FOR ACADEMIC") {
                $submenu = "Dir-Academic";
            }
            if($user_role == "DIRECTOR FOR ADMINISTRATION") {
                $submenu = "Dir-Administration";
            }
            if($user_role == "PRESIDENT") {
                $submenu = "President";
            }

            $sidebar = "Event_Approval";
            $sidebar_access = "Yes";

            $data2 = [
                'userid' => $lastinserted_id,
                'sidebar' => $sidebar,
                'sidebar_access' => $sidebar_access,
                'submenu' => $submenu,
                'submenu_access' => "Yes",
                'access_read' => "Yes",
                'access_write' => "No",
                'access_modify' => "Yes",
               
                'encoded_by' => $user_fullname,
                'username_action' => "add",
                'username_date' => $DateTimeNow
            ];
            $tablename = "application_user_access";
            $status_insert2 = $insert_model->insert_data($tablename,$data2);
            //Add User Role for Event Approval - End

          } else {
            $status = false;
            $return_msg = "Error Adding Record";
          }
      
          $result_ajax = array(
            "status" => $status,
            "return_msg" => $return_msg
          );
          echo json_encode($result_ajax);
    }//end of function

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    function submit_application_useredit_data() {
        if ($this->request->isAJAX()) {
            $recid_user = service('request')->getPost('useredit_sel_recid_user',FILTER_SANITIZE_STRING);

            $fname = service('request')->getPost('apps_useredit_fname',FILTER_SANITIZE_STRING);
            $mname = service('request')->getPost('apps_useredit_mname',FILTER_SANITIZE_STRING);
            $lname = service('request')->getPost('apps_useredit_lname',FILTER_SANITIZE_STRING);
            $suffix = service('request')->getPost('apps_useredit_suffix',FILTER_SANITIZE_STRING);
            $empnum = service('request')->getPost('apps_useredit_empnum',FILTER_SANITIZE_STRING);
            $email_add = service('request')->getPost('apps_useredit_email_add',FILTER_SANITIZE_STRING);
            $dept = service('request')->getPost('apps_useredit_dept',FILTER_SANITIZE_STRING);
            $user_role = service('request')->getPost('apps_useredit_user_role',FILTER_SANITIZE_STRING);

            $account_status = service('request')->getPost('apps_useredit_account_status',FILTER_SANITIZE_STRING);
            $account_type = service('request')->getPost('apps_useredit_account_type',FILTER_SANITIZE_STRING);

            $username_new = service('request')->getPost('apps_useredit_username',FILTER_SANITIZE_STRING);
            $username_db = service('request')->getPost('useredit_db_username',FILTER_SANITIZE_STRING);

            $password_new = service('request')->getPost('apps_useredit_password',FILTER_SANITIZE_STRING);

            $account_db = service('request')->getPost('useredit_db_account',FILTER_SANITIZE_STRING);
            $account_date_db = service('request')->getPost('useredit_db_account_date',FILTER_SANITIZE_STRING);

            $user_recid = service('request')->getPost('useredit_user_recid',FILTER_SANITIZE_STRING);
            $user_fullname = service('request')->getPost('useredit_user_fullname',FILTER_SANITIZE_STRING);
          } //end isAjax

          if($username_new == $username_db) {
            $username = $username_db;
          } else {
            $username = $username_new;
          }

          //get date -start 
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
          //get date -end
      
          //format date from  y-m-d to September 01, 2023
            //$date_visit_text = date('F d, Y ',strtotime($datevisit));
      
          //Format from 24 Format to 12 format  
            //$timevisit = date('h:i A', strtotime($timevisit));
          
          if($account == $account_db) {
            $DateTimeNow = $account_date_db;
          }

          //Get Dept ID of Edited User
          $get_model = new Users_model();
          $tablename = "application_department";
          $status_get = $get_model->checkget_userDept_data($tablename,$dept);	
          if ($status_get) {
            $dept_id = $status_get['recid_dept'];
          }

          $fname = ucwords($fname);
          $mname = ucwords($mname);
          $lname = ucwords($lname);
          $fullname = $fname . " " . $lname . " " . $suffix;

          if(strlen($password_new) > 0) {
            //hash password
            $pass_hash = password_hash($password_new,PASSWORD_DEFAULT);
            $data = [
                'fullname' => $fullname,
                'fname' => $fname,
                'mname' => $mname,
                'lname' => $lname,
                'suffix' => $suffix,
                'employee_number' => $empnum,
                'email_add' => $email_add,
                'dept_id' => $dept_id,
                'user_role' => $user_role,
                'account_status' => $account_status,
                'account_date' => $DateTimeNow,
                'account_type' => $account_type,
    
                'username' => $username,
                'password' => $pass_hash,
                
                'encoded_by' => $user_fullname,
                'username_action' => "update",
                'username_date' => $DateTimeNow
              ];
          } else {
            $data = [
                'fullname' => $fullname,
                'fname' => $fname,
                'mname' => $mname,
                'lname' => $lname,
                'suffix' => $suffix,
                'employee_number' => $empnum,
                'email_add' => $email_add,
                'dept_id' => $dept_id,
                'user_role' => $user_role,
                'account_status' => $account_status,
                'account_date' => $DateTimeNow,
                'account_type' => $account_type,
    
                'username' => $username,
                
                'encoded_by' => $user_fullname,
                'username_action' => "update",
                'username_date' => $DateTimeNow
              ];
          }
          
          $update_model = new Users_model();
          $tablename = "application_users";
          $status_update = $update_model->update_user_data($tablename,$recid_user,$data);	
          if($status_update) {
            $status = true;
            $return_msg = "Record Successfully Updated";

            //Edit User Role for Event Approval - Start   $user_role
            //Table : application_user_access
            if($user_role == "COURSE ADVISER") {
                $submenu = "Course-Adviser";
            } 
            if($user_role == "COURSE COORDINATOR") {
                $submenu = "Course-Coordinator";
            } 
            if($user_role == "PSMO") {
                $submenu = "PSMO";
            } 
            if($user_role == "ACADEMIC COORDINATOR") {
                $submenu = "Academic-Coordinator";
            } 
            if($user_role == "OSA COORDINATOR") {
                $submenu = "OSA-Coordinator";
            } 
            if($user_role == "CAMPUS MANAGER") {
                $submenu = "Campus-Manager";
            }
            if($user_role == "DIRECTOR FOR ACADEMIC") {
                $submenu = "Dir-Academic";
            }
            if($user_role == "DIRECTOR FOR ADMINISTRATION") {
                $submenu = "Dir-Administration";
            }
            if($user_role == "PRESIDENT") {
                $submenu = "President";
            }

            $sidebar = "Event_Approval";
            $sidebar_access = "Yes";

            $data2 = [
                'sidebar' => $sidebar,
                'sidebar_access' => $sidebar_access,
                'submenu' => $submenu,
                'submenu_access' => "Yes",
                'access_read' => "Yes",
                'access_write' => "No",
                'access_modify' => "Yes",
               
                'encoded_by' => $user_fullname,
                'username_action' => "update",
                'username_date' => $DateTimeNow
            ];
            $tablename = "application_user_access";
            $tablefield = "userid";
            $fieldvalue = $recid_user;
            $status_update2 = $update_model->update_data_singlekey($tablename,$tablefield,$fieldvalue,$data2);
            //$status_update2 = $update_model->update_user_data($tablename,$recid_user,$data2);	
            //Edit User Role for Event Approval - End

          } else {
            $status = false;
            $return_msg = "Error Updating Record";
          }
      
          $result_ajax = array(
            "status" => $status,
            "return_msg" => $return_msg
          );
          echo json_encode($result_ajax);
    }//end of function

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    function check_user_using_qrcodes() {
        if ($this->request->isAJAX()) {
            $empnum = service('request')->getPost('result',FILTER_SANITIZE_STRING);
        } 

        $checkget_model = new Users_model();
        $tablename = "application_users";
        $status_checkget = $checkget_model->checkget_user_empnum($tablename,$empnum);
        if($status_checkget) {
            $status = true;
            $fullname = $status_checkget['fullname'];
        } else {
            $status = false;
            $fullname = "Invalid QRCode";
        }

        $result_ajax = array(
            "status" => $status,
            "return_msg" => $fullname
        );
        echo json_encode($result_ajax);
    }//end of function

    //SPACER ----->

    function get_user_data() {
        if ($this->request->isAJAX()) {
            $recid_user = service('request')->getPost('recid_user',FILTER_SANITIZE_STRING);
        } 

        $checkget_model = new Users_model();
        $tablename = "application_users";
        $status_checkget = $checkget_model->checkget_user_recid($tablename,$recid_user);
        if($status_checkget) {
            $status = true;
            $qrcode = $status_checkget['qrcode'];
        } else {
            $status = false;
            $qrcode = "";
        }

        $result_ajax = array(
            "status" => $status,
            "qrcode" => $qrcode
        );
        echo json_encode($result_ajax);
    }//end of function

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    function get_user_access() {
        if ($this->request->isAJAX()) {
            $recid_user = service('request')->getPost('recid_user',FILTER_SANITIZE_STRING);
        } 

        $checkget_model = new Users_model();
        $tablename = "application_user_access";
        $status_checkget = $checkget_model->checkget_user_access_recid($tablename,$recid_user);
        if($status_checkget) {
            foreach($status_checkget as $row) {
                //single sidebar menu
                if($row['sidebar'] == "Dashboard")  {
                    $sidebar_dashboard = $row['sidebar_access'];
                }//end dashboard

                if($row['sidebar'] == "Event_Request")  {
                    $sidebar_event_request = $row['sidebar_access'];

                    //sidebar access
                    $event_request_access_read = $row['access_read'];
                    $event_request_access_write = $row['access_write'];
                    $event_request_access_modify = $row['access_modify'];

                } //end event request

                //sidebar menu with dropdown
                if($row['sidebar'] == "Setup")  {
                    $sidebar_setup = $row['sidebar_access'];
                    
                    //submenu access
                    if($row['submenu'] == "Setup-Department")  {
                        $setup_department_submenu_access = $row['submenu_access'];

                        //submemu access
                        $setup_department_submenu_access_read = $row['access_read'];
                        $setup_department_submenu_access_write = $row['access_write'];
                        $setup_department_submenu_access_modify = $row['access_modify'];
                    } 
                }//end setup menu	

                //sidebar menu with dropdown
                if($row['sidebar'] == "Setup")  {
                    $sidebar_setup = $row['sidebar_access'];
                    
                    //submenu access
                    if($row['submenu'] == "Setup-Role")  {
                        $setup_role_submenu_access = $row['submenu_access'];

                        //submemu access
                        $setup_role_submenu_access_read = $row['access_read'];
                        $setup_role_submenu_access_write = $row['access_write'];
                        $setup_role_submenu_access_modify = $row['access_modify'];
                    } 
                }//end setup menu	

                //sidebar menu with dropdown
                if($row['sidebar'] == "Setup")  {
                    $sidebar_setup = $row['sidebar_access'];
                    
                    //submenu access
                    if($row['submenu'] == "Setup-User")  {
                        $setup_user_submenu_access = $row['submenu_access'];

                        $setup_user_submenu_access_read = $row['access_read'];
                        $setup_user_submenu_access_write = $row['access_write'];
                        $setup_user_submenu_access_modify = $row['access_modify'];
                        $setup_user_submenu_access_suspend = $row['access_suspend'];
                        $setup_user_submenu_access_useraccess = $row['access_useraccess'];
                    }
                }//end setup menu	

            }//end for loop
        } else {
            //User with no access
            $sidebar_dashboard = "No";
            $sidebar_event_request = "No";
            $event_request_access_read = "No";
            $event_request_access_write = "No";
            $event_request_access_modify = "No";

            $sidebar_setup = "No";
            $setup_department_submenu_access = "No";
                $setup_department_submenu_access_read  = "No";
                $setup_department_submenu_access_write  = "No";
                $setup_department_submenu_access_modify  = "No";
            
            $setup_role_submenu_access = "No";
                $setup_role_submenu_access_read  = "No";
                $setup_role_submenu_access_write  = "No";
                $setup_role_submenu_access_modify  = "No";

            $setup_user_submenu_access = "No";
                $setup_user_submenu_access_read = "No";
                $setup_user_submenu_access_write = "No";
                $setup_user_submenu_access_modify = "No";
                $setup_user_submenu_access_suspend = "No";
                $setup_user_submenu_access_useraccess = "No";
        }

        $result_ajax = array(
            "sidebar_dashboard" => $sidebar_dashboard,
            "sidebar_event_request" => $sidebar_event_request,
                "event_request_access_read" => $event_request_access_read,
                "event_request_access_write" => $event_request_access_write,
                "event_request_access_modify" => $event_request_access_modify,
                         
            "sidebar_setup" => $sidebar_setup,
            "setup_department_submenu_access" => $setup_department_submenu_access,
                "setup_department_submenu_access_read" => $setup_department_submenu_access_read,
                "setup_department_submenu_access_write" => $setup_department_submenu_access_write,
                "setup_department_submenu_access_modify" => $setup_department_submenu_access_modify,

            "setup_role_submenu_access" => $setup_role_submenu_access,
                "setup_role_submenu_access_read" => $setup_role_submenu_access_read,
                "setup_role_submenu_access_write" => $setup_role_submenu_access_write,
                "setup_role_submenu_access_modify" => $setup_role_submenu_access_modify,

            "setup_user_submenu_access" => $setup_user_submenu_access,
                "setup_user_submenu_access_read" => $setup_user_submenu_access_read,
                "setup_user_submenu_access_write" => $setup_user_submenu_access_write,
                "setup_user_submenu_access_modify" => $setup_user_submenu_access_modify,
                "setup_user_submenu_access_suspend" => $setup_user_submenu_access_suspend,
                "setup_user_submenu_access_useraccess" => $setup_user_submenu_access_useraccess
        );
        echo json_encode($result_ajax);

    }//end of function

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    function submit_application_useraccess_data() {
        if ($this->request->isAJAX()) {
            $recid_user = service('request')->getPost('useraccess_sel_recid_user',FILTER_SANITIZE_STRING);
            $user_fullname = service('request')->getPost('useraccess_fullname',FILTER_SANITIZE_STRING);

            $sidebar_access_dashboard = service('request')->getPost('apps_useraccess_dashboard',FILTER_SANITIZE_STRING);
            
            $apps_useraccess_eventRequest = service('request')->getPost('apps_useraccess_eventRequest',FILTER_SANITIZE_STRING);
            $apps_useraccess_event_request_read = service('request')->getPost('apps_useraccess_event_request_read',FILTER_SANITIZE_STRING);
            $apps_useraccess_event_request_write = service('request')->getPost('apps_useraccess_event_request_write',FILTER_SANITIZE_STRING);
            $apps_useraccess_event_request_modify = service('request')->getPost('apps_useraccess_event_request_modify',FILTER_SANITIZE_STRING);

            $apps_useraccess_setup_department = service('request')->getPost('apps_useraccess_setup_department',FILTER_SANITIZE_STRING);
            $submenu_access_dept_read = service('request')->getPost('apps_useraccess_dept_read',FILTER_SANITIZE_STRING);
            $submenu_access_dept_write = service('request')->getPost('apps_useraccess_dept_write',FILTER_SANITIZE_STRING);
            $submenu_access_dept_modify = service('request')->getPost('apps_useraccess_dept_modify',FILTER_SANITIZE_STRING);

            $apps_useraccess_setup_role = service('request')->getPost('apps_useraccess_setup_role',FILTER_SANITIZE_STRING);
            $submenu_access_role_read = service('request')->getPost('apps_useraccess_role_read',FILTER_SANITIZE_STRING);
            $submenu_access_role_write = service('request')->getPost('apps_useraccess_role_write',FILTER_SANITIZE_STRING);
            $submenu_access_role_modify = service('request')->getPost('apps_useraccess_role_modify',FILTER_SANITIZE_STRING);

            $sidebar_access_setup = service('request')->getPost('apps_useraccess_setup',FILTER_SANITIZE_STRING);
            $submenu_access_setup_user = service('request')->getPost('apps_useraccess_setup_user',FILTER_SANITIZE_STRING);
            $submenu_access_setup_user_read = service('request')->getPost('apps_useraccess_setup_user_read',FILTER_SANITIZE_STRING);
            $submenu_access_setup_user_write = service('request')->getPost('apps_useraccess_setup_user_write',FILTER_SANITIZE_STRING);
            $submenu_access_setup_user_modify = service('request')->getPost('apps_useraccess_setup_user_modify',FILTER_SANITIZE_STRING);
            $submenu_access_setup_user_suspend = service('request')->getPost('apps_useraccess_setup_user_suspend',FILTER_SANITIZE_STRING);
            $submenu_access_setup_useraccess = service('request')->getPost('apps_useraccess_setup_useraccess',FILTER_SANITIZE_STRING);
        }//end isAJAX

        //Make sure Menu setup_user is match with submenu user setup
        if($sidebar_access_setup == "No") {
            $submenu_access_setup_user = "No";
        }

        //for Checkbox and Readio, Find out if it is check by user --Start
            //Start Event Request
            if (isset($apps_useraccess_event_request_read)){
                $event_request_read = "Yes"; //check
            } else {
                $event_request_read = "No"; //uncheck
            }

            if (isset($apps_useraccess_event_request_write)){
                $event_request_write = "Yes"; //check
            } else {
                $event_request_write = "No"; //uncheck
            }

            if (isset($apps_useraccess_event_request_modify)){
                $event_request_modify = "Yes"; //check
            } else {
                $event_request_modify = "No"; //uncheck
            }
            //End Event Request

        //Start Deparment
        if (isset($submenu_access_dept_read)){
			$submenu_access_dept_read = "Yes"; //check
		} else {
			$submenu_access_dept_read = "No"; //uncheck
		}

        if (isset($submenu_access_dept_write)){
			$submenu_access_dept_write = "Yes"; //check
		} else {
			$submenu_access_dept_write = "No"; //uncheck
		}

        if (isset($submenu_access_dept_modify)){
			$submenu_access_dept_modify = "Yes"; //check
		} else {
			$submenu_access_dept_modify = "No"; //uncheck
		}
        //End Department

        //Start Role
        if (isset($submenu_access_role_read)){
			$submenu_access_role_read = "Yes"; //check
		} else {
			$submenu_access_role_read = "No"; //uncheck
		}

        if (isset($submenu_access_role_write)){
			$submenu_access_role_write = "Yes"; //check
		} else {
			$submenu_access_role_write = "No"; //uncheck
		}

        if (isset($submenu_access_role_modify)){
			$submenu_access_role_modify = "Yes"; //check
		} else {
			$submenu_access_role_modify = "No"; //uncheck
		}
        //End Role

        if (isset($submenu_access_setup_user_read)){
			$submenu_access_setup_user_read = "Yes"; //check
		} else {
			$submenu_access_setup_user_read = "No"; //uncheck
		}

        if (isset($submenu_access_setup_user_write)){
			$submenu_access_setup_user_write = "Yes"; //check
		} else {
			$submenu_access_setup_user_write = "No"; //uncheck
		}

        if (isset($submenu_access_setup_user_modify)){
			$submenu_access_setup_user_modify = "Yes"; //check
		} else {
			$submenu_access_setup_user_modify = "No"; //uncheck
		}

        if (isset($submenu_access_setup_user_suspend)){
			$submenu_access_setup_user_suspend = "Yes"; //check
		} else {
			$submenu_access_setup_user_suspend = "No"; //uncheck
		}

        if (isset($submenu_access_setup_useraccess)){
			$submenu_access_setup_useraccess = "Yes"; //check
		} else {
			$submenu_access_setup_useraccess = "No"; //uncheck
		}

        //for Checkbox and Readio, Find out if it is check by user --End

        $check_model = new Users_model();

        //Variable to track successfull insert or edit
        $track_success_ctr = 0;

        $model_use = "starting";

        //Count sidebar menu to loop for saving record
        $ctr_doWhile = 1;
        do {
            
            if($ctr_doWhile == 1) { 
                //check if user has sidebar menu
                $sidebar = "Dashboard";
                $submenu = "none";
                $tablename = "application_user_access";
                $status_check = $check_model->checkget_user_access_data_menu_with_submenu($tablename,$recid_user,$sidebar,$submenu);
                if($status_check) {
                    //meron na
                    $model_use = "Update";
                    $data = [
                        'sidebar_access' => $sidebar_access_dashboard,

                        'submenu' => $submenu,
                        'submenu_access' => "No",

                            'access_read' => $submenu_access_setup_user_read,
                            'access_write' => $submenu_access_setup_user_write,
                            'access_modify' => $submenu_access_setup_user_modify,
                            'access_suspend' => $submenu_access_setup_user_suspend, 
                            'access_useraccess' => $apps_useraccess_setup_useraccess,
    
                        'encoded_by' => $user_fullname,
                        'username_action' => "update",
                        'username_date' => $DateTimeNow
                    ];
                } else {
                    //wala pa
                    $model_use = "Add";
                    $data = [
                        'userid' => $recid_user,
                        'sidebar' => $sidebar,
                        'sidebar_access' => $sidebar_access_dashboard,

                        'submenu' => $submenu,
                        'submenu_access' => "No",

                            'access_read' => $submenu_access_setup_user_read,
                            'access_write' => $submenu_access_setup_user_write,
                            'access_modify' => $submenu_access_setup_user_modify,
                            'access_suspend' => $submenu_access_setup_user_suspend, 
                            'access_useraccess' => $apps_useraccess_setup_useraccess,
    
                        'encoded_by' => $user_fullname,
                        'username_action' => "add",
                        'username_date' => $DateTimeNow
                    ];
                }//end check model use    
            } //end Ctr 1

            if($ctr_doWhile == 2) { 
                //check if user has sidebar menu
                $sidebar = "Event_Request";
                $submenu = "none";
                $tablename = "application_user_access";
                $status_check = $check_model->checkget_user_access_data_menu_with_submenu($tablename,$recid_user,$sidebar,$submenu);
                if($status_check) {
                    //meron na
                    $model_use = "Update";
                    $data = [
                        'sidebar_access' => $apps_useraccess_eventRequest,

                        'submenu' => $submenu,
                        'submenu_access' => "No",

                            'access_read' => $event_request_read,
                            'access_write' => $event_request_write,
                            'access_modify' => $event_request_modify,
                            'access_suspend' => "-up", 
                            'access_useraccess' => "-up",
    
                        'encoded_by' => $user_fullname,
                        'username_action' => "update",
                        'username_date' => $DateTimeNow
                    ];
                } else {
                    //wala pa
                    $model_use = "Add";
                    $data = [
                        'userid' => $recid_user,
                        'sidebar' => $sidebar,
                        'sidebar_access' => $apps_useraccess_eventRequest,

                        'submenu' => $submenu,
                        'submenu_access' => "No",

                            'access_read' => $event_request_read,
                            'access_write' => $event_request_write,
                            'access_modify' => $event_request_modify,
                            'access_suspend' => "-ad", 
                            'access_useraccess' => "-ad",
    
                        'encoded_by' => $user_fullname,
                        'username_action' => "add",
                        'username_date' => $DateTimeNow
                    ];
                }//end check model use    
            } //end Ctr 2

            if($ctr_doWhile == 3) { 
                //check if user has sidebar menu
                $sidebar = "Setup";
                $submenu = "Setup-Department";
                $tablename = "application_user_access";
                $status_check = $check_model->checkget_user_access_data_menu_with_submenu($tablename,$recid_user,$sidebar,$submenu);
                if($status_check) {
                    //meron na
                    $model_use = "Update";
                    $data = [                    
                        'sidebar_access' => $sidebar_access_setup,
    
                        'submenu' => $submenu,
                        'submenu_access' => $apps_useraccess_setup_department,

                            'access_read' => $submenu_access_dept_read,
                            'access_write' => $submenu_access_dept_write,
                            'access_modify' => $submenu_access_dept_modify,
                            'access_suspend' => "-up", 
                            'access_useraccess' => "-up",
                           
                        'encoded_by' => $user_fullname,
                        'username_action' => "update",
                        'username_date' => $DateTimeNow
                    ];
                } else {
                    //wala pa
                    $model_use = "Add";
                    $data = [
                        'userid' => $recid_user,
                        'sidebar' => $sidebar,
                        'sidebar_access' => $sidebar_access_setup,
    
                        'submenu' => $submenu,
                        'submenu_access' => $apps_useraccess_setup_department,

                            'access_read' => $submenu_access_dept_read,
                            'access_write' => $submenu_access_dept_write,
                            'access_modify' => $submenu_access_dept_modify,
                            'access_suspend' => "-ad", 
                            'access_useraccess' => "-ad",
                           
                        'encoded_by' => $user_fullname,
                        'username_action' => "update",
                        'username_date' => $DateTimeNow
                    ];
                }//end check model use
            } //end Ctr 3

            if($ctr_doWhile == 4) { 
                //check if user has sidebar menu
                $sidebar = "Setup";
                $submenu = "Setup-Role";
                $tablename = "application_user_access";
                $status_check = $check_model->checkget_user_access_data_menu_with_submenu($tablename,$recid_user,$sidebar,$submenu);
                if($status_check) {
                    //meron na
                    $model_use = "Update";
                    $data = [                    
                        'sidebar_access' => $sidebar_access_setup,
    
                        'submenu' => $submenu,
                        'submenu_access' => $apps_useraccess_setup_role,

                            'access_read' => $submenu_access_role_read,
                            'access_write' => $submenu_access_role_write,
                            'access_modify' => $submenu_access_role_modify,
                            'access_suspend' => "-up", 
                            'access_useraccess' => "-up",
                           
                        'encoded_by' => $user_fullname,
                        'username_action' => "update",
                        'username_date' => $DateTimeNow
                    ];
                } else {
                    //wala pa
                    $model_use = "Add";
                    $data = [
                        'userid' => $recid_user,
                        'sidebar' => $sidebar,
                        'sidebar_access' => $sidebar_access_setup,
    
                        'submenu' => $submenu,
                        'submenu_access' => $apps_useraccess_setup_role,

                            'access_read' => $submenu_access_role_read,
                            'access_write' => $submenu_access_role_write,
                            'access_modify' => $submenu_access_role_modify,
                            'access_suspend' => "-ad", 
                            'access_useraccess' => "-ad",
                           
                        'encoded_by' => $user_fullname,
                        'username_action' => "update",
                        'username_date' => $DateTimeNow
                    ];
                }//end check model use
            } //end Ctr 4

            if($ctr_doWhile == 5) { 
                $sidebar = "Setup";
                $submenu = "Setup-User";
                $tablename = "application_user_access";
                $status_check = $check_model->checkget_user_access_data_menu_with_submenu($tablename,$recid_user,$sidebar,$submenu);
                if($status_check) {
                    //meron na
                    $model_use = "Update";
                    $data = [                    
                        'sidebar_access' => $sidebar_access_setup,
                        
                        'submenu' => $submenu,
                        'submenu_access' => $submenu_access_setup_user,
                            'access_read' => $submenu_access_setup_user_read,
                            'access_write' => $submenu_access_setup_user_write,
                            'access_modify' => $submenu_access_setup_user_modify,
                            'access_suspend' => $submenu_access_setup_user_suspend, 
                            'access_useraccess' => $submenu_access_setup_useraccess,
    
                        'encoded_by' => $user_fullname,
                        'username_action' => "update",
                        'username_date' => $DateTimeNow
                    ];
                } else {
                    //wala pa
                    $model_use = "Add";
                    $data = [
                        'userid' => $recid_user,
                        'sidebar' => $sidebar,
                        'sidebar_access' => $sidebar_access_setup,
    
                        'submenu' => $submenu,
                        'submenu_access' => $submenu_access_setup_user,
                            'access_read' => $submenu_access_setup_user_read,
                            'access_write' => $submenu_access_setup_user_write,
                            'access_modify' => $submenu_access_setup_user_modify,
                            'access_suspend' => $submenu_access_setup_user_suspend,
                            'access_useraccess' => $submenu_access_setup_useraccess,
    
                        'encoded_by' => $user_fullname,
                        'username_action' => "update",
                        'username_date' => $DateTimeNow
                    ];
                }//end check model use
            } //end Ctr 5

            if($model_use == "Add") {
                $tablename = "application_user_access";
                $status_add = $check_model->add_user_access_data($tablename,$data);	
                if($status_add) {
                    $track_success_ctr = $track_success_ctr + 1;
                } else {
                    $track_success_ctr = 100;
                }
            }//end model use

            if($model_use == "Update") {
                //For Updating Model
                $tablename = "application_user_access";
                $status_update = $check_model->update_user_access_data($tablename,$recid_user,$sidebar,$submenu,$data);	
                if($status_update) {
                    $track_success_ctr = $track_success_ctr + 1;
                }
            }//end model use

            $ctr_doWhile++;

        } while($ctr_doWhile <= 5);
        

        if($track_success_ctr > 0) {
            $status = true;
            $return_msg = "Record Successfully Updated";
        } else {
            $status = false;
            $return_msg = "Error Updating Record";
        }
      
        $result_ajax = array(
            "status" => $status,
            "return_msg" => $return_msg
        );
        echo json_encode($result_ajax);

    }//end of function

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    function get_user_access_onClick() {
        if ($this->request->isAJAX()) {
            $recid_user = service('request')->getPost('apps_userid',FILTER_SANITIZE_STRING);

            $sidebar = service('request')->getPost('sidebar',FILTER_SANITIZE_STRING);
            $submenu = service('request')->getPost('submenu',FILTER_SANITIZE_STRING);
            $access = service('request')->getPost('access',FILTER_SANITIZE_STRING);
            $access_value = service('request')->getPost('access_value',FILTER_SANITIZE_STRING);
        }//end isAJAX

        $check_model = new Users_model();

        $tablename = "application_users";
        $status_update = $check_model->checkget_user_recid($tablename,$recid_user);	
        if($status_update) {
            $user_type = $status_update['account_type'];
            if($user_type == "Built-In") {
                $status = true;
                $return_msg = "";
            } else {
                //Get User Access
                $tablename = "application_user_access";
                $status_check = $check_model->checkget_user_access_clickMenu($tablename,$recid_user,$sidebar,$submenu,$access,$access_value);	
                if($status_check) {
                    $status = true;
                    $return_msg = "";
                } else {
                    $status = false;    
                    $return_msg = "You Have No Access";
                }
            }

        } else {
            $status = false;
            $return_msg = "You Have No Access";
        }

        $result_ajax = array(
            "status" => $status,
            "return_msg" => $return_msg
        );
        echo json_encode($result_ajax);

    }//end of function

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    //START OF SETUP / DEPARTMENT 
        //Start of Display Table list 
        function table_setup_department_list() {
            if ($this->request->isAJAX()) {
                $user_deptid = service('request')->getPost('user_deptid',FILTER_SANITIZE_STRING);
            }

            $Get_AppsModel = new Users_model();

            $GetTotal_setup_department_list = $Get_AppsModel->GetTotal_setup_department_list($user_deptid);
            $GetFiltered_setup_department_list = $Get_AppsModel->GetFiltered_setup_department_list($user_deptid);
            $status_GetList = $Get_AppsModel->GetList_setup_department_list($user_deptid);

            $result = array();
            $i = $_POST['start'];
                
            foreach($status_GetList as $value) {   
                $i++;
                $row = array();
                $row[] = $i;   
                
                $row[] = '<font color="'.$text_color.'">'.$value->dept.'</font>';
                $row[] = '<font color="'.$text_color.'">'.$value->description.'</font>';
                $row[] = '<font color="'.$text_color.'">'.$value->status.'</font>';
                
                $row[] = '
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">

                                <button class="dropdown-item department_edit" type="button"  
                                    recid_dept ="'.$value->recid_dept.'" 
                                    dept_code ="'.$value->dept.'" dept_desc ="'.$value->description.'" dept_status ="'.$value->status.'" 
                                    
                                    >Edit Info
                                </button>

                                
                                        
                            </div>
                        </div>
                        ';
                //--
                $result[] = $row;         
            }//end foreach

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $GetTotal_setup_department_list->ID,
                "recordsFiltered" => $GetFiltered_setup_department_list->ID,
                "data" => $result
            );
            echo json_encode($output);
        }//end of function
        //End of Display Table list 

        function submit_application_deptadd_data() {
            if ($this->request->isAJAX()) {
                $dept_code = service('request')->getPost('apps_deptadd_code',FILTER_SANITIZE_STRING);
                $dept_desc = service('request')->getPost('apps_deptadd_desc',FILTER_SANITIZE_STRING);
                
                $user_fullname = service('request')->getPost('apps_deptadd_user_fullname',FILTER_SANITIZE_STRING);
              } 
          
              //get date -start 
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
              //get date -end
          
              //format date from  y-m-d to September 01, 2023
                //$date_visit_text = date('F d, Y ',strtotime($datevisit));
          
              //Format from 24 Format to 12 format  
                //$timevisit = date('h:i A', strtotime($timevisit));
              
              $dept_code = strtoupper($dept_code);
              $dept_desc = ucwords($dept_desc);
             
              $data = [
                'dept' => $dept_code,
                'description' => $dept_desc,
                'status' => "Active",

                'encoded_by' => $user_fullname,
                'username_action' => "add"
              ];
          
              $insert_model = new Users_model();
              $tablename = "application_department";
              $status_insert = $insert_model->insert_data($tablename,$data);	
              if($status_insert) {
                $status = true;
                $return_msg = "Record Successfully Added";
              } else {
                $status = false;
                $return_msg = "Error Adding Record";
              }
          
              $result_ajax = array(
                "status" => $status,
                "return_msg" => $return_msg
              );
              echo json_encode($result_ajax);
        }//end of function

        function submit_application_deptedit_data() {
            if ($this->request->isAJAX()) {
                $dept_recid = service('request')->getPost('deptedit_db_recid',FILTER_SANITIZE_STRING);
                $dept = service('request')->getPost('apps_deptedit_code',FILTER_SANITIZE_STRING);
                $description = service('request')->getPost('apps_deptedit_desc',FILTER_SANITIZE_STRING);
                $dept_status = service('request')->getPost('apps_deptedit_status',FILTER_SANITIZE_STRING);
                
                $user_fullname = service('request')->getPost('deptedit_user_fullname',FILTER_SANITIZE_STRING);
              } //end isAjax
    
              //get date -start 
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
              //get date -end
          
              //format date from  y-m-d to September 01, 2023
                //$date_visit_text = date('F d, Y ',strtotime($datevisit));
          
              //Format from 24 Format to 12 format  
                //$timevisit = date('h:i A', strtotime($timevisit));
              
                $dept_code = strtoupper($dept);
                $dept_desc = ucwords($description);
                
                $data = [
                    'dept' => $dept_code,
                    'description' => $dept_desc,
                    'status' => $dept_status,

                    'encoded_by' => $user_fullname,
                    'username_action' => "update"
                ];
              
                $update_model = new Users_model();
                $tablename = "application_department";
                $tablefield = "recid_dept";
                $fieldvalue = $dept_recid;
                $status_update = $update_model->update_data_singlekey($tablename,$tablefield,$fieldvalue,$data);	
                if($status_update) {
                    $status = true;
                    $return_msg = "Record Successfully Updated";
                } else {
                    $status = false;
                    $return_msg = "Error Updating Record";
                }
            
                $result_ajax = array(
                    "status" => $status,
                    "return_msg" => $return_msg
                );
                echo json_encode($result_ajax);
        }//end of function

    //END OF SETUP / DEPARTMENT 

    //===========================================================================================
    //SPACER -----> 
    //===========================================================================================

    //START OF SETUP / ROLE 

        //Start of Display Table list 
            function table_setup_role_list() {
                if ($this->request->isAJAX()) {
                    $user_deptid = service('request')->getPost('user_deptid',FILTER_SANITIZE_STRING);
                    
                }

                $Get_AppsModel = new Users_model();

                $GetTotal_setup_role_list = $Get_AppsModel->GetTotal_setup_role_list($user_deptid);
                $GetFiltered_setup_role_list = $Get_AppsModel->GetFiltered_setup_role_list($user_deptid);
                $status_GetList = $Get_AppsModel->GetList_setup_role_list($user_deptid);

                $result = array();
                $i = $_POST['start'];
                    
                foreach($status_GetList as $value) {   
                    $i++;
                    $row = array();
                    $row[] = $i;   
                    
                    $row[] = '<font color="'.$text_color.'">'.$value->user_role.'</font>';
                    $row[] = '<font color="'.$text_color.'">'.$value->event_request_sign_as.'</font>';

                    //--start sa button
                    $row[] = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">

                            <button class="dropdown-item role_edit" type="button"  
                                recid_userrole ="'.$value->recid_userrole.'" 
                                user_role ="'.$value->user_role.'" 
                                user_role_sign ="'.$value->event_request_sign_as.'"
                                
                                >View Info
                            </button>

                        </div>
                    </div>
                    ';
                    //--end sa button

                    $result[] = $row;         
                }//end foreach

                $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $GetTotal_setup_role_list->ID,
                    "recordsFiltered" => $GetFiltered_setup_role_list->ID,
                    "data" => $result
                );
                echo json_encode($output);
            }//end of function
        //End of Display Table list 

        function submit_application_roldadd_data() {
            if ($this->request->isAJAX()) {
                $role = service('request')->getPost('apps_roldadd_role',FILTER_SANITIZE_STRING);
                $role_signatory = service('request')->getPost('apps_roldadd_role_signatory',FILTER_SANITIZE_STRING);
                
                $user_fullname = service('request')->getPost('apps_roldadd_user_fullname',FILTER_SANITIZE_STRING);
              } 
          
              //get date -start 
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
              //get date -end
          
              //format date from  y-m-d to September 01, 2023
                //$date_visit_text = date('F d, Y ',strtotime($datevisit));
          
              //Format from 24 Format to 12 format  
                //$timevisit = date('h:i A', strtotime($timevisit));
              
              $role = strtoupper($role);
              
             
              $data = [
                'user_role' => $role,
                'event_request_sign_as' => $role_signatory,

                'encoded_by' => $user_fullname,
                'username_action' => "add"
              ];
          
              $insert_model = new Users_model();
              $tablename = "application_user_role";
              $status_insert = $insert_model->insert_data($tablename,$data);	
              if($status_insert) {
                $status = true;
                $return_msg = "Record Successfully Added";
              } else {
                $status = false;
                $return_msg = "Error Adding Record";
              }
          
              $result_ajax = array(
                "status" => $status,
                "return_msg" => $return_msg
              );
              echo json_encode($result_ajax);
        }//end of function

        function submit_application_roleedit_data() {
            if ($this->request->isAJAX()) {
                $role_recid = service('request')->getPost('roleedit_db_recid',FILTER_SANITIZE_STRING);
                $role = service('request')->getPost('apps_roleedit_role',FILTER_SANITIZE_STRING);
                $role_signatory = service('request')->getPost('apps_roleedit_role_signatory',FILTER_SANITIZE_STRING);
                
                $user_fullname = service('request')->getPost('roleedit_user_fullname',FILTER_SANITIZE_STRING);
              } //end isAjax
    
              //get date -start 
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
              //get date -end
          
              //format date from  y-m-d to September 01, 2023
                //$date_visit_text = date('F d, Y ',strtotime($datevisit));
          
              //Format from 24 Format to 12 format  
                //$timevisit = date('h:i A', strtotime($timevisit));
              
                $role = strtoupper($role);
                
                $data = [
                    'user_role' => $role,
                    'event_request_sign_as' => $role_signatory,
    
                    'encoded_by' => $user_fullname,
                    'username_action' => "update"
                ];
              
                $update_model = new Users_model();
                $tablename = "application_user_role";
                $tablefield = "recid_userrole";
                $fieldvalue = $role_recid;
                $status_update = $update_model->update_data_singlekey($tablename,$tablefield,$fieldvalue,$data);	
                if($status_update) {
                    $status = true;
                    $return_msg = "Record Successfully Updated";
                } else {
                    $status = false;
                    $return_msg = "Error Updating Record";
                }
            
                $result_ajax = array(
                    "status" => $status,
                    "return_msg" => $return_msg
                );
                echo json_encode($result_ajax);
        }//end of function
    
    //END OF SETUP / ROLE 

    //===========================================================================================
    //SPACER -----> 
    //===========================================================================================


}//end of Users Controller