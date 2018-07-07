<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (is_logged_in() == true) {
            redirect("Welcome");
        }
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->model('Terms_Model');
        $this->load->model('Shop_Model');
        $this->load->model('Product_Model');
    }

    public function add() {

        $this->load->view('template/header');
        $data['list'] = $this->Product_Model->list_product();
        $this->load->view('orders/addorder', $data);
        $this->load->view('template/footer');
    }

    public function index() {
        $this->load->view('template/header');


        $from = date("Y-m-d");
        $to = date("Y-m-d");
        $data['from'] = $from;
        $data['to'] = $to;

        //exit();
        $this->load->view('Terms/list_orders', $data);

        $this->load->view('template/footer');
    }

    public function posts() {

        $columns = array(
            0 => 'ono',
            1 => 'agent',
            2 => 'shop',
            3 => 'owner',
            4 => 'contact',
            5 => 'location',
            6 => 'remarks',
            7 => 'ordervalue',
            8 => 'orderdate',
            9 => 'employee',
            10 => 'action',
        );
        $froms = $_POST['from'];
        $from = date("Y-m-d", strtotime($froms));


        $tos = $_POST['to'];
        $to = date("Y-m-d", strtotime($tos));


        $limit = 10;
        $start = 0;
        $dir = '';

        //    $limit = $this->input->post('length');
        //   $start = $this->input->post('start');
        $order = 'shop_id';
        //$dir = $this->input->post('order')[0]['dir'];
        $order = 'tbl_order.shop_id';
        $totalData = $this->Shop_Model->allorderposts_count($from, $to);
        $totalFiltered = $totalData;
        if (empty($this->input->post('search')['value'])) {
            $posts = $this->Shop_Model->allorderposts($limit, $start, $order, $dir, $from, $to);
        } else {
            $search = $this->input->post('search')['value'];

            $posts = $this->Shop_Model->postsorder_search($limit, $start, $search, $order, $dir, $from, $to);

            $totalFiltered = $this->Shop_Model->postorders_search_count($search, $from, $to);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $sid = $post->agency_id;
                if ($post->remarks != '') {
                    $remarks = "Yes";
                } else {
                    $remarks = "No";
                }
                $aa = $this->db->query("select agencies_name from tbl_agencies where agencies_id=$sid")->row();


                $mmm = $post->shop_id;
                $mss = $this->db->query("select sum(price) as t from tbl_order where shop_id=$mmm")->row();
                $msss = $this->db->query("select sum(price) as t from tbl_order where shop_id=$mmm")->num_rows();

                if ($msss > 0) {
                    $amt = round($mss->t, 2);
                } else {
                    $amt = "0";
                }
                $iss = $post->emp_id;
                $mm = $this->db->query("select employee_email from tbl_employee where employee_id='$iss'")->row();
                $mms = $this->db->query("select employee_email from tbl_employee where employee_id='$iss'")->num_rows();
                if ($mms > 0) {
                    $mails = $mm->employee_email;
                } else {
                    $mails = "";
                }
                $nestedData['ono'] = $post->order_no;
                $nestedData['agent'] = $aa->agencies_name;
                $nestedData['shop'] = $post->shop_name;
                $nestedData['owner'] = $post->shop_owner_name;
                $nestedData['contact'] = $post->shop_contact;
                $nestedData['location'] = $post->shop_landline;
                $nestedData['remarks'] = $remarks;
                $nestedData['ordervalue'] = $amt;
                $nestedData['orderdate'] = date("d-m-Y", strtotime($post->shop_created_on));
                $nestedData['employee'] = $mails;

                $delete = "delete_shop('$mmm')";
                $edits = "window.location.href='";
                $edits .= base_url() . "Orders/order_view/$post->order_id'";

                $pdfs = "window.location.href='";
                $pdfs .= base_url() . "Orders/order_view_pdf/$post->order_id'";


                $datas = '<button onclick="' . $edits . '" class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-eye"></i> </button>
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

    public function distributor() {
        $this->load->view('template/header');
        $get_companies = $this->Terms_Model->distributor_order_list();

        $from = "1970-01-01";
        $to = date("Y-m-d");
        $data['from'] = $from;
        $data['to'] = $to;
        $data['shop'] = $get_companies;
        //print_r($get_companies);
        //exit();
        $this->load->view('Terms/list_distributors', $data);

        $this->load->view('template/footer');
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

        $get_companies = $this->Terms_Model->fetch_order_lists($from, $to);

        $data['shop'] = $get_companies;
        $data['from'] = $from;
        $data['to'] = $to;
        //print_r($get_companies);
        //exit();
        $this->load->view('Terms/list_orders', $data);

        $this->load->view('template/footer');
    }

    public function order_view($shop_ids) {

        $this->load->view('template/header');
        $shop_ii = $this->db->query("select shop_id from tbl_order  where order_id=$shop_ids")->row();
        $shop_id = $shop_ii->shop_id;
        $get_companies = $this->Terms_Model->fetch_shop_view($shop_id);
        $data['shop_view'] = $get_companies;
        $get_img = $this->Terms_Model->fetch_shop_view_img($shop_id);
        $data['shop_view_img'] = $get_img;
        $data['shop_id'] = $shop_ids;


        $this->load->view('Terms/order_view', $data);
        $this->load->view('template/footer');
    }

    public function order_view_pdf($shop_ids) {

        //print_r($shop_id);exit();

        $shop_ii = $this->db->query("select shop_id,created_on from tbl_order where order_id=$shop_ids")->row();


        $shop_id = $shop_ii->shop_id;
        $date = $shop_ii->created_on;
        $get_companies = $this->Terms_Model->fetch_shop_view($shop_id);
        $shop_view1 = $get_companies;
        $shop_view = $shop_view1[0];
        if ($shop_view->shop_type == 1) {
            $d = "Retailer";
        } else if ($shop_view->shop_type == 2) {
            $d = "Wholesale";
        } else if ($shop_view->shop_type == 3) {
            $d = "Distributor";
        } else {
            $d = "Retailer";
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
        $wheres = "tbl_order.order_id=$shop_ids and tbl_order.created_on='$date'";
        $mmq = $this->db->select('created_on,shop_id')->from('tbl_order')->where($wheres)->get()->row();
        $shop_idd = $mmq->shop_id;
        $cr = $mmq->created_on;
        $where = "tbl_order.shop_id=$shop_idd and tbl_order.created_on='$cr'";
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
<td style="font-size:18px"><b>Order Details on ($date)</b></td>
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

    public function distributorSearch() {
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

        $get_companies = $this->Terms_Model->fetch_distributors_lists($from, $to);

        $data['shop'] = $get_companies;$
        $data['from'] = $from;
        $data['to'] = $to;
        //print_r($get_companies);
        //exit();
        $this->load->view('Terms/list_dorders', $data);

        $this->load->view('template/footer');
    }

    public function import() {
        $this->load->view('template/header');
        $this->load->view('orders/import');

        $this->load->view('template/footer');
    }

    public function importfile() {
        $imagePrefix = date('Y_m_d_H_i_s');
        //$imagename = $imagePrefix.$value['userfile'];
        $config['upload_path'] = './import/';
        $config['allowed_types'] = 'xlsx|csv|xls';

        $config['file_name'] = $imagePrefix;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('userfile');
        $upload_data = $this->upload->data();
        $pic = $upload_data['file_name'];
        $data = array(
            'agency_id' => $_SESSION['userdata']['emp_id'],
            'filepath' => $pic,
            'created_on' => date("Y-m-d H:i:S"),
            'act' => 1,
        );
        $result = $this->Shop_Model->addimport($data);
        if ($result == 1) {
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
        redirect("orders/import/");
    }

    public function get_prices() {
        $branch_id = $_POST['branch'];
        $partno = $_POST['partno'];


        $where = "branch_id=$branch_id and product_id=$partno";
        $row = $this->db->select("distributor_price")->from('tbl_price')->where($where)->get()->row();
        echo json_encode($row);
    }

    public function adddetails() {
        $part = $_POST['partnos'];
        $qty = $_POST['qtys'];
        $pd_total = $_POST['pd_total'];
        $uid = $_SESSION['userdata']['emp_id'];
        $count = count($part);
        $ss = "select tbl_agencies.order_amt from tbl_agencies  where agencies_id=$uid";
        $sss = $this->db->query($ss)->row();
        $num = $this->db->query("select product_id from tbl_distributor_order")->num_rows();

        for ($i = 0; $i < $count; $i++) {

            $branch = $_POST['branch'];
            $shop_type = 3;
            $pid = $part[$i];
            $Quantity = $qty[$i];
            $Price = $pd_total[$i];
            $date = date("Y-m-d H:i:s");
            $where = "product_id=$pid";
            $row = $this->db->select("productgroup_id")->from('tbl_product')->where($where)->get()->row();
            $gid = $row->productgroup_id;
            $q1 = $this->db->insert('tbl_distributor_order', array('shop_type' => $shop_type,
                'agencies_id' => $uid, 'product_id' => $pid, 'product_group_id' => $gid,
                'qty' => $Quantity, 'price' => $Price, 'created_on' => $date, 'act' => 1));
        }
        $ord = $sss->order_amt;
        $prices = $_POST['grand_totals'];
        $ords = $ord + $prices;

        $qq = $this->db->query("update tbl_agencies set order_amt=$ords where agencies_id=$uid");
    }

}
