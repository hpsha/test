<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Employee_Model');
        $this->load->model('Settings_Model');
        $this->load->helper('cookie');
        if (is_logged_in() == true) {
            redirect("Welcome");
        }
    }

    public function index() {
        $this->load->view('template/header');
         $get_datas = $this->Employee_Model->get_employeesname();
        $data['get_datas'] = $get_datas;
        
        $this->load->view('Reports/Enquiry',$data);

        $this->load->view('template/footer');
    }

    public function Search() {
       // print_r($_POST);
        $this->load->view('template/header');
    $user_id=$_POST['employee'];
    $froms = $_POST['from'];
    $from = date("Y-m-d", strtotime($froms));
    
    if($froms==''){
        $from="1970-01-01";
    }
    
    $tos =$_POST['to'];
    $to = date("Y-m-d", strtotime($tos));
    if($tos==''){
          $to = date("Y-m-d");
    }

    $get_reportdatas = $this->Employee_Model->get_employeesreportss($user_id,$from,$to);
    $data['fetch_users'] = $get_reportdatas;
        
   /* if($user_id!=0){
        $query=$this->db->query("select * from tbl_shop where `emp_id`='$user_id' and date(`shop_created_on`) BETWEEN '$from' AND '$to' ");
    }
    else{
         $query=$this->db->query("select * from tbl_shop where date(`shop_created_on`) BETWEEN '$from' AND '$to' ");
    }
    print_r($query);
        exit();
        $result=$query->result();
        $data['fetch_users']=$result;
*/
        $get_datas = $this->Employee_Model->get_employeesname();
        $data['get_datas'] = $get_datas;

        $this->load->view('Reports/employeereports', $data);

        $this->load->view('template/footer');
    }

    public function export_employee_reports() {
     $datas['companies']=   $this->Company_Model->get_companies();
        $data=  $this->load->view('Reports/exportdata' ,$datas, true);

        print_r($data);
    }
    public function enquiry_report() {
     $datas['enquiry'] =   $this->Settings_Model->get_enquiry();
     $data=  $this->load->view('Reports/enquiry_report' ,$datas);

        print_r($data);
    }
    public function intensive() {
        $this->load->view('template/header');
         $get_datas = $this->Employee_Model->get_employeesname();
        $data['get_datas'] = $get_datas;
        $this->load->view('Reports/Enquiry1',$data);

        $this->load->view('template/footer');
    }
    public function Search1() {
        $this->load->view('template/header');
    $user_id=$_POST['employee'];
        $query=$this->db->query("select * from tbl_kmdetails where employee_id='$user_id'");
        $result=$query->result();
    $data['fetch_users']=$result;

        $get_datas = $this->Employee_Model->get_employeesname();
        $data['get_datas'] = $get_datas;

        $this->load->view('Reports/employeereports1', $data);

        $this->load->view('template/footer');
    }

}
