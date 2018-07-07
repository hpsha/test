<?php
class Contact_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
public function add($data){
	$where = "contact_email =" . "'" . $data['contact_email'] . "'";
	$q=$this->db->select('contact_id')->from('tbl_contact')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->insert('tbl_contact', $data);
		if($q1){
			return 1;
		}
		else{
			return 2;
		}
	}
	else{
		return 3;
	}
}
public function get_contacts(){
	$where = "contact_act=1";
	return $this->db->select('contact_rand,contact_name,contact_number,contact_email')->from('tbl_contact')->where($where)->get()->result();
}
public function get_inactiveagents(){
	$where = "agent_act=0";
	return $this->db->select('agent_rand,agent_name,agent_phone,agent_email,agent_address_line1,agent_address_line2,agent_address_line3,agent_address_line4,agent_pincode,agent_act')->from('tbl_agent')->where($where)->get()->result();
}
public function get_contact($key){
	$where = "contact_act=1 AND contact_rand='$key'";
	return $this->db->select('contact_rand,contact_name,contact_number,contact_email')->from('tbl_contact')->where($where)->get()->row();
}
public function update_data($data, $id)
    {
        $this->db->where('contact_rand', $id);
        if ($this->db->update('tbl_contact', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
public function get_role()
{
	$where="admin_role_act=1";
	return $this->db->select('admin_role_id,admin_role_name')->from('tbl_admin_roles')->where($where)->get()->result();
}
public function update($data,$pass,$rand){
	$where = "employee_email =" . "'" . $data['employee_email'] . "' AND employee_rand!='$rand'";
	$q=$this->db->select('employee_id')->from('tbl_employee')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->where('employee_rand',$rand)->update('tbl_employee', $data);
		if($q1){
			$q2=$this->db->where('admin_rand',$rand)->update('tbl_admin', array('admin_rand' => $data['employee_rand'],'admin_username' => $data['employee_email'],'admin_password' => $pass,'employee_id' => $insert_id,'admin_profile_picture' => $data['employee_profile'],'admin_created_on' => $data['employee_created_on'],'admin_role' => $data['admin_role_id'],'admin_act' => 1));
			return 1;
		}
		else{
			return 2;
		}
	}
	else{
		return 3;
	}
}
}

?>