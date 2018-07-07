<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->library('session');
        $this->load->model('Dashboard_Model');
        $this->load->model('Agent_Model');
        $this->load->model('Login_Model');

        if (is_logged_in() == true) {
            redirect("Welcome");
        }

    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('dashboard/index');
        $this->load->view('template/footer');
    }

    public function Company($id) {

        if ($id == 1) {
            $cookie = array(
                'name' => 'company_id',
                'value' => $id,
                'expire' => '86400'
            );

        }
        elseif ($id == 2) {
            $cookie = array(
                'name' => 'company_id',
                'value' => $id,
                'expire' => '86400'
            );

        }
        elseif ($id == 3) {
            $cookie = array(
                'name' => 'company_id',
                'value' => $id,
                'expire' => '86400'
            );

        } elseif ($id == 4) {
            $cookie = array(
                'name' => 'company_id',
                'value' => $id,
                'expire' => '86400'
            );

        }
           $this->input->set_cookie($cookie);
           redirect('Dashboard/companies');

    }
public function companies(){
     $this->load->view('template/header');

        //print_r($data);exit();

        $this->load->view('dashboard/Enquiry');
        $this->load->view('template/footer');
}
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function changepassword() {
        $this->load->view('template/header');
        $this->load->view('changepassword');
        $this->load->view('template/footer');
    }
    public function changeusername() {
        $this->load->view('template/header');
        $this->load->view('changeusername');
        $this->load->view('template/footer');
    }

    public function change_pass() {
        $userdata = $_SESSION['userdata'];
        $uid = $userdata['user_id'];
        $old_pass = $_POST['cur_pass'];
        $new_pass = $_POST['new_pass'];
        $result = $this->Login_Model->change_pass($uid, $old_pass, $new_pass);
        if ($result == true) {
            echo "1";
        } else {
            echo "2";
        }
    }
    public function change_username() {
        $userdata = $_SESSION['userdata'];
        $uid = $userdata['user_id'];
        $old_pass = $_POST['cur_pass'];
        $new_username = $_POST['new_username'];
        $result = $this->Login_Model->change_username($uid, $old_pass, $new_username);
        if ($result == true) {
            echo "1";
        } else {
            echo "2";
        }
    }

}
