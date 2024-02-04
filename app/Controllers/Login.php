<?php
//Start of Development Dec. 19 2023
namespace App\Controllers;
use \CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use \App\Models\Login_model;

//Import package
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Login extends Controller 
{
	public function __construct(){
		helper(['form','url','date']);
    }

    function index() {
      $Get_AppsModel = new Login_model();
      $tablename = "sems_apps";
      $status_getData = $Get_AppsModel->get_apps_data($tablename);
      if($status_getData) {
        $data = [
          'app_tableuser' => $status_getData['tableuser'],
          'app_logo' => $status_getData['app_logo'],
          'app_name' => $status_getData['app_name'],
          'app_short_name' => $status_getData['app_short_name'],
          'app_header_color' => $status_getData['app_header_color'],
          'app_header_textcolor' => $status_getData['app_header_textcolor'],
          'app_error_color' => $status_getData['app_error_color'],
          'app_module_login' => "Employee"
        ];
      }
  
      $agent = $this->request->getUserAgent();
      if ($agent->isMobile()) 
        {
              return view('login/login',$data);
              //return view('login/sample');
        }
      elseif ($agent->isRobot())
        {
          return view('formerror');
        }
      elseif ($agent->isBrowser())
        {
              return view('login/login',$data);
              //return view('login/sample');
        }
      else
        {
          return view('formerror');
      }
    }//end of index

    function qrcode() {
      $Get_AppsModel = new Login_model();
      $tablename = "sems_apps";
      $status_getData = $Get_AppsModel->get_apps_data($tablename);
      if($status_getData) {
        $data = [
          'app_tableuser' => $status_getData['tableuser'],
          'app_logo' => $status_getData['app_logo'],
          'app_name' => $status_getData['app_name'],
          'app_short_name' => $status_getData['app_short_name'],
          'app_header_color' => $status_getData['app_header_color'],
          'app_header_textcolor' => $status_getData['app_header_textcolor'],
          'app_error_color' => $status_getData['app_error_color'],
          'app_module_login' => "QRcode"
        ];
      }
  
      $agent = $this->request->getUserAgent();
      if ($agent->isMobile()) 
        {
              return view('login/qrcode/qrcode_login',$data);
              //return view('login/sample');
        }
      elseif ($agent->isRobot())
        {
          return view('formerror');
        }
      elseif ($agent->isBrowser())
        {
              return view('login/qrcode/qrcode_login',$data);
              //return view('login/sample');
        }
      else
        {
          return view('formerror');
      }
    }//end of function

    function check_login_data() {
      if ($this->request->isAJAX()) {
          $uname = service('request')->getPost('uname',FILTER_SANITIZE_STRING);
          $upass = service('request')->getPost('upass',FILTER_SANITIZE_STRING);

          $tablename = service('request')->getPost('tableuser',FILTER_SANITIZE_STRING);
          
          if($uname == "") { //Start of uname
              $status = false;
              $return_msg = "Access Denied!";
              $password_db = "";
          } else {
              $checkLogin = new Login_model();
              $statusData = $checkLogin->check_username($tablename,$uname);
              if ($statusData) {
                      $recid_db = $statusData['recid_user'];
                      $fname_db = $statusData['fname'];
                      $mname_db = $statusData['mname'];
                      $lname_db = $statusData['lname'];
                      $exname_db = $statusData['exname'];
                      $fullname_db = $statusData['fullname'];
                      $larawan_db = $statusData['larawan'];
                      $username_db = $statusData['username'];
                      $password_db = $statusData['password'];
                      $account_status_db = $statusData['account_status'];
                      $account_type_db = $statusData['account_type'];
                      $deptid_db = $statusData['dept_id'];
                      $sems_access = $statusData['sems_access'];
                      $user_role_db = $statusData['user_role'];
                      
                      if($sems_access) {
                          if (password_verify($upass, $password_db)) {
                              //if ($dept_db == "ADMIN" || $dept_db == "Built-in Account") {
                              //    $status = true;
                              //    $return_msg = "Welcome Admin, ".$fullname_db;
                                
                              //} else {
                                
                                      if($account_status_db == "Active") {
                                          $status = true;
                                          $return_msg = "Welcome , ".$fullname_db;
                                      }else {
                                          $status = false;
                                          $return_msg = "Access Denied! Acount is not Active";
                                      }
                              //}
                                  
                          } else {
                                  $status = false;
                                  $return_msg = "Access Denied!";
                          }//end password_verfiy
                      } else {
                          $status = false;
                          $return_msg = "Access Denied! ";
                      }//end of appointment access
                      
              } else {
                  $status = false;
                  $return_msg = "Access Denied!";
              }
          }//End of Uname

          if ($status) {
              $mysession = session();
              $status = true;
              //$return_msg = "Success!";

              //session with multiple variables
              $app_sessionData = [
                  'user_userid' => $recid_db,
                  'user_fullname' => $fullname_db,
                  'user_username' => $username_db,
                  'user_larawan' => $larawan_db,
                  'user_deptid' => $deptid_db,
                  'user_role' => $user_role_db,
                  'login_noactivity' => "No",
                  'Logged_SEMS_Employee' => TRUE
              ];
              $mysession->set($app_sessionData);            

          } else {
            $status = false;
            $return_msg = "Access Denied!";
          }

          $result_ajax = array(
              "user_dept" => $dept_db,
              "status" => $status,
              "return_msg" => $return_msg 
          );
          echo json_encode($result_ajax);

      }//end isAJAX
  }//end of check_login_data function

  //Forgot Password -Start
  function forgot_password() {
    //Get value from database
    $Get_AppsModel = new Login_model();
    $tablename = "sems_apps";
    $status_getData = $Get_AppsModel->get_apps_data($tablename);
    if($status_getData) {
      $data = [
                'app_logo' => $status_getData['app_logo'],
                'app_name' => $status_getData['app_name'],
                'app_short_name' => $status_getData['app_short_name'],
                'app_header_color' => $status_getData['app_header_color'],
                'app_header_textcolor' => $status_getData['app_header_textcolor'],
                'app_error_color' => $status_getData['app_error_color'],
                'app_tableuser' => $status_getData['tableuser'],
                'copyright' => $status_getData['copyright'],
                'designed_by' => $status_getData['designed_by'],
                'user_userid' => $user_userid,
                'user_fullname' => $user_fullname,
                'user_username' => $user_username,
                'user_larawan' => $user_larawan,
                'user_dept' => $user_dept,
                'app_module_login' => "Forgot Password" 
      ];
    }

    return view('login/forgot_password/forgot_password_form',$data);
  }//end of function
  
  function check_email_forgot_password() {
    if ($this->request->isAJAX()) {
      $user_email = service('request')->getPost('user_email',FILTER_SANITIZE_STRING);
      $tableuser = service('request')->getPost('tableuser',FILTER_SANITIZE_STRING);
    }//end of isAjax

    //$Get_AppsModel = new Login_model();
    //$status_getData = $Get_AppsModel->get_apps_data();

    $status = true;
    //$return_msg = "user email address | " . $user_email;
    $return_msg = $user_email . " not found";

    $result_ajax = array(
      "status" => $status,
      "return_msg" => $return_msg 
  );
  echo json_encode($result_ajax);

  }//end of function
//Forgot Password -End

}//end of Controller