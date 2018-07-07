<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('curl');
        $this->load->library('session');
        $this->load->Model('Company_Model');
        $this->load->Model('Agent_Model');
        $this->load->Model('Employee_Model');
        $this->load->Model('Customer_Model');
    }

    public function index() {
        $this->load->view('template/header');
        $id=$_SESSION['userdata']['emp_id'];
        //print_r($id);exit();
        if($id!=0){
        $get_customer = $this->Customer_Model->get_employee_customer($id);
        $data['customers'] = $get_customer;
        $this->load->view('customer/list_employee_customer', $data);
        }
        else{
            $this->load->view('customer/list_customer');
        }
        $this->load->view('template/footer');
    }

    public function add() {
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
        $this->load->view('customer/customer_add', $data);
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
        $customer_gst_no = $_POST['customer_gst_no'];
        $customer_pan_no = $_POST['customer_pan_no'];
        $customer_area = $_POST['customer_area'];
        $contact1 = $_POST['additional_contact1'];
        $contact2 = $_POST['additional_contact2'];
        $email1 = $_POST['additional_email1'];
        $email2 = $_POST['additional_email2'];
        //billing
        $billing_name = $_POST['billing_name'];
        $billing_phone = $_POST['billing_phone'];
        $billing_mail = $_POST['billing_mail'];
        $billing_address1 = $_POST['billing_address1'];
        $billing_address2 = $_POST['billing_address2'];
        $billing_address3 = $_POST['billing_address3'];
        $billing_address4 = $_POST['billing_address4'];
        $billing_pin = $_POST['billing_pin'];
        $billing_pan_no = $_POST['billing_pan_no'];
        $billing_gst_no = $_POST['billing_gst_no'];
        $billing_contact1 = $_POST['billing_additional_contact1'];
        $billing_contact2 = $_POST['billing_additional_contact2'];
        $billing_email1 = $_POST['billing_additional_email1'];
        $billing_email2 = $_POST['billing_additional_email2'];

        //Shipping
        $shipping_name = $_POST['shipping_name'];
        $shipping_phone = $_POST['shipping_phone'];
        $shipping_mail = $_POST['shipping_mail'];
        $shipping_addr1 = $_POST['shipping_addr1'];
        $shipping_addr2 = $_POST['shipping_addr2'];
        $shipping_addr3 = $_POST['shipping_addr3'];
        $shipping_addr4 = $_POST['shipping_addrs4'];
        $shipping_pin = $_POST['shipping_pin'];
        $shipping_gst_no = $_POST['shipping_gst_no'];
        $shipping_pan_no = $_POST['shipping_pan_no'];
        $shipping_pin = $_POST['shipping_pin'];
        $shipping_contact1 = $_POST['shipping_additional_contact1'];
        $shipping_contact2 = $_POST['shipping_additional_contact2'];
        $shipping_email1 = $_POST['shipping_additional_email1'];
        $shipping_email2 = $_POST['shipping_additional_email2'];

        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand.= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');

        $data = array(
            'customer_name' => $customer_name,
            'customer_rand' => $rand,
            'customer_phone' => $customer_phone,
            'customer_mail' => $customer_mail,
            'customer_spindles' => $customer_spindles,
            'customer_pan_no' => $customer_pan_no,
            'customer_gst_no' => $customer_gst_no,
            'customer_area' => $customer_area,
            'customer_address_line1' => $customer_addr1,
            'customer_address_line2' => $customer_addr2,
            'customer_address_line3' => $customer_addr3,
            'customer_address_line4' => $customer_addr3,
            'customer_pincode' => $customer_pin,
            'customer_additional_contact1' => $contact1,
            'customer_additional_contact2' => $contact2,
            'customer_additional_email1' => $email1,
            'customer_additional_email2' => $email2,
            'customer_shipping_name' => $shipping_name,
            'customer_shipping_phone' => $shipping_phone,
            'customer_shipping_mail' => $shipping_mail,
            'customer_shipping_address1' => $shipping_addr1,
            'customer_shipping_address2' => $shipping_addr2,
            'customer_shipping_address3' => $shipping_addr3,
            'customer_shipping_address4' => $shipping_addr4,
            'customer_shipping_pincode' => $shipping_pin,
            'customer_shipping_gst' => $shipping_gst_no,
            'customer_shipping_pan' => $shipping_pan_no,
            'shipping_addtional_cantact1' => $shipping_contact1,
            'shipping_additional_contact2' => $shipping_contact2,
            'shipping_additional_email1' => $shipping_email1,
            'shipping_additional_email2' => $shipping_email2,
            'customer_billing_name' => $billing_name,
            'customer_billing_phone' => $billing_phone,
            'customer_billing_mail' => $billing_mail,
            'customer_billing_address1' => $billing_address1,
            'customer_billing_address2' => $billing_address2,
            'customer_billing_address3' => $billing_address3,
            'customer_billing_address4' => $billing_address4,
            'customer_billing_pincode' => $billing_pin,
            'customer_billing_gst' => $billing_gst_no,
            'customer_billing_pan' => $billing_pan_no,
            'billing_additional_contact1' => $billing_contact1,
            'billing_additional_contact2' => $billing_contact2,
            'billing_additional_email1' => $billing_email1,
            'billing_additional_email2' => $billing_email2,
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
                'name' => 'edit_success',
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

    //Customer edit
    public function customer_edit() {

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
        $customer_gst_no = $_POST['customer_gst_no'];
        $customer_pan_no = $_POST['customer_pan_no'];
        $customer_area = $_POST['customer_area'];
        //billing
        $billing_name = $_POST['billing_name'];
        $billing_phone = $_POST['billing_phone'];
        $billing_mail = $_POST['billing_mail'];
        $billing_address1 = $_POST['billing_address1'];
        $billing_address2 = $_POST['billing_address2'];
        $billing_address3 = $_POST['billing_address3'];
        $billing_address4 = $_POST['billing_address4'];
        $billing_pin = $_POST['billing_pin'];
        $billing_pan_no = $_POST['billing_pan_no'];
        $billing_gst_no = $_POST['billing_gst_no'];
        //Shipping
        $shipping_name = $_POST['shipping_name'];
        $shipping_phone = $_POST['shipping_phone'];
        $shipping_mail = $_POST['shipping_mail'];
        $shipping_addr1 = $_POST['shipping_addr1'];
        $shipping_addr2 = $_POST['shipping_addr2'];
        $shipping_addr3 = $_POST['shipping_addr3'];
        $shipping_addr4 = $_POST['shipping_addrs4'];
        $shipping_pin = $_POST['shipping_pin'];
        $shipping_gst_no = $_POST['shipping_gst_no'];
        $shipping_pan_no = $_POST['shipping_pan_no'];
        $shipping_pin = $_POST['shipping_pin'];
        $c_id = $_POST['customer_id'];

        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand.= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');


        $data = array(
            'customer_name' => $customer_name,
            'customer_phone' => $customer_phone,
            'customer_mail' => $customer_mail,
            'customer_spindles' => $customer_spindles,
            'customer_pan_no' => $customer_pan_no,
            'customer_gst_no' => $customer_gst_no,
            'customer_area' => $customer_area,
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
            'customer_shipping_gst' => $shipping_gst_no,
            'customer_shipping_pan' => $shipping_pan_no,
            'customer_billing_name' => $billing_name,
            'customer_billing_phone' => $billing_phone,
            'customer_billing_mail' => $billing_mail,
            'customer_billing_address1' => $billing_address1,
            'customer_billing_address2' => $billing_address2,
            'customer_billing_address3' => $billing_address3,
            'customer_billing_address4' => $billing_address4,
            'customer_billing_pincode' => $billing_pin,
            'customer_billing_gst' => $billing_gst_no,
            'customer_billing_pan' => $billing_pan_no,
            'customer_updated_on' => $date,
            'customer_act' => 1
        );
        $test = array(
            'company_id' => $_POST['company_id'],
            'customer_through' => $_POST['customer_through'],
            'agent' => $_POST['agent'],
            'sales_person' => $_POST['sales_person']
        );

        $result = $this->Customer_Model->edit_customer($data, $c_id, $test);

        if ($result == 1) {
            $cookie = array(
                'name' => 'customer_edit_success',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 3) {
            $cookie = array(
                'name' => 'customer_edit_success',
                'value' => '3',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'customer_edit_success',
                'value' => '2',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Customer");
    }

    public function edit_customer($key) {
        //Customer details
        $get_customer_details = $this->Customer_Model->get_customer_details($key);
        $count = count($get_customer_details);
        $datas = array();
        for ($j = 1; $j < $count; $j++) {
            array_push($datas, $get_customer_details[$j]);
        }

        $data['customer_detail'] = $get_customer_details[0];
        $data['company_detail'] = $datas;
        //	echo "<pre>";print_r($data);exit();
        //echo "<pre>";
        $get_companies = $this->Company_Model->get_companies();
        $data['companies'] = $get_companies;
        //Agent details
        $get_agents = $this->Agent_Model->get_agents();
        $data['agents'] = $get_agents;
        //Employee count
        $roles = $this->Employee_Model->get_employees();
        $data['employee'] = $roles;

        $this->load->view('template/header');
        $this->load->view('customer/customer_edit', $data);
    }

    public function delete_customer() {
        $date = date('Y-m-d H:i:s');
        $rand = $_POST['id'];
        $data = array(
            'customer_act' => 0
        );
        $result = $this->Customer_Model->delete_data($data, $rand);
        echo $result;
    }

    public function posts() {

        $columns = array(
            0 => 'customer_id',
            1 => 'customer_name',
            2 => 'customer_phone',
            3 => 'customer_mail',
            4 => 'customer_gst_no',
            5 => 'customer_spindles',
            6 => 'customer_rand',
        );

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
        $totalData = $this->Customer_Model->allposts_count();
        $totalFiltered = $totalData;
        if (empty($this->input->post('search')['value'])) {
            $posts = $this->Customer_Model->allposts($limit, $start, $order, $dir);
        } else {
            $search = $this->input->post('search')['value'];

            $posts = $this->Customer_Model->posts_search($limit, $start, $search, $order, $dir);

            $totalFiltered = $this->Customer_Model->posts_search_count($search);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['customer_id'] = $post->customer_id;
                $nestedData['customer_name'] = $post->customer_name;
                $nestedData['customer_phone'] = $post->customer_phone;
                $nestedData['customer_mail'] = $post->customer_mail;
                $nestedData['customer_gst_no'] = $post->customer_gst_no;
                $nestedData['customer_spindles'] = $post->customer_spindles;
                $rand = $post->customer_rand;
                $delete = "deletecustomer('$rand')";
                $edit = "window.location.href='";
                $edits = base_url() . "Customer/edit_customer/$rand'";
                $datas = "<button onclick=" . $edit . "$edits class='btn btn-info btn-icon-anim btn-circle' data-toggle='tooltip' data-original-title='Edit'>
                                 <i class='fa fa-pencil'></i> </button>	<button data-toggle='tooltip'
                                 data-original-title='Deactivate' class='btn btn-danger btn-icon-anim btn-circle' onclick=$delete> <i class='fa fa-ban'></i> </button>";

                $nestedData['customer_rand'] = $datas;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function export() {
        $get_customer = $this->Customer_Model->get_customer_alldetails();
        $data['customers'] = $get_customer;
        $get_companies = $this->Company_Model->get_companies_name();
        $data['companies'] = $get_companies;
        $this->load->view('customer/export_customers', $data);
    }

}
