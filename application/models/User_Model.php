<?php
class User_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    // Read data using username and password
    public function login($data) {
        
        $condition = "admin_username =" . "'" . $data['admin_username'] . "' AND " . "admin_password =" . "'" . $data['admin_password'] . "' AND admin_type='2'";
        $this->db->select('admin_username');
        $this->db->from('tbl_admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        $condition1 = "admin_username =" . "'" . $data['admin_username'] . "' AND " . "admin_password =" . "'" . $data['admin_password'] . "' AND admin_type='3'";
        $query1 = $this->db->select('admin_username')->from('tbl_admin')->where($condition1)->get();

        $s1 = array();
        if ($query->num_rows() == 1) {
            $s1= array('userRole' => 'General Admin', 'userType'=> 2);
            return $s1;
        }else if($query1->num_rows() == 1) {
            $s1= array('userRole' => 'ASM/ASO', 'userType'=> 3);
            return $s1;
        }
        else {
            echo 1;
            return false;
        }
    }
     // Read data from database to show data in admin page
    public function read_user_information($username) {
        $condition = "admin_username =" . "'" . $username . "'";
        $this->db->select('admin_id, admin_username, admin_password, admin_type,employee_id,admin_profile_picture,admin_role');
        $this->db->from('tbl_admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
}
