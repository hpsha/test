<?php

class Roles_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    // Add Role model
    public function add_role_model($data) {
	  $condition = "admin_role_name =" . "'" . $data['admin_role_name'] . "' and admin_role_act=1";
        $this->db->select('*');
        $this->db->from('tbl_admin_roles');
        $this->db->where($condition);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 0) {
			$this->db->insert('tbl_admin_roles', $data);
			 if ($this->db->affected_rows() > 0) {
				return 1;
			 }
			 else {
            return 2;
        }
        } else {
            return 3;
        }
    }
   
    // list Roles model
    public function list_role() {
		$condition = "admin_role_act=1";
        $this->db->select('*');
        $this->db->from('tbl_admin_roles');
        $this->db->where($condition);
		$query = $this->db->get()->result();
        if ($query) {
			return $query;
			 }
        else {
            return false;
        }
    }
	//Fetch Role datas
	public function fetch_Roles_val($key){
		$condition = "admin_role_rand='$key'";
		$this->db->select('admin_role_id,admin_role_name,admin_role_permission');
		$this->db->from('tbl_admin_roles');
		$this->db->where($condition);
		$query= $this->db->get()->result();
		if($query){
			return $query;
			
		}
		else{
			return false;
		}
	}
	
	    // Edit Role model
    public function Roles_edit($data) {
		$id = $data['admin_role_id'];
	  $condition = "`admin_role_name` =" . "'" . $data['admin_role_name'] . "' and `admin_role_id` !='$id'";
        $this->db->select('*');
        $this->db->from('tbl_admin_roles');
        $this->db->where($condition);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 0) {
				$this->db->where('admin_role_id', $id);
			if ($this->db->update('tbl_admin_roles', $data)) {
				return 1;
			}
			else{
				return 2;

            }
		}
		else {
            return 3;
        }
    }
	//Delete role 
	public function delete_data($data, $rand)
    {
			$this->db->where('admin_role_rand', $rand);
			if ($this->db->update('tbl_admin_roles', $data)) {
            return 1;
            }
            else{
            return 2;

            }
    }
	

   
	

}

?>