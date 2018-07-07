<?php

class Target_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // Read data using username and password
    // Read data from database to show data in admin page
    public function add_target($data) {
       
		$qry = $this->db->insert('tbl_target', $data);
		if ($qry) {
		   return 1;
		} else {
			return 2;
		}
    }
     function gettargetdetail($where = array(), $orderby = array(), $select = "ta.*", $join = array(), $group_by = "", $limit ="", $offset = 0, $row = false, $like = array(), $or_like=array(), $or_where =array(), $where_in=array(), $where_not=array()) {
        $this->db->select('*, ta.target_id AS targetId');
        $this->db->from('tbl_target as ta');
        
	if(is_array($join) && !empty($join)) {
            foreach($join as $k=>$v){
                if(is_array($v)) $this->db->join($k, $v[0], $v[1]);
                else $this->db->join($k, $v);
            }
        }
	if(is_array($where_in) && !empty($where_in)) {
            foreach($where_in as $k=>$v){
                if(is_array($v)) $this->db->where_in($k, $v);
                else $this->db->where_in($k, $v);
            }
        }
        if(is_array($where_not) && !empty($where_not)) {
            foreach($where_not as $k=>$v){
                if(is_array($v)) $this->db->where_not_in($k, $v);
                else $this->db->where_not_in($k, $v);
            }
        }
        if(is_array($where)) {
            if(!empty($where)) $this->db->where($where); 
        } elseif($where != "") {
            $this->db->where($where);
        }
	if(is_array($or_where)) {
            if(!empty($or_where)) $this->db->or_where($or_where);            
        } elseif($or_where != "") {
            $this->db->where($or_where);
        }
        if(is_array($like)) {
            if(!empty($like)) {
                $this->db->like($like); 
                $this->db->or_like($or_like); 
            }          
        } elseif($like != "") {
            $this->db->like($like);
        }
        
        if(is_array($orderby) && !empty($orderby)) {
            foreach($orderby as $k=>$v){
                $this->db->order_by($k, $v);
            }
        }
        if($group_by) $this->db->group_by($group_by);
        if((int)$limit != 0) $this->db->limit($limit, $offset);
       
        $query = $this->db->get();
	if($query->num_rows() > 0){
            if(!$row) return $query->result();
            return $query->row();
        }   
    }
	public function get_target($company_id) {
		
        // $condition = "t_act =1";
        // return $this->db->select("tbl_target.t_id,tbl_target.t_employee_id,tbl_target.t_year,tbl_target.t_month,tbl_target.t_amount,tbl_target.t_act,tbl_employee.employee_id,tbl_employee.employee_name")
		// ->from('tbl_target')
		// ->join('tbl_employee', 'tbl_employee.employee_id = tbl_target.t_employee_id')
		// ->where($condition)->get()->result();
		
		if($company_id ==1){
		  $where = "t_act=1 AND tbl_target.t_company_id='$company_id'";
		  $this->db->select("tbl_target.t_id,tbl_target.t_employee_id,tbl_target.t_company_id,tbl_target.t_year,tbl_target.t_month,tbl_target.t_amount,tbl_target.t_machine_category,tbl_target.t_act,tbl_employee.employee_id,tbl_employee.employee_name,tbl_machinery_category.machinery_category_id,tbl_machinery_category.machiney_category_name");
		  $this->db->from("tbl_target")->join('tbl_employee', 'tbl_employee.employee_id = tbl_target.t_employee_id')->join("tbl_machinery_category", " tbl_machinery_category. machinery_category_id = tbl_target.t_machine_category");
		  $this->db->where($where);
		  return $query = $this->db->get()->result();
		}
		else{
		  $where = "t_act=1 AND tbl_target.t_company_id='$company_id'";
		  $this->db->select("tbl_target.t_id,tbl_target.t_employee_id,tbl_target.t_company_id,tbl_target.t_year,tbl_target.t_month,tbl_target.t_amount,tbl_target.t_itemgroup,tbl_target.t_act,tbl_employee.employee_id,tbl_employee.employee_name,tbl_itemgroup.itemgroup_id,tbl_itemgroup.itemgroup_itemname");
		  $this->db->from("tbl_target")->join('tbl_employee', 'tbl_employee.employee_id = tbl_target.t_employee_id')->join("tbl_itemgroup", "tbl_itemgroup.itemgroup_id = tbl_target.t_itemgroup");
		  $this->db->where($where);
		  return $query = $this->db->get()->result();
		}
			
    }
	public function get_target_list($key) {
		
        $condition = "t_id ='$key'";
        return $this->db->select("tbl_target.t_id,tbl_target.t_employee_id,tbl_target.t_year,tbl_target.t_month,tbl_target.t_amount,tbl_target.t_machine_category,tbl_target.t_itemgroup,tbl_target.t_act,tbl_employee.employee_id,tbl_employee.employee_name")
		->from('tbl_target')
		->join('tbl_employee', 'tbl_employee.employee_id = tbl_target.t_employee_id')
		->where($condition)->get()->row();
    }
	public function update($data,$pass){
	//$where = "employee_email =" . "'" . $data['employee_email'] . "' AND t_id!='$pass'";
	//$q=$this->db->select('employee_id')->from('tbl_employee')->where($where)->get()->row();
	//if($q==""){
		$q1=$this->db->where('t_id',$pass)->update('tbl_target', $data);
		if($q1){
			return 1;
		}
		else{
			return 2;
		}
	
	}
    public function get_inactiveterms() {
         $condition = "term_condition_act =0";
        return $this->db->select("tbl_company.company_name,term_condition_rand,term_condition_data")->
                join('tbl_company','tbl_company.company_id=tbl_terms_condition.company_id')->
                from('tbl_terms_condition')->where($condition)->get()->result();
    }
     public function get_month() {
        $condition = "target_month_status =1";
        return $this->db->select("month_name,target_month_id")->
                from('tbl_target_month')->where($condition)->get()->result();

    }
       public function get_singleterms($key) {
        $condition = "term_condition_act =1 and term_condition_rand='$key'";
        return $this->db->select("company_id,term_condition_rand,term_condition_data")->
                from('tbl_terms_condition')->where($condition)->get()->row();

    }
     public function get_companies_name() {
        $condition = "company_act =1";
        return $this->db->select("company_name,company_id")->from('tbl_company')->where($condition)->get()->result();

    }
     public function get_company($key) {
        $condition = "company_rand ='$key'";
        return $this->db->select("company_rand, company_name, company_phone, company_mail, company_address, company_address2, company_address3,"
                . " company_address4, company_pincode, company_gst, company_bank_account_no, company_bank_name, company_bank_branch_name,"
                . " company_bank_ifsc, company_pan_no,company_logo")->from('tbl_company')->where($condition)->get()->row();

    }
    function save_update_task($data = array()){
        if(!empty($data['tbl_target']['target_id'])){
                $data['tbl_target']['update_userid'] = $_SESSION['userdata']['user_id'];
                $data['tbl_target']['update_userrole'] = $_SESSION['userdata']['type'];
                $data['tbl_target']['update_date'] = date('Y-m-d H:i:s');
                $this->db->where("target_id", $data['tbl_target']['target_id']);
                $this->db->update('tbl_target', $data['tbl_target']);
                return $data['tbl_target']['target_id'];
        }else{
                $n = count($data['tbl_targets']['salesPersonid']);
                for($i=0; $i<$n; $i++){
                    if($data['tbl_target']['target_type'] == 1){
                        $data['tbl_target']['from_date'] = date('Y-m-d',strtotime($data['tbl_targets']['from_date']));
                        $data['tbl_target']['to_date'] = date('Y-m-d',strtotime($data['tbl_targets']['to_date']));
                    }
                    else if($data['tbl_target']['target_type'] == 2){
                        $year = date('Y');
                        $month = $data['tbl_target']['month'];
                        $d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
                        $data['tbl_target']['from_date'] = $year.'-'.$month.'-01';
                        $data['tbl_target']['to_date'] = $year.'-'.$month.'-'.$d;
                    }
                    $data['tbl_target']['reached_target'] = 0;
                    $data['tbl_target']['salesPersonid'] = $data['tbl_targets']['salesPersonid'][$i];
                    $data['tbl_target']['target_status'] = 1;
                    $data['tbl_target']['create_userid'] = $_SESSION['userdata']['user_id'];
                    $data['tbl_target']['create_userrole'] = $_SESSION['userdata']['type'];
                    $data['tbl_target']['create_date'] = date('Y-m-d H:i:s');
                    $data['tbl_target']['update_userid'] = $_SESSION['userdata']['user_id'];
                    $data['tbl_target']['update_userrole'] = $_SESSION['userdata']['type'];
                    $data['tbl_target']['update_date'] = date('Y-m-d H:i:s');
                    $this->db->insert('tbl_target', $data['tbl_target']);
                    $this->db->last_query();
                }
                $affected_rows = $this->db->affected_rows();
                if($affected_rows == 1){
                        return $this->db->insert_id();
                } else {
                        return;
                }
        }
    }
    function delete($id){
        if(empty($id)) return false;
        $res = $this->db->where('target_id', $id)->update('tbl_target', array('target_status'=>0));
        return $res;
    }

}

?>