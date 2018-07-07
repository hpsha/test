<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model('Settings_Model');
    }
   
    public function index()
    {
        $this->load->view('template/header');
        $settings= $this->Settings_Model->get_settings();

        $data['companies'] = $settings;
    //    print_r($settings);exit();
        $this->load->view('Settings/index', $data);
        $this->load->view('template/footer');
    }
      public function Update()
    {
        
        if ($_FILES['logo']['name'] != '') {
                  

            $config['file_name'] = date('Y-m-d H:i:s');
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 100;
            $config['max_width']     = 1024;
            $config['max_height']    = 768;
            $this->load->library('upload', $config);
            $upload_data = $this->upload->do_upload('logo');
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $company_logo = $upload_data['file_name'];
        } else {
            $company_logo = $_POST['filename'];
        }
          if ($_FILES['icon']['name'] != '') {

            $config['file_name'] = date('Y-m-d H:i:s');
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 100;
            $config['max_width']     = 1024;
            $config['max_height']    = 768;
            $this->load->library('upload', $config);
            $upload_data = $this->upload->do_upload('icon');
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $company_icon = $upload_data['file_name'];

        } else {
            $company_icon = $_POST['filenames'];
        }
        $date = date('Y-m-d H:i:s');
        $data = array(
            'company_name' => $_POST['c_name'],
            'company_financial_year' => $_POST['years'],
            'company_target_wise' => $_POST['settarget'],
            'company_contact_email_id' => $_POST['email_id'],
            'settings_updated_on' => $date,
            'company_logo' => $company_logo,
                        'company_favicon' => $company_icon

        );
          
                    $result = $this->Settings_Model->update_data($data);
                    print_r($this->db->last_query());EXIT();
                      if ($result == 1) {
            $cookie = array(
                'name' => 'update',
                'value' => '1',
                'expire' => '3'
            );
        }
        else {
            $cookie = array(
                'name' => 'update',
                'value' => '2',
                'expire' => '3'
            );
        }
                $this->input->set_cookie($cookie);

                redirect("Settings");


    }

    
}