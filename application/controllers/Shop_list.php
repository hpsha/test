<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_list extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (is_logged_in() == true) {
            redirect("Welcome");
        }
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model('Terms_Model');
        $this->load->model('Shop_Model');
    }

    public function index() {
        $this->load->view('template/header');
        $get_companies = $this->Terms_Model->fetch_shop_list();
        $from = date("Y-m-d");
        $to = date("Y-m-d");
        $data['from'] = $from;
        $data['to'] = $to;
        $data['shop'] = $get_companies;
        //print_r($get_companies);
        //exit();
        $this->load->view('shop/list_shop', $data);

        $this->load->view('template/footer');
    }

    public function distributor() {
        $this->load->view('template/header');
        $get_companies = $this->Terms_Model->fetch_distributor_list();
        $from = "1970-01-01";
        $to = date("Y-m-d");
        $data['from'] = $from;
        $data['to'] = $to;
        $data['shop'] = $get_companies;
        //print_r($get_companies);
        //exit();
        $this->load->view('Terms/list_distributor', $data);

        $this->load->view('template/footer');
    }

    public function export($from, $to) {


        //print_r($get_companies);
        //exit();
      //  $get_companies = $this->Shop_Model->fetch_shop_lists($from, $to);
          
       // $data['shop'] = $get_companies;
        $data['from'] = $from;
        $data['to'] = $to;
        $this->load->view('Terms/list_excel');
    }

    public function Search() {
        $this->load->view('template/header');
        if (isset($_POST['from'])) {
            $froms = $_POST['from'];

            $from = date("Y-m-d", strtotime($froms));
        } else {
            $from = "1970-01-01";
        }
        if (isset($_POST['to'])) {
            $tos = $_POST['to'];
            $to = date("Y-m-d", strtotime($tos));
        } else {
            $to = date("Y-m-d");
        }

        $get_companies = $this->Terms_Model->fetch_shop_lists($from, $to);
        $data['shop'] = $get_companies;
        $data['from'] = $from;
        $data['to'] = $to;
        //print_r($get_companies);
        //exit();
        $this->load->view('Terms/list_terms', $data);

        $this->load->view('template/footer');
    }

    public function Searches() {
        $this->load->view('template/header');
        if (isset($_POST['from'])) {
            $froms = $_POST['from'];

            $from = date("Y-m-d", strtotime($froms));
        } else {
            $from = "1970-01-01";
        }
        if (isset($_POST['to'])) {
            $tos = $_POST['to'];
            $to = date("Y-m-d", strtotime($tos));
        } else {
            $to = date("Y-m-d");
        }

        $get_companies = $this->Terms_Model->fetch_shop_lists($from, $to);
        $data['shop'] = $get_companies;
        $data['from'] = $from;
        $data['to'] = $to;
        //print_r($get_companies);
        //exit();
        $this->load->view('Terms/list_sterms', $data);

        $this->load->view('template/footer');
    }

    public function posts() {

        $columns = array(
             0 => 'sno',
        1=> 'agent',
         2 => 'shop',
          3 => 'owner',
           4 => 'contact',
            5 => 'location',
            6 => 'remarks',
            7 => 'ordervalue',
            8=>'orderdate',
            9 => 'employee',
            10 => 'action',
        );
         $froms = $_POST['from'];
         //froms="2018-04-01";
            $from = date("Y-m-d", strtotime($froms));
//$tos="2018-04-20";

           $tos = $_POST['to'];
            $to = date("Y-m-d", strtotime($tos));
       

//               
//        $limit = 5;
//      $start = 0;
//      $dir="";
//        $order ='shop_id';
        //$dir = $this->input->post('order')[0]['dir'];
         $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order ='shop_id';
        $dir = $this->input->post('order')[0]['dir'];
        $totalData = $this->Shop_Model->allposts_count($from, $to);
        $totalFiltered = $totalData;
        if (empty($this->input->post('search')['value'])) {
            $posts = $this->Shop_Model->allposts($limit, $start, $order, $dir, $from, $to);
        } else {
            $search = $this->input->post('search')['value'];

            $posts = $this->Shop_Model->posts_search($limit, $start, $search, $order, $dir, $from, $to);

            $totalFiltered = $this->Shop_Model->posts_search_count($search, $from, $to);
        }

        $data = array();
        if (!empty($posts)) {$sno=1;
        
            foreach ($posts as $post) {
              
                $sid = $post->agency_id;
                if ($post->remarks != '') {
                    $remarks = "Yes";
                } else {
                    $remarks = "No";
                }
                $aa = $this->db->query("select agencies_name from tbl_agencies where agencies_id=$sid")->row();


                $mmm = $post->shop_id;
                $mss = $this->db->query("select sum(price) as t,created_on from tbl_order where shop_id=$mmm  and tbl_order.created_on between '$from' and '$to'")->row();
                $msss = $this->db->query("select sum(price) as t from tbl_order where shop_id=$mmm  and tbl_order.created_on between '$from' and '$to'")->num_rows();

                if ($msss > 0) {
                    $amt = round($mss->t, 2);
                } else {
                    $amt = "0";
                }
                if($mss->created_on!=''){
             $cc= date("d-m-Y", strtotime($mss->created_on));
                }else{
                    $cc= date("d-m-Y", strtotime($post->shop_created_on));
                }
                $iss = $post->emp_id;
                
                $mm= $this->db->query("select employee_email from tbl_employee where employee_id='$iss' ")->row();
                                $mmc= $this->db->query("select employee_email from tbl_employee where employee_id='$iss' ")->num_rows();
                                
if($mmc>0){
    $mails = $mm->employee_email;
            
}else{  
        $mails='';

}
                 $nestedData['sno'] =$sno++;
                $nestedData['agent'] = $aa->agencies_name;
                $nestedData['shop'] = $post->shop_name;
                $nestedData['owner'] = $post->shop_owner_name;
                $nestedData['contact'] = $post->shop_contact;
                $nestedData['location'] = $post->shop_landline;
                $nestedData['remarks'] = $remarks;
                $nestedData['ordervalue'] = $amt;
                 $nestedData['orderdate'] = $cc;
                $nestedData['employee'] = $mails;

                $delete = "delete_shop('$mmm')";
                $edits = "window.location.href='";
                $edits .= base_url() . "Shop_list/shop_view/$post->shop_id'";

                $pdfs = "window.location.href='";
                $pdfs .= base_url() . "Shop_list/shop_view_pdf/$post->shop_id'";


                $datas = '<button onclick="' . $edits . '" class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-eye"></i> </button>
                                                        <button onclick="' . $delete . '" class="btn btn-danger btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </button>
                                                        <button  onclick="' . $pdfs . '" class="btn btn-primary btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Download"> <i class="fa fa-download"></i> </button>';
                $nestedData['action'] = $datas;
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function Searchs() {
        $this->load->view('template/header');
        if (isset($_POST['from'])) {
            $froms = $_POST['from'];

            $from = date("Y-m-d", strtotime($froms));
        } else {
            $from = "1970-01-01";
        }
        if (isset($_POST['to'])) {
            $tos = $_POST['to'];
            $to = date("Y-m-d", strtotime($tos));
        } else {
            $to = date("Y-m-d");
        }

        $get_companies = $this->Terms_Model->fetch_distributor_lists($from, $to);
        $data['shop'] = $get_companies;
        $data['from'] = $from;
        $data['to'] = $to;
        //print_r($get_companies);
        //exit();
        $this->load->view('Terms/list_terms', $data);

        $this->load->view('template/footer');
    }

    public function shop_view($shop_id) {
        $this->load->view('template/header');

        $get_companies = $this->Terms_Model->fetch_shop_view($shop_id);
        $data['shop_view'] = $get_companies;
        $get_img = $this->Terms_Model->fetch_shop_view_img($shop_id);
        $data['shop_view_img'] = $get_img;
        $data['shop_id'] = $shop_id;


        $this->load->view('Terms/shop_view', $data);
        $this->load->view('template/footer');
    }

    public function shop_views($shop_id) {
        $this->load->view('template/header');

        $get_companies = $this->Terms_Model->fetch_shop_views($shop_id);
        $data['shop_view'] = $get_companies;
        $get_img = $this->Terms_Model->fetch_shop_view_img($shop_id);
        $data['shop_view_img'] = $get_img;


        $this->load->view('Terms/shop_views', $data);
        $this->load->view('template/footer');
    }

    public function shop_view_pdf($shop_id) {
        //print_r($shop_id);exit();

        $get_companies = $this->Terms_Model->fetch_shop_view($shop_id);
        $shop_view1 = $get_companies;
        $shop_view = $shop_view1[0];
               
          if($shop_view->shop_type==1){ $d="Retailer";} 
                                                                else if($shop_view->shop_type==2){ $d= "Wholesale";}
                                                                  else if($shop_view->shop_type==3){ $d="Distributor";}
                                                                  else{
                                                                     $d="Retailer";
                                                                  }
        //print_r($shop_view);exit();
        $this->load->library('Pdf');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('Order Invoice');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setFooterFont(Array(
            PDF_FONT_NAME_DATA,
            '',
            PDF_FONT_SIZE_DATA
        ));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        $pdf->SetFont('times', '', 12);
        $pdf->AddPage();
        $where = "tbl_shop.shop_id=$shop_id";
        $count = $this->db->select('tbl_shop.shop_name,tbl_product.product_name,tbl_productgroup.productgroup_name,qty,price')
                        ->join('tbl_product', 'tbl_product.product_id=tbl_order.product_id')
                        ->join('tbl_productgroup', 'tbl_productgroup.productgroup_id=tbl_order.product_group_id')
                        ->join('tbl_shop', 'tbl_shop.shop_id=tbl_order.shop_id')->from('tbl_order')->where($where)->get()->num_rows();

        $q = $this->db->select('tbl_shop.shop_name,tbl_product.product_name,tbl_productgroup.productgroup_name,qty,price')
                        ->join('tbl_product', 'tbl_product.product_id=tbl_order.product_id')
                        ->join('tbl_productgroup', 'tbl_productgroup.productgroup_id=tbl_order.product_group_id')
                        ->join('tbl_shop', 'tbl_shop.shop_id=tbl_order.shop_id')->from('tbl_order')->where($where)->get()->result();
        $price = 0;
        $qqs = '';
        if ($count > 0) {
            foreach ($q as $data) {
                $prices = $data->price;
                $price = $prices + $price;
                $qqs .= "<tr><td>$data->product_name</td><td>$data->productgroup_name</td><td>$data->qty</td><td>$data->price</td></tr>";
            }
        } else {
            $qqs .= "";
            $price = 0;
        }

        $txt = <<<EOD
<style>
body{
                font-size:14px;
                font-familly:Times New Roman;
            }
 table,td{
                //border: 1px solid black;
                border-collapse: collapse;
            }
 .right{
    text-align:right;
 }
</style>
<body>
<table>
<tr>
<td rowspan="2"><img src="http://anilfoods.in/uploads/2018-02-07_10_19_22.png" width="75px" height="75px"></td>
<td></td>
</tr>
<tr>
<td style="font-size:18px"><b>Order Form</b></td>
</tr>
</table>
<hr>
<p></p>
<center><b>$shop_view->shop_name</b><p>$shop_view->shop_owner_name</p></center>
<hr>
<p></p>
<center><p>Agencies : $shop_view->agencies_name</p><p>Location : $shop_view->location_name</p></center>
<table>
    <tr>
    <td>Shop Contact</td>
    <td>$shop_view->shop_contact</td>
    </tr>
    <tr>
    <td>Shop Landmark</td>
    <td>$shop_view->shop_landline</td>
    </tr>
    <tr>

    <td>Shop Order value</td>
    <td>Rs $shop_view->shop_location</td>
    </tr>
    <tr>
    <td>Shop Location</td>
    <td>$shop_view->address</td>
    </tr>
    <tr>
    <td>Previous Supplier</td>
    <td>$shop_view->shop_previous</td>
    </tr>
    <tr>
    <td>Shop Type</td>
    <td>$d</td>
    </tr>
    <tr>
    <td>Remarks</td>
    <td>$shop_view->remarks</td>
    </tr>
</table>
</body>
EOD;
        $pdf->writeHTML($txt, true, false, true, false, '');

        $txts = <<<EOD
<style>
body{
                font-size:14px;
                font-familly:Times New Roman;
            }
 table,td{

                border-collapse: collapse;
                padding:5px
            }
 .right{
    text-align:right;
 }
 .tables td{
      border: 1px solid black;
 }
</style>
<body>
<table>

<tr>
<td style="font-size:18px"><b>Order Details</b></td>
</tr>
</table>
<hr>
<hr>
<table class="tables">
  <thead>
                                            <tr>
                                                <td><b>Name</b></td>
                                                <td><b>Group</b></td>
                                                 <td><b>Qty</b></td>
                                                  <td><b>Price</b></td>
                                            </tr>
                                        </thead>
                                         <tbody>
                                         $qqs
                                         </tbody>
                                         <tfoot>
                                        <tr>
                                                <td style="text-align:right" colspan="4">GrandTotal:<strong>Rs.$price</strong></td>
                                            </tr>
                                         </tfoot>
</table>
</body>
EOD;
        $pdf->writeHTML($txts, true, false, true, false, '');

        $pdf->Output('orderform.pdf', 'D');
    }

    public function delete_shops() {
        $date = date('Y-m-d H:i:s');
        $id = $_POST['id'];
        $data = array(
            'shop_act' => 0
        );
        $result = $this->Terms_Model->update_data($data, $id);
        echo $result;
    }

    /* public function inactive()
      {
      $this->load->view('template/header');
      $get_companies = $this->Terms_Model->get_inactiveterms();
      $data['companies'] = $get_companies;
      $this->load->view('Terms/list_inactive_terms', $data);
      $this->load->view('template/footer');
      }
      public function add()
      {
      $get_companies = $this->Company_Model->get_companies_name();
      $data['companies'] = $get_companies;
      $this->load->view('template/header');
      $this->load->view('Terms/add_terms',$data);
      $this->load->view('template/footer');
      }
      public function editterms($key)
      {
      $this->load->view('template/header');
      $get_companies = $this->Company_Model->get_companies_name();
      $data['companies'] = $get_companies;
      $get_terms = $this->Terms_Model->get_singleterms($key);
      $data['get_terms'] = $get_terms;
      $this->load->view('Terms/edit_terms', $data);
      $this->load->view('template/footer');
      }
      public function adddetails()
      {
      $terms= $_POST['repeater-list'];
      $company= $_POST['company'];
      $dups = array();
      $input = array_map("unserialize", array_unique(array_map("serialize", $terms)));
      $repeater_count = count($terms);
      $duplicate_count = count($input);
      if ($duplicate_count != $repeater_count) {
      $cookie= array(
      'name'   => 'success',
      'value'  => '2',
      'expire' => '3',
      );
      $this->input->set_cookie($cookie);
      redirect("Terms");
      }
      foreach($terms as $t){
      $characters           = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      $rand                 = '';
      $random_string_length = 6;
      $max                  = strlen($characters) - 1;
      for ($i = 0; $i < $random_string_length; $i++) {
      $rand .= $characters[mt_rand(0, $max)];
      }
      $date = date('Y-m-d H:i:s');
      $data  = array(
      'term_condition_rand' => $rand,
      'term_condition_data' =>  $t['document_name'],
      'company_id' => $company,
      'term_condition_act' => 1,
      'term_condition_created_on' => $date
      );
      $result = $this->Terms_Model->add_data($data);
      }
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
      redirect("Terms");
      }
      public function updateterms()
      {

      $date = date('Y-m-d H:i:s');
      $rand = $_POST['terms_rand'];
      $data = array(
      'term_condition_data' => $_POST['document_name'],
      'company_id' => $_POST['company'],

      );
      $result = $this->Terms_Model->update_data($data, $rand);
      if ($result == 1) {
      $cookie = array(
      'name' => 'update',
      'value' => '1',
      'expire' => '3'
      );
      }
      else if ($result == 3) {
      $cookie = array(
      'name' => 'update',
      'value' => '3',
      'expire' => '3'
      );
      } else {
      $cookie = array(
      'name' => 'update',
      'value' => '2',
      'expire' => '3'
      );
      }
      $this->input->set_cookie($cookie);
      redirect("Terms");
      }

      public function activate_terms()
      {
      $date = date('Y-m-d H:i:s');
      $rand = $_POST['id'];
      $data = array(
      'term_condition_act' => 1
      );
      $result = $this->Terms_Model->update_data($data, $rand);
      echo $result;
      } */

//    public function posts() {
//
//        $columns = array(
//            0 => 'agent',
//            1 => 'name',
//            2 => 'owner',
//            3 => 'contact',
//            4 => 'Location',
//            5 => 'Remarks',
//            6 => 'order',
//            7 => 'employee',
//            8 => 'action',
//        );
//
//        $limit = $this->input->post('length');
//        $start = $this->input->post('start');
//        $order = $columns[$this->input->post('order')[0]['column']];
//        $dir = $this->input->post('order')[0]['dir'];
//        $totalData = $this->Terms_Model->fetch_shop_list_count();
//        $totalFiltered = $totalData;
//        if (empty($this->input->post('search')['value'])) {
//            $posts = $this->Terms_Model->fetch_shop_list($limit, $start, $order, $dir);
//        } else {
//            $search = $this->input->post('search')['value'];
//
//            $posts = $this->Customer_Model->posts_search($limit, $start, $search, $order, $dir);
//
//            $totalFiltered = $this->Customer_Model->posts_search_count($search);
//        }
//
//        $data = array();
//        if (!empty($posts)) {
//            foreach ($posts as $post) {
//                $nestedData['customer_id'] = $post->customer_id;
//                $nestedData['customer_name'] = $post->customer_name;
//                $nestedData['customer_phone'] = $post->customer_phone;
//                $nestedData['customer_mail'] = $post->customer_mail;
//                $nestedData['customer_gst_no'] = $post->customer_gst_no;
//                $nestedData['customer_spindles'] = $post->customer_spindles;
//                $rand = $post->customer_rand;
//                $delete = "deletecustomer('$rand')";
//                $edit = "window.location.href='";
//                $edits = base_url() . "Customer/edit_customer/$rand'";
//                $datas = "<span onclick=" . $edit . "$edits class='btn btn-primary btn-outline pad_bt'>Edit</span>
//                        <span onclick=$delete class='btn btn-danger btn-outline btn-sm pad_bt'>Delete</span>";
//                $nestedData['customer_rand'] = $datas;
//
//                $data[] = $nestedData;
//            }
//        }
//
//        $json_data = array(
//            "draw" => intval($this->input->post('draw')),
//            "recordsTotal" => intval($totalData),
//            "recordsFiltered" => intval($totalFiltered),
//            "data" => $data
//        );
//
//        echo json_encode($json_data);
//    }
}
