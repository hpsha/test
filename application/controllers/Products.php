<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Product_Model');
        if (is_logged_in() == true) {
            redirect("Welcome");
        }
    }

    public function add_productgroup() {
        $this->load->view('template/header');
        $this->load->view('products/add_productgroup');
        $this->load->view('template/footer');
    }

    public function add_details() {
        $groupname = $_POST['group_name'];
        $result = $this->Product_Model->add_productgroup($groupname);
        if ($result == 1) {
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 2) {
            $cookie = array(
                'name' => 'success',
                'value' => '2',
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
        redirect("Products/list_productgroup");
    }

    public function list_productgroup() {
        $this->load->view('template/header');
        $data['list'] = $this->Product_Model->list_productgroup();
        $this->load->view('products/list_productgroup', $data);
        $this->load->view('template/footer');
    }

    public function edit_productgroup($id) {
        $this->load->view('template/header');
        $data['product_group'] = $this->Product_Model->list_single_productgroup($id);
        $this->load->view('products/edit_productgroup', $data);
        $this->load->view('template/footer');
    }

    public function update_details() {
        $groupname = $_POST['group_name'];
        $id = $_POST['id'];
        $result = $this->Product_Model->update_productgroup($groupname, $id);
        if ($result == 1) {
            $cookie = array(
                'name' => 'update',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 2) {
            $cookie = array(
                'name' => 'update',
                'value' => '2',
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
        redirect("Products/list_productgroup");
    }

    public function delete_productgroup() {
        $id = $_POST['id'];
        $result = $this->Product_Model->delete_productgroup($id);
        echo $result;
    }

    public function add_product() {
        $this->load->view('template/header');
        $data['list'] = $this->Product_Model->list_productgroup();
        $this->load->view('products/add_product', $data);
        $this->load->view('template/footer');
    }

    public function add_productdetails() {
        $groupname = $_POST['group_name'];
        $productname = $_POST['product_name'];
        $branch_id = $_POST['branch_id'];
        $retail_price = $_POST['retail_price'];
        $distributor_price = $_POST['distributor_price'];
$date=date('Y-m-d');

      $w="product_name='$productname'";
        $q = $this->db->select('product_name')->from('tbl_product')->where($w)->get()->row();
        if ($q) {
            $result = 1;
        }
        $qu = $this->db->insert('tbl_product', array('productgroup_id' => $groupname, 'product_name' => $productname, 'product_createdon' => $date, 'product_act' => 1));
        $qq = $this->db->insert_id();
        $count = count($retail_price);
        for ($i = 0; $i < $count; $i++) {
            $bid= $branch_id[$i];
            $rp = $retail_price[$i];
            $dp= $distributor_price[$i];
if($rp!='' || $dp!=''||  $rp!='0' || $dp!='0')
            $result = $this->db->insert('tbl_price', array('product_id' => $qq, 'branch_id' => $bid, 'retail_price' => $rp, 'distributor_price' => $dp, 'act' => 1));
        }
        if ($result == 1) {
            $cookie = array(
                'name' => 'success',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 2) {
            $cookie = array(
                'name' => 'success',
                'value' => '2',
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
        redirect("Products/list_product");
    }

    public function list_product() {
        $this->load->view('template/header');
        $data['list'] = $this->Product_Model->list_product();
        $this->load->view('products/list_product', $data);
        $this->load->view('template/footer');
    }

    public function edit_product($id) {
        $this->load->view('template/header');
        $data['list'] = $this->Product_Model->list_productgroup();
        $data['product'] = $this->Product_Model->list_single_product($id);
       // echo "<pre>";print_r($data);exit();
        $this->load->view('products/edit_product', $data);
        $this->load->view('template/footer');
    }

    public function update_productdetails() {
        $groupname = $_POST['group_name'];
        $productname = $_POST['product_name'];
         $branch_id = $_POST['branch_id'];
        $retail_price = $_POST['retail_price'];
        $distributor_price = $_POST['distributor_price'];
        $id = $_POST['id'];
        $result = $this->Product_Model->update_product($groupname, $productname, $id);
                $count = count($retail_price);
        for ($i = 0; $i < $count; $i++) {
            $bid= $branch_id[$i];
            $rp = $retail_price[$i];
            $dp= $distributor_price[$i];
         $result=$this->db->query("update tbl_price set retail_price='$rp',distributor_price='$dp' where product_id=$id and branch_id=$bid");
        }
        if ($result == 1) {
            $cookie = array(
                'name' => 'update',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 2) {
            $cookie = array(
                'name' => 'update',
                'value' => '2',
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
        redirect("Products/list_product");
    }

    public function delete_product() {
        $id = $_POST['id'];
        $result = $this->Product_Model->delete_product($id);
        echo $result;
    }

}
