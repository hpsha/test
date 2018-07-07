<?php
class Product_Type_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
//ADD PRODUCT TYPE
 public function add($data){
	$where = "product_type_name =" . "'" . $data['product_type_name'] . "'";
	$q=$this->db->select('*')->from('tbl_prd_type')->where($where)->get()->num_rows();
	if($q==0){
		$q1=$this->db->insert('tbl_prd_type', $data);
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
//Fetch holl data PROCESS
public function get_product_type(){
	$where = "product_type_act=1";
	return $this->db->select('product_type_rand,product_type_name')->from('tbl_prd_type')->where($where)->get()->result();
}
//Fetch PROCESS
 public function get_prd_type($key){
	$where = "product_type_act=1 AND product_type_rand ='$key'";
	return $this->db->select('product_type_rand,product_type_name')->from('tbl_prd_type')->where($where)->get()->row();
}

//UPDATE PROCESS
    public function update_prdtype_data($data,$rand) {
		$id = $data['product_type_rand'];
	  $condition = "`product_type_name` =" . "'" . $data['product_type_name'] . "' and `product_type_rand` !='$id'";
        $this->db->select('*');
        $this->db->from('tbl_prd_type');
        $this->db->where($condition);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 0) {
				$this->db->where('product_type_rand', $rand);
			if ($this->db->update('tbl_prd_type', $data)) {
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
//DELETE PRODUCT TYPE
public function delete_prdtype($data, $rand)
    {
        $this->db->where('product_type_rand', $rand);
        if ($this->db->update('tbl_prd_type', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    } 
	
	//Fetch holl data PROCESS
	public function get_uom(){
		$where = "uom_act=1";
		return $this->db->select('uom_rand,uom_name')->from('tbl_uom')->where($where)->get()->result();
	}

	
	//ADD PRODUCT TYPE
	 public function uom_add($data){
		$where = "uom_name =" . "'" . $data['uom_name'] . "'";
		$q=$this->db->select('*')->from('tbl_uom')->where($where)->get()->num_rows();
		if($q==0){
			$q1=$this->db->insert('tbl_uom', $data);
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
	
	//Fetch UOM PROCESS
	 public function get_uom_edit($key){
		$where = "uom_act=1 AND uom_rand ='$key'";
		return $this->db->select('uom_rand,uom_name')->from('tbl_uom')->where($where)->get()->row();
	}
	//UPDATE UOM
	    public function update_uom_data($data,$rand) {
		$id = $data['uom_rand'];
	  $condition = "`uom_name` =" . "'" . $data['uom_name'] . "' and `uom_rand` !='$id'";
        $this->db->select('*');
        $this->db->from('tbl_uom');
        $this->db->where($condition);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 0) {
				$this->db->where('uom_rand', $rand);
			if ($this->db->update('tbl_uom', $data)) {
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
   
   //DELETE UOM
 public function delete_uom_detail($data, $rand)
    {
        $this->db->where('uom_rand', $rand);
        if ($this->db->update('tbl_uom', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }  
	
   
   
   
}

?>