<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Products_Model');
        $this->load->helper('cookie');
        if (is_logged_in() == true) {
            redirect("Welcome");
        }
    }
   //product master	
	public function index()
	{
        $this->load->view('template/header');
        $roles = $this->Products_Model->get_product();
        $data['product'] = $roles;
        $this->load->view('product/list_product',$data);
		$this->load->view('template/footer');
	}
      
      public function addproduct()
    {
        $this->load->view('template/header');
        $this->load->view('product/add_product');
        $this->load->view('template/footer');
    }
      public function addproductdets()
	{
        //print_r($_POST);exit();
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_product = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_product; $i++) {
            $rand.= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');
        $data = array(
            'product_rand' => $rand,
            'product_size' => $_POST['product_size'],
            'product_createdon' => $date,
            'product_act' => 1
        );
        $result = $this->Products_Model->addproduct($data);
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
    redirect("product");
	}
    public function delete_product(){
		$rand=$_POST['id'];
		$data = array(
		'product_act' =>0,);
		$result = $this->Products_Model->update_product_data($data,$rand);
		echo $result;
    }
     public function edit_product($key)
	{
        $this->load->view('template/header');
        $get_emp = $this->Products_Model->edit_product($key);
        $data['product'] = $get_emp;
        $this->load->view('product/edit_product',$data);
		$this->load->view('template/footer');
	}
         public function updateproductdets()
	{
     	$rand=$_POST['key'];
        $date = date('Y-m-d H:i:s');
        $data = array(
            'product_rand' => $rand,
            'product_size' => $_POST['product_size'],
            'product_createdon' => $date,
            'product_act' => 1
        );
        $result = $this->Products_Model->updateproduct_data($data,$rand);
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
    redirect("product");
	}
	
}

