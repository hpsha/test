<?php
class Branch_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
public function fetch_branch(){
	
	$where = "branch_act=1";
	return $this->db->select('*')->from('tbl_branch')->where($where)->get()->result();
}

}
?>