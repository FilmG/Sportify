<?php namespace App\Models;
use \CodeIgniter\Model;

class Employee_model extends Model {

    //START OF FILL DROPDOWN============================
        function getList_dropdown_height() {
            $db = \Config\Database::connect();
            $builder = $this->db->table('height');
            $builder->select("*");
            $builder->orderBy("recid_height");
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getResultArray();
            } else {
                return false;
            }
        }//end of function

        function getList_dropdown_team($recid_sports_activity) {
            $db = \Config\Database::connect();
            $builder = $this->db->table('sports_activity_details');
            $builder->select("*");
            $builder->where("recid_sports_activity",$recid_sports_activity);
            $builder->orderBy("team_name");
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getResultArray();
            } else {
                return false;
            }
        }//end of function

        function getList_dropdown_event($date_ngayun) {
            $db = \Config\Database::connect();
            $builder = $this->db->table('event_request');
            $builder->select("*");
            $builder->where("event_date_to >", $date_ngayun);
            $builder->orderBy("event_acty_title");
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getResultArray();
            } else {
                return false;
            }
        }//end of function
    //END OF FILL DROPDOWN============================
    
    //START OF ADDING RECORD
        function insert_data($tablename,$data) {
            //function insert_user_data($data) {
                $db = \Config\Database::connect();
                $builder = $this->db->table($tablename);
                //$builder = $this->db->table("application_users");
                $result = $builder->insert($data);
                if($this->db->affectedRows() == 1) {
                    //return true;
                    return $this->db->insertID();
                } else {
                    return false;
                }
            }//end of function
    //END OF ADDING RECORD

    //START OF CHECK GET RECORD
        function checkget_one_parameter($tablename,$fieldname,$value) {
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where($fieldname,$value);
            
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }//end of function

        function checkget_one_parameter_return_more($tablename,$fieldname,$value) {
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where($fieldname,$value);
            
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getResultArray();
            } else {
                return false;
            }
        }//end of function

        function checkget_two_parameter($tablename,$fieldname1,$value1,$fieldname2,$value2) {
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where($fieldname1,$value1);
            $builder->where($fieldname2,$value2);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }//end of function

    //END OF CHECK GET RECORD

    //START OF UPDATE RECORD
        function update_one_parameter($tablename,$fieldname,$value,$data) {
            $db = db_connect();
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where($fieldname, $value);
            $query = $builder->update($data);
            if($query) {
                return true;
            } else {
                return false;
            }
        }//end of function

        
    //END OF UPDATE RECORD

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================
    
    //START OF GET RECORD 
    
    //    function get_singledata_by_recid($tablename,$recid_fieldname,$field_value) {
    //        $builder = $this->db->table($tablename);
    //        $builder->select("*");
    //        $builder->where($recid_fieldname,$field_value);
    //        $result = $builder->get();
    //        if(count($result->getResultArray()) >= 1) {
    //            return $result->getRowArray();
    //        } else {
    //            return false;
    //        }
    //    }//end of function
    
        //END OF GET RECORD

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

     //START of EVENT REQUEST LIST

        //Per Department -Start
        //Start - DATA Table - EVENT REQUEST LIST
            function GetTotal_event_request_list($user_deptid) {
                //Single Table
                $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request WHERE recid_dept='$user_deptid'  ";
                
                //Join Table
                //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
                //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

                $db = db_connect();
                $query = $db->query($sQuery)->getRow();
                return $query;
            }//end of function

            function GetFiltered_event_request_list($user_deptid) {
                //Searh on DataTable
                if($_POST['search']['value']) {
                    $search = $_POST['search']['value'];
                    $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                                ";
                } else {
                    $q_search = "event_request.recid_event_request != ''";
                }
                //single table
                $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request  WHERE recid_dept='$user_deptid' AND ($q_search )";
            
                //Join Table
                //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

                $db = db_connect();
                $query = $db->query($sQuery)->getRow();
                return $query;
            }//end of function

            function GetList_event_request_list($user_deptid) {
                //Searh on DataTable
                if($_POST['search']['value']) {
                    $search = $_POST['search']['value'];
                    $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                                ";
                } else {
                    $q_search = "event_request.recid_event_request != ''";
                }

                if($_POST['length']!=-1);
                $db = db_connect();
                //single table
                $builder = $db->table('event_request');

                $query = $builder->select('*')
                        //Single Table
                        ->where('recid_dept',$user_deptid)
                        //->where('account_type!=',$account_type)
                        
                        //->groupStart()
                        // ->where($q_search)
                        //->groupEnd()

                //Join Table
                //$query = $builder->select('*')
                //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
                //        ->where('sems_access',$sems_access)
                //        ->where('account_type !=',$account_type)
                        
                //        ->groupStart()
                //            ->where($q_search)
                //        ->groupEnd()
                        
                        ->orderBy('recid_event_request','desc')
                        //->orderBy('fullname','asc')
                        ->limit($_POST['length'], $_POST['start'])

                        ->get();
                return $query->getResult();

            }//end of function
        //End -  DATA Table - EVENT REQUEST LIST
        //Per Department -End

