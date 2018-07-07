<?php
class Agent_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
      public function login($data) {
        $condition = "admin_username =" . "'" . $data['admin_username'] . "' AND " . "admin_password =" . "'" . $data['admin_password'] . "' and    admin_type='4'";
        $this->db->select('admin_username');
        $this->db->from('tbl_admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
       public function get_distributor($id) {
        $data = array();
      
     
       
        $where_enquiry = "shop_act=1 and date(shop_created_on)>='2018-04-04' and agency_id=$id";
        $data['enquiry'] = $this->db->select('shop_id')->from('tbl_shop')->where($where_enquiry)->get()->num_rows();
        
       $result=$this->db->select('shop_id')->from('tbl_shop')->where($where_enquiry)->get()->result();
       $dats='';
       foreach($result as $res){
           $dats.=$res->shop_id;
           $dats.=",";
       }
       $dats=substr($dats,0,-1);
       if($dats!=''){
      $mss=$this->db->query("select sum(price) as t from tbl_order where shop_id in($dats)")->row();
       $data['order']=$mss->t;
       $date=date("Y-m-d");
        $mss=$this->db->query("select sum(price) as t from tbl_order where shop_id in($dats) and date(`created_on`)='$date'")->row();
       $data['today']=$mss->t;
       }
       else{
           $data['order']='0';$data['today']='0';
       }
        return $data;
    }

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
public function fetch_agencies($id){
	
	$where = "agencies_id=$id";
	return $this->db->select('*')->from('tbl_agencies')->where($where)->get()->result();
}
public function get_agents(){
	$where = "agent_act=1";
	return $this->db->select('agent_id,agent_rand,agent_name,agent_phone,agent_email,agent_address_line1,agent_address_line2,agent_address_line3,agent_address_line4,agent_pincode,agent_additional_contact1,agent_additional_contact2,agent_additional_email1,agent_additional_email2,agent_act')->from('tbl_agent')->where($where)->get()->result();
}
public function get_inactiveagents(){
	$where = "agent_act=0";
	return $this->db->select('agent_rand,agent_name,agent_phone,agent_email,agent_address_line1,agent_address_line2,agent_address_line3,agent_address_line4,agent_pincode,agent_act')->from('tbl_agent')->where($where)->get()->result();
}
public function get_agent($key){
	$where = "agent_act=1 AND agent_rand='$key'";
	return $this->db->select('agent_rand,agent_name,agent_phone,agent_email,agent_address_line1,agent_address_line2,agent_address_line3,agent_address_line4,agent_pincode,agent_additional_contact1,agent_additional_contact2,agent_additional_email1,agent_additional_email2,agent_act')->from('tbl_agent')->where($where)->get()->row();
}
public function update_data($data, $id)
    {
        $this->db->where('agent_rand', $id);
        if ($this->db->update('tbl_agent', $data)) {
            return 1;
            }
            else{
            return 2;
            }
        }
	public function get_export_agent() {
        $where = "agent_act=1";
	return $this->db->select('agent_name,agent_phone,agent_email,agent_address_line1,agent_address_line2,agent_address_line3,agent_address_line4,agent_pincode,agent_gst,agent_pan,agent_created_on,agent_updated_on')->from('tbl_agent')->where($where)->get()->result();
    }


}
?>