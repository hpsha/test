<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_type extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model('Product_Type_Model');
    }
	
//PRODUCT TYPE MASTER LIST
    public function index()
	{
        $this->load->view('template/header');
        $roles = $this->Product_Type_Model->get_product_type();
        $data['product_type'] = $roles;
        $this->load->view('product_type/list_product_type',$data);
		$this->load->view('template/footer');
	}
	
//PRODUCT TYPE MASTER ADD	
    public function add()
    {
        $this->load->view('template/header');
        $this->load->view('product_type/add_product_type');
        $this->load->view('template/footer');
    }
		
	//PRODUCT TYPE MASTER ADD PROCESS
    public function adddetails()
	{
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand.= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');
        $data = array(
            'product_type_rand' => $rand,
            'product_type_name' => $_POST['prd_type_name'],
            'product_type_created_on' => $date,
            'product_type_act' => 1
        );
        $result = $this->Product_Type_Model->add($data);
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
    redirect("Product_type");
	}
  
	//PRODUCT TYPE MASTER DELETE 
  public function delete_prd_type(){
    $rand=$_POST['id'];
    $data = array(
    'product_type_act' =>0,);
    $result = $this->Product_Type_Model->delete_prdtype($data,$rand);
    echo $result;
    } 
	//PRODUCT TYPE MASTER EDIT DATA FETCH
    public function edit_prd_type($key)
	{
        $this->load->view('template/header');
        $get_prd_type = $this->Product_Type_Model->get_prd_type($key);
        $data['prd_type'] = $get_prd_type;
        $this->load->view('product_type/edit_prduct_type',$data);
		
		$this->load->view('template/footer');
	}
    //PRODUCT TYPE MASTER EDIT PROCESS
	public function update_prd_type()
	{
     	$rand=$_POST['key'];
        $date = date('Y-m-d H:i:s');
        $data = array(
           'product_type_rand' => $rand,
           'product_type_name' => $_POST['prd_type_name'],
           'product_type_updated_on' => $date,
           'product_type_act' => 1
            
        );
        $result = $this->Product_Type_Model->update_prdtype_data($data,$rand);
		
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
    redirect("Product_type");
	} 
    

//PRODUCT TYPE MASTER LIST
    public function uom_list()
	{
        $this->load->view('template/header');
        $roles = $this->Product_Type_Model->get_uom();
        $data['uom_list'] = $roles;
        $this->load->view('product_type/list_uom',$data);
		$this->load->view('template/footer');
	}
	
//PRODUCT TYPE MASTER ADD	
    public function add_uom()
    {
        $this->load->view('template/header');
        $this->load->view('product_type/uom_add');
        $this->load->view('template/footer');
    }
		
 	//PRODUCT TYPE MASTER ADD PROCESS
    public function uom_adddetails()
	{
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand.= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');
        $data = array(
            'uom_rand' => $rand,
            'uom_name' => $_POST['uom_name'],
            'uom_created_on' => $date,
            'uom_act' => 1
        );
        $result = $this->Product_Type_Model->uom_add($data);
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
    redirect("Product_type/uom_list");
	}
  
	//PRODUCT TYPE MASTER DELETE 
  public function delete_uom(){
    $rand=$_POST['id'];
    $data = array(
    'uom_act' =>0,);
    $result = $this->Product_Type_Model->delete_uom_detail($data,$rand);
    echo $result;
    }  
	//PRODUCT TYPE MASTER EDIT DATA FETCH
    public function edit_uom($key)
	{
        $this->load->view('template/header');
        $get_prd_type = $this->Product_Type_Model->get_uom_edit($key);
        $data['uom_edit'] = $get_prd_type;
        $this->load->view('product_type/uom_edit',$data);
		
		$this->load->view('template/footer');
	}
    //PRODUCT TYPE MASTER EDIT PROCESS
	public function update_uom()
	{
     	$rand=$_POST['key'];
        $date = date('Y-m-d H:i:s');
        $data = array(
           'uom_rand' => $rand,
           'uom_name' => $_POST['uom_name'],
           'uom_updated_on' => $date,
           'uom_act' => 1
            
        );
        $result = $this->Product_Type_Model->update_uom_data($data,$rand);
		
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
    redirect("Product_type/uom_list");
	} 
      	
   
}