//===========================================================================================
//SPACER ----->
//===========================================================================================

    //Start - DATA Table - EVENT APPROVAL COURSE ADVISER LIST
        function GetTotal_event_approval_ca($value) {
            //Single Table
            $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request WHERE course_adviser_sign ='$value' ";
            
            //Join Table
            //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
            //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

            $db = db_connect();
            $query = $db->query($sQuery)->getRow();
            return $query;
        }//end of function

        function GetFiltered_event_approval_ca($value) {
            //Searh on DataTable
            if($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                            ";
            } else {
                $q_search = "event_request.recid_event_request != ''";
            }
            //single table
            $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request  WHERE course_adviser_sign ='$value' AND ($q_search )";
        
            //Join Table
            //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

            $db = db_connect();
            $query = $db->query($sQuery)->getRow();
            return $query;
        }//end of function

        function GetList_event_approval_ca($value) {
            //Searh on DataTable
            if($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                            ";
            } else {
                $q_search = "event_request.recid_event_request != ''";
            }

            if($_POST['length']!=-1);
            $db = db_connect();
            //single table
            $builder = $db->table('event_request');

            $query = $builder->select('*')
                    //Single Table
                    ->where('course_adviser_sign',$value)
                    //->where('account_type!=',$account_type)
                    
                    //->groupStart()
                    // ->where($q_search)
                    //->groupEnd()

            //Join Table
            //$query = $builder->select('*')
            //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
            //        ->where('sems_access',$sems_access)
            //        ->where('account_type !=',$account_type)
                    
            //        ->groupStart()
                        ->where($q_search)
            //        ->groupEnd()
                    
                    ->orderBy('recid_event_request','desc')
                    //->orderBy('fullname','asc')
                    ->limit($_POST['length'], $_POST['start'])

                    ->get();
            return $query->getResult();

        }//end of function
    //End -  DATA Table - EVENT APPROVAL COURSE ADVISER LIST

//===========================================================================================
//SPACER ----->
//===========================================================================================

//Start - DATA Table - EVENT APPROVAL COURSE ADVISER LIST
function GetTotal_event_approval_cc($value) {
    //Single Table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request WHERE course_coordinator_sign ='$value' ";
    
    //Join Table
    //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetFiltered_event_approval_cc($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }
    //single table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request  WHERE course_coordinator_sign ='$value' AND ($q_search )";

    //Join Table
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetList_event_approval_cc($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }

    if($_POST['length']!=-1);
    $db = db_connect();
    //single table
    $builder = $db->table('event_request');

    $query = $builder->select('*')
            //Single Table
            ->where('course_coordinator_sign',$value)
            //->where('account_type!=',$account_type)
            
            //->groupStart()
            // ->where($q_search)
            //->groupEnd()

    //Join Table
    //$query = $builder->select('*')
    //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
    //        ->where('sems_access',$sems_access)
    //        ->where('account_type !=',$account_type)
            
    //        ->groupStart()
                ->where($q_search)
    //        ->groupEnd()
            
            ->orderBy('recid_event_request','desc')
            //->orderBy('fullname','asc')
            ->limit($_POST['length'], $_POST['start'])

            ->get();
    return $query->getResult();

}//end of function
//End -  DATA Table - EVENT APPROVAL COURSE ADVISER LIST

//===========================================================================================
//SPACER ----->
//===========================================================================================

