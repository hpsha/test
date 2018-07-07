<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target extends CI_Controller {
	function __construct() {
            parent::__construct();
            if (is_logged_in() == true) {
                redirect("Welcome");
            }
            $this->load->helper('url');
            $this->load->helper('cookie');
            $this->load->model('Target_Model');
            $this->load->model('Employee_Model');
            $this->load->model('Settings_Model');
        }
        public function index($page = 1)
	{
            $data = array();
            $data['title'] = "Manage Target";
            $select=array();
            $where=array();
            $orderby = array();
            $join = array();
            $groupby =array();
            $like = array();
            $or_like = array();
            $or_where = array();
            $where_in = array();
            $where_not = array();
            $usertype = $_SESSION['userdata']['type'];
            /**Pagination **/
            $where = array('target_status'=>1);
            $select1 = ('count(distinct ta.target_id) as count');
            $all = $this->Target_Model->gettargetdetail($where,$orderby,$select1,$join,"","","","",$like,$or_like,$or_where, $where_in, $where_not);
            if(!empty($all)){ 
                $config['total_rows'] = count($all);
            } else {
                $config['total_rows'] = 0;
            }
            $config["uri_segment"] = "3";
            $limit =1000 ;
            $choice = $config["total_rows"] / $limit;
            $config["num_links"] = floor($choice);
            $config['base_url'] = base_url().'enquiry';
            $config["cur_page"] = $page;
            if(isset($get['sel']) && !empty($get['sel'])){
                  $config["per_page"] = $get['sel'];
            } else{
                    $config["per_page"] = $this->config->item('per_page');
            }
            $this->pagination->initialize($config);
            $offset = $limit * ($page - 1);
            $data["target"] = $this->Target_Model->gettargetdetail($where,$orderby,$select1,$join,$groupby,$limit,$offset,"",$like,$or_like,$or_where, $where_in, $where_not);
            $this->load->view('template/header');
            $this->load->view('Target/view',$data);
            $this->load->view('template/footer');
	}
        /*Add New Taget*/
	public function addnew(){
            $this->load->view('template/header');
            $roles = $this->Employee_Model->get_employees();
            $data['employee'] = $roles;
            $data['title'] = 'Sales Person Target';
            $this->load->view('Target/addnew', $data);
            $this->load->view('template/footer');
        }
        /* Save & Update Task */
        public function save(){
            $post = $this->input->post();
            if(isset($post) && !empty($post)){
            $result = $this->Target_Model->save_update_task($post);
            if($result == ""){redirect("/enquiry");} 
            else if($result){
                if(!empty($post['tbl_target']['Id'])){
                        $this->session->set_flashdata('message', '<div class="success_msg">Target has been updated successfully.</div>');
                        redirect("/target");
                } else {
                        $this->session->set_flashdata('message', '<div class="success_msg">Target has been added successfully.</div>');
                        redirect("/target");
            }
            }else{
                    redirect("/target");
            }
            }
        }
        
        public function delete(){
            $id = $_POST['id'];
            echo $result = $this->Target_Model->delete($id);
        }
        
}
