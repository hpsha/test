<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apicontroller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_Model');
        $this->load->model('Customer_Model');
        $this->load->model('Enquiry_Model');
        $this->load->model('Task_Model');
    }

    public function login() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            if ((isset($_POST['user_email'])) && (isset($_POST['password']))) {
                $user_name = $_POST['user_email'];
                $password = $_POST['password'];
                $data = array(
                    'admin_username' => $user_name,
                    'admin_password' => $password
                );
                $result = $this->Login_Model->logins($data);
                if ($result == TRUE) {
                    $result = $this->Login_Model->read_user_information($user_name);
                    $session_data = array(
                        'user_id' => $result[0]->admin_id,
                        'username' => $result[0]->admin_username,
                        'role' => $result[0]->admin_role,
                        'emp_id' => $result[0]->employee_id,
                        'photo' => $result[0]->admin_profile_picture,
                    );
                    $resp = array('status' => 1, 'message' => 'Login Successfully', 'data' => $session_data);
                    // update last login info
                } else {
                    $resp = array('status' => 0, 'message' => 'Username OR Password are wrong');
                }
            } else {
                $resp = array('status' => 0, 'message' => 'Parameters is Missing');
            }
            json_output($response['status'], $resp);
        }
    }

    
    
    
    
    
    
    
    public function change_password() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            if ((isset($_POST['current_password'])) && (isset($_POST['new_password'])) && (isset($_POST['user_id']))) {
                $current_password = $_POST['current_password'];
                $new_password = $_POST['new_password'];
                $user_id = $_POST['user_id'];
                $result = $this->Login_Model->change_pass($user_id, $current_password, $new_password);
                if ($result == 1) {
                    $resp = array('status' => 1, 'message' => 'Password Changed successfully');
                } else if ($result == 2) {
                    $resp = array('status' => 0, 'message' => 'Error Occured');
                } else if ($result == 3) {
                    $resp = array('status' => 0, 'message' => 'Current Password are wrong');
                }
            } else {
                $resp = array('status' => 0, 'message' => 'Parameters is Missing');
            }
            json_output($response['status'], $resp);
        }
    }

    public function customer_details() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            if ((isset($_POST['user_id']))) {
                $user_id = $_POST['user_id'];
                $result = $this->Customer_Model->get_employee_customer($user_id);
                $resp = array('status' => 1, 'message' => $result);
            } else {
                $resp = array('status' => 0, 'message' => 'Parameters is Missing');
            }
            json_output($response['status'], $resp);
        }
    }

    public function company_details() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            if ((isset($_POST['user_id']))) {
                $user_id = $_POST['user_id'];
                $get_companies = $this->Company_Model->get_company_all_details();
                $resp = array('status' => 1, 'message' => $get_companies);
            } else {
                $resp = array('status' => 0, 'message' => 'Parameters is Missing');
            }
            json_output($response['status'], $resp);
        }
    }

    public function list_products() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            $resp = $this->Login_Model->list_products();
            json_output($response['status'], $resp);
        }
    }

    public function list_new_enquiry() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $eid = $_POST['user_id'];
            $response['status'] = 200;
            $resp = $this->Enquiry_Model->list_new_enquiry($eid);

            json_output($response['status'], $resp);
        }
    }

    public function list_success_enquiry() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            $eid = $_POST['user_id'];
            $resp = $this->Enquiry_Model->list_success_enquiry($eid);
            json_output($response['status'], $resp);
        }
    }

    public function list_dropped_enquiry() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            $eid = $_POST['user_id'];
            $resp = $this->Enquiry_Model->list_dropped_enquiry($eid);
            json_output($response['status'], $resp);
        }
    }

    public function view_enquiry() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            $eid = $_POST['enquiry_no'];

            $resp = $this->Enquiry_Model->view_enquiry($eid);
          //  echo $this->db->last_query(); exit();
            json_output($response['status'], $resp);
        }
    }

    public function add_shop() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            $sname = $_POST['shop_name'];
            $cusname = $_POST['name'];
            $mobileno = $_POST['mobileno'];
            $landline = $_POST['landline'];
            $area = $_POST['area'];
            $image = $_POST['image'];
            $userid = $_POST['user_id'];
            $loc = $_POST['loc'];
            //$sq_ft = $_POST['sq_ft'];
            $lat = $_POST['lat'];
            $lon = $_POST['lon'];
            $previous = $_POST['shop_previous'];
            $aid=$_POST['agency_id'];
            $uid=$_POST['user_id'];
            $type = $_POST['type'];
            $remarks=$_POST['remarks'];
            $branch_id=$_POST['branch_id'];
            $resp = $this->Enquiry_Model->add_enquiry($branch_id,$aid,$uid,$loc,$sname,$cusname, $mobileno, $landline, $area, $image, $userid,  $lat, $lon,$previous,$type,$remarks);
            json_output($response['status'], $resp);
        }
    }
    public function edit_shop(){
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            $shopid = $_POST['shop_id'];
            $sname = $_POST['shop_name'];
            $cusname = $_POST['name'];
            $mobileno = $_POST['mobileno'];
            $landline = $_POST['landline'];
            $area = $_POST['area'];
           
            $userid = $_POST['user_id'];
            
            //$sq_ft = $_POST['sq_ft'];
            $lat = $_POST['lat'];
            $lon = $_POST['lon'];
            $previous = $_POST['shop_previous'];
            
            $uid=$_POST['user_id'];
            $type = $_POST['type'];
            $remarks=$_POST['remarks'];
            $resp = $this->Enquiry_Model->update_shop($shopid,$uid,$sname,$cusname, $mobileno, $landline, $area, $userid,  $lat, $lon,$previous,$type,$remarks);
            json_output($response['status'], $resp);
        }
    }
     public function update_enquiry() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            $cusname = $_POST['name'];
             $enq_no= $_POST['enq_no'];
            $mobileno = $_POST['mobileno'];
            $emailid = $_POST['email'];
            $area = $_POST['area'];
            $image = $_POST['image'];
            $userid = $_POST['user_id'];
            $qty = $_POST['qty'];

            $sq_ft = $_POST['sq_ft'];
            $lat = $_POST['lat'];
            $lon = $_POST['lon'];
            $desc = $_POST['desc'];
            $project_status = $_POST['status'];
            $complete = $_POST['project_date'];
            $type = $_POST['type'];
              $refered_by = $_POST['refered_by'];
                $design_sheet = $_POST['design_sheet'];
            $resp = $this->Enquiry_Model->update_enquiry($enq_no,$cusname, $mobileno, $emailid, $area, $image, $userid, $qty, $sq_ft, $lat, $lon, $desc, $project_status, $complete, $type,$refered_by,$design_sheet);
            json_output($response['status'], $resp);
        }
    }

    public function user_registration() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["user_name"])  && isset($_REQUEST['password'])) {

                $Username = $_REQUEST['user_name'];
                $Mobile ='';
                $Password = $_REQUEST['password'];
                $Lattitude ='';
                $Longitude = '';
                $GCM = '';
                $name =  $_REQUEST['name'];
                $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $rand = '';
                $random_string_length = 6;
                $max = strlen($characters) - 1;
                for ($i = 0; $i < $random_string_length; $i++) {
                    $rand.= $characters[mt_rand(0, $max)];
                }
                $resp = $this->Enquiry_Model->user_registration($name, $Username, $Mobile, $Password, $Lattitude, $Longitude, $GCM, $rand);
                echo json_output($response['status'], $resp);



                // echoing JSON response
            } else {

                $resp = array('status' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    }

    public function task_list() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["user_id"])) {

                $user_id = $_REQUEST['user_id'];

                $resp = $this->Enquiry_Model->task_list($user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            } else {

                $resp = array('success' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    }

    public function schedule_list() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["user_id"])) {

                $user_id = $_REQUEST['user_id'];

                $resp = $this->Enquiry_Model->schedule_list($user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            } else {

                $resp = array('success' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    }
    
     
    
    
    
    public function attendance_check() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["user_id"])) {

                $user_id = $_REQUEST['user_id'];
                $date=date("Y-m-d");

         $q=$this->db->query("select *  from tb_attendace where attendance_user_id=$user_id and attendance_date='$date'")->num_rows();
         if($q==1){
             $resp = array('success' => 1, 'data' => "Attendance insert successfully");
                echo json_output($response['status'], $resp);
             
         }
         else{
             $resp = array('success' => 0, 'data' => "Attendance Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
         }


                // echoing JSON response
            } else {

                $resp = array('success' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    }
  /*public function list_agencies() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["user_id"])) {

                $user_id = $_REQUEST['user_id'];

                $resp = $this->Enquiry_Model->agencies_list($user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            } else {

                $resp = array('success' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    } */
    public function list_agencies() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["user_id"])) {

                $user_id = $_REQUEST['user_id'];
                if(isset($_REQUEST['branch_id'])){
                    $branch_id = $_REQUEST['branch_id'];
                }
                else{
                 $branch_id = 1;   
                }

                $resp = $this->Enquiry_Model->agencies_list($user_id,$branch_id);
//  echo $this->db->last_query();
                echo json_output($response['status'], $resp);



                // echoing JSON response
            } else {

                $resp = array('success' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    }
        

  public function shop_list() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
           
             $user_id = $_REQUEST['user_id'];

                $resp = $this->Enquiry_Model->shop_list($user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            
        }
    }
    public function shop_view(){
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
           
             $user_id = $_REQUEST['user_id'];
             $start = $_REQUEST['start'];
             $limit = $_REQUEST['limit'];
                $resp = $this->Enquiry_Model->shop_lists($user_id, $start, $limit);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            
        }
    }
      public function user_shop_list() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
           
             $user_id = $_REQUEST['user_id'];

                $resp = $this->Enquiry_Model->user_shop_list($user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            
        }
    }
      public function productlist() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["group_id"])) {
             $group_id = $_REQUEST['group_id'];
             $shop_id=$_REQUEST['shop_id'];
$www=$this->db->query("select branch_id,shop_types from tbl_shop where shop_id=$shop_id")->row();
$branch_id=$www->branch_id;
$shop_type=$www->shop_types;
                $resp = $this->Enquiry_Model->productlist($group_id,$branch_id,$shop_type);

                echo json_output($response['status'], $resp);

}else {

                $resp = array('success' => 0, 'data' => "parameters is missing");
                echo json_output($response['status'], $resp);
            }

                // echoing JSON response
            
        }
    }
