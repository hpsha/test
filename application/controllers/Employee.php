<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	function __construct() {
    parent::__construct();
    if (is_logged_in() == true) {
            redirect("Welcome");
        }
	$this->load->helper('url');
	$this->load->library('session');
	$this->load->model('Employee_Model');
        $this->load->model('Agent_Model');
        //$this->load->library('curl');
    }
	public function index()
	{
           
        $this->load->view('template/header');
        $date=date("Y-m-d");
        if(isset($_POST['from'])){
            $from=$_POST['from'];
            $date=date("Y-m-d",strtotime($from));
        }
       
        $roles = $this->Employee_Model->get_employees($date);
        $data['employee'] = $roles;
        $this->load->view('employee/list_employees',$data);
		$this->load->view('template/footer');
	}
        	public function asm()
	{
           
        $this->load->view('template/header');
        $date=date("Y-m-d");
        if(isset($_POST['from'])){
            $from=$_POST['from'];
            $date=date("Y-m-d",strtotime($from));
        }
       
        $roles = $this->Employee_Model->get_asm();
        $data['employee'] = $roles;
        $this->load->view('employee/list_asm',$data);
		$this->load->view('template/footer');
	}
        public function active()
	{
           
        $this->load->view('template/header');
        $date=date("Y-m-d");
        if(isset($_POST['from'])){
            $from=$_POST['from'];
            $date=date("Y-m-d",strtotime($from));
        }
       
        $roles = $this->Employee_Model->get_employeess($date);
        $data['employee'] = $roles;
        $this->load->view('employee/list_employees',$data);
		$this->load->view('template/footer');
	}
		public function group()
	{
           
        $this->load->view('template/header');
     
       
        $this->load->view('employee/list_employee_group');
		$this->load->view('template/footer');
	}
	public function add()
	{
            $this->load->view('template/header');
            $where = "agencies_act = '1'";
            $data['agency'] = $this->db->select('agencies_id,agencies_name')->from('tbl_agencies')->where($where)->get()->result();
            $this->load->view('employee/employee_add', $data);
            $this->load->view('template/footer');
	}
        public function addgroup()
	{
            $this->load->view('template/header');  $date=date("Y-m-d");
            if(isset($_POST['from'])){
            $from=$_POST['from'];
            $date=date("Y-m-d",strtotime($from));
        }
               $roles = $this->Employee_Model->get_employees($date);
        $data['employee'] = $roles;
        $this->load->view('employee/employeegroup',$data);
		$this->load->view('template/footer');
	}
	public function addgroupdetails()
	{
        $emp=$_POST['created_by'];
        $gname=$_POST['emp_name'];
       $ems=implode(",",$emp);
         $s="INSERT INTO `tbl_employee_group`(`employee_group_name`,employee_id,`act`) VALUES ('$gname','$ems',1)";

$qq=$this->db->query("$s");
if ($qq) {
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
    redirect("Employee/group");
	}
	public function edit_emps($key)
	{
            $this->load->view('template/header');
            $get_emp = $this->Employee_Model->edit_emps($key);
            $data['employee'] = $get_emp;
            $where = "agencies_act = '1'";
            $data['agency'] = $this->db->select('agencies_id,agencies_name')->from('tbl_agencies')->where($where)->get()->result();
            $this->load->view('employee/employee_edit',$data);
            $this->load->view('template/footer');
	}
		public function edit_group($gid)
	{
        $this->load->view('template/header');
 $date=date("Y-m-d");
          if(isset($_POST['from'])){
            $from=$_POST['from'];
            $date=date("Y-m-d",strtotime($from));
        }
        $data['gid'] = $gid; 
        $roles = $this->Employee_Model->get_employees();

        $data['employeem'] = $roles;
               
        $this->load->view('employee/edit_group',$data);
		$this->load->view('template/footer');
	}
	public function adddetails()
	{
		 $imagePrefix = date('Y_m_d_H_i_s');
		 //$imagename = $imagePrefix.$value['userfile'];
		 $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'jpeg|jpg|png';
         $config['max_size']      = 100;
         $config['max_width']     = 1024;
         $config['max_height']    = 768;
         $config['file_name'] = $imagePrefix;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);
         $this->upload->do_upload('userfile');
         $upload_data = $this->upload->data();
         $pic=$upload_data['file_name'];
    	//print_r($pic);exit();
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand.= $characters[mt_rand(0, $max)];
        }
        $pass=$_POST['emp_pass'];
        $date = date('Y-m-d H:i:s');
        if(!empty($_POST['created_by'])){
            $stringId = implode(', ',$_POST['created_by']);
        }else{
            $stringId = '';
        }
        
        $data = array(
            'employee_rand' => $rand,
            'employee_name' => $_POST['emp_name'],
            'employee_phone' => $_POST['emp_number'],
            'employee_email' => $_POST['emp_email'],
            'employee_address_line1' => $_POST['emp_addr1'],
            'employee_address_line2' => $_POST['emp_addr2'],
            'employee_address_line3' => $_POST['emp_addr3'],
            'employee_address_line4' => $_POST['emp_addr4'],
            'employee_usertype'=> $_POST['employee_usertype'],
            'employee_pincode' => $_POST['emp_pin'],
            'employee_profile' => $pic,
            'employee_agencyId' => $stringId,
            'employee_created_on' => date('Y-m-d H:i:s'),
            'employee_createduserid' => $_SESSION['userdata']['user_id'],
            'employee_createdbyrole' => $_SESSION['userdata']['role'],
            'employee_updated_on' => date('Y-m-d H:i:s'),
            'employee_updated_role' => $_SESSION['userdata']['role'],
            'employee_updated_userid' => $_SESSION['userdata']['user_id'],
            'employee_act' => 1
            
        );
        $result = $this->Employee_Model->add($data,$pass);
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
    redirect("Employee");
	}
        public function update_user(){
            
		$imagePrefix = date('Y_m_d_H_i_s');
		//$imagename = $imagePrefix.$value['userfile'];
		$config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = 100;
                $config['max_width']     = 1024;
                $config['max_height']    = 768;
                $config['file_name'] = $imagePrefix;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('userfile');
                $upload_data = $this->upload->data();
                $pic=$upload_data['file_name'];
                $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $rand = '';
                $random_string_length = 6;
                $max = strlen($characters) - 1;
                for ($i = 0; $i < $random_string_length; $i++) {
                    $rand.= $characters[mt_rand(0, $max)];
                }
                $pass=$_POST['emp_pass'];
                $date = date('Y-m-d H:i:s');
                $stringId = implode(', ',$_POST['created_by']);
                $data = array(
                    'employee_id' => $_POST['employee_id'],
                    'employee_name' => $_POST['emp_name'],
                    'employee_phone' => $_POST['emp_number'],
                    'employee_email' => $_POST['emp_email'],
                    'employee_address_line1' => $_POST['emp_addr1'],
                    'employee_address_line2' => $_POST['emp_addr2'],
                    'employee_address_line3' => $_POST['emp_addr3'],
                    'employee_address_line4' => $_POST['emp_addr4'],
                    'employee_usertype'=> $_POST['employee_usertype'],
                    'employee_pincode' => $_POST['emp_pin'],
                    'employee_profile' => $pic,
                    'employee_agencyId' => $stringId,
                    'employee_updated_on' => date('Y-m-d H:i:s'),
                    'employee_updated_role' => $_SESSION['userdata']['role'],
                    'employee_updated_userid' => $_SESSION['userdata']['user_id'],
                    'employee_act' => 1

                );
                 $result = $this->Employee_Model->update_user($data,$pass);
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
                );}
                $this->input->set_cookie($cookie);
                redirect("Employee");
        }
	public function updategroupdetails()
  {
      $emp=$_POST['created_by'];
       $gname=$_POST['emp_name'];
             $insert_id=$_POST['id'];
       $ems=implode(",",$emp);
       
   $q=$this->db->query("update tbl_employee_group set 	employee_group_name='$gname',employee_id='$ems' where 	employee_group_id=$insert_id");
   if ($q) {
            $cookie= array(
           'name'   => 'update',
           'value'  => '1',
           'expire' => '3',
       );
        }
       else{
             $cookie= array(
           'name'   => 'update',
           'value'  => '3',
           'expire' => '3',
       );

    }
    $this->input->set_cookie($cookie);
    redirect("Employee/group");
  }
  
public function delete_employee(){
    $rand=$_POST['id'];
    $value=$_POST['value'];
    $data = array(
    'employee_act' =>$value,);
    $data1 = array(
    	'admin_act' => $value);
    $result = $this->Employee_Model->update_data($data,$rand,$data1);
    echo $result;
    }
    public function update()
	{
        //print_r($_POST);exit();
     	$rand=$_POST['key'];
        $date = date('Y-m-d H:i:s');
        $data = array(
            'employee_name' => $_POST['emp_name'],
            'employee_updated_on' => $date,
            'employee_act' => 1
        );
        $result = $this->Employee_Model->update_emp($data,$rand);
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
    redirect("Employee");
	}			public function export(){			        $get_employee= $this->Employee_Model->get_export_companies();        $data['employee'] = $get_employee;        $this->load->view('employee/export_employee',$data);	}
 /*Check the Customer Mobile No*/
    public function getcustomerMob(){
        $mobileno = $_POST['mobile'];
        $data = $this->Employee_Model->getcustomerMob($mobileno);
        echo $data;
    }
    /* Check the Customer Email ID */
    public function getcustomerEmail(){
        $email = $_POST['email'];
        $data = $this->Employee_Model->getcustomerEmail($email);
        echo $data;
    }        
}