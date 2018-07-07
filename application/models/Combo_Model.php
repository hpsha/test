<?php

class Combo_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // Read data using username and password
    // Read data from database to show data in admin page
   
     function getcombodetail($where = array(), $orderby = array(), $select = "co.*", $join = array(), $group_by = "", $limit ="", $offset = 0, $row = false, $like = array(), $or_like=array(), $or_where =array(), $where_in=array(), $where_not=array()) {
        $this->db->select('*, co.combo_id AS comboId');
        $this->db->from('tbl_combo_offer as co');
        
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
	
	
    function save($data = array()){
        if(!empty($data['tbl_combo_offer']['combo_id'])){
                $data['tbl_combo_offer']['updated_date'] = date('Y-m-d H:i:s');
                $data['tbl_combo_offer']['updated_usertype'] = $_SESSION['userdata']['type'];
                $data['tbl_combo_offer']['updated_userid'] = $_SESSION['userdata']['user_id'];
                $this->db->where("combo_id", $data['tbl_combo_offer']['combo_id']);
                $this->db->update('tbl_combo_offer', $data['tbl_combo_offer']);
                return $data['tbl_combo_offer']['combo_id'];
        }else{
                $data['tbl_combo_offer']['status'] = 1;
                $data['tbl_combo_offer']['approval_status'] = 0;
                $data['tbl_combo_offer']['from_date'] = date('Y-m-d',strtotime($data['tbl_combo_offer']['from_date']));
                $data['tbl_combo_offer']['to_date'] = date('Y-m-d',strtotime($data['tbl_combo_offer']['to_date']));
                $data['tbl_combo_offer']['product_id'] = implode(",",$data['tbl_combo_offers']['product_id']);
                $data['tbl_combo_offer']['created_date'] = date('Y-m-d H:i:s');
                $data['tbl_combo_offer']['created_usertype'] = $_SESSION['userdata']['type'];
                $data['tbl_combo_offer']['created_userid'] = $_SESSION['userdata']['user_id'];
                $data['tbl_combo_offer']['updated_date'] = date('Y-m-d H:i:s');
                $data['tbl_combo_offer']['updated_usertype'] = $_SESSION['userdata']['type'];
                $data['tbl_combo_offer']['updated_userid'] = $_SESSION['userdata']['user_id'];
                $this->db->insert('tbl_combo_offer', $data['tbl_combo_offer']);
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
        $res = $this->db->where('combo_id', $id)->update('tbl_combo_offer', array('status'=>2));
        return $res;
    }
    function statusVal($id, $status){
        if(empty($id)) return false;
        $res = $this->db->where('combo_id', $id)->update('tbl_combo_offer', array('approval_status'=>$status));
        return $res;
    }
    public function get_product(){
	$where = "product_act=1 ";
	return $this->db->select('*')->from('tbl_product')->where($where)->get()->result();
    }
    public function get_categorylist(){
        $where = "productgroup_status='1'";
	return $this->db->select('*')->from('tbl_productgroup')->where($where)->get()->result();
    }
    public function getProducts($cateId){
        $where = "productgroup_id='$cateId' and product_act='1'";
	$res = $this->db->select('*')->from('tbl_product')->where($where)->get()->result();
        $s1 = '';
        foreach($res as $r1){
            $s1 .= '<option value="'.$r1->product_id.'">'.$r1->product_name.'</option>';
        }
        return $s1;
    }
     public function getProname($id){
        $this->db->select('product_name')->from('tbl_product')->where("product_id", $id);
        $query = $this->db->get();
        return $query->result();
    }
     public function getCatename($id){
        $this->db->select('productgroup_name')->from('tbl_productgroup')->where("productgroup_id", $id);
        $query = $this->db->get();
        return $query->result();
    }
}

?>