//Start - DATA Table - EVENT APPROVAL PSMO LIST
function GetTotal_event_approval_psmo($value) {
    //Single Table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request WHERE psmo_sign ='$value' ";
    
    //Join Table
    //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetFiltered_event_approval_psmo($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }
    //single table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request  WHERE psmo_sign ='$value' AND ($q_search )";

    //Join Table
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetList_event_approval_psmo($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }

    if($_POST['length']!=-1);
    $db = db_connect();
    //single table
    $builder = $db->table('event_request');

    $query = $builder->select('*')
            //Single Table
            ->where('psmo_sign',$value)
            //->where('account_type!=',$account_type)
            
            //->groupStart()
            // ->where($q_search)
            //->groupEnd()

    //Join Table
    //$query = $builder->select('*')
    //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
    //        ->where('sems_access',$sems_access)
    //        ->where('account_type !=',$account_type)
            
    //        ->groupStart()
                ->where($q_search)
    //        ->groupEnd()
            
            ->orderBy('recid_event_request','desc')
            //->orderBy('fullname','asc')
            ->limit($_POST['length'], $_POST['start'])

            ->get();
    return $query->getResult();

}//end of function
//End -  DATA Table - EVENT APPROVAL PSMO LIST

//===========================================================================================
//SPACER ----->
//===========================================================================================

//Start - DATA Table - EVENT APPROVAL Academic Coordinator LIST
function GetTotal_event_approval_ac($value) {
    //Single Table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request WHERE acad_coordinator_sign ='$value' ";
    
    //Join Table
    //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetFiltered_event_approval_ac($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }
    //single table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request  WHERE acad_coordinator_sign ='$value' AND ($q_search )";

    //Join Table
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetList_event_approval_ac($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }

    if($_POST['length']!=-1);
    $db = db_connect();
    //single table
    $builder = $db->table('event_request');

    $query = $builder->select('*')
            //Single Table
            ->where('acad_coordinator_sign',$value)
            //->where('account_type!=',$account_type)
            
            //->groupStart()
            // ->where($q_search)
            //->groupEnd()

    //Join Table
    //$query = $builder->select('*')
    //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
    //        ->where('sems_access',$sems_access)
    //        ->where('account_type !=',$account_type)
            
    //        ->groupStart()
                ->where($q_search)
    //        ->groupEnd()
            
            ->orderBy('recid_event_request','desc')
            //->orderBy('fullname','asc')
            ->limit($_POST['length'], $_POST['start'])

            ->get();
    return $query->getResult();

}//end of function
//End -  DATA Table - EVENT APPROVAL Academic Coordinator LIST

//===========================================================================================
//SPACER ----->
//===========================================================================================

//Start - DATA Table - EVENT APPROVAL OSA Coordinator LIST
function GetTotal_event_approval_osa($value) {
    //Single Table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request WHERE osa_sign ='$value' ";
    
    //Join Table
    //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetFiltered_event_approval_osa($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }
    //single table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request  WHERE osa_sign ='$value' AND ($q_search )";

    //Join Table
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetList_event_approval_osa($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }

    if($_POST['length']!=-1);
    $db = db_connect();
    //single table
    $builder = $db->table('event_request');

    $query = $builder->select('*')
            //Single Table
            ->where('osa_sign',$value)
            //->where('account_type!=',$account_type)
            
            //->groupStart()
            // ->where($q_search)
            //->groupEnd()

    //Join Table
    //$query = $builder->select('*')
    //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
    //        ->where('sems_access',$sems_access)
    //        ->where('account_type !=',$account_type)
            
    //        ->groupStart()
                ->where($q_search)
    //        ->groupEnd()
            
            ->orderBy('recid_event_request','desc')
            //->orderBy('fullname','asc')
            ->limit($_POST['length'], $_POST['start'])

            ->get();
    return $query->getResult();

}//end of function
//End -  DATA Table - EVENT APPROVAL OSA Coordinator LIST

//===========================================================================================
//SPACER ----->
//===========================================================================================

