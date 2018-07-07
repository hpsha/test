<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

	function __construct() {
    parent::__construct();
	$this->load->helper('url');
	$this->load->library('session');
	$this->load->model('Attendance_Model');
        //$this->load->library('curl');
        if (is_logged_in() == true) {
            redirect("Welcome");
        }
    }
	public function index()
	{
           
        $this->load->view('template/header');
        if(isset($_POST['date'])){
                    $date=$_POST['date'];
                      $date=date("Y-m-d", strtotime($date));

        }
        else{
                  $date=date("Y-m-d");
  
        }
        $roles = $this->Attendance_Model->get_attendance($date);
        $data['attendance'] = $roles;
        $this->load->view('attendance/list_attendance',$data);
		$this->load->view('template/footer');
	}
}