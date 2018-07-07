<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agencies extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (is_logged_in() == true) {
            redirect("Welcome");
        }
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Enquiry_Model');
        $this->load->model('Employee_Model');
        $this->load->model('Agent_Model');
//$this->load->library('curl');
    }

    public function index() {

        $this->load->view('template/header');
        $roles = $this->Enquiry_Model->get_agencies();

        $data['employee'] = $roles;
        $this->load->view('agencies/list_agencies', $data);
        $this->load->view('template/footer');
    }

    public function admin() {

        $result = $this->db->query("select * from tbl_agencies")->result();
        foreach ($result as $data) {
            $username = $data->agencies_email_id;
            $password = $data->agencies_id;
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $rand = '';
            $random_string_length = 6;
            $max = strlen($characters) - 1;
            for ($i = 0; $i < $random_string_length; $i++) {
                $rand .= $characters[mt_rand(0, $max)];
            }
            $date = date("Y-m-d H:i:s");
            $daa = array(
                'admin_rand' => $rand,
                'admin_username' => $username,
                'admin_password' => $rand,
                'admin_type' => 4,
                'employee_id' => $password,
                'admin_created_on' => $date,
                'admin_role' => 4,
                'admin_act' => 1
            );
            $this->db->insert("tbl_admin", $daa);
        }
    }

    public function location() {

        $this->load->view('template/header');
        $roles = $this->Enquiry_Model->locations();

        $data['employee'] = $roles;
        $this->load->view('agencies/listlocation', $data);
        $this->load->view('template/footer');
    }

    public function updatelocationdetails() {
        $gname = $_POST['l_name'];

        $insert_id = $_POST['id'];

        $q = $this->db->query("update tbl_location set location_name='$gname' where location_id=$insert_id");
        if ($q) {
            $cookie = array(
                'name' => 'update',
                'value' => '1',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'update',
                'value' => '3',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Agencies/location");
    }

    public function reports() {

        $this->load->view('template/header');
        if (isset($_POST['from'])) {
            $date = $_POST['from'];
            $date = date("Y-m-d", strtotime($date));
        } else {
            $date = date("Y-m-d");
        }
        $roles = $this->Enquiry_Model->get_agenciesreports($date);

        $data['employee'] = $roles;
        $data['date'] = $date;
        $this->load->view('agencies/list_agencies_reports', $data);
        $this->load->view('template/footer');
    }

    public function edit_agencies($id) {
        $this->load->view('template/header');
        $get_task = $this->Agent_Model->fetch_agencies($id);

        $roles = $this->Enquiry_Model->locations();

        $data['agency'] = $roles;

        $data['fetch_task'] = $get_task;
        $this->load->view('agencies/agency_edit', $data);
        $this->load->view('template/footer');
    }

    public function edit_location($id) {
        $this->load->view('template/header');


        $data['lid'] = $id;
        $this->load->view('agencies/edit_location', $data);
        $this->load->view('template/footer');
    }

    public function get_location() {
        $agency_id = $_POST['id'];
        $where = "agency_id ='$agency_id'";
        $q = $this->db->select('*')->from('tbl_agencies_location')->where($where)->get()->num_rows();
        $response = array();
        $option = '';
        if ($q > 0) {
            $where = "agency_id ='$agency_id' and act=1";
            $q = $this->db->select('location_id')->from('tbl_agencies_location')->where($where)->get()->result();
            foreach ($q as $location) {
                $ids = $location->location_id;
                $wheres = "location_id=$ids";
                $qss = $this->db->select('location_id,location_name')->from('tbl_location')->where($wheres)->get()->num_rows();
                if ($qss > 0) {
                    $qs = $this->db->select('location_id,location_name')->from('tbl_location')->where($wheres)->get()->row();


                    $location_name = $qs->location_name;
                    $location_id = $qs->location_id;
                    $option .= "<option value='$location_id'>$location_name</option>";
                }
            }

            echo $option;
        }
    }

    public function getagencies() {
        $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];

        $branch_id = $_POST['id'];
        if ($usertype == 3) {
            $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;

            $datas = $this->db->query("select * from tbl_agencies where branch_id=$branch_id and agencies_id in($agencies_id) ")->num_rows();
            $data = $this->db->query("select * from tbl_agencies where branch_id=$branch_id and agencies_id in($agencies_id)")->result();
        } else {
            $datas = $this->db->query("select * from tbl_agencies where branch_id=$branch_id")->num_rows();
            $data = $this->db->query("select * from tbl_agencies where branch_id=$branch_id")->result();
        }
        if ($datas > 0) {

            $option = "<option value=''>Please select Agencies</option>";
            foreach ($data as $qs) {
                $location_name = $qs->agencies_name;
                $location_id = $qs->agencies_id;
                $option .= "<option value='$location_id'>$location_name</option>";
            }
            echo $option;
        }
    }

    public function addlocation() {
        $this->load->view('template/header');

        $this->load->view('agencies/addlocation');
        $this->load->view('template/footer');
    }

    public function addnewlocation() {
        $terms = $_POST['repeater-list'];
        $input = array_map("unserialize", array_unique(array_map("serialize", $terms)));
        $repeater_count = count($terms);
        $duplicate_count = count($input);
        $date = date("Y-m-d H:i:s");
        foreach ($terms as $t) {
            $namee = $t['location_name'];
            $s = "INSERT INTO `tbl_location`(`location_id`, `location_name`, `location_act`, `location_created_on`) "
                    . "VALUES ('','$namee','1','$date')";

            $qq = $this->db->query("$s");
        }
        if ($qq) {
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
        redirect("Employee");
    }

    public function edit_employee($key) {
        $this->load->view('template/header');

        $get_emp = $this->Employee_Model->get_employee($key);
        $data['employee'] = $get_emp;
        echo $this->db->last_query();
        print_r($get_emp);
        exit();
        $this->load->view('employee/employee_edit', $data);
        $this->load->view('template/footer');
    }

    public function delete_employee() {
        $rand = $_POST['id'];
        $value = $_POST['value'];
        $data = array(
            'employee_act' => $value,);
        $data1 = array(
            'admin_act' => $value);
        $result = $this->Employee_Model->update_data($data, $rand, $data1);
        echo $result;
    }

    public function update() {
        if ($_FILES['userfile']['name'] != '') {
            $imagePrefix = date('Y_m_d_H_i_s');
//$imagename = $imagePrefix.$value['userfile'];
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 100;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['file_name'] = $imagePrefix;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('userfile');
            $upload_data = $this->upload->data();
            $pic = $upload_data['file_name'];
//print_r($pic);exit();
        } else {
            $pic = $_POST['filename'];
        }
        $rand = $_POST['key'];
        $pass = $_POST['emp_pass'];
        $date = date('Y-m-d H:i:s');
        $data = array(
            'employee_rand' => $rand,
            'admin_role_id' => $_POST['role'],
            'employee_name' => $_POST['emp_name'],
            'employee_phone' => $_POST['emp_number'],
            'employee_email' => $_POST['emp_email'],
            'employee_address_line1' => $_POST['emp_addr1'],
            'employee_address_line2' => $_POST['emp_addr2'],
            'employee_address_line3' => $_POST['emp_addr3'],
            'employee_address_line4' => $_POST['emp_addr4'],
            'employee_pincode' => $_POST['emp_pin'],
            'employee_profile' => $pic,
            'employee_created_on' => $date,
            'employee_act' => 1
        );
        $result = $this->Employee_Model->update($data, $pass, $rand);
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
        redirect("Employee");
    }

    public function export() {
        $get_employee = $this->Employee_Model->get_export_companies();
        $data['employee'] = $get_employee;
        $this->load->view('employee/export_employee', $data);
    }

    public function add() {
        $this->load->view('template/header');

        $roles = $this->Employee_Model->get_employees();
        $data['employee'] = $roles;
        $roles = $this->Enquiry_Model->get_agencies();

        $data['agency'] = $roles;

        $this->load->view('agencies/add_agencies', $data);
        $this->load->view('template/footer');
    }

    public function addnew() {
        $this->load->view('template/header');

        $roles = $this->Employee_Model->get_employees();
        $data['employee'] = $roles;
        $roles = $this->Enquiry_Model->locations();

        $data['agency'] = $roles;

        $this->load->view('agencies/addnew', $data);
        $this->load->view('template/footer');
    }

    public function adddetails() {

        $name = $_POST['name'];
        $created_by = $_POST['created_by'];
        $Locations = $_POST['Locations'];
        $from = $_POST['from'];
        $i = implode(',', $created_by);
        $branch_id = $_POST['names'];
        $user_id = $_SESSION['userdata']['user_id'];

        $from = date('Y-m-d', strtotime($from));

        $s = "INSERT INTO `tbl_agencies_locations`(`user_id`,`id`,`branch_id`,`agency_id`, `location_id`, `emp_id`, `date`, `act`) VALUES ('$user_id','','$branch_id','$name','$Locations','$i','$from',1)";

        $qq = $this->db->query("$s");

        if ($qq) {
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'success',
                'value' => '3',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Agencies");
    }

    public function addnewdetails() {

        $name = $_POST['name'];
        $list = $_POST['document_name'];
        $bid = $_POST['branch_id'];
        $date = date("Y-m-d H:i:s");
        $amount = $_POST['amount'];
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand .= $characters[mt_rand(0, $max)];
        }
        $user_id = $_SESSION['userdata']['user_id'];

        $data = array(
            'agencies_name' => $name,
            'branch_id' => $bid,
            'agencies_email_id' => $_POST['email'],
            'agencies_phone_no' => $_POST['mobileno'],
            'agencies_act' => 1,
            'order_amt' => $amount,
            'agencies_created_on' => $date,
            'agencies_created_by' => $date,
        );
        $q = $this->db->insert('tbl_agencies', $data);
        $id = $this->db->insert_id();

        foreach ($list as $t) {
            $ids = $t;
            $datasy = array(
                'agency_id' => $id,
                'branch_id' => $bid,
                'location_id' => $ids,
                'act' => 1
            );
            $this->db->insert('tbl_agencies_location', $datasy);
        }

        $q2 = $this->db->insert('tbl_admin', array('admin_rand' => $rand,
            'admin_username' => $_POST['email'],
            'admin_password' => $_POST['password'],
            'employee_id' => $id,
            'admin_type' => 4,
            'admin_role' => 4,
            'admin_created_on' => $date,
            'admin_profile_picture' => '2018-02-07_10_19_22.png',
            'admin_act' => 1));

        if ($q) {
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'success',
                'value' => '3',
                'expire' => '3',
            );
        }



        $this->input->set_cookie($cookie);
        redirect("Agencies");
    }

    public function updatedetails() {
        //echo "<pre>";        print_r($_POST);EXIT();
        $title = $_POST['name'];
        $insert_id = $_POST['key'];
        $notes = "";
        $list = $_POST['document_name'];
        $bid = $_POST['branch_id'];
        $status = 0;
        $amount = $_POST['amount'];
        $email = $_POST['email'];
        $mobileno = $_POST['mobileno'];
        $date = date('y-m-d H:i:s');
        $q = $this->db->query("update tbl_agencies set 	agencies_name='$title',agencies_phone_no='$mobileno',agencies_email_id='$email',order_amt='$amount',branch_id=$bid where 	agencies_id=$insert_id");

        $q = $this->db->query("update tbl_agencies_location set act=0 where agency_id=$insert_id");

        $q = $this->db->query("update tbl_admin set admin_username='$email' where admin_type=4 AND admin_rand=$insert_id");

        foreach ($list as $t) {
            $ids = $t;
            $datasy = array(
                'agency_id' => $insert_id,
                'location_id' => $ids,
                'branch_id' => $bid,
                'act' => 1
            );
            $this->db->insert('tbl_agencies_location', $datasy);
        }

        if ($q) {
            $cookie = array(
                'name' => 'update',
                'value' => '1',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'update',
                'value' => '3',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Agencies");
    }

}
