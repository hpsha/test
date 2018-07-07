<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

    function __construct() {
    
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
               $this->load->helper('cookie');
        if (is_logged_in() == true) {
            redirect("Welcome");
        }
        $this->load->model('Branch_Model');
        //$this->load->library('curl');
    }

    public function listbranch() {

        $this->load->view('template/header');
        $roles = $this->Branch_Model->fetch_branch();

        $data['employee'] = $roles;
        $this->load->view('branch/list_branch', $data);
        $this->load->view('template/footer');
    }

    public function addbranch() {

        $this->load->view('template/header');
        
        $this->load->view('branch/addbranch');
        $this->load->view('template/footer');
    }
 public function addnewdetails() {
        $name = $_POST['name'];
        $list = $_POST['document_name'];
        $date = date("Y-m-d H:i:s");

        $data = array(
            'agencies_name' => $name,
            'agencies_act' => 1,
            '	agencies_created_on' => $date
        );
        $q = $this->db->insert('tbl_agencies', $data);
        $id = $this->db->insert_id();

        foreach ($list as $t) {
            $ids=$t;
            $datasy = array(
                'agency_id' => $id,
                'location_id' => $ids,
                'act' => 1
            );
            $this->db->insert('tbl_agencies_location', $datasy);
        }
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
    } public function adddetails() {
        $terms = $_POST['repeater-list'];
        $input = array_map("unserialize", array_unique(array_map("serialize", $terms)));
        $repeater_count = count($terms);
        $duplicate_count = count($input);
        $date = date("Y-m-d H:i:s");
        foreach ($terms as $t) {
            $namee = $t['location_name'];
            $s = "INSERT INTO `tbl_branch`(`branch_id`, `branch_name`, `branch_act`, `branch_created_on`) "
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
        redirect("Branch/listbranch");
    }
      public function edit_branch($id) {
        $this->load->view('template/header');


        $data['lid'] = $id;
        $this->load->view('branch/edit_branch', $data);
        $this->load->view('template/footer');
    }

   public function updatebranchdetails() {
        $gname = $_POST['l_name'];

        $insert_id = $_POST['id'];

        $q = $this->db->query("update tbl_branch set branch_name='$gname' where branch_id=$insert_id");
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
        redirect("Branch/listbranch");
    }


}
