<?php

class Products_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    //product list
	public function get_product()
			  {
		$where = "product_act=1";
		return $this->db->select('product_rand,product_id,product_size')->from('tbl_product')->where($where)->get()->result();
	}
	public function addproduct($data){
		$where = "product_size =" . "'" . $data['product_size'] . "'";
		$q=$this->db->select('product_id')->from('tbl_product')->where($where)->get()->row();
		if($q==""){
			$q1=$this->db->insert('tbl_product', $data);
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
	public function updateproduct_data($data, $id)
    {
        $this->db->where('product_rand', $id);
        if ($this->db->update('tbl_product', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
	public function update_product_data($data, $id)
    {
        $this->db->where('product_rand', $id);
        if ($this->db->update('tbl_product', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
    public function edit_product($key){
		$where = "product_act=1 AND product_rand='$key'";
		return $this->db->select('product_rand,product_size')->from('tbl_product')->where($where)->get()->row();
	}

}