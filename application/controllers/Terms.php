<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Terms extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model('Company_Model'); $this->load->model('Terms_Model');
        if (is_logged_in() == true) {
            redirect("Welcome");
        }
    }
    public function add()
    {
         $get_companies = $this->Company_Model->get_companies_name();
        $data['companies'] = $get_companies;
        $this->load->view('template/header');
$this->load->view('Terms/add_terms',$data);
        $this->load->view('template/footer');
    }
    public function editterms($key)
    {
        $this->load->view('template/header');
         $get_companies = $this->Company_Model->get_companies_name();
        $data['companies'] = $get_companies;
        $get_terms = $this->Terms_Model->get_singleterms($key);
        $data['get_terms'] = $get_terms;
        $this->load->view('Terms/edit_terms', $data);
        $this->load->view('template/footer');
    }
    public function index()
    {
        $this->load->view('template/header');
        $get_companies = $this->Terms_Model->get_terms();
        $this->db->last_query();

        $data['companies'] = $get_companies;
        $this->load->view('Terms/list_terms', $data);
        $this->load->view('template/footer');
    }
    public function inactive()
    {
        $this->load->view('template/header');
        $get_companies = $this->Terms_Model->get_inactiveterms();
        $data['companies'] = $get_companies;
        $this->load->view('Terms/list_inactive_terms', $data);
        $this->load->view('template/footer');
    }
    public function adddetails()
    {
      $terms= $_POST['repeater-list'];
      $company= $_POST['company'];
        $dups = array();
        $input = array_map("unserialize", array_unique(array_map("serialize", $terms)));
        $repeater_count = count($terms);
        $duplicate_count = count($input);
        if ($duplicate_count != $repeater_count) {
          $cookie= array(
           'name'   => 'success',
           'value'  => '2',
           'expire' => '3',
       );
              $this->input->set_cookie($cookie);  
    redirect("Terms");
        }
        foreach($terms as $t){
             $characters           = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand                 = '';
        $random_string_length = 6;
        $max                  = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand .= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');
            $data  = array(
            'term_condition_rand' => $rand,
            'term_condition_data' =>  $t['document_name'],
            'company_id' => $company,
                'term_condition_act' => 1,
            'term_condition_created_on' => $date
        );
           $result = $this->Terms_Model->add_data($data);
        }
        if ($result == 1) {
            $cookie= array(
           'name'   => 'success',
           'value'  => '1',
           'expire' => '3',
       );
        }
       else if ($result == 3) {
             $cookie= array(
           'name'   => 'success',
           'value'  => '3',
           'expire' => '3',
       );
        }
        else{
              $cookie= array(
           'name'   => 'success',
           'value'  => '2',
           'expire' => '3',
       );
        }
                        $this->input->set_cookie($cookie);  
    redirect("Terms");
    }
    public function updateterms()
    {
       
        $date = date('Y-m-d H:i:s');
        $rand = $_POST['terms_rand'];
        $data = array(
            'term_condition_data' => $_POST['document_name'],
            'company_id' => $_POST['company'],
           
        );
        $result = $this->Terms_Model->update_data($data, $rand);
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
        redirect("Terms");
    }
    public function delete_terms()
    {
        $date = date('Y-m-d H:i:s');
        $rand = $_POST['id'];
        $data = array(
            'term_condition_act' => 0
        );
        $result = $this->Terms_Model->update_data($data, $rand);
        echo $result;
    }
    public function activate_terms()
    {
        $date = date('Y-m-d H:i:s');
        $rand = $_POST['id'];
        $data = array(
            'term_condition_act' => 1
        );
        $result = $this->Terms_Model->update_data($data, $rand);
        echo $result;
    }
}