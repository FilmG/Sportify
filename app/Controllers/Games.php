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

class Games extends Controller 
{
	public function __construct(){
		helper(['form','url','date']);
  }

    //START OF GLOBAL----------------------------------------------------------------
        function fill_dropdown_event() {
            //if ($this->request->isAJAX()) {
                //$recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING); 
            //}//end isAJAX

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
    
            $GetList_Model = new Employee_model();
            $status_GetList = $GetList_Model->getList_dropdown_event($date_ngayun);
            foreach($status_GetList as $row) {
                $data[] = array(
                    "event_title" => $row['event_acty_title'], 
                    "recid_event" => $row['recid_event_request']
                );
            }
            echo json_encode($data);
        }//end of function

    //END OF GLOBAL---------------------------------------------------------------------

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
            'app_module_login' => "Sports Event/Activity"
            ];
        }
  
      $agent = $this->request->getUserAgent();
      if ($agent->isMobile()) 
        {
            return view('website/home',$data);
            
        }
      elseif ($agent->isRobot())
        {
          return view('formerror');
        }
      elseif ($agent->isBrowser())
        {
            return view('website/home',$data);
            
        }
      else
        {
          return view('formerror');
      }
  }//end of function index


//====================================================================================================
//SPACER=> 
//====================================================================================================
  function website_home() {
    return view('website/home_content');
  }//end of function
//====================================================================================================
//SPACER=> 
//====================================================================================================
    function basketball_site() {
        return view('games/basketball/basketball_home');
    }//end of function index
//====================================================================================================
//SPACER=> 
//====================================================================================================
    function volleyball_site() {
        return view('games/volleyball/volleyball_home');
    }//end of function index
