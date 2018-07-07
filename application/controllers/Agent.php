<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Agent_Model');
        $this->load->model('Dashboard_Model');
        $this->load->helper('cookie');
        require_once APPPATH . 'third_party/PHPExcel.php';
        $this->excel = new PHPExcel();
    }

    public function agentlist() {
        $this->load->view('template/header');
        $get_agents = $this->Agent_Model->get_agents();
        $data['agents'] = $get_agents;
        $this->load->view('agent/list_agent', $data);
        $this->load->view('template/footer');
    }

    public function lists() {


        $this->load->view('agent/list_excel');
    }

    public function list_distributor() {


        $this->load->view('agent/list_distributor');
    }

    public function index() {

        $this->load->view('agent/login');
    }

    public function logincheck() {

        $user_name = $_POST['email'];
        $password = $_POST['pass_wrd'];
        $data = array(
            'admin_username' => $user_name,
            'admin_password' => $password
        );

        $result = $this->Agent_Model->login($data);

        if ($result == TRUE) {

            $result = $this->Agent_Model->read_user_information($user_name);
            $session_data = array(
                'user_id' => $result[0]->admin_id,
                'username' => $result[0]->admin_username,
                'email' => $result[0]->admin_password,
                'role' => $result[0]->admin_role,
                'type' => $result[0]->admin_type,
                'emp_id' => $result[0]->employee_id,
                'photo' => $result[0]->admin_profile_picture,
            );
            // Add user data in session
            $this->session->set_userdata('userdata', $session_data);
            echo "1";
            // update last login info
        } else {
            echo "2";
        }
    }

    public function dashboard() {
        $this->load->view('template/header');
        $this->load->view('agent/dashboard/index');
        $this->load->view('template/footer');
    }

    public function inactive() {
        $this->load->view('template/header');
        $get_agents = $this->Agent_Model->get_inactiveagents();
        $data['agents'] = $get_agents;
        $this->load->view('agent/list_agent', $data);
        $this->load->view('template/footer');
    }

    public function add_agent() {
        $this->load->view('template/header');
        $this->load->view('agent/agent_add');
        $this->load->view('template/footer');
    }

    public function edit_agent($key) {
        $this->load->view('template/header');
        $get_agent = $this->Agent_Model->get_agent($key);
        $data['agent'] = $get_agent;
        $this->load->view('agent/agent_edit', $data);
        $this->load->view('template/footer');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Agent/index');
    }

    public function add() {
        //echo "<pre>"; print_r($_POST);exit();
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand .= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');
        $data = array(
            'agent_rand' => $rand,
            'agent_name' => $_POST['agnt_name'],
            'agent_phone' => $_POST['agnt_number'],
            'agent_email' => $_POST['agnt_mail'],
            'agent_address_line1' => $_POST['agnt_addr1'],
            'agent_address_line2' => $_POST['agnt_addr2'],
            'agent_address_line3' => $_POST['agnt_addr3'],
            'agent_address_line4' => $_POST['agnt_addr4'],
            'agent_pincode' => $_POST['agnt_pin'],
            'agent_additional_contact1' => $_POST['additional_contact1'],
            'agent_additional_contact2' => $_POST['additional_contact2'],
            'agent_additional_email1' => $_POST['additional_email1'],
            'agent_additional_email2' => $_POST['additional_email2'],
            'agent_act' => 1,
            'agent_created_on' => $date,
        );
        $result = $this->Agent_Model->add($data);
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
        redirect("Agent");
    }

    public function delete_agent() {
        $rand = $_POST['id'];
        $data = array(
            'agent_act' => 0,);
        $result = $this->Agent_Model->update_data($data, $rand);
        echo $result;
    }

    public function activate_agent() {
        $rand = $_POST['id'];
        $data = array(
            'agent_act' => 1,);
        $result = $this->Agent_Model->update_data($data, $rand);
        echo $result;
    }

    public function update() {
        //echo "<pre>"; print_r($_POST);exit();
        $key = $_POST['key'];
        $date = date('Y-m-d H:i:s');
        $data = array(
            'agent_rand' => $_POST['key'],
            'agent_name' => $_POST['agnt_name'],
            'agent_phone' => $_POST['agnt_number'],
            'agent_email' => $_POST['agnt_mail'],
            'agent_address_line1' => $_POST['agnt_addr1'],
            'agent_address_line2' => $_POST['agnt_addr2'],
            'agent_address_line3' => $_POST['agnt_addr3'],
            'agent_address_line4' => $_POST['agnt_addr4'],
            'agent_pincode' => $_POST['agnt_pin'],
            'agent_additional_contact1' => $_POST['additional_contact1'],
            'agent_additional_contact2' => $_POST['additional_contact2'],
            'agent_additional_email1' => $_POST['additional_email1'],
            'agent_additional_email2' => $_POST['additional_email2'],
            'agent_act' => $_POST['status'],
            'agent_updated_on' => $date,
        );
        $result = $this->Agent_Model->update_data($data, $key);
        if ($result == 1) {
            $cookie = array(
                'name' => 'update',
                'value' => '1',
                'expire' => '3',
            );
        } else if ($result == 3) {
            $cookie = array(
                'name' => 'update',
                'value' => '3',
                'expire' => '3',
            );
        } else {
            $cookie = array(
                'name' => 'update',
                'value' => '2',
                'expire' => '3',
            );
        }
        $this->input->set_cookie($cookie);
        redirect("Agent");
    }

    public function export() {
        $get_agent = $this->Agent_Model->get_export_agent();
        $data['agent'] = $get_agent;
        $this->load->view('agent/export_agent', $data);
    }

