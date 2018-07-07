<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->load->helper('url');   
        $this->load->helper('cookie');
		$this->load->library('session');
        $this->load->model('Roles_Model');
        
       
        }
	public function index()
	{
		$result = $this->Roles_Model->list_role();
		$data['roles_val']=$result;
        $this->load->view('template/header');
        $this->load->view('Roles/list_roles', $data);
        $this->load->view('template/footer');
	}

	public function add()
	{
        $this->load->view('template/header');
        $this->load->view('Roles/role_add');
		$this->load->view('template/footer');
	}
	
	//ADD ROLES
	public function add_roles()
	{
		
		 $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $rand = '';
            $random_string_length = 6;
            $max = strlen($characters) - 1;
            for ($i = 0; $i < $random_string_length; $i++) {
                $rand.= $characters[mt_rand(0, $max)];
            }
			$dates = date("Y-m-d H:i:s");
			$service_name = implode(',',$_POST['roles_cat']);

		$data = array(
			'admin_role_rand' =>$rand,
            'admin_role_name' => $_POST['role_name'],
            'admin_role_permission' =>$service_name,
            'admin_role_created_on' => $dates,
            'admin_role_act' => 1,
                    );
        $result = $this->Roles_Model->add_role_model($data);
		if ($result == 1) {
            $cookie = array(
                'name' => 'role_success',
                'value' => '1',
                'expire' => '3'
            );
        }
        else if ($result == 3) {
            $cookie = array(
                'name' => 'role_success',
                'value' => '3',
                'expire' => '3'
            );
        } else {
            $cookie = array(
                'name' => 'role_success',
                'value' => '2',
                'expire' => '3'
            );
        }
		$this->input->set_cookie($cookie);
        redirect("Roles");
			
	}
	public function edit_role($key)
	{
		$result = $this->Roles_Model->fetch_Roles_val($key);
		$data['roles_data']=$result;
        $this->load->view('template/header');
        $this->load->view('Roles/permission_edit', $data);
		$this->load->view('template/footer');
	}
	public function edit_roles()
	{
		$dates = date("Y-m-d H:i:s");
		$service_name = implode(',',$_POST['roles_cat']);
		
		$data = array(
			'admin_role_id' =>$_POST['role_id'],
            'admin_role_name' => $_POST['role_name'],
            'admin_role_permission' =>$service_name,
            'admin_role_update_on' => $dates,
        );
		$result = $this->Roles_Model->Roles_edit($data);
		if ($result == 1) {
            $cookie = array(
                'name' => 'role_update_success',
                'value' => '1',
                'expire' => '3'
            );
        }
        else if ($result == 3) {
            $cookie = array(
                'name' => 'role_update_success',
                'value' => '3',
                'expire' => '3'
            );
        } else {
            $cookie = array(
                'name' => 'role_update_success',
                'value' => '2',
                'expire' => '3'
            );
        }
		$this->input->set_cookie($cookie);
        redirect("Roles");
		
	}
	
	  public function delete_role()
    {
        $date = date('Y-m-d H:i:s');
        $rand = $_POST['id'];
         $data = array(
            'admin_role_act' => 0
        );
        $result = $this->Roles_Model->delete_data($data, $rand);
        echo $result; 
		
    }
	
	

}