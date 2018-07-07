<?php
class Employee_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
public function add($data,$pass){
	$where = "employee_email =" . "'" . $data['employee_email'] . "'";
	$q=$this->db->select('employee_id')->from('tbl_employee')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->insert('tbl_employee', $data);
		if($q1){
			$insert_id = $this->db->insert_id();
			$q2=$this->db->insert('tbl_admin', array('admin_rand' => $data['employee_rand'],'admin_username' => $data['employee_email'],'admin_password' => $pass, 'admin_type'=>$data['employee_usertype'], 'employee_id' => $insert_id,'admin_profile_picture' => $data['employee_profile'],'admin_created_on' => $data['employee_created_on'],'admin_role' => $data['employee_usertype'],'admin_act' => 1));
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
public function update_user($data, $pass){
    $where = "employee_id =" . "'" . $data['employee_id'] . "'";
    $q=$this->db->select('employee_id')->from('tbl_employee')->where($where)->get()->num_rows();
    
    if($q!=""){
        $this->db->where("employee_id", $data['employee_id']);
        $this->db->update('tbl_employee', $data);
        $insert_id = $this->db->insert_id();
        $this->db->where("employee_id", $data['employee_id']);
        $this->db->update('tbl_admin', array('admin_username' => $data['employee_email'],'admin_password' => $pass, 'admin_type'=>$data['employee_usertype'], 'employee_id' => $insert_id,'admin_profile_picture' => $data['employee_profile'],'admin_role' => $data['employee_usertype'],'admin_act' => 1));
        return 1;
    }else{
        return 2;
    }
    
}
public function get_employees(){
	$where = "employee_act=1 and  employee_usertype=5 ";
	return $this->db->select('employee_id,employee_rand,employee_name,employee_phone,employee_email,employee_latitude,employee_longitude,employee_last_seen,employee_act')->from('tbl_employee')->where($where)->get()->result();
}
public function get_asm(){
	$where = "employee_act=1 and employee_usertype=3";
	return $this->db->select('employee_id,employee_rand,employee_name,employee_phone,employee_email,employee_latitude,employee_longitude,employee_last_seen,employee_act')->from('tbl_employee')->where($where)->get()->result();
}
public function get_employeess(){
	$where = "employee_act=0 ";
	return $this->db->select('employee_id,employee_rand,employee_name,employee_phone,employee_email,employee_latitude,employee_longitude,employee_last_seen,employee_act')->from('tbl_employee')->where($where)->get()->result();
}
public function get_employeesname(){
	$where = "employee_act=1";
	return $this->db->select('employee_id,employee_name,employee_email')->from('tbl_employee')->where($where)->get()->result();
}

public function get_employeesreportss($user_id,$from,$to){
    if($user_id!=0){
	$where = "emp_id='$user_id' and date(`shop_created_on`) BETWEEN '$from' AND '$to'";
	return $this->db->select('*')->from('tbl_shop')->where($where)->get()->result();
      }
       else{
           $whers="date(`shop_created_on`) BETWEEN '$from' AND '$to'";
           return $this->db->select('*')->from('tbl_shop')->where($whers)->get()->result();
    }
}
public function get_inactiveagents(){
	$where = "agent_act=0";
	return $this->db->select('agent_rand,agent_name,agent_phone,agent_email,agent_address_line1,agent_address_line2,agent_address_line3,agent_address_line4,agent_pincode,agent_act')->from('tbl_agent')->where($where)->get()->result();
}
public function edit_emps($key){
	$where = "employee_act=1 AND employee_rand='$key'";
	return $this->db->select('*')->from('tbl_employee')->where($where)->get()->result();
}
public function get_employee($key){
	$where = "employee_act=1 AND employee_rand='$key'";
	return $this->db->select('tbl_employee.employee_rand,tbl_employee.employee_name,tbl_employee.employee_phone,tbl_employee.employee_email,tbl_employee.employee_address_line1,tbl_employee.employee_address_line2,tbl_employee.employee_address_line3,tbl_employee.employee_address_line4,tbl_employee.employee_pincode,tbl_employee.employee_profile,tbl_admin.admin_password')->from('tbl_employee')->join('tbl_admin', 'tbl_admin.admin_rand=tbl_employee.employee_rand')->where($where)->get()->row();
}

public function update_data($data, $id, $data1)
    {
        $this->db->where('employee_rand', $id);
        if ($this->db->update('tbl_employee', $data)) {
        	$q=$this->db->where('admin_rand',$id)->update('tbl_admin', $data1);
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
public function update_emp($data,$rand) {
	  $condition = "`employee_rand` !='$rand' AND `employee_act`='1'";
         // echo "`employee_rand` !='$rand' AND `employee_act`='1'";exit();
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where($condition);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() > 1) {
            $this->db->where('employee_rand', $rand);
	if ($this->db->update('tbl_employee', $data)) {
                return 1;
	}
	else{
           // echo "no value";exit();
            return 2;
        }
    }
    else {
      return 3;
        }
    }


public function get_export_companies() {
        $where = "employee_act=1";
		return $this->db->select('employee_name,employee_phone,employee_email,employee_address_line1,employee_address_line2,	employee_address_line3,employee_address_line4,employee_pincode,employee_created_on,employee_updated_on')->from('tbl_employee')->where($where)->get()->result();

    }
     /*Validate Customer Mobile No*/
     public function getcustomerMob($mobileno){
        $this->db->select("*")->from('tbl_employee')->where("employee_phone", $mobileno);
        $query = $this->db->get();
        return $query->num_rows();
    }
    /*Validate Customer Email */
    public function getcustomerEmail($email){
        $this->db->select("*")->from('tbl_employee')->where("employee_email", $email);
        $query = $this->db->get();
        return $query->num_rows();
    }
    /*Get the Sales Person Details*/
    public function getsalePerson($id){
        $this->db->select('*')->from('tbl_employee')->where("employee_id", $id);
        $query = $this->db->get();
        return $query->result();
    }
    

}

?>