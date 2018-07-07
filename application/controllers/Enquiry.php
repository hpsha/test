<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('curl');
        $this->load->Model('Enquiry_Model');
        $this->load->Model('Agent_Model');
        $this->load->Model('Employee_Model');
        $this->load->Model('Customer_Model');
    }

    public function index() {
        $this->load->view('template/header');



        $this->load->view('template/footer');
    }

    public function preview1() {
        $this->load->view('template/header');
        $this->load->view('enquiry/preview1');
        //$this->load->view('template/footer');
    }

    public function enquiry_demo() {
        $this->load->view('template/header');
        $this->load->view('enquiry/simta_enquiry');
        $this->load->view('template/footer');
    }

    public function add_enquiry() {
        $get_customer = $this->Customer_Model->get_customer();
        $data['customers'] = $get_customer;
        //Company details
        $get_companies = $this->Company_Model->get_companies();
        $data['companies'] = $get_companies;
        //Agent details
        $get_agents = $this->Agent_Model->get_agents();
        $data['agents'] = $get_agents;
        //Employee count
        $roles = $this->Employee_Model->get_employees();
        $data['employee'] = $roles;
        //company count
        // $company_count= $this->Company_Model->get_companies_count();
        // $data['company_counts'] = $company_count;

        $this->load->view('template/header');
        $this->load->view('enquiry/enquiry_add', $data);
        $this->load->view('template/footer');
    }

    public function get_details() {
        //print_r($_POST);exit();
        $company_id = $_POST['company_id'];
        $customer_id = $_POST['customer_id'];
        //print_r($company_id);
        //print_r($customer_id);exit();
        $w = "customer_id='$customer_id' AND company_id='$company_id'";
        $q = $this->db->select('customer_sale_type,customer_sale_agent,customer_sale_salesperson')->from('tbl_customer_sales')->where($w)->get()->row();
        //echo $this->db->last_query();
        $response = json_encode($q);
        echo $response;
        // 1 salesperson 2 agent
    }

    public function get_address() {
        $val = $_POST['id'];
        if ($val == 1) {
            $customer_id = $_POST['customer_id'];
            $w = "customer_id=$customer_id";
            $q = $this->db->select('customer_name,customer_phone,customer_mail,customer_address_line1,customer_address_line2,customer_address_line3,customer_address_line4,customer_pincode,customer_shipping_gst,customer_shipping_pan')->from('tbl_customer')->where($w)->get()->row();
            $response = json_encode($q);
            echo $response;
        }
        if ($val == 2) {
            $agent_id = $_POST['agent_id'];
            $w = "agent_id=$agent_id";
            $q = $this->db->select('agent_name,agent_phone,agent_email,agent_address_line1,agent_address_line2,agent_address_line3,agent_address_line4,agent_pincode,agent_gst,agent_pan')->from('tbl_agent')->where($w)->get()->row();
            $response = json_encode($q);
            echo $response;
        }
        //print_r($_POST);exit();
    }

    public function get_customer_address() {
        $customer_id = $_POST['customer_id'];
        $w = "customer_id=$customer_id";
        $q = $this->db->select('customer_name,customer_phone,customer_mail,customer_address_line1,customer_address_line2,customer_address_line3,customer_address_line4,customer_pincode,customer_shipping_gst,customer_shipping_pan')->from('tbl_customer')->where($w)->get()->row();
        $response = json_encode($q);
        echo $response;

        //print_r($_POST);exit();
    }

    public function enquiry_details_add() {
        echo "<pre>";
        print_r($_POST);
    }

    public function customer_details_add() {



        //customer
        $customer_name = $_POST['customer_name'];
        $customer_phone = $_POST['customer_phone'];
        $customer_mail = $_POST['customer_mail'];
        $customer_addr1 = $_POST['customer_addr1'];
        $customer_addr2 = $_POST['customer_addr2'];
        $customer_addr3 = $_POST['customer_addr3'];
        $customer_addr4 = $_POST['customer_addr4'];
        $customer_pin = $_POST['customer_pin'];
        $customer_spindles = $_POST['customer_Spindles'];
        //billing
        $billing_name = $_POST['billing_name'];
        $billing_phone = $_POST['billing_phone'];
        $billing_mail = $_POST['billing_mail'];
        $billing_address1 = $_POST['billing_address1'];
        $billing_address2 = $_POST['billing_address2'];
        $billing_address3 = $_POST['billing_address3'];
        $billing_address4 = $_POST['billing_address4'];
        $billing_pin = $_POST['billing_pin'];
        //Shipping
        $shipping_name = $_POST['shipping_name'];
        $shipping_phone = $_POST['shipping_phone'];
        $shipping_mail = $_POST['shipping_mail'];
        $shipping_addr1 = $_POST['shipping_addr1'];
        $shipping_addr2 = $_POST['shipping_addr2'];
        $shipping_addr3 = $_POST['shipping_addr3'];
        $shipping_addr4 = $_POST['shipping_addrs4'];
        $shipping_pin = $_POST['shipping_pin'];
        //agent through
        //$agent_through1 = $_POST['agent_through1'];
        //$agent_id = $_POST['agent'];
        //sales through
        //$agent_through2 = $_POST['agent_through2'];
        //$agent_through2 = $_POST['agent_through2'];
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand .= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');

        $data = array(
            'customer_name' => $rand,
            'customer_phone' => $customer_name,
            'customer_mail' => $customer_mail,
            'customer_spindles' => $customer_spindles,
            'customer_address_line1' => $customer_addr1,
            'customer_address_line2' => $customer_addr2,
            'customer_address_line3' => $customer_addr3,
            'customer_address_line4' => $customer_addr3,
            'customer_pincode' => $customer_pin,
            'customer_shipping_name' => $shipping_name,
            'customer_shipping_phone' => $shipping_phone,
            'customer_shipping_mail' => $shipping_mail,
            'customer_shipping_address1' => $shipping_addr1,
            'customer_shipping_address2' => $shipping_addr2,
            'customer_shipping_address3' => $shipping_addr3,
            'customer_shipping_address4' => $shipping_addr4,
            'customer_shipping_pincode' => $shipping_pin,
            'customer_billing_name' => $billing_name,
            'customer_billing_phone' => $billing_phone,
            'customer_billing_mail' => $billing_mail,
            'customer_billing_address1' => $billing_address1,
            'customer_billing_address2' => $billing_address2,
            'customer_billing_address3' => $billing_address3,
            'customer_billing_address4' => $billing_address4,
            'customer_billing_pincode' => $billing_pin,
            'customer_created_on' => $date,
            'customer_updated_on' => $date,
            'customer_act' => 1
        );
        $test = array(
            'company_id' => $_POST['company_id'],
            'customer_through' => $_POST['customer_through'],
            'agent' => $_POST['agent'],
            'sales_person' => $_POST['sales_person']
        );
        $result = $this->Customer_Model->add($data, $test);
        if ($result == 1) {
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 3) {
            $cookie = array(
                'name' => 'success',
                'value' => '3',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'success',
                'value' => '2',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Customer");
    }

    public function edit_customer() {
        $this->load->view('template/header');
        $this->load->view('customer/customer_edit');
    }

    //NEW ENQUIRY PROCESS
        public function Search() {
        //print_r($_POST);exit();
        $emp=$_POST['employee'];
        $roles = $this->Enquiry_Model->search($emp);
        $count=count($roles);
      //  echo $this->db->last_query();
     // echo $count;
        $tr="";
        for($i=0;$i<$count;$i++){
            if($roles[$i]->enquiry_no!=''){
            $tr.="<tr>
                <td>".$roles[$i]->enquiry_no."</td>
                <td>".$roles[$i]->enquiry_cus_name."</td>
                <td>".$roles[$i]->enquiry_cus_mobileno."</td>
                <td>".$roles[$i]->enquiry_cus_email."</td>
                <td>".$roles[$i]->employee_name."</td>
                <td class='text-nowrap'><a class='btn btn-info btn-icon-anim btn-circle' href='".base_url()."Enquiry/edit_newenquiry/".$roles[$i]->enquiry_no."' data-toggle='tooltip' data-original-title='Edit'><i class='fa fa-pencil' style='margin-top:10px'></i></a>
                </td></tr>";
            }
        }
        echo $tr;
        
    }


    public function new_enq_list() {
        $this->load->view('template/header');

        $roles = $this->Enquiry_Model->get_new_enq();
        $data['enquiry'] = $roles;
         $enquiry_id=isset($_POST['enquiry_id']) ? $_POST['enquiry_id'] :'' ;
        $query=$this->db->query("select * from tbl_enquiry where `enquiry_id`='$enquiry_id'");
        $result=$query->result();
        $get_datas = $this->Employee_Model->get_employeesname();
        $data['get_datas'] = $get_datas;
        $this->load->view('enquiry/new_enquiry_list', $data);
        $this->load->view('template/footer');
    }

     public function new_enq_lists() {
        $this->load->view('template/header');

        $roles = $this->Enquiry_Model->get_new_enq();
        $data['enquiry'] = $roles;
        $get_datas = $this->Employee_Model->get_employeesname();
        $data['get_datas'] = $get_datas;
        $this->load->view('enquiry/new_enquiry_lists', $data);
        $this->load->view('template/footer');
    }

    public function edit_newenquiry($key) {
        $this->load->view('template/header');
        $roles = $this->Enquiry_Model->fetch_new_enq($key);
        $data['enquiry_details'] = $roles;
        $this->load->view('enquiry/new_enquiry_update', $data);
        $this->load->view('template/footer');
    }

    public function update_newenquiry() {
        //echo "<pre>";  print_r($_POST);exit();
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand .= $characters[mt_rand(0, $max)];
        }
        $enq_no = $_POST['enq_no'];
        $quotation_no = $_POST['quotation_no'];
        $new_date = $_POST['new_date'];
        $new_amt = $_POST['new_amt'];
        $new_sf = $_POST['new_sf'];
        $new_qty = $_POST['new_qty'];
        $status = $_POST['status'];
        $date = date('Y-m-d H:i:s');

        if ($status == 'Processing') {
            $data = array(
                'quotaion_rand' => $rand,
                'enquiry_no' => $enq_no,
                'quotaion_no' => $quotation_no,
                'quotaion_date' => $new_date,
                'quotaion_amount' => $new_amt,
                'quotaion_sq_feet' => $new_sf,
                'quotaion_qty' => $new_qty,
                'quotaion_created_on' => $date,
                'quotaion_act' => 1,
            );
            $result = $this->Enquiry_Model->update_new_quotaiton($data, $status);
            
            if ($result == 1) {
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 3) {
            $cookie = array(
                'name' => 'success',
                'value' => '3',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'success',
                'value' => '2',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Enquiry/processing_enq_list");
            
        } elseif ($status == 'Drop') {
            $datas = array(
                'enquiry_no' => $enq_no,
                'enquiry_status' => $status,
                'enquiry_act' => 0,
            );
            $quotaions = array(
                'enquiry_no' => $enq_no,
                'quotaion_updated_on' => $status,
                'quotaion_act' => 0,
            );
            $result = $this->Enquiry_Model->drop_new_quotaiton($datas,$quotaions);
            if ($result == 1) {
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 3) {
            $cookie = array(
                'name' => 'success',
                'value' => '3',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'success',
                'value' => '2',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Enquiry/new_enq_list");
        }
    }
    
    //PROCESSING ENQUIRY
    public function processing_enq_list() {
        $this->load->view('template/header');

        $roles = $this->Enquiry_Model->get_process_enq();
        $data['enquiry'] = $roles;
 $get_datas = $this->Employee_Model->get_employeesname();
        $data['get_datas'] = $get_datas;
        $this->load->view('enquiry/process_enquiry_list', $data);
        $this->load->view('template/footer');
    }
    public function process() {
       
        $emp=$_POST['employee'];
       
        $roles = $this->Enquiry_Model->process($emp);
        $count=count($roles);
    
        $tr="";
        for($i=0;$i<$count;$i++){
            if($roles[$i]->enquiry_no!=''){
            $tr.="<tr>
                <td>".$roles[$i]->enquiry_no."</td>
                <td>".$roles[$i]->enquiry_cus_name."</td>
                <td>".$roles[$i]->enquiry_cus_mobileno."</td>
                <td>".$roles[$i]->enquiry_cus_email."</td>
                <td>".$roles[$i]->employee_name."</td>
                <td class='text-nowrap'><a class='btn btn-info btn-icon-anim btn-circle' href='".base_url()."Enquiry/edit_newenquiry/".$roles[$i]->enquiry_no."' data-toggle='tooltip' data-original-title='Edit'><i class='fa fa-pencil' style='margin-top:10px'></i></a>
                </td></tr>";
            }
        }
        echo $tr;
        
    }
       public function complete() {
       
        $emp=$_POST['employee'];
       
        $roles = $this->Enquiry_Model->complete($emp);
        $count=count($roles);
    
        $tr="";
        for($i=0;$i<$count;$i++){
            if($roles[$i]->enquiry_no!=''){
            $tr.="<tr>
                <td>".$roles[$i]->enquiry_no."</td>
                <td>".$roles[$i]->enquiry_cus_name."</td>
                <td>".$roles[$i]->enquiry_cus_mobileno."</td>
                <td>".$roles[$i]->enquiry_cus_email."</td>
                <td>".$roles[$i]->employee_name."</td>
                <td class='text-nowrap'><a class='btn btn-info btn-icon-anim btn-circle' href='".base_url()."Enquiry/edit_newenquiry/".$roles[$i]->enquiry_no."' data-toggle='tooltip' data-original-title='Edit'><i class='fa fa-pencil' style='margin-top:10px'></i></a>
                </td></tr>";
            }
        }
        echo $tr;
        
    }
    public function edit_processing_enq($key) {
        $this->load->view('template/header');
        $roles = $this->Enquiry_Model->fetch_new_enq($key);
        $data['enquiry_details'] = $roles;
        $roles = $this->Enquiry_Model->fetch_processing_quotation($key);
        $data['quota_details'] = $roles;
        
        $this->load->view('enquiry/processing_enquiry_edit', $data);
        $this->load->view('template/footer');
    }
    
    public function getprocessing_quotation() {
         //print_r($_POST);exit();
         $id= $_POST['id'];
        $roles = $this->Enquiry_Model->fetch_process_quota($id);
        foreach($roles as $datasss)
        $quot_date = $datasss->quotaion_date;
        $quot_amt  = $datasss->quotaion_amount;
        $quot_sq   = $datasss->quotaion_sq_feet;
        $quot_qty  = $datasss->quotaion_qty;
        echo $quot_date.'~'.$quot_amt.'~'.$quot_sq.'~'.$quot_qty;
    }

    public function update_processingenquiry() {
        //echo "<pre>";  print_r($_POST);exit();
         
        
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand .= $characters[mt_rand(0, $max)];
        }
        
        $enq_no = $_POST['enq_no'];
        $quotation_no = $_POST['new_quotation_no'];
        $pre_quotation_no = $_POST['pre_quotaion_no'];
        $new_date = $_POST['new_date'];
        $new_amt = $_POST['new_amt'];
        $new_sf = $_POST['new_sf'];
        $new_qty = $_POST['new_qty'];
        $status = $_POST['status'];
       // $statuses= "Processing";
        $date = date('Y-m-d H:i:s');
    //IF ANOTHER QUOTATION IS GENRATE
        if ($status == 'Processing') {
          //  echo "incorrect data";exit();
            $data = array(
                'quotaion_rand' => $rand,
                'enquiry_no' => $enq_no,
                'quotaion_no' => $quotation_no,
                'quotaion_date' => $new_date,
                'quotaion_amount' => $new_amt,
                'quotaion_sq_feet' => $new_sf,
                'quotaion_qty' => $new_qty,
                'quotaion_created_on' => $date,
                'quotaion_act' => 1,
            );
        
            $result = $this->Enquiry_Model->update_new_quotaiton($data, $status);
           // print_r($result);exit();
            
            if ($result == 1) {
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 3) {
            $cookie = array(
                'name' => 'success',
                'value' => '3',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'success',
                'value' => '2',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Enquiry/processing_enq_list");
            
        }
       //IF Quotaion is COMPLETE 
        elseif($status == 'Completed'){
            
            $datas = array(
                'enquiry_no' => $enq_no,
                'quotaion_id' => $pre_quotation_no,
                'quotaion_updated_on' => $date,
                'quotaion_act' => 2,
            );
             $enquiry = array(
                'enquiry_no' => $enq_no,
                'enquiry_status' => $status,
                'enquiry_updatedon'=> $date,
                'enquiry_act' => 1,
            );
        $result = $this->Enquiry_Model->update_complete_quotaiton($datas,$enquiry);
            
            if ($result == 1) {
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 3) {
            $cookie = array(
                'name' => 'success',
                'value' => '3',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'success',
                'value' => '2',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Enquiry/completed_enq_list");
        }
        //IF Quotaion is DROP 
        elseif ($status == 'Drop') {
            $datas = array(
                'enquiry_no' => $enq_no,
                'enquiry_status' => $status,
                'enquiry_act' => 0,
            );
             $quotaions = array(
                'enquiry_no' => $enq_no,
                'quotaion_updated_on' => $status,
                'quotaion_act' => 0,
            );
            $result = $this->Enquiry_Model->drop_new_quotaiton($datas,$quotaions);
            if ($result == 1) {
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 3) {
            $cookie = array(
                'name' => 'success',
                'value' => '3',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'success',
                'value' => '2',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Enquiry/new_enq_list");
        }




        
    }
    
    //COMPLETED ENQUIRY
    public function completed_enq_list() {
        $this->load->view('template/header');
 $get_datas = $this->Employee_Model->get_employeesname();
        $data['get_datas'] = $get_datas;
        $roles = $this->Enquiry_Model->get_completed_enq();
        $data['enquiry'] = $roles;

        $this->load->view('enquiry/completed_enquiry_list', $data);
        $this->load->view('template/footer');
    }
      public function view_completed_enq($key) {
        $this->load->view('template/header');

        $roles = $this->Enquiry_Model->fetch_completed_enq($key);
        $data['enquiry'] = $roles;

        $this->load->view('enquiry/view_completed_enquiry', $data);
        $this->load->view('template/footer');
    }
    
    //DROP ENQUIRYS
     public function dropp_enq_list() {
        $this->load->view('template/header');
        //referred_by

        $roles = $this->Enquiry_Model->get_dropped_enq();
        $data['enquiry'] = $roles;

        $this->load->view('enquiry/drop_enquiry_list', $data);
        $this->load->view('template/footer');
    }
    
    public function delete_enquiry(){
    $enq_no = $_POST['id'];
    $delete = "Deleted";
    $date = date('Y-m-d H:i:s');
    $data = array(
        'enquiry_updatedon'=>$date,
            'enquiry_act' => 0,
            'enquiry_status' =>$delete,
        );
    $result = $this->Enquiry_Model->delete_enq($data,$enq_no);
    echo $result;
    }

}
