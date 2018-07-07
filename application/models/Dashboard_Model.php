<?php

class Dashboard_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function index() {
        $data = array();
      
        $data['customer'] = $this->db->select('employee_id')->from('tbl_employee')->get()->num_rows();
        $where=date("Y-m-d");
         $data['employee'] = $this->db->query("SELECT * FROM `tb_attendace` WHERE `attendance_date` = '$where'")->num_rows();
        $where_enquiry = "shop_act=1 and date(shop_created_on)>='2018-04-04'";
        $data['enquiry'] = $this->db->select('shop_id')->from('tbl_shop')->where($where_enquiry)->get()->num_rows();
        $where_new_enquiry = "agencies_act=1";
        $data['agencies'] = $this->db->select('agencies_id')->from('tbl_agencies')->where($where_new_enquiry)->get()->num_rows();
      
        return $data;
    }

}

?>