//====================================================================================================
//SPACER=> 
//====================================================================================================

  function view_basketball_activity() {
    if ($this->request->isAJAX()) {
        $recid_event_request = service('request')->getPost('recid_event_request',FILTER_SANITIZE_STRING); 
        $sports_name = service('request')->getPost('sports_name',FILTER_SANITIZE_STRING); 
    }//end isAJAX  sport_activity

    $GetList_Model = new Employee_model();
    $tablename = "sports_activity";
    $fieldname1 = "recid_event_request";
    $value1 = $recid_event_request;
    $fieldname2 = "sports_type";
    $value2 = $sports_name;
    $status_get = $GetList_Model->checkget_two_parameter($tablename,$fieldname1,$value1,$fieldname2,$value2);
    if($status_get) {
        $recid_sports_activity = $status_get['recid_sports_activity'];
    } else {
        $recid_sports_activity = "0";
    }

    //get date -start 
        $DateTimeNow = new Time('now'); //get current DateTime
        $time = Time::parse($DateTimeNow); //date and time
        $date_ngayun =  $time->toDateString(); // 2016-03-09 date lang ang value
    //get date -end

    //Get Schedule
    $tablename = "sports_schedules_team";
    $fieldname = "recid_sports_activity";
    $value = $recid_sports_activity;
    $status_get2 = $GetList_Model->checkget_one_parameter_return_more($tablename,$fieldname,$value);
    if($status_get2) {
        foreach($status_get2 as $value) {
            //check if Match date is above or equal current
            if($value['match_date'] >= $date_ngayun ) {

                //Get Team Standing
                $tablename = "sports_activity_details";
                $fieldname1 = "recid_sports_activity";
                $value1 = $recid_sports_activity;
                $fieldname2 = "team_name";
                $value2 = $value['match_team1_name'];
                $status_get3 = $GetList_Model->checkget_two_parameter($tablename,$fieldname1,$value1,$fieldname2,$value2);
                if($status_get3) {
                    $team1_standing = $status_get3['wins'] . " - " . $status_get3['loss'];
                } else {
                    $team1_standing = "x";
                }

                $fieldname1 = "recid_sports_activity";
                $value1 = $recid_sports_activity;
                $fieldname2 = "team_name";
                $value2 = $value['match_team2_name'];
                $status_get4 = $GetList_Model->checkget_two_parameter($tablename,$fieldname1,$value1,$fieldname2,$value2);
                if($status_get4) {
                    $team2_standing = $status_get4['wins'] . " - " . $status_get4['loss'];
                } else {
                    $team2_standing = "x";
                }

                $data_schedule_list[] = array(
                    'match_team1_name' => $value['match_team1_name'],
                    'team1_standing' => $team1_standing,
                    'match_team2_name' => $value['match_team2_name'],
                    'team2_standing' => $team2_standing,
                    'match_team1_logo' => $value['match_team1_logo'],
                    'match_team2_logo' => $value['match_team2_logo'],
                    'match_date_text' => $value['match_date_text'],
                    'match_time_text' => $value['match_time_text'],
                    'match_venue' => $value['match_venue']
                );
            } //end of match date
        }//end for each

    } else {
        $data_schedule_list = [];
    }

    $data =  array();  // create a new array  
    $data['data_schedule_list']= $data_schedule_list; // add $cleanarray to the new array 
    $data['recid_event_request']= $recid_event_request;
    $data['recid_sports_activity']= $recid_sports_activity;
    $data['sports_name']= $sports_name;

    //$data = [
    //    'recid_event_request' => $recid_event_request,
    //    'recid_sports_activity' => $recid_sports_activity,
    //    'sports_name' => $sports_name
    //];

    return view('games/basketball/basketball_view',$data);
  }//end of function

    //====================================================================================================
    //SPACER=> 
    //====================================================================================================

    function view_basketball_standing() {
        if ($this->request->isAJAX()) {
            $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING); 
        }//end isAJAX

        $GetList_Model = new Employee_model();

        $tablename = "sports_activity_details";
        $fieldname = "recid_sports_activity";
        $value = $recid_sports_activity;
       
        $status_get = $GetList_Model->checkget_one_parameter_return_more($tablename,$fieldname,$value);
        if($status_get) {
            foreach($status_get as $row) {
                //add name to list of full
                $data[] = array(
                    'logo' => $row['logo'],
                    'team_name' => $row['team_name'],
                    'wins' => $row['wins'],
                    'loss' => $row['loss'],
                    'percentage' => $row['percentage']
                );
            }
            echo json_encode($data);
        } //if status true
        
    }//end of function

    //====================================================================================================
    //SPACER=> 
    //====================================================================================================

    function view_volleyball_activity() {
        if ($this->request->isAJAX()) {
            $recid_event_request = service('request')->getPost('recid_event_request',FILTER_SANITIZE_STRING); 
            $sports_name = service('request')->getPost('sports_name',FILTER_SANITIZE_STRING); 
        }//end isAJAX  sport_activity
    
        $GetList_Model = new Employee_model();
        $tablename = "sports_activity";
        $fieldname1 = "recid_event_request";
        $value1 = $recid_event_request;
        $fieldname2 = "sports_type";
        $value2 = $sports_name;
        $status_get = $GetList_Model->checkget_two_parameter($tablename,$fieldname1,$value1,$fieldname2,$value2);
        if($status_get) {
            $recid_sports_activity = $status_get['recid_sports_activity'];
        } else {
            $recid_sports_activity = "0";
        }
        
        //get date -start 
        $DateTimeNow = new Time('now'); //get current DateTime
        $time = Time::parse($DateTimeNow); //date and time
        $date_ngayun =  $time->toDateString(); // 2016-03-09 date lang ang value
    //get date -end

    //Get Schedule
    $tablename = "sports_schedules_team";
    $fieldname = "recid_sports_activity";
    $value = $recid_sports_activity;
    $status_get2 = $GetList_Model->checkget_one_parameter_return_more($tablename,$fieldname,$value);
    if($status_get2) {
        foreach($status_get2 as $value) {
            //check if Match date is above or equal current
            if($value['match_date'] >= $date_ngayun ) {

                //Get Team Standing
                $tablename = "sports_activity_details";
                $fieldname1 = "recid_sports_activity";
                $value1 = $recid_sports_activity;
                $fieldname2 = "team_name";
                $value2 = $value['match_team1_name'];
                $status_get3 = $GetList_Model->checkget_two_parameter($tablename,$fieldname1,$value1,$fieldname2,$value2);
                if($status_get3) {
                    $team1_standing = $status_get3['wins'] . " - " . $status_get3['loss'];
                } else {
                    $team1_standing = "x";
                }

                $fieldname1 = "recid_sports_activity";
                $value1 = $recid_sports_activity;
                $fieldname2 = "team_name";
                $value2 = $value['match_team2_name'];
                $status_get4 = $GetList_Model->checkget_two_parameter($tablename,$fieldname1,$value1,$fieldname2,$value2);
                if($status_get4) {
                    $team2_standing = $status_get4['wins'] . " - " . $status_get4['loss'];
                } else {
                    $team2_standing = "x";
                }

                $data_schedule_list[] = array(
                    'match_team1_name' => $value['match_team1_name'],
                    'team1_standing' => $team1_standing,
                    'match_team2_name' => $value['match_team2_name'],
                    'team2_standing' => $team2_standing,
                    'match_team1_logo' => $value['match_team1_logo'],
                    'match_team2_logo' => $value['match_team2_logo'],
                    'match_date_text' => $value['match_date_text'],
                    'match_time_text' => $value['match_time_text'],
                    'match_venue' => $value['match_venue']
                );
            } //end of match date
        }//end for each

    } else {
        $data_schedule_list = [];
    }

    $data =  array();  // create a new array  
    $data['data_schedule_list']= $data_schedule_list; // add $cleanarray to the new array 
    $data['recid_event_request']= $recid_event_request;
    $data['recid_sports_activity']= $recid_sports_activity;
    $data['sports_name']= $sports_name;

    //$data = [
    //    'recid_event_request' => $recid_event_request,
    //    'recid_sports_activity' => $recid_sports_activity,
    //    'sports_name' => $sports_name
    //];
    
        return view('games/volleyball/volleyball_view',$data);
      }//end of function
    
        //====================================================================================================
        //SPACER=> 
        //====================================================================================================

        function view_volleyball_standing() {
            if ($this->request->isAJAX()) {
                $recid_sports_activity = service('request')->getPost('recid_sports_activity',FILTER_SANITIZE_STRING); 
            }//end isAJAX
    
            $GetList_Model = new Employee_model();
    
            $tablename = "sports_activity_details";
            $fieldname = "recid_sports_activity";
            $value = $recid_sports_activity;
           
            $status_get = $GetList_Model->checkget_one_parameter_return_more($tablename,$fieldname,$value);
            if($status_get) {
                foreach($status_get as $row) {
                    //add name to list of full
                    $data[] = array(
                        'logo' => $row['logo'],
                        'team_name' => $row['team_name'],
                        'wins' => $row['wins'],
                        'loss' => $row['loss'],
                        'percentage' => $row['percentage']
                    );
                }
                echo json_encode($data);
            } //if status true
            
        }//end of function
    
        //====================================================================================================
        //SPACER=> 
        //====================================================================================================

}//end of Games Controller