//    public function save() {
//        $this->load->library('excel');
//
//        if ($this->input->post('importfile')) {
//            $path = ROOT_UPLOAD_IMPORT_PATH;
//
//            $config['upload_path'] = $path;
//            $config['allowed_types'] = 'xlsx|xls|jpg|png';
//            $config['remove_spaces'] = TRUE;
//            $this->upload->initialize($config);
//            $this->load->library('upload', $config);
//            if (!$this->upload->do_upload('userfile')) {
//                $error = array('error' => $this->upload->display_errors());
//            } else {
//                $data = array('upload_data' => $this->upload->data());
//            }
//
//            if (!empty($data['upload_data']['file_name'])) {
//                $import_xls_file = $data['upload_data']['file_name'];
//            } else {
//                $import_xls_file = 0;
//            }
//            $inputFileName = $path . $import_xls_file;
//            try {
//                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
//                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
//                $objPHPExcel = $objReader->load($inputFileName);
//            } catch (Exception $e) {
//                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
//                        . '": ' . $e->getMessage());
//            }
//            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
//
//            $arrayCount = count($allDataInSheet);
//            $flag = 0;
//            $createArray = array('First_Name', 'Last_Name', 'Email', 'DOB', 'Contact_NO');
//            $makeArray = array('First_Name' => 'First_Name', 'Last_Name' => 'Last_Name', 'Email' => 'Email', 'DOB' => 'DOB', 'Contact_NO' => 'Contact_NO');
//            $SheetDataKey = array();
//            foreach ($allDataInSheet as $dataInSheet) {
//                foreach ($dataInSheet as $key => $value) {
//                    if (in_array(trim($value), $createArray)) {
//                        $value = preg_replace('/\s+/', '', $value);
//                        $SheetDataKey[trim($value)] = $key;
//                    } else {
//                        
//                    }
//                }
//            }
//            $data = array_diff_key($makeArray, $SheetDataKey);
//
//            if (empty($data)) {
//                $flag = 1;
//            }
//            if ($flag == 1) {
//                for ($i = 2; $i <= $arrayCount; $i++) {
//                    $addresses = array();
//                    $firstName = $SheetDataKey['First_Name'];
//                    $lastName = $SheetDataKey['Last_Name'];
//                    $email = $SheetDataKey['Email'];
//                    $dob = $SheetDataKey['DOB'];
//                    $contactNo = $SheetDataKey['Contact_NO'];
//                    $firstName = filter_var(trim($allDataInSheet[$i][$firstName]), FILTER_SANITIZE_STRING);
//                    $lastName = filter_var(trim($allDataInSheet[$i][$lastName]), FILTER_SANITIZE_STRING);
//                    $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_EMAIL);
//                    $dob = filter_var(trim($allDataInSheet[$i][$dob]), FILTER_SANITIZE_STRING);
//                    $contactNo = filter_var(trim($allDataInSheet[$i][$contactNo]), FILTER_SANITIZE_STRING);
//                    $fetchData[] = array('first_name' => $firstName, 'last_name' => $lastName, 'email' => $email, 'dob' => $dob, 'contact_no' => $contactNo);
//                }
//                $data['employeeInfo'] = $fetchData;
//                $this->import->setBatchImport($fetchData);
//                $this->import->importData();
//            } else {
//                echo "Please import correct file";
//            }
//        }
//        $this->load->view('import/display', $data);
//    }
    
    
    public function stock(){
$data= $this->db->query("SELECT * FROM `tbl_agencies` WHERE `agencies_act`=1")->result();
foreach($data as $t){
    $datas= $this->db->query("SELECT * FROM `tbl_product` WHERE `product_act`=1")->result();
    foreach($datas as $tt){
    $aid=$t->agencies_id;
    $pid=$tt->product_id;
    $date=date("Y-m-d");
    $this->db->query("insert into tbl_stock (agency_id,product_id,instock,closingstock,date) values($aid,$pid,100,100,'$date')");
    }
    

}
    }

    public function importfile() {
        $file_info = pathinfo($_FILES["userfile"]["name"]);
        $file_directory = "uploads/";
        $new_file_name = date("d-m-Y ") . rand(000000, 999999) . "." . $file_info["extension"];

        if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $file_directory . $new_file_name)) {
            $file_type = PHPExcel_IOFactory::identify($file_directory . $new_file_name);
            $objReader = PHPExcel_IOFactory::createReader($file_type);
            $objPHPExcel = $objReader->load($file_directory . $new_file_name);
            $sheet_data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            $count = count($sheet_data);

            if ($file_type == "CSV" || $file_type == "Excel5") {
                $sheet = $sheet_data[1];
                $x = 2;
            } else {
                $sheet = $sheet_data[2];
                $x = 3;
            }


            foreach ($sheet as $key => $value) {
                $productid = array();
                $productqty = array();



                for ($i = $x; $i < $count - 1; $i++) {

                    if ($value == "Shop Name") {
                        $shop_name[] = $sheet_data[$i][$key];
                    }

                    if ($value == "Owner Name") {
                        $owner_name[] = $sheet_data[$i][$key];
                    }

                    if ($value == "Shop Contact No") {
                        $no[] = $sheet_data[$i][$key];
                    }


                    if ($value == "shop location") {
                        $location[] = $sheet_data[$i][$key];
                    }
                    if ($value == "City Name") {
                        $city[] = $sheet_data[$i][$key];
                    }

                    if ($value == "Remarks") {
                        $Remarks[] = $sheet_data[$i][$key];
                    }

                    $q = $this->db->query("select product_id,product_name from tbl_product where product_act=1 and product_name='$value'")->num_rows();
                    if ($q > 0) {
                        $q = $this->db->query("select product_id,product_name from tbl_product where product_act=1 and product_name='$value'")->row();
                        $productid[] = $q->product_id;
                        $productqty[] = $sheet_data[$i][$key];
                    }


                    // 
                }
                if (!empty($productid) && !empty($productid)) {
                    $pids[] = $productid;
                    $pqty[] = $productqty;
                }
            }
            $shop_name = array_filter($shop_name);
            $owner_name = array_filter($owner_name);
            $no = array_filter($no);

            $location = array_filter($location);
            $city = array_filter($city);
            $Remarks = array_filter($Remarks);



            $pids = array_filter($pids);
            $pcount = count($pids);
            $pqty = array_filter($pqty);
            $array_count = count($shop_name);
            for ($i = 0; $i < $array_count; $i++) {

                $name = $shop_name[$i];
                $oname = $owner_name[$i];
                $ono = $no[$i];
                $olocation = $location[$i];
                $ocity = $city[$i];
                $oRemarks = $Remarks[$i];
                $rows = $this->db->query("select shop_id from tbl_shop where shop_contact='$ono'")->num_rows();
                $EID = $_SESSION['userdata']['emp_id'];
                $loc = '';
                if ($rows > 0) {
                    $ee = $this->db->query("select shop_id from tbl_shop where shop_contact='$ono'")->row();
                    $tt = $ee->shop_id;
                } else {

                    $date = date("Y-m-d H:i:S");
                    $q1 = $this->db->insert('tbl_shop', array('branch_id' => 1,
                        'shop_types' => '1',
                        'remarks' => $oRemarks,
                        'loc_id' => $loc,
                        'agency_id' => $EID,
                        'shop_name' => $name,
                        'shop_owner_name' => $oname,
                        'shop_contact' => $ono,
                        'shop_landline' => $olocation,
                        'shop_type' => 1,
                        'shop_created_on' => $date,
                        'shop_act' => 1));
                    $tt = $this->db->last_insert_id();
                }
                $res = $this->db->query("select order_no from tbl_order where order_type=2  order by order_id desc ")->row();
                $rescount = $this->db->query("select order_no from tbl_order where order_type=2 order by order_id desc")->num_rows();

                if ($rescount > 0) {
                    $nos = $res->order_no;
                    $nos = substr($nos, 2);
                    $nos = $nos + 1;
                    $noy = 'DR';
                    if ($nos <= 9) {
                        $noy .= "00";
                        $noy .= $nos;
                    }

                    if ($nos > 9 && $nos <= 99) {
                        $noy .= "0";
                        $noy .= $nos;
                    }if ($nos > 99) {

                        $noy .= $nos;
                    }
                } else {
                    $noy = "DR001";
                }

                for ($j = 0; $j < $pcount; $j++) {
                    $pj = $pids[$j];
                    $pq = $pqty[$j];
                    $tcount = count($pj);
                    $ww = $pj[$i];
                    $rr = $pq[$i];

                    $prices = 0;
                    $tts = $this->db->query("select productgroup_id from tbl_product where product_act=1 and product_id='$ww'")->row();

                    $rrr = $tts->productgroup_id;
                    $ttsrs = $this->db->query("select branch_id,order_amt from tbl_agencies where agencies_id='$EID'")->row();

                    $rrrt = $ttsrs->branch_id;

                    $date = date("Y-m-d H:i:s");
                    if ($rr != 0 || $rr != '') {
                        $ttsr = $this->db->query("select retail_price from tbl_price where product_id='$ww' and branch_id=$rrrt")->row();
                        $Pricea = $ttsr->retail_price;
                        $Price = 0;
                        $datess = date("Y-m-d");
                        $ss = $this->db->query("select sum(qty) as t from tbl_order where shop_id=$tt and created_on='$datess' and product_id=$ww")->row();
                        $this->db->last_query();
                        $qt = $ss->t;
                        if ($rr > $qt) {
                            $rr = $rr - $qt;
                            $Price = $rr * $Pricea;
                            $prices = $Price + $prices;

                            $q1 = $this->db->insert('tbl_order', array('order_no' => $noy, 'order_type' => '2', 'shop_type' => 1, 'agencies_id' => $EID,
                                'product_id' => $ww, 'product_group_id' => $rrr, 'shop_id' => $tt, 'qty' => $rr, 'price' => $Price, 'created_on' => $date, 'act' => 1));
                        }
                    }
                }
                $ord = $ttsrs->order_amt;
                $prices = $Price + $prices;
                $ords = $ord - $prices;
                $qq = $this->db->query("update tbl_agencies set order_amt=$ords where agencies_id=$EID");
            }

            exit();
        }
        if ($qq) {
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
    }

}