//Start - DATA Table - EVENT APPROVAL Campus Manager LIST
function GetTotal_event_approval_cm($value) {
    //Single Table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request WHERE campus_manager_sign ='$value' ";
    
    //Join Table
    //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetFiltered_event_approval_cm($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }
    //single table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request  WHERE campus_manager_sign ='$value' AND ($q_search )";

    //Join Table
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetList_event_approval_cm($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }

    if($_POST['length']!=-1);
    $db = db_connect();
    //single table
    $builder = $db->table('event_request');

    $query = $builder->select('*')
            //Single Table
            ->where('campus_manager_sign',$value)
            //->where('account_type!=',$account_type)
            
            //->groupStart()
            // ->where($q_search)
            //->groupEnd()

    //Join Table
    //$query = $builder->select('*')
    //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
    //        ->where('sems_access',$sems_access)
    //        ->where('account_type !=',$account_type)
            
    //        ->groupStart()
                ->where($q_search)
    //        ->groupEnd()
            
            ->orderBy('recid_event_request','desc')
            //->orderBy('fullname','asc')
            ->limit($_POST['length'], $_POST['start'])

            ->get();
    return $query->getResult();

}//end of function
//End -  DATA Table - EVENT APPROVAL Campus Manager LIST

//===========================================================================================
//SPACER ----->
//===========================================================================================

//Start - DATA Table - EVENT APPROVAL Director for Academic LIST
function GetTotal_event_approval_dir_acad($value) {
    //Single Table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request WHERE dir_acad_sign ='$value' ";
    
    //Join Table
    //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetFiltered_event_approval_dir_acad($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }
    //single table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request  WHERE dir_acad_sign ='$value' AND ($q_search )";

    //Join Table
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetList_event_approval_dir_acad($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }

    if($_POST['length']!=-1);
    $db = db_connect();
    //single table
    $builder = $db->table('event_request');

    $query = $builder->select('*')
            //Single Table
            ->where('dir_acad_sign',$value)
            //->where('account_type!=',$account_type)
            
            //->groupStart()
            // ->where($q_search)
            //->groupEnd()

    //Join Table
    //$query = $builder->select('*')
    //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
    //        ->where('sems_access',$sems_access)
    //        ->where('account_type !=',$account_type)
            
    //        ->groupStart()
                ->where($q_search)
    //        ->groupEnd()
            
            ->orderBy('recid_event_request','desc')
            //->orderBy('fullname','asc')
            ->limit($_POST['length'], $_POST['start'])

            ->get();
    return $query->getResult();

}//end of function
//End -  DATA Table - EVENT APPROVAL Director for Academic LIST

//===========================================================================================
//SPACER ----->
//===========================================================================================

//Start - DATA Table - EVENT APPROVAL Director for Administration LIST
function GetTotal_event_approval_dir_admin($value) {
    //Single Table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request WHERE dir_admin_sign ='$value' ";
    
    //Join Table
    //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetFiltered_event_approval_dir_admin($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }
    //single table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request  WHERE dir_admin_sign ='$value' AND ($q_search )";

    //Join Table
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetList_event_approval_dir_admin($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }

    if($_POST['length']!=-1);
    $db = db_connect();
    //single table
    $builder = $db->table('event_request');

    $query = $builder->select('*')
            //Single Table
            ->where('dir_admin_sign',$value)
            //->where('account_type!=',$account_type)
            
            //->groupStart()
            // ->where($q_search)
            //->groupEnd()

    //Join Table
    //$query = $builder->select('*')
    //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
    //        ->where('sems_access',$sems_access)
    //        ->where('account_type !=',$account_type)
            
    //        ->groupStart()
                ->where($q_search)
    //        ->groupEnd()
            
            ->orderBy('recid_event_request','desc')
            //->orderBy('fullname','asc')
            ->limit($_POST['length'], $_POST['start'])

            ->get();
    return $query->getResult();

}//end of function
//End -  DATA Table - EVENT APPROVAL Director for Administration LIST

//===========================================================================================
//SPACER ----->
//===========================================================================================

//Start - DATA Table - EVENT APPROVAL President LIST
function GetTotal_event_approval_pres($value) {
    //Single Table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request WHERE pres_sign ='$value' ";
    
    //Join Table
    //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetFiltered_event_approval_pres($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }
    //single table
    $sQuery = "SELECT COUNT(recid_event_request) as ID FROM event_request  WHERE pres_sign ='$value' AND ($q_search )";

    //Join Table
    //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

    $db = db_connect();
    $query = $db->query($sQuery)->getRow();
    return $query;
}//end of function

