<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Combo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model('Combo_Model');
    }
    public function index($page = 1){
        $data = array();
        $data['title'] = "Manages Combo Offers Details";
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
        $where = array('status'=>1);
        $select1 = ('count(distinct co.combo_id) as count');
        $all = $this->Combo_Model->getcombodetail($where,$orderby,$select1,$join,"","","","",$like,$or_like,$or_where, $where_in, $where_not);
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
        $data["combo"] = $this->Combo_Model->getcombodetail($where,$orderby,$select1,$join,$groupby,$limit,$offset,"",$like,$or_like,$or_where, $where_in, $where_not);
        $this->load->view('template/header');
        $this->load->view('Combo/view',$data);
        $this->load->view('template/footer');
    }
    public function addnew()
    {
        $product = $this->Combo_Model->get_product();
        $category = $this->Combo_Model->get_categorylist();
        $data['product'] = $product;
        $data['category'] = $category;
        $data['title'] = 'Add New Combo Offer';
        $this->load->view('template/header');
        $this->load->view('Combo/combo_add', $data);
        $this->load->view('template/footer');
    }
      /* Save & Update Task */
    public function save(){
        $post = $this->input->post();
        if(isset($post) && !empty($post)){
        $result = $this->Combo_Model->save($post);
        if($result == ""){redirect("/Combo");} 
        else if($result){
            if(!empty($post['tbl_combo_offer']['combo_id'])){
                    $this->session->set_flashdata('message', '<div class="success_msg">Combo has been updated successfully.</div>');
                    redirect("/Combo");
            } else {
                    $this->session->set_flashdata('message', '<div class="success_msg">Combo has been added successfully.</div>');
                    redirect("/Combo");
        }
        }else{
                redirect("/Combo");
        }
        }
    }
        
    public function delete(){
        $id = $_POST['id'];
        echo $result = $this->Combo_Model->delete($id);
    }
    public function changeStatus(){
        $id = $_POST['id'];
        $status = $_POST['statusval'];
        echo $result = $this->Combo_Model->statusVal($id, $status);
    }
    function get_products(){
        $cateId = $_POST['cateId'];
        $result = $this->Combo_Model->getProducts($cateId);
        echo $result;
    }
    
}

