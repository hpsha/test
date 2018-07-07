<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model('Company_Model');
    }
    public function add()
    {
        $this->load->view('template/header');
        $this->load->view('Company/companymaster_add');
        $this->load->view('template/footer');
    }
    public function editcompany($key)
    {
        $this->load->view('template/header');
        $get_companies = $this->Company_Model->get_company($key);
        $data['companies'] = $get_companies;
        $this->load->view('Company/companymaster_edit', $data);
        $this->load->view('template/footer');
    }
    public function index()
    {
        $this->load->view('template/header');
        $get_companies = $this->Company_Model->get_companies();
        $data['companies'] = $get_companies;
        $this->load->view('Company/list_companymaster', $data);
        $this->load->view('template/footer');
    }
    public function inactive()
    {
        $this->load->view('template/header');
        $get_companies = $this->Company_Model->get_inactivecompanies();
        $data['companies'] = $get_companies;
        $this->load->view('Company/inactive_customerlist', $data);
        $this->load->view('template/footer');
    }
    public function adddetails()
    {
        $config['file_name'] = date('Y-m-d H:i:s');
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('logo');
        $characters           = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand                 = '';
        $random_string_length = 6;
        $max                  = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand .= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');
        $data  = array(
            'company_rand' => $rand,
            'company_name' => $_POST['companyname'],
            'company_mail' => $_POST['companymail'],
            'company_address' => $_POST['address1'],
            'company_address2' => $_POST['address2'],
            'company_address3' => $_POST['address3'],
            'company_address4' => $_POST['address4'],
            'company_pincode' => $_POST['pincode'],
            'company_phone' => $_POST['mobile_no'],
            'company_gst' => $_POST['gstno'],
            'company_pan_no' => $_POST['panno'],
            'company_bank_name' => $_POST['bname'],
            'company_bank_branch_name' => $_POST['brancname'],
            'company_bank_ifsc' => $_POST['ifsc'],
            'company_bank_account_no' => $_POST['accno'],
            'company_act' => 1,
            'company_created_on' => $date
        );
       
        $result = $this->Company_Model->add_data($data);
        
        if ($result == 1) {
            
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3'
            );
        }
        else if ($result == 3) {
            $cookie = array(
                'name' => 'success',
                'value' => '3',
                'expire' => '3'
            );
        } else {
            $cookie = array(
                'name' => 'success',
                'value' => '2',
                'expire' => '3'
            );
        }
        $this->input->set_cookie($cookie);
       redirect("Company");
    }
    public function updatedetails()
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
            $company_logo = $_POST['file_name'];
        }
        $date = date('Y-m-d H:i:s');
        $rand = $_POST['company_rand'];
        $data = array(
            'company_name' => $_POST['companyname'],
            'company_mail' => $_POST['companymail'],
            'company_address' => $_POST['address1'],
            'company_address2' => $_POST['address2'],
            'company_address3' => $_POST['address3'],
            'company_address4' => $_POST['address4'],
            'company_pincode' => $_POST['pincode'],
            'company_phone' => $_POST['mobile_no'],
            'company_gst' => $_POST['gstno'],
            'company_pan_no' => $_POST['panno'],
            'company_bank_name' => $_POST['bname'],
            'company_bank_branch_name' => $_POST['brancname'],
            'company_bank_ifsc' => $_POST['ifsc'],
            'company_bank_account_no' => $_POST['accno'],
            'company_act' => 1,
            'company_created_on' => $date,
            'company_logo' => $company_logo
        );
        $result = $this->Company_Model->update_data($data, $rand);
        if ($result == 1) {
            $cookie = array(
                'name' => 'update',
                'value' => '1',
                'expire' => '3'
            );
        }
        else if ($result == 3) {
            $cookie = array(
                'name' => 'update',
                'value' => '3',
                'expire' => '3'
            );
        } else {
            $cookie = array(
                'name' => 'update',
                'value' => '2',
                'expire' => '3'
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Company");
    }
    public function delete_company()
    {
        $date = date('Y-m-d H:i:s');
        $rand = $_POST['id'];
        $data = array(
            'company_act' => 0
        );
        $result = $this->Company_Model->update_data($data, $rand);
        echo $result;
    }
    public function active_company()
    {
        $date = date('Y-m-d H:i:s');
        $rand = $_POST['id'];
        $data = array(
            'company_act' => 1
        );
        $result = $this->Company_Model->update_data($data, $rand);
        echo $result;
    }
	
	public function export(){
        $get_customer= $this->Company_Model->get_export_companies();
        $data['company'] = $get_customer;
        $this->load->view('Company/export_company',$data);
}
	
}