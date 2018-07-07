<?php
class Product_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
 public function add_productgroup($groupname){
 	$date=date('Y-m-d');
 	$w="productgroup_name='$groupname'";
 	$q=$this->db->select('productgroup_name')->from('tbl_productgroup')->where($w)->get()->row();
 	if($q){
 		return 2;
 	}
 	else{
 		$qu=$this->db->insert('tbl_productgroup',array('productgroup_name'=>$groupname,'productgroup_createdon'=>$date,'productgroup_status'=>1));
 		if($qu){
 			return 1;
 		}
 		else{
 			return 0;
 		}
 	}
 }
 public function list_productgroup(){
 	$w="productgroup_status=1";
 	$q=$this->db->select('productgroup_id,productgroup_name')->from('tbl_productgroup')->where($w)->get()->result();
 	return $q;
 }
 public function update_productgroup($groupname,$id){
 	$date=date('Y-m-d');
 	$w="productgroup_name='$groupname' AND productgroup_id!='$id'";
 	$q=$this->db->select('productgroup_name')->from('tbl_productgroup')->where($w)->get()->row();
 	if($q){
 		return 2;
 	}
 	else{
 		$wh="productgroup_id='$id'";
 		$qu=$this->db->where($wh)->update('tbl_productgroup',array('productgroup_name'=>$groupname,'productgroup_updatedon'=>$date));
 		if($qu){
 			return 1;
 		}
 		else{
 			return 0;
 		}
 	}
 }
 public function list_single_productgroup($id){
 	$w="productgroup_status=1 AND productgroup_id='$id'";
 	$q=$this->db->select('productgroup_id,productgroup_name')->from('tbl_productgroup')->where($w)->get()->result();
 	return $q;
 }
 public function delete_productgroup($id){
 	$w="productgroup_status=1 AND productgroup_id='$id'";
 	$q=$this->db->where($w)->update('tbl_productgroup',array('productgroup_status'=>0));
 	return $q;
 }
 public function add_product($groupname,$productname,$productprice){
 	$date=date('Y-m-d');
 	$w="product_name='$productname'";
 	$q=$this->db->select('product_name')->from('tbl_product')->where($w)->get()->row();
 	if($q){
 		return 2;
 	}
 	else{
 		$qu=$this->db->insert('tbl_product',array('productgroup_id'=>$groupname,'product_name'=>$productname,'product_price'=>$productprice,'product_createdon'=>$date,'product_act'=>1));
 		if($qu){
 			return 1;
 		}
 		else{
 			return 0;
 		}
 	}
 }
 public function list_product(){
 	$w="product_act=1";
 	$q=$this->db->select('tbl_product.product_id,tbl_product.productgroup_id,tbl_product.product_name,tbl_product.product_price,tbl_productgroup.productgroup_name')->from('tbl_product')->join('tbl_productgroup','tbl_productgroup.productgroup_id=tbl_product.productgroup_id')->where($w)->get()->result();
 	return $q;
 }
 public function update_product($groupname,$productname,$id){
 	$date=date('Y-m-d');
 	$w="product_name='$productname' AND product_id!='$id'";
 	$q=$this->db->select('product_id')->from('tbl_product')->where($w)->get()->row();
 	if($q){
 		return 2;
 	}
 	else{
 		$wh="product_id='$id'";
 		$qu=$this->db->where($wh)->update('tbl_product',array('productgroup_id'=>$groupname,'product_name'=>$productname,'product_updatedon'=>$date));
 		if($qu){
 			return 1;
 		}
 		else{
 			return 0;
 		}
 	}
 }
 public function list_single_product($id){
 	$w="product_act=1 AND product_id='$id'";
 	$q=$this->db->select('product_id,productgroup_id,product_name,product_price')->from('tbl_product')->where($w)->get()->result();
 	return $q;
 }
 public function delete_product($id){
 	$w="product_act=1 AND product_id='$id'";
 	$q=$this->db->where($w)->update('tbl_product',array('product_act'=>0));
 	return $q;
 }

}
?>