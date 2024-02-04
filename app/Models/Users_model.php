<?php namespace App\Models;
use \CodeIgniter\Model;

class Users_model extends Model {
    //ACTIVE RECORD GLOBAL FUNCTION - START
        function get_single_record_with_one_parameter($tablename,$fieldname,$value) {
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


    //ACTIVE RECORD GLOBAL FUNCITON - END

    //SPACER ----->

    //START OF FILL DROPDOWN============================
        function getList_dropdown_dept() {
            $active = "Active";
            $db = \Config\Database::connect();
            $builder = $this->db->table('application_department');
            $builder->select("*");
            $builder->where("status", $active);
            $builder->orderBy("dept");
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getResultArray();
            } else {
                return false;
            }
        }//end of function

        function getList_dropdown_user_role() {
            $db = \Config\Database::connect();
            $builder = $this->db->table('application_user_role');
            $builder->select("*");
            $builder->orderBy("user_role");
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getResultArray();
            } else {
                return false;
            }
        }//end of function
    //END OF FILL DROPDOWN============================

    //SPACER ----->

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

        function add_user_access_data($tablename,$data) {
            $db = \Config\Database::connect();
            $builder = $this->db->table($tablename);
            //$builder = $this->db->table("application_users");
            $result = $builder->insert($data);
            if($this->db->affectedRows() == 1) {
                return true;
            } else {
                return false;
            }
        }//end of function

    //END OF ADDING RECORD

    //SPACER ----->

    //START OF UPDATING RECORD
    
        function update_user_data($tablename,$recid_user,$data) {
            $db = db_connect();
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where("recid_user", $recid_user);
            $query = $builder->update($data);
            if($query) {
                return true;
            } else {
                return false;
            }
        }//end of function

        function update_user_access_data($tablename,$recid_user,$sidebar,$submenu,$data) {
            $db = db_connect();
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where("userid", $recid_user);
            $builder->where("sidebar", $sidebar);
            $builder->where("submenu", $submenu);
            $query = $builder->update($data);
            if($query) {
                return true;
            } else {
                return false;
            }
        }//end of function

        function update_data_singlekey($tablename,$tablefield,$fieldvalue,$data) {
            $db = db_connect();
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where($tablefield, $fieldvalue);
            $query = $builder->update($data);
            if($query) {
                return true;
            } else {
                return false;
            }
        }//end of function
    //END OF UPDATING RECORD

    //SPACER ----->

    //START OF CHECKING AND GET RECORD
        function check_email_exist($email_add) {
            $builder = $this->db->table('application_users');
            $builder->select("*");
            $builder->where("email_add",$email_add);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }//end of function

        function check_username_exist($uname) {
            $builder = $this->db->table('application_users');
            $builder->select("*");
            $builder->where("username",$uname);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }//end of function

        function checkget_user_access_clickMenu($tablename,$recid_user,$sidebar,$submenu,$access,$access_value) {
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where("userid",$recid_user);
            $builder->where("sidebar",$sidebar);
            $builder->where("submenu",$submenu);
            $builder->where($access,$access_value);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }//end of function

        function checkget_user_access_data_menu_with_submenu($tablename,$recid_user,$sidebar,$submenu) {
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where("userid",$recid_user);
            $builder->where("sidebar",$sidebar);
            $builder->where("submenu",$submenu);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }//end of function

        function checkget_user_empnum($tablename,$empnum) {
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where("employee_number",$empnum);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }//end of function

        function checkget_user_recid($tablename,$recid_user) { //it is used to get QRcode and display on User Edit Form
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where("recid_user",$recid_user);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }//end of function

        function checkget_userDept_data($tablename,$dept) {
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where("dept",$dept);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }//end of function

        function checkget_user_access_recid($tablename,$recid_user) {
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where("userid",$recid_user);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getResultArray();
            } else {
                return false;
            }
        }//end of function

        function checkget_user_access($tablename,$recid_user,$sidebar,$submenu,$access,$access_value) {
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where("userid",$recid_user);
            $builder->where("sidebar",$sidebar);
            $builder->where("submenu",$submenu);
            $builder->where($access,$access_value);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getRowArray();
            } else {
                return false;
            }
        }//end of function

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

    //END OF CHECKING AND GET RECORD

    //SPACER ----->
   
    //START of SETUP / USER LIST
        //Start - DATA Table - SETUP / USER LIST
            function GetTotal_setup_user_list($user_deptid) {
                $sems_access = 1;
                $account_type = "Built-In";
                //Single Table
                //$sQuery = "SELECT COUNT(recid) as ID FROM application_users WHERE sems_access='$sems_access' AND account_type!='$account_type'  ";
                
                //Join Table
                //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
                $sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

                $db = db_connect();
                $query = $db->query($sQuery)->getRow();
                return $query;
            }//end of function

            function GetFiltered_setup_user_list($user_deptid) {
                $sems_access = 1;
                $account_type = "Built-In";
                //Searh on DataTable
                if($_POST['search']['value']) {
                    $search = $_POST['search']['value'];
                    $q_search = "fullname LIKE '%$search%' OR account_status LIKE '%$search%' OR employee_number LIKE '%$search%' OR account_type LIKE '%$search%' 
                                ";
                } else {
                    $q_search = "application_users.recid_user != ''";
                }
                //single table
                //$sQuery = "SELECT COUNT(recid) as ID FROM application_users  WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search )";
               
                //Join Table
                $sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";
 
                $db = db_connect();
                $query = $db->query($sQuery)->getRow();
                return $query;
            }//end of function

            function GetList_setup_user_list($user_deptid) {
                $sems_access = 1;
                $account_type = "Built-In";
                //Searh on DataTable
                if($_POST['search']['value']) {
                    $search = $_POST['search']['value'];
                    $q_search = "fullname LIKE '%$search%' OR account_status LIKE '%$search%' OR employee_number LIKE '%$search%' OR account_type LIKE '%$search%' 
                                ";
                } else {
                    $q_search = "application_users.recid_user != ''";
                }

                if($_POST['length']!=-1);
                $db = db_connect();
                //single table
                $builder = $db->table('application_users');

                //$query = $builder->select('*')
                        //Single Table
                        //->where('sems_access',$sems_access)
                        //->where('account_type!=',$account_type)
                        
                        //->groupStart()
                           // ->where($q_search)
                        //->groupEnd()

                //Join Table
                $query = $builder->select('*')
                        ->join('application_department', 'application_department.recid_dept = application_users.dept_id')
                        ->where('sems_access',$sems_access)
                        ->where('account_type !=',$account_type)
                        
                        ->groupStart()
                            ->where($q_search)
                        ->groupEnd()
                        
                        //->orderBy('recid','asc')
                        ->orderBy('fullname','asc')
                        ->limit($_POST['length'], $_POST['start'])
                        ->get();
                return $query->getResult();

            }//end of function
        //End -  DATA Table - SETUP / USER LIST
    //END of SETUP / USER LIST

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================
   
    //START of SETUP / DEPARTMENT

        //Start - DATA Table - SETUP / DEPARTMENT LIST
            function GetTotal_setup_department_list($user_deptid) {
                //Single Table
                $sQuery = "SELECT COUNT(recid_dept) as ID FROM application_department ";
                
                //Join Table
                //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

                $db = db_connect();
                $query = $db->query($sQuery)->getRow();
                return $query;
            }//end of function

            function GetFiltered_setup_department_list($user_deptid) {
                //Searh on DataTable
                if($_POST['search']['value']) {
                    $search = $_POST['search']['value'];
                    $q_search = "dept LIKE '%$search%' OR description LIKE '%$search%' OR status LIKE '%$search%'
                                ";
                } else {
                    $q_search = "application_department.recid_dept != ''";
                }
                //single table
                $sQuery = "SELECT COUNT(recid_dept) as ID FROM application_department WHERE ($q_search)";
            
                //Join Table
                //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

                $db = db_connect();
                $query = $db->query($sQuery)->getRow();
                return $query;
            }//end of function

            function GetList_setup_department_list($user_deptid) {
                //Searh on DataTable
                if($_POST['search']['value']) {
                    $search = $_POST['search']['value'];
                    $q_search = "dept LIKE '%$search%' OR description LIKE '%$search%' OR status LIKE '%$search%'
                                ";
                } else {
                    $q_search = "application_department.recid_dept != ''";
                }

                if($_POST['length']!=-1);
                $db = db_connect();
                //single table
                $builder = $db->table('application_department');

                //single table
                $query = $builder->select('*')
                        //->where('sems_access',$sems_access)
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
                        
                        //->orderBy('recid','asc')
                        ->orderBy('dept','asc')
                        ->limit($_POST['length'], $_POST['start'])
                        ->get();
                return $query->getResult();

            }//end of function
        //End -  DATA Table - SETUP / DEPARTMENT LIST

            function check_record_exist_singleRec($tablename,$fieldname,$fieldvalue) {
                $builder = $this->db->table($tablename);
                $builder->select("*");
                $builder->where($fieldname,$fieldvalue);
                $result = $builder->get();
                if(count($result->getResultArray()) >= 1) {
                    return $result->getRowArray();
                } else {
                    return false;
                }
            }//end of function

    //END of SETUP / DEPARTMENT 

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    //START of SETUP / ROLE
        //Start - DATA Table - SETUP / ROLE LIST
            function GetTotal_setup_role_list($user_deptid) {
                //Single Table
                $sQuery = "SELECT COUNT(recid_userrole) as ID FROM application_user_role";
                
                //Join Table
                //SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
                //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' ";

                $db = db_connect();
                $query = $db->query($sQuery)->getRow();
                return $query;
            }//end of function

            function GetFiltered_setup_role_list($user_deptid) {
                //Searh on DataTable
                if($_POST['search']['value']) {
                    $search = $_POST['search']['value'];
                    $q_search = "user_role LIKE '%$search%' 
                                ";
                } else {
                    $q_search = "application_user_role.recid_userrole != ''";
                }
                //single table
                $sQuery = "SELECT COUNT(recid_userrole) as ID FROM application_user_role WHERE ($q_search )";
            
                //Join Table
                //$sQuery = "SELECT COUNT(application_users.recid_user) as ID FROM application_users JOIN application_department ON application_users.dept_id = application_department.recid_dept WHERE sems_access='$sems_access' AND account_type!='$account_type' AND ($q_search) ";

                $db = db_connect();
                $query = $db->query($sQuery)->getRow();
                return $query;
            }//end of function

            function GetList_setup_role_list($user_deptid) {
                //Searh on DataTable
                if($_POST['search']['value']) {
                    $search = $_POST['search']['value'];
                    $q_search = "user_role LIKE '%$search%' 
                                ";
                } else {
                    $q_search = "application_user_role.recid_userrole != ''";
                }

                if($_POST['length']!=-1);
                $db = db_connect();
                //single table
                $builder = $db->table('application_user_role');

                //single table
                $query = $builder->select('*')
                        //->where('sems_access',$sems_access)
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
                        
                        //->orderBy('recid','asc')
                        ->orderBy('user_role','asc')
                        ->limit($_POST['length'], $_POST['start'])
                        ->get();
                return $query->getResult();

            }//end of function
        //End -  DATA Table - SETUP / ROLE LIST   

    //END of SETUP / ROLE

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================

    function checkget_one_parameter_one_result($tablename,$fieldname,$value) {
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

    //===========================================================================================
    //SPACER ----->
    //===========================================================================================



    

}//End of Login_model