function GetList_event_approval_pres($value) {
    //Searh on DataTable
    if($_POST['search']['value']) {
        $search = $_POST['search']['value'];
        $q_search = "event_level_ref LIKE '%$search%' OR event_dept LIKE '%$search%' OR event_date_from_text LIKE '%$search%' OR event_venue_acty LIKE '%$search%' 
                    ";
    } else {
        $q_search = "event_request.recid_event_request != ''";
    }

    if($_POST['length']!=-1);
    $db = db_connect();
    //single table
    $builder = $db->table('event_request');

    $query = $builder->select('*')
            //Single Table
            ->where('pres_sign',$value)
            //->where('account_type!=',$account_type)
            
            //->groupStart()
            // ->where($q_search)
            //->groupEnd()

    //Join Table
    //$query = $builder->select('*')
    //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
    //        ->where('sems_access',$sems_access)
    //        ->where('account_type !=',$account_type)
            
    //        ->groupStart()
                ->where($q_search)
    //        ->groupEnd()
            
            ->orderBy('recid_event_request','desc')
            //->orderBy('fullname','asc')
            ->limit($_POST['length'], $_POST['start'])

            ->get();
    return $query->getResult();

}//end of function
//End -  DATA Table - EVENT APPROVAL President LIST

//===========================================================================================
//SPACER ----->
//===========================================================================================

//START of SPORTS ACTIVITY LIST

        //Start - DATA Table - SPORTS ACTIVITY LIST
        function GetTotal_sports_activity_list($event_request_recid) {
            //Single Table
            $sQuery = "SELECT COUNT(recid_sports_activity) as ID FROM sports_activity WHERE recid_event_request='$event_request_recid'  ";
            
            //Join Table
            //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
            //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

            $db = db_connect();
            $query = $db->query($sQuery)->getRow();
            return $query;
        }//end of function

        function GetFiltered_sports_activity_list($event_request_recid) {
            //Searh on DataTable
            if($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $q_search = "sports_title LIKE '%$search%' OR group_no LIKE '%$search%' OR group_unit LIKE '%$search%' 
                            ";
            } else {
                $q_search = "sports_activity.recid_sports_activity != ''";
            }
            //single table
            $sQuery = "SELECT COUNT(recid_sports_activity) as ID FROM sports_activity  WHERE recid_event_request='$event_request_recid' AND ($q_search )";
        
            //Join Table
            //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

            $db = db_connect();
            $query = $db->query($sQuery)->getRow();
            return $query;
        }//end of function

        function GetList_sports_activity_list($event_request_recid) {
            //Searh on DataTable
            if($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $q_search = "sports_title LIKE '%$search%' OR group_no LIKE '%$search%' OR group_unit LIKE '%$search%' 
                            ";
            } else {
                $q_search = "sports_activity.recid_sports_activity != ''";
            }

            if($_POST['length']!=-1);
            $db = db_connect();
            //single table
            $builder = $db->table('sports_activity');

            $query = $builder->select('*')
                    //Single Table
                    ->where('recid_event_request',$event_request_recid)
                    //->where('account_type!=',$account_type)
                    
                    //->groupStart()
                     ->where($q_search)
                    //->groupEnd()

            //Join Table
            //$query = $builder->select('*')
            //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
            //        ->where('sems_access',$sems_access)
            //        ->where('account_type !=',$account_type)
                    
            //        ->groupStart()
            //            ->where($q_search)
            //        ->groupEnd()
                    
                    ->orderBy('recid_sports_activity','desc')
                    //->orderBy('fullname','asc')
                    ->limit($_POST['length'], $_POST['start'])

                    ->get();
            return $query->getResult();

        }//end of function
    //End -  DATA Table - SPORTS ACTIVITY LIST
   

//===========================================================================================
//SPACER ----->
//===========================================================================================

