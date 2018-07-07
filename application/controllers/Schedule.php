<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	function __construct() {
    parent::__construct();
	$this->load->helper('url');
	$this->load->library('session');
	$this->load->helper('cookie');
	$this->load->model('Schedule_Model');
        $this->load->model('Employee_Model');
    }
public function index()
{
  
    $this->load->view('template/header');
    $roles = $this->Schedule_Model->get_schedule();
    $data['schedule'] = $roles;
    $this->load->view('schedule/list_schedule',$data);
    $this->load->view('template/footer');
}
public function delete_schedule(){
    $id=$_POST['id'];
    $data = array(
    'task_status' =>0,);
    $result = $this->Schedule_Model->update_data($data,$id);
    echo $result;
    }
public function add()
{
/*
    $this->load->view('template/header');
    $customer = $this->Customergroup_Model->get_customer();
    $data['customer'] = $customer;
    $category = $this->Master_Model->get_category();
    $data['category'] = $category;
    $roles = $this->Customergroup_Model->get_itemgroup($company_id);
    $data['itemgroup'] = $roles;
    $this->load->view('customergroup/customergroup_add',$data);
    $this->load->view('template/footer');
     */    
}
public function edit_schedule($id)
	{
        $this->load->view('template/header');
        $get_shedule = $this->Schedule_Model->fetch_schedule($id);
        
        $roles = $this->Employee_Model->get_employees();
        $data['employee'] = $roles;
        
        $data['fecth_schedule'] = $get_shedule;
        $this->load->view('schedule/schedule_edit',$data);
        $this->load->view('template/footer');
	}
        

public function updatedetails()
	{
		

	   $id=$_POST['key'];

     $notes=$_POST['note'];
         //echo "UPDATE  tb_schedule SET schedule_title='$title',schedule_status='$status',schedule_description='$description',schedule_note='$notes' where schedule_id='$id'"   ;
     $q=$this->db->query("UPDATE  tb_task SET task_note='$notes' where task_id='$id'");
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
           'value'  => '2',
           'expire' => '3',
       );
    }
    $this->input->set_cookie($cookie);
    redirect("Schedule");
	}
/*
public function adddetails()
	{
    	//print_r($_POST);exit();
    	$company_id=$_COOKIE['company_id'];
    	$count=count($_POST['customer']);
    	$cus=$_POST['customer'];
    	$customer="";
    	for($i=0;$i<$count;$i++)
    	{
    		$customer.=$cus[$i];
    		$customer.=",";
    	}
    	$customer=rtrim($customer,',');
    	//print_r($customer);exit();
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand.= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');
        if($company_id==1){
        $data = array(
        	'company_id' => $company_id,
            'customergroup_rand' => $rand,
            'customergroup_name' => $_POST['name'],
            'customergroup_category ' => $_POST['category1'],
            'customergroup_discount' => $_POST['discount'],
            'customergroup_customer' => $customer,
            'customergroup_createdon' => $date,
            'customergroup_act' => 1
        );
        $result = $this->Customergroup_Model->add($data);
    	}
    	else{
    		$data = array(
    		'company_id' => $company_id,
            'customergroup_rand' => $rand,
            'customergroup_name' => $_POST['name'],
            'customergroup_itemgroup ' => $_POST['itemgroup'],
            'customergroup_discount' => $_POST['discount'],
            'customergroup_customer' => $customer,
            'customergroup_createdon' => $date,
            'customergroup_act' => 1
        );
        $result = $this->Customergroup_Model->add($data);
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
    redirect("Customergroup");
	}

*/
}
?>