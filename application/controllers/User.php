<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    function __construct() {
        parent::__construct();
            if (is_logged_in() == false) {
                redirect("Dashboard");
            }
            $this->load->model('User_Model');
            $this->load->library('session');

    }
    public function index() {
        $this->load->view('user/login');
    }
    public function login() {
        
        $user_name = $_POST['email'];
        $password = $_POST['pass_wrd'];
        $data = array(
            'admin_username' => $user_name,
            'admin_password' => $password
        );

        $result = $this->User_Model->login($data);
        $result['userType'];
        
        if ($result['userType'] == 2) {

            $result = $this->User_Model->read_user_information($user_name);
            $session_data = array(
                'user_id' => $result[0]->admin_id,
                'username' => $result[0]->admin_username,
                'email' => $result[0]->admin_password,
                'role' => $result[0]->admin_role,
                'type' => $result[0]->admin_type,
                'emp_id' => $result[0]->employee_id,
                'photo'=>$result[0]->admin_profile_picture,
                
            );
            // Add user data in session
            $this->session->set_userdata('userdata', $session_data);
            echo "2";
            // update last login info
        } else if($result['userType'] == 3){
            $result = $this->User_Model->read_user_information($user_name);
            $session_data = array(
                'user_id' => $result[0]->admin_id,
                'username' => $result[0]->admin_username,
                'email' => $result[0]->admin_password,
                'role' => $result[0]->admin_role,
                'type' => $result[0]->admin_type,
                'emp_id' => $result[0]->employee_id,
                'photo'=>$result[0]->admin_profile_picture,
                
            );
            // Add user data in session
            $this->session->set_userdata('userdata', $session_data);
            echo "3";
        }else {
            echo "0";
        }
    }

}