<?php namespace App\Models;
use \CodeIgniter\Model;

class Login_model extends Model {
    //START OF FILL DROPDOWN============================
        function getList_dropdown_dept() {
            $db = \Config\Database::connect();
            $builder = $this->db->table('appointment_dept_visit');
            $builder->select("*");
            $builder->orderBy("recid");
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getResultArray();
            } else {
                return false;
            }
        }//end of function

    //END OF FILL DROPDOWN============================

    function get_apps_data($tablename) {
        $db = db_connect();
        //$builder = $this->db->table('application_apps');
        $builder = $this->db->table($tablename);
        $builder->select("*");
        $result = $builder->get();
        if(count($result->getResultArray()) >= 1) {
            return $result->getRowArray();
        } else {
            return false;
        }
    }//end of function

    function get_user_department($tablename,$user_deptid) {
        $builder = $this->db->table($tablename);
        $builder->select("*");
        $builder->where("recid_dept",$user_deptid);
        $result = $builder->get();
        if(count($result->getResultArray()) >= 1) {
            return $result->getResultArray();
        } else {
            return false;
        }
    }//end of function
   
    function check_username($tablename,$uname) {
        $builder = $this->db->table($tablename);
        $builder->select("*");
        $builder->where("username",$uname);
        $result = $builder->get();
        if(count($result->getResultArray()) >= 1) {
            return $result->getRowArray();
        } else {
            return false;
        }
    }//end of function

    //User Access - Start=======
        function get_user_access_data($user_userid,$tablename) {
            $builder = $this->db->table($tablename);
            $builder->select("*");
            $builder->where("userid",$user_userid);
            $result = $builder->get();
            if(count($result->getResultArray()) >= 1) {
                return $result->getResultArray();
            } else {
                return false;
            }
        }//end of function
    //User Access - End=========


}//End of Login_model