//   public function productlist() {
//        $response['status'] = 200;
//        $method = $_SERVER['REQUEST_METHOD'];
//        if ($method != 'POST') {
//            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
//        } else {
//            if (isset($_REQUEST["group_id"])) {
//             $group_id = $_REQUEST['group_id'];
//
//                $resp = $this->Enquiry_Model->productlist($group_id);
//
//                echo json_output($response['status'], $resp);
//
//}else {
//
//                $resp = array('success' => 0, 'data' => "parameters is missing");
//                echo json_output($response['status'], $resp);
//            }
//
//                // echoing JSON response
//            
//        }
//    }
 
     public function addorder() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if ((isset($_REQUEST["shop_id"])) && (isset($_REQUEST["user_id"]))&& (isset($_REQUEST["product_details"]))) {
             $shop_id= $_REQUEST['shop_id'];
               $products = $_REQUEST['product_details'];
               $user_id=$_REQUEST['user_id'];
              
$www=$this->db->query("select branch_id,shop_types from tbl_shop where shop_id=$shop_id")->row();
$branch_id=$www->branch_id;
$shop_type=$www->shop_types;
$resp = $this->Enquiry_Model->addorder($shop_id,$products,$user_id,$branch_id,$shop_type);

                echo json_output($response['status'], $resp);

}else {

                $resp = array('success' => 0, 'data' => "parameters is missing");
                echo json_output($response['status'], $resp);
            }

                // echoing JSON response
            
        }
    }
     public function order_list() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
           
             $user_id = $_REQUEST['user_id'];

                $resp = $this->Enquiry_Model->order_list($user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            
        }
    }
         public function order_lisst() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
           
             $user_id = $_REQUEST['user_id'];

                $resp = $this->Enquiry_Model->order_lisst($user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            
        }
    }
    
     public function productgrouplist() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
           

                $resp = $this->Enquiry_Model->productgrouplist();

                echo json_output($response['status'], $resp);



                // echoing JSON response
            
        }
    }
     public function agencylocation_list() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
          
             $agency_id= $_REQUEST['agency_id'];
 $user_id= $_REQUEST['user_id'];
                $resp = $this->Enquiry_Model->agencylocation_list($agency_id,$user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            
        }
    }

    public function update_location() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["lat"]) && isset($_REQUEST['long']) && isset($_REQUEST['user_id'])) {

                $user_id = $_REQUEST['user_id'];
                $Lat = $_REQUEST['lat'];
                $Long = $_REQUEST['long'];

                $resp = $this->Enquiry_Model->update_location($user_id, $Lat, $Long);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            } else {

                $resp = array('success' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    }

    public function user_attendance() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["lat"]) && isset($_REQUEST['long']) && isset($_REQUEST['user_id'])) {

                $user_id = $_REQUEST['user_id'];
                $Lat = $_REQUEST['lat'];
                $Long = $_REQUEST['long'];

                $resp = $this->Enquiry_Model->user_attendance($user_id, $Lat, $Long);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            } else {

                $resp = array('success' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    }

    public function add_schedule() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["task_name"]) && isset($_REQUEST['task_des']) && isset($_REQUEST['user_id'])) {

                $Task_Name = $_REQUEST['task_name'];
                $Task_Des = $_REQUEST['task_des'];
                $User_id = $_REQUEST['user_id'];
                $query = "INSERT INTO `tb_task`(`task_name`, `task_description`, `task_note`, `task_created_by`, `task_date`, `task_status`) VALUES ('$Task_Name','$Task_Des','','$User_id',Now(),'1')";

                $result = $this->db->query($query);

                if ($result) {

                    $resp["success"] = 1;
                    $resp["notification"] = "Task Added Sucessfully";
                }
                // echoing JSON response
            } else {
                $resp["success"] = 0;
                $resp["notification"] = "Message Not Inserted Sucessfully";
            }
            echo json_output($response['status'], $resp);



            // echoing JSON response
        }
    }

    public function update_schedule() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {

            if (isset($_REQUEST["task_id"]) && isset($_REQUEST['task_name']) && isset($_REQUEST['task_des']) && isset($_REQUEST['task_note'])) {

                $Task_Id = $_REQUEST['task_id'];
                $Task_Name = $_REQUEST['task_name'];
                $Task_Des = $_REQUEST['task_des'];
                $Task_Note = $_REQUEST['task_note'];

                $query = "update tb_task set `task_name` = '$Task_Name' , `task_description` ='$Task_Des' , `task_note` ='$Task_Note', `task_date`= now() where `task_id`='$Task_Id'";
                $result = $this->db->query($query);

                if ($result) {

                    $resp["success"] = 1;
                    $resp["notification"] = "Task Updated Sucessfully";
                }
                // echoing JSON response
            } else {
                $resp["success"] = 0;
                $resp["notification"] = "Message Not Inserted Sucessfully";
            }
            echo json_output($response['status'], $resp);



            // echoing JSON response
        }
    }

    public function update_task() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["schedule_id"]) && isset($_REQUEST['note'])) {
                $Schedule_Id = $_REQUEST['schedule_id'];
                $Schedule_Note = $_REQUEST['note'];

                $select_schedule = "select schedule_assigned_to from tb_schedule where schedule_id = '$Schedule_Id' ";
                $result_schedule = $this->db->query($select_schedule);

                $row_schedule = $result_schedule->row();

                $user_id = $row_schedule->schedule_assigned_to;
                $select_schedule2 = "select employee_latitude,employee_longitude from tbl_employee where employee_id = $user_id ";
                $result_schedule2 = $this->db->query($select_schedule2);
                $row_schedule2 = $result_schedule2->row();
                $lat = $row_schedule2->employee_latitude;
                $lon = $row_schedule2->employee_longitude;
                $query = "UPDATE tb_schedule set `schedule_note` = '$Schedule_Note', `schedule_lattitude` = '$lat', `schedule_longitude` = '$lon', `schedule_date` = now() WHERE `schedule_id` = '$Schedule_Id'";

                $result = $this->db->query($query);

                if ($result) {

                    $resp["success"] = 1;
                    $resp["notification"] = "Schedule Updated Sucessfully";
                } else {
                    $resp["success"] = 0;
                    $resp["notification"] = "Schedule Not Updated Sucessfully";
                }
                // echoing JSON response
            } else {
                $resp["success"] = 0;
                $resp["notification"] = "Schedule Not Updated Sucessfully";
            }

                        echo json_output($response['status'], $resp);

        }
    }

      public function delete_schedule() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {

            if (isset($_REQUEST["task_id"])) {

                $Task_Id = $_REQUEST['task_id'];
            $query = "DELETE FROM `tb_task` WHERE `task_id` = '$Task_Id'";

        $result = $this->db->query($query);


                if ($result) {

                    $resp["success"] = 1;
                    $resp["notification"] = "Task Deleted Sucessfully";
                }
                // echoing JSON response
            } else {
                $resp["success"] = 0;
                $resp["notification"] = "Message Not Deleted Sucessfully";
            }
            echo json_output($response['status'], $resp);



            // echoing JSON response
        }
    }

     public function single_schedule() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["schedule_id"])) {

                $user_id = $_REQUEST['schedule_id'];

                $resp = $this->Enquiry_Model->single_schedule($user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            } else {

                $resp = array('success' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    }
   public function single_task() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["task_id"])) {

                $user_id = $_REQUEST['task_id'];

                $resp = $this->Enquiry_Model->single_task($user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            } else {

                $resp = array('success' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    }
    public function list_task() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            $resp = $this->Login_Model->get_task();
            json_output($response['status'], $resp);
        }
    }
    public function add_task() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["employee_id"]) && isset($_REQUEST['task_name']) && isset($_REQUEST['task_description'])) {
                $employee_id = $_REQUEST['employee_id'];
                $task_name = $_REQUEST['task_name'];
                $task_description = $_REQUEST['task_description'];
                $notes="";
                $date=  date('y-m-d H:i:s');
                $query = "INSERT INTO `tb_schedule` (`schedule_id`, `schedule_title`, `schedule_description`, `schedule_note`,`schedule_date`, `schedule_assigned_to`, `schedule_status`) VALUES (NULL, '$task_name', '$task_description', '$notes', '$date', '$employee_id', '0')";
                $result = $this->db->query($query);
                if ($result) {
                    $resp["success"] = 1;
                    $resp["notification"] = "Task Added Sucessfully";
                }
            } else {
                $resp["success"] = 0;
                $resp["notification"] = "Task Not Inserted Sucessfully";
            }
            echo json_output($response['status'], $resp);
        }
    }
    public function edit_task() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["employee_id"]) && isset($_REQUEST['task_name']) && isset($_REQUEST['task_description']) && isset($_REQUEST['task_id']) && isset($_REQUEST['status'])) {
                $task_id = $_REQUEST['task_id'];
                $employee_id = $_REQUEST['employee_id'];
                $task_name = $_REQUEST['task_name'];
                $task_description = $_REQUEST['task_description'];
                $status=$_POST['status'];
                $date=  date('y-m-d H:i:s');
                $query = "UPDATE  tb_schedule SET schedule_title='$task_name',schedule_status='$status',schedule_description='$task_description' where schedule_id='$task_id'";
                $result = $this->db->query($query);
                if ($result) {
                    $resp["success"] = 1;
                    $resp["notification"] = "Task Updated Sucessfully";
                }
            } else {
                $resp["success"] = 0;
                $resp["notification"] = "Task Not Updated Sucessfully";
            }
            echo json_output($response['status'], $resp);
        }
    }
    
    public function agencieslist() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            if (isset($_REQUEST["user_id"])) {

                $user_id = $_REQUEST['user_id'];
 // $branch_id= $_REQUEST['branch_id'];
                $resp = $this->Enquiry_Model->agencieslist($user_id);

                echo json_output($response['status'], $resp);



                // echoing JSON response
            } else {

                $resp = array('success' => 0, 'data' => "Message Not Inserted Sucessfully");
                echo json_output($response['status'], $resp);
            }
        }
    }

       public function branchlist() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            


                $resp = $this->Enquiry_Model->branchlist();

                echo json_output($response['status'], $resp);



                // echoing JSON response
          
        }
    }
