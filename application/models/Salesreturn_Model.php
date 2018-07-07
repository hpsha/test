<?php

class Salesreturn_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    function getsalesreturndetail($where = array(), $orderby = array(), $select = "sa.*", $join = array(), $group_by = "", $limit ="", $offset = 0, $row = false, $like = array(), $or_like=array(), $or_where =array(), $where_in=array(), $where_not=array()) {
        $this->db->select('*, sa.salesreturn_id AS salesreturn_id');
        $this->db->from('tb_salesreturn as sa');
        
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
        //echo $this->db->last_query();
	if($query->num_rows() > 0){
            if(!$row) return $query->result();
            return $query->row();
        }   
    }
    public function getShoplist($search){
        $this->db->select("*")->from('tbl_shop')->like("shop_contact", $search);
        $query = $this->db->limit(10,0)->get();
        $return = array();
        $custom = array();
        if($query->num_rows() > 0) {
            foreach($query->result_array() as $row) {
                $return[] = array("label"=>$row['shop_contact'], "value"=>$row['shop_id']);
            }
        }
        return $return;
    }
     public function getShopnames($search){
        $this->db->select("*")->from('tbl_shop')->like("shop_name", $search);
        $query = $this->db->limit(10,0)->get();
        $return = array();
       
        if($query->num_rows() > 0) {
            foreach($query->result_array() as $row) {
                $return[] = array("label"=>$row['shop_name'].','.$row['shop_landline'], "value"=>$row['shop_id']);
            }
        }
        return $return;
    }
    public function getShopphones($search){
        $this->db->select("*")->from('tbl_shop')->like("shop_landline", $search);
        $query = $this->db->limit(10,0)->get();
        $return = array();
       
        if($query->num_rows() > 0) {
            foreach($query->result_array() as $row) {
                $return[] = array("label"=>$row['shop_landline'], "value"=>$row['shop_id']);
            }
        }
        return $return;
    }
     public function getPronames($search){
        $this->db->select("*")->from('tbl_product')->like("product_name", $search);
        $query = $this->db->limit(10,0)->get();
        $return = array();
       
        if($query->num_rows() > 0) {
            foreach($query->result_array() as $row) {
                $return[] = array("label"=>$row['product_name'], "value"=>$row['product_id']);
            }
        }
        return $return;
    }
    function save_update_sales($data = array()){
        if(!empty($data['tb_salesreturn']['salesreturn_id'])){
                $data['tb_salesreturn']['updated_date'] = date('Y-m-d H:i:s');
                $data['tb_salesreturn']['updated_userid'] = $_SESSION['userdata']['user_id'];
                $data['tb_salesreturn']['updated_usertype'] = $_SESSION['userdata']['type'];
                 $this->db->where("salesreturn_id", $data['tb_salesreturn']['target_id']);
                $this->db->update('tb_salesreturn', $data['tb_salesreturn']);
                return $data['tb_salesreturn']['salesreturn_id'];
        }else{
        
				$data['tb_salesreturn']['status'] = 1;
                $data['tb_salesreturn']['created_date'] = date('Y-m-d H:i:s');
                $data['tb_salesreturn']['created_userid'] = $_SESSION['userdata']['user_id'];
                $data['tb_salesreturn']['created_usertype'] = $_SESSION['userdata']['type'];
                $data['tb_salesreturn']['updated_date'] = date('Y-m-d H:i:s');
                $data['tb_salesreturn']['updated_userid'] = $_SESSION['userdata']['user_id'];
                $data['tb_salesreturn']['updated_usertype'] = $_SESSION['userdata']['type'];
                $this->db->insert('tb_salesreturn', $data['tb_salesreturn']);
                $this->db->last_query();
                $affected_rows = $this->db->affected_rows();
                if($affected_rows == 1){
                        return $this->db->insert_id();
                } else {
                        return;
                }
        }
    }
     public function getShopname($id){
        $this->db->select('*')->from('tbl_shop')->where("shop_id", $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getProname($id){
        $this->db->select('*')->from('tbl_product')->where("product_id", $id);
        $query = $this->db->get();
        return $query->result();
    }
     function delete($id){
        if(empty($id)) return false;
        $res = $this->db->where('salesreturn_id', $id)->update('tb_salesreturn', array('status'=>0));
        return $res;
    }
    function approved($id){
        if(empty($id)) return false;
        $res = $this->db->where('salesreturn_id', $id)->update('tb_salesreturn', array('approval_status'=>1));
 
        return $res;
    }
   
}