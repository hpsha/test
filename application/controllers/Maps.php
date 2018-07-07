<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Maps extends CI_Controller
{
  function __construct() {
        parent::__construct();
        if (is_logged_in() == true) {
    redirect("welcome");
        }
        $this->load->model('Login_Model');
                        $this->load->library('session');

    }

    public function index($gid)
    {
        $this->load->view('template/header');
           $employee=$this->db->query("select * from tbl_employee_group where employee_group_id=$gid")->row();
                                    $eids=  $employee->employee_id;
                                    $data['eids']=$eids;
        $this->load->view('Terms/list_maps',$data);
        
        $this->load->view('template/footer');
    }
}