public function attendance() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
    
           $mm=$this->db->query("select employee_id from tbl_employee where employee_act=1")->result();
foreach($mm as $t){
                $user_id = $t->employee_id;
                $date=date("Y-m-d");
                
                 $mms=$this->db->query("select attendance_id from tb_attendace where attendance_user_id=$user_id and attendance_date='$date'")->num_rows();
                 if($mms==0){
                $qq="INSERT INTO `tb_attendace`(`attendance_id`, `attendance_user_id`, `attendance_status`, `attendance_latitude`, `attendance_longitude`, `attendance_date`) VALUES ('',$user_id,'','','','$date')";
                $this->db->query($qq);
             }
                
}



                // echoing JSON response
         
        }
		public function shop_search(){
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
             $user_id = $_REQUEST['user_id'];
             $search = $_REQUEST['search_term'];
             $resp = $this->Enquiry_Model->shop_searching($user_id, $search);
             echo json_output($response['status'], $resp);
        }
    }
     public function test_insert() {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            if (isset($_REQUEST["user_name"]) && isset($_REQUEST["user_password"])) {
                $user_name = $_REQUEST['user_name'];
                $user_pass = $_REQUEST['user_password'];
                 $data=array(
                   'test_username' =>$user_name,
                   'test_password' =>$user_pass,
                );
                
                $result = $this->db->insert('tbl_test', $data);
                if ($result == TRUE) {
                    $resp = array('status' => 1, 'message' => 'Login Successfully');
                    // update last login info
                } else {
                    $resp = array('status' => 0, 'message' => 'Username OR Password are wrong');
                }
            } else {
                $resp = array('status' => 0, 'message' => 'Parameters is Missing');
            }
            json_output($response['status'], $resp);
        }
    }
    public function salesreturn_insert(){
           $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            $shop_id = $_POST['shop_id'];
            $proid = $_POST['product_id'];
            $qty = $_POST['qty'];
            $input_type = '';
            $status = 1;
            $userid = $_POST['userid'];
            $type = 5;
            $date=  date('y-m-d H:i:s');
            $query = "INSERT INTO `tb_salesreturn`(`salesreturn_id`, `shop_id`, `product_id`, `qty`, `input_type`, `status`, `approval_status`, `created_date`, `created_userid`, `created_usertype`, `updated_date`, `updated_userid`, `updated_usertype`) VALUES (";
            $query .= "'', '$shop_id', '$proid', '$qty', '$input_type', '$status', '0', '$date', '$userid', '$type', '$date', '$userid', '$type')";
            $result = $this->db->query($query);
             if ($result) {
                    $resp["success"] = 1;
                    $resp["notification"] = "Sales Return Inserted Successfully";
                
            } else {
                $resp["success"] = 0;
                $resp["notification"] = "Sales Return Inserted Not Updated Successfully";
            }
            echo json_output($response['status'], $resp);
        }
    }
	    /* Sales Return Listing */
    public function salesreturn_list() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $user_id = $_REQUEST['user_id'];
            $resp = $this->Enquiry_Model->return_list($user_id);
            echo json_output($response['status'], $resp);
        }
    }
     /* Target Listing */
    public function target_listing() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $user_id = $_REQUEST['user_id'];
            $resp = $this->Enquiry_Model->target_list($user_id);
            echo json_output($response['status'], $resp);
        }
    }
	 /* Combo Offers  Listing */
    public function combo_listing() {
        $response['status'] = 200;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $resp = $this->Enquiry_Model->combo_list();
            echo json_output($response['status'], $resp);
        }
    }
	 public function combo_insert(){
           $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            json_output(400, array('status' => 400, 'message' => 'Bad request.'));
        } else {
            $response['status'] = 200;
            $offername = $_POST['offer_name'];
            $code = $_POST['scheme_code'];
            $fromdate = $_POST['from_date'];
            $todate = $_POST['to_date'];
            $cateid = $_POST['category_id'];
            $proid = $_POST['product_id'];
            $amount = $_POST['amount'];
            $status = 1;
            $approval_status = 0;
            $userid = $_POST['userid'];
            $date=  date('y-m-d H:i:s');
            $query = "INSERT INTO `tbl_combo_offer`(`combo_id`, `offer_name`, `scheme_code`, `from_date`, `to_date`, `category_id`, `product_id`, `amount`, `status`, `approval_status`, `created_date`, `created_usertype`, `created_userid`, `updated_date`, `updated_usertype`, `updated_userid`) VALUES (";
            $query .= "'', '$offername', '$code', '$fromdate', '$todate', '$cateid', '$proid', '$amount', '$status', '$approval_status', '$date', '5', '$userid', '$date', '5', '$userid')";
            $result = $this->db->query($query);
             if ($result) {
                    $resp["success"] = 1;
                    $resp["notification"] = "Combo Offer Inserted Sucessfully";
                
            } else {
                $resp["success"] = 0;
                $resp["notification"] = "Combo Offer Not Inserted Sucessfully";
            }
            echo json_output($response['status'], $resp);
        }
    }
}