//START of SPORTS ACTIVITY DETAILS LIST

        //Start - DATA Table - SPORTS ACTIVITY DETAILS LIST
        function GetTotal_sports_activity_details_list($recid_sports_activity) {
            //Single Table
            $sQuery = "SELECT COUNT(recid_sports_activity_details) as ID FROM sports_activity_details WHERE recid_sports_activity='$recid_sports_activity'  ";
            
            //Join Table
            //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
            //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

            $db = db_connect();
            $query = $db->query($sQuery)->getRow();
            return $query;
        }//end of function

        function GetFiltered_sports_activity_details_list($recid_sports_activity) {
            //Searh on DataTable
            if($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $q_search = "team_name LIKE '%$search%' OR coach_name LIKE '%$search%' 
                            ";
            } else {
                $q_search = "sports_activity_details.recid_sports_activity_details != ''";
            }
            //single table
            $sQuery = "SELECT COUNT(recid_sports_activity_details) as ID FROM sports_activity_details  WHERE recid_sports_activity='$recid_sports_activity' AND ($q_search )";
        
            //Join Table
            //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

            $db = db_connect();
            $query = $db->query($sQuery)->getRow();
            return $query;
        }//end of function

        function GetList_sports_activity_details_list($recid_sports_activity) {
            //Searh on DataTable
            if($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $q_search = "team_name LIKE '%$search%' OR coach_name LIKE '%$search%' 
                            ";
            } else {
                $q_search = "sports_activity_details.recid_sports_activity_details != ''";
            }

            if($_POST['length']!=-1);
            $db = db_connect();
            //single table
            $builder = $db->table('sports_activity_details');

            $query = $builder->select('*')
                    //Single Table
                    ->where('recid_sports_activity',$recid_sports_activity)
                    //->where('account_type!=',$account_type)
                    
                    //->groupStart()
                     ->where($q_search)
                    //->groupEnd()

            //Join Table
            //$query = $builder->select('*')
            //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
            //        ->where('sems_access',$sems_access)
            //        ->where('account_type !=',$account_type)
                    
            //        ->groupStart()
            //            ->where($q_search)
            //        ->groupEnd()
                    
                    ->orderBy('recid_sports_activity_details','desc')
                    //->orderBy('fullname','asc')
                    ->limit($_POST['length'], $_POST['start'])

                    ->get();
            return $query->getResult();

        }//end of function
    //End -  DATA Table - SPORTS ACTIVITY DETAILS LIST
   

//===========================================================================================
//SPACER ----->
//===========================================================================================

//START of SPORTS ACTIVITY DETAILS LIST

        //Start - DATA Table - SPORTS ACTIVITY DETAILS LIST
        function GetTotal_players_detail_list($recid_sports_activity_details) {
            //Single Table
            $sQuery = "SELECT COUNT(recid_player_per_team) as ID FROM player_perteam WHERE recid_sports_activity_details='$recid_sports_activity_details'  ";
            
            //Join Table
            //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
            //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

            $db = db_connect();
            $query = $db->query($sQuery)->getRow();
            return $query;
        }//end of function

        function GetFiltered_players_detail_list($recid_sports_activity_details) {
            //Searh on DataTable
            if($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $q_search = "player_lname LIKE '%$search%' OR player_fname LIKE '%$search%' OR player_suffix LIKE '%$search%' OR player_position LIKE '%$search%' 
                            OR player_height LIKE '%$search%' OR player_course LIKE '%$search%' OR player_section LIKE '%$search%' 
                            ";
            } else {
                $q_search = "player_perteam.recid_player_per_team != ''";
            }
            //single table
            $sQuery = "SELECT COUNT(recid_player_per_team) as ID FROM player_perteam  WHERE recid_sports_activity_details='$recid_sports_activity_details' AND ($q_search )";
        
            //Join Table
            //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

            $db = db_connect();
            $query = $db->query($sQuery)->getRow();
            return $query;
        }//end of function

        function GetList_players_detail_list($recid_sports_activity_details) {
            //Searh on DataTable
            if($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $q_search = "player_lname LIKE '%$search%' OR player_fname LIKE '%$search%' OR player_suffix LIKE '%$search%' OR player_position LIKE '%$search%' 
                            OR player_height LIKE '%$search%' OR player_course LIKE '%$search%' OR player_section LIKE '%$search%' 
                            ";
            } else {
                $q_search = "player_perteam.recid_player_per_team != ''";
            }

            if($_POST['length']!=-1);
            $db = db_connect();
            //single table
            $builder = $db->table('player_perteam');

            $query = $builder->select('*')
                    //Single Table
                    ->where('recid_sports_activity_details',$recid_sports_activity_details)
                    //->where('account_type!=',$account_type)
                    
                    //->groupStart()
                     ->where($q_search)
                    //->groupEnd()

            //Join Table
            //$query = $builder->select('*')
            //        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
            //        ->where('sems_access',$sems_access)
            //        ->where('account_type !=',$account_type)
                    
            //        ->groupStart()
            //            ->where($q_search)
            //        ->groupEnd()
                    
                    ->orderBy('recid_player_per_team','desc')
                    //->orderBy('fullname','asc')
                    ->limit($_POST['length'], $_POST['start'])

                    ->get();
            return $query->getResult();

        }//end of function
    //End -  DATA Table - SPORTS ACTIVITY DETAILS LIST
   

