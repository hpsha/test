<?php

class Settings_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // Read data using username and password
    // Read data from database to show data in admin page

     public function get_settings() {
        $condition = "settings_act =1";
        return $this->db->select("company_name, company_logo, company_favicon, company_financial_year, company_target_wise, company_contact_email_id")->
                from('tbl_settings')->where($condition)->get()->row();

    }
       public function update_data($data) {
                   $this->db->where('settings_id', 1);

        if ($this->db->update('tbl_settings', $data)) {
            return 1;
            }
            else{
                            return 2;

            }
    }
    public function get_enquiry() {
        $condition = "enquiry_act =1";
        return $this->db->select("enquiry_id,enquiry_cus_name, enquiry_cus_mobileno, enquiry_cus_email, enquiry_status")->
                from('tbl_enquiry')->where($condition)->get()->result();

    }
}

?>