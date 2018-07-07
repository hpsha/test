<?php
class Task_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    /*
public function get_schedule(){
	
	$where = "customergroup_act=1 AND tbl_customergroup.company_id='$company_id'";
	return $this->db->select('tbl_customergroup.customergroup_rand,tbl_customergroup.customergroup_name,tbl_customergroup.customergroup_category,tbl_customergroup.customergroup_discount,tbl_machinery_category.machiney_category_name')->from('tbl_customergroup')->join('tbl_machinery_category','tbl_machinery_category.machinery_category_id=tbl_customergroup.customergroup_category')->where($where)->get()->result();
}
*/
public function get_task(){
	$where="schedule_status=1";
	
	return $this->db->select('tb_schedule.schedule_id,tb_schedule.schedule_title,tb_schedule.schedule_description,tb_schedule.schedule_status,tb_schedule.schedule_note,tb_schedule.schedule_date,tb_schedule.schedule_assigned_to,tbl_employee.employee_id,tbl_employee.employee_name,tbl_employee.employee_email')->from('tb_schedule')->join('tbl_employee','tbl_employee.employee_id=tb_schedule.schedule_assigned_to')->where($where)->get()->result();
}
public function fetch_task($id){
	
	$where = "schedule_id=$id";
	return $this->db->select('tb_schedule.schedule_id,tb_schedule.schedule_title,tb_schedule.schedule_description,tb_schedule.schedule_status,tb_schedule.schedule_note,tb_schedule.schedule_date,tb_schedule.schedule_assigned_to,tbl_employee.employee_id,tbl_employee.employee_name,tbl_employee.employee_email')->from('tb_schedule')->join('tbl_employee','tbl_employee.employee_id=tb_schedule.schedule_assigned_to')->where($where)->get()->result();
}

public function get_schedule(){
	
	$where = "task_status=1";
	return $this->db->select('tb_task.task_id,tb_task.task_name,tb_task.task_description,tb_task.task_note,tb_task.task_created_by,tb_task.task_date,tbl_employee.employee_id,tbl_employee.employee_name,tbl_employee.employee_email')->from('tb_task')->join('tbl_employee','tbl_employee.employee_id=tb_task.task_created_by')->where($where)->get()->result();
}

public function fetch_schedule($id){
	
	$where = "task_status=1 AND task_id=$id";
	return $this->db->select('task_id,task_name,task_description,task_note,task_created_by,task_date')->from('tb_task')->where($where)->get()->result();
}

public function update_data($data, $id)
    {
        $this->db->where('task_id', $id);
        if ($this->db->update('tb_task', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
    public function update_datas($data, $id)
    {
        $this->db->where('schedule_id', $id);
        if ($this->db->update('tb_schedule', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
/*
public function get_customer(){
	$where = "customer_act=1";
	return $this->db->select('customer_id,customer_name')->from('tbl_customer')->where($where)->get()->result();
}
public function get_itemgroup($company_id){
	$where = "itemgroup_act=1 AND company_id=$company_id";
	return $this->db->select('itemgroup_id,itemgroup_itemname')->from('tbl_itemgroup')->where($where)->get()->result();
}
public function add($data){
	$where = "customergroup_name =" . "'" . $data['customergroup_name'] . "'";
	$q=$this->db->select('customergroup_id')->from('tbl_customergroup')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->insert('tbl_customergroup', $data);
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

public function get_customergroup($key){
	$where = "customergroup_act=1 AND customergroup_rand='$key'";
	return $this->db->select('customergroup_rand,customergroup_name,customergroup_category,customergroup_itemgroup,customergroup_discount,customergroup_customer')->from('tbl_customergroup')->where($where)->get()->row();
}*/
}
?>