//===========================================================================================
//SPACER ----->
//===========================================================================================

//START of sports_schedule_list

        //Start - DATA Table - sports_schedule_list
        function GetTotal_sports_schedule_list($recid_sports_activity) {
            //Single Table
            $sQuery = "SELECT COUNT(recid_sports_schedules_team) as ID FROM sports_schedules_team WHERE recid_sports_activity='$recid_sports_activity'  ";
            
            //Join Table
            //$sQuery = "SELECT COUNT(sports_schedules_team.recid_sports_schedules_team) as ID FROM sports_schedules_team JOIN sports_activity_details ON sports_schedules_team.recid_sports_activity = sports_activity_details.recid_sports_activity WHERE sports_schedules_team.recid_sports_activity='$recid_sports_activity' ";

            $db = db_connect();
            $query = $db->query($sQuery)->getRow();
            return $query;
        }//end of function

        function GetFiltered_sports_schedule_list($recid_sports_activity) {
            //Searh on DataTable
            if($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $q_search = "match_team1_name LIKE '%$search%' OR match_team2_name LIKE '%$search%' OR match_venue LIKE '%$search%' OR match_date_text LIKE '%$search%'
                            ";
            } else {
                $q_search = "recid_sports_schedules_team != ''";
            }
            //single table
            $sQuery = "SELECT COUNT(recid_sports_schedules_team) as ID FROM sports_schedules_team  WHERE recid_sports_activity='$recid_sports_activity' AND ($q_search )";
        
            //Join Table
            //$sQuery = "SELECT COUNT(sports_schedules_team.recid_sports_schedules_team) as ID FROM sports_schedules_team JOIN sports_activity_details ON sports_schedules_team.recid_sports_activity = sports_activity_details.recid_sports_activity WHERE sports_schedules_team.recid_sports_activity='$recid_sports_activity' AND ($q_search) ";

            $db = db_connect();
            $query = $db->query($sQuery)->getRow();
            return $query;
        }//end of function

        function GetList_sports_schedule_list($recid_sports_activity) {
            //Searh on DataTable
            if($_POST['search']['value']) {
                $search = $_POST['search']['value'];
                $q_search = "match_team1_name LIKE '%$search%' OR match_team2_name LIKE '%$search%' OR match_venue LIKE '%$search%' OR match_date_text LIKE '%$search%'
                            ";
            } else {
                $q_search = "recid_sports_schedules_team != ''";
            }

            if($_POST['length']!=-1);
            $db = db_connect();
            //single table
            $builder = $db->table('sports_schedules_team');

            $query = $builder->select('*')
                    //Single Table
                    ->where('recid_sports_activity',$recid_sports_activity)
                    //->where('account_type!=',$account_type)
                    
                    //->groupStart()
                     ->where($q_search)
                    //->groupEnd()

            //Join Table
            //$query = $builder->select('*')
            //        ->join('sports_activity_details', 'sports_schedules_team.recid_sports_activity = sports_activity_details.recid_sports_activity')
            //        ->where('sports_schedules_team.recid_sports_activity',$recid_sports_activity)
                    //->where('account_type !=',$account_type)
                    
            //        ->groupStart()
            //            ->where($q_search)
            //        ->groupEnd()
                    
                    ->orderBy('recid_sports_schedules_team','desc')
                    //->orderBy('fullname','asc')
                    ->limit($_POST['length'], $_POST['start'])

                    ->get();
            return $query->getResult();

        }//end of function
    //End -  DATA Table - sports_schedule_list
   

//===========================================================================================
//SPACER ----->
//===========================================================================================

}//End of Employee_model