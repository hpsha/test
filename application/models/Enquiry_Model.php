<?php

class Enquiry_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_customername() {
        $where = "enquiry_act=1";
        return $this->db->select('enquiry_id,enquiry_cus_name')->from('tbl_enquiry')->where($where)->get()->result();
    }

    public function list_new_enquiry($eid) {
        $where = "(enquiry_status='New' and enquiry_empid='$eid') or (enquiry_status='Processing' and enquiry_empid='$eid')";
        $q1 = $this->db->select('enquiry_no, enquiry_cus_name,enquiry_status')->from('tbl_enquiry')->where($where)->get()->num_rows();
        if ($q1 != 0) {
            $q1 = $this->db->select('enquiry_id,enquiry_no, enquiry_cus_name,enquiry_status')->from('tbl_enquiry')->where($where)->get()->result();

            return array('status' => 1, 'data' => $q1);
        } else {
            return array('status' => 0, 'data' => 0);
        }
    }

    public function list_success_enquiry($eid) {
        $where = "enquiry_status='Completed' and enquiry_empid='$eid'";
        $q1 = $this->db->select('enquiry_no, enquiry_cus_name,enquiry_status')->from('tbl_enquiry')->where($where)->get()->num_rows();
        if ($q1 != 0) {
            $q1 = $this->db->select('enquiry_id,enquiry_no, enquiry_cus_name,enquiry_status')->from('tbl_enquiry')->where($where)->get()->result();
            return array('status' => 1, 'data' => $q1);
        } else {
            return array('status' => 0, 'data' => 0);
        }
    }

    public function list_dropped_enquiry($eid) {
        $where = "enquiry_status='Drop' and enquiry_empid='$eid'";
        $q1 = $this->db->select('enquiry_no, enquiry_cus_name,enquiry_status')->from('tbl_enquiry')->where($where)->get()->num_rows();
        if ($q1 != 0) {
            $q1 = $this->db->select('enquiry_id,enquiry_no, enquiry_cus_name,enquiry_status')->from('tbl_enquiry')->where($where)->get()->result();
            return array('status' => 1, 'data' => $q1);
        } else {
            return array('status' => 0, 'data' => 0);
        }
    }

    public function view_enquiry($eid) {
        $where = "enquiry_no='$eid'";
        $q1 = $this->db->select('`enquiry_id`, `enquiry_no`, `enquiry_cus_name`, `customer_type`, `enquiry_cus_mobileno`,'
                        . ' `enquiry_cus_email`, `enquiry_cus_area`, `enquiry_cus_image`, `enquiry_desc`, `enquiry_project`,'
                        . ' `enquiry_com_project`, `enquiry_empid`, `enquiry_status`, `enquiry_qty`, `referred_by`, `design_sheet`,'
                        . ' `enquiry_sq_ft`, `enquiry_createdon`, `enquiry_updatedon`, `enquiry_act`')->from('tbl_enquiry')->where($where)->get()->num_rows();
        if ($q1 != 0) {
            $q1 = $this->db->select('*')->from('tbl_enquiry')->where($where)->get()->result();
            return array('status' => 1, 'data' => $q1);
        } else {
            return array('status' => 0, 'data' => 0);
        }
    }

    public function add_enquiry($branch_id, $aid, $uid, $loc, $sname, $cusname, $mobileno, $landline, $area, $image, $userid, $lat, $lon, $previous, $type, $remarks) {



        $binary = $image;
        $bn = explode("IMAGE:", $image);
        $m = count($bn);

        $date = date("Y-m-d H:i:s");
        $dates = date("Y-m-d");
        $wheres = "shop_contact=$mobileno and date(`shop_created_on`)='$dates'";
        $q = $this->db->select('agency_id')->from('tbl_shop')->where($wheres)->get()->num_rows();
        if ($q == 0) {
            $wheres = "agencies_id=$aid";
            $service_url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lon . '&key=AIzaSyB77iOLBywXmbZHUNNqqfYDutbk5aBYWog';
            $curl = curl_init($service_url);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $curl_response = curl_exec($curl);
            $output = json_decode($curl_response);


            $address = $output->results[0]->formatted_address;
            $q1 = $this->db->insert('tbl_shop', array('branch_id' => $branch_id, 'shop_types' => $type, 'remarks' => $remarks, 'loc_id' => $loc, 'lat' => $lat, 'lon' => $lon, 'address' => $address, 'agency_id' => $aid, 'emp_id' => '$uid', 'shop_name' => $sname, 'shop_owner_name' => $cusname, 'shop_contact' => $mobileno, 'shop_landline' => $landline, 'shop_location' => 0, 'shop_previous' => $area, 'shop_previous' => $previous, 'shop_type' => $type, 'shop_created_on' => $date, 'shop_act' => 1));
            $id = $this->db->insert_id();
            for ($i = 0; $i < $m; $i++) {
                $filename = $id;
                $filename .= $i;
                $filename .= date('Y_m_d_H_i_s') . ".jpg";
                $binarys = $bn[$i];
                if ($binarys != '') {
                    $binary = base64_decode($binarys);
                    $file = fopen('uploads/' . $filename, 'wb');
                    $filenames = base_url() . "uploads/" . $filename;
                    fwrite($file, $binary);
                    fclose($file);
                    $q1 = $this->db->insert('tbl_shop_image', array('img_path' => $filenames, 'shop_id' => $id, 'img_act' => 1));
                } else {
                    $filenames = '';
                }
            }
            $q1 = $this->db->set('agencies_outlet', 'agencies_outlet+1', false)->where($wheres)->update('tbl_agencies');
            if ($q1) {
                return array('status' => 1, 'data' => "Successfully Inserted");
            } else {
                return array('status' => 0, 'data' => "Error Occured");
            }
        } else {
            return array('status' => 2, 'data' => "Already Exist");
        }
    }

    public function update_shop($shopid,$uid,$sname,$cusname, $mobileno, $landline, $area, $userid,  $lat, $lon,$previous,$type,$remarks) {
        $date = date("Y-m-d H:i:s");
        $dates = date("Y-m-d");
        $wheres = "shop_contact=$mobileno";
        $q = $this->db->select('agency_id')->from('tbl_shop')->where($wheres)->get()->num_rows();
        if ($q != 0) {

            $service_url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lon . '&key=AIzaSyB77iOLBywXmbZHUNNqqfYDutbk5aBYWog';
            $curl = curl_init($service_url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $curl_response = curl_exec($curl);
            $output = json_decode($curl_response);
            $address = $output->results[0]->formatted_address;
            $where = "shop_id='$shopid'";
            $q1 = $this->db->where($where)->update('tbl_shop', array('shop_types' => $type, 'remarks' => $remarks, 'lat' => $lat, 'lon' => $lon, 'address' => $address,  'emp_id' => $uid, 'shop_name' => $sname, 'shop_owner_name' => $cusname, 'shop_contact' => $mobileno, 'shop_landline' => $landline, 'shop_location' => $area, 'shop_previous' => $previous, 'shop_type' => $type, 'shop_created_on' => $date, 'shop_act' => 1));
            
            if ($q1) {
                return array('status' => 1, 'data' => "Successfully Updated..!");
            } else {
                return array('status' => 0, 'data' => "Error Occured");
            }
        } else {
            return array('status' => 2, 'data' => "Already Exist");
        }
    }
    
    
    public function addorder($shop_id, $products, $user_id, $branch_id, $shop_type) {
        $product_array = explode(",", $products);
        $count = count($product_array);
        $ss = "select agency_id,tbl_agencies.order_amt from tbl_shop join tbl_agencies on tbl_shop.agency_id=tbl_agencies.agencies_id where shop_id=$shop_id";
        $sss = $this->db->query($ss)->row();
        $prices = 0;
        $res=$this->db->query("select order_no from tbl_order where order_type=1  order by order_id desc ")->row();
                $rescount=$this->db->query("select order_no from tbl_order where order_type=1 order by order_id desc")->row();
if($rescount>0){
        $nos=$res->order_no;
        $nos = substr($nos, 3);
        $nos=$nos+1;
        $no='CSR';
if($nos<9){
    $no.="00";
    $no.=$nos;
}
if($nos>9 && $nos<99){
    $no.="0";
    $no.=$nos;
}if($nos>99){
   
    $no.=$nos;
}
}
else{
    $no="CSR001";
}
        for ($i = 0; $i < $count; $i++) {

            $product_arrays = explode("-", $product_array[$i]);

            $Quantity = $product_arrays[2];
            $Price = $product_arrays[3];
            $prices = $Price + $prices;
            $pid = $product_arrays[0];
            $date = date("Y-m-d H:i:s");
            $gid = $product_arrays[1];
            $qq = "update tbl_shop set branch_id=$branch_id and shop_types=$shop_type where shop_id=$shop_id";
            $this->db->query($qq);
            


            $q1 = $this->db->insert('tbl_order', array('order_no'=>$no,'order_type' => '1','shop_type' => $shop_type, 'user_id' => $user_id, 'product_id' => $pid, 'product_group_id' => $gid, 'shop_id' => $shop_id, 'qty' => $Quantity, 'price' => $Price, 'created_on' => $date, 'act' => 1));
        }
        $ord = $sss->order_amt;
        $prices;
        $agid = $sss->agency_id;
        if ($shop_type == 1 || $shop_type == 2) {
            $ords = $ord - $prices;
        }
        if ($shop_type == 3) {
            $ords = $ord + $prices;
        }
        $qq = $this->db->query("update tbl_agencies set order_amt=$ords where agencies_id=$agid");
        $date=date("Y-m-d");
        $this->db->query("update tbl_target set `reached_target`=`reached_target`+$prices WHERE salesPersonid='$user_id' and '$date' between from_date and to_date ");
        if ($q1) {
            return array('status' => 1, 'data' => "Successfully Inserted");
        } else {
            return array('status' => 0, 'data' => "Error Occursed");
        }
    }

    public function update_enquiry($enq_no, $cusname, $mobileno, $emailid, $area, $image, $userid, $qty, $sq_ft, $location_lat, $location_lon, $desc, $project_status, $complete, $type, $refered_by, $design_sheet) {

        $filename = date('Y_m_d_H_i_s') . ".jpg";
        $binarys = $image;
        if ($binarys != '') {
            $binary = base64_decode($binarys);
            $file = fopen('uploads/' . $filename, 'wb');
            $filenames = base_url() . "uploads/" . $filename;
            fwrite($file, $binary);
            fclose($file);
        }
        $where = "`enquiry_no`=$enq_no";

        if ($binarys != '') {
            $q1 = $this->db->where($where)->update('tbl_enquiry', array('enquiry_cus_name' => $cusname, 'enquiry_cus_mobileno' => $mobileno, 'enquiry_cus_email' => $emailid,
                'enquiry_cus_area' => $area, 'enquiry_cus_image' => $filenames, 'enquiry_empid' => $userid, 'enquiry_status' => 'New', 'enquiry_qty' => $qty, 'enquiry_sq_ft' => $sq_ft, 'location_lat' => $location_lat,
                'location_lon' => $location_lon, 'enquiry_desc' => $desc, 'enquiry_project' => $project_status, 'enquiry_com_project' => $complete, 'customer_type' => $type, 'referred_by' => $refered_by, 'design_sheet' => $design_sheet));
        } else {
            $q1 = $this->db->where($where)->update('tbl_enquiry', array('enquiry_cus_name' => $cusname, 'enquiry_cus_mobileno' => $mobileno, 'enquiry_cus_email' => $emailid,
                'enquiry_cus_area' => $area, 'enquiry_empid' => $userid, 'enquiry_status' => 'New', 'enquiry_qty' => $qty, 'enquiry_sq_ft' => $sq_ft, 'location_lat' => $location_lat,
                'location_lon' => $location_lon, 'enquiry_desc' => $desc, 'enquiry_project' => $project_status, 'enquiry_com_project' => $complete, 'customer_type' => $type, 'referred_by' => $refered_by, 'design_sheet' => $design_sheet));
        }
        if ($q1) {
            return array('status' => 1, 'data' => "Successfully Inserted");
        } else {
            return array('status' => 0, 'data' => "Error Occured");
        }
    }

    public function user_registration($name, $Username, $Mobile, $Password, $Lattitude, $Longitude, $GCM, $rand) {
      

       
            return array('status' => 0, 'data' => "Already  Exit");
       
    }

    public function get_agencies() {
 $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id']; 
        if ($usertype == 3) {
         $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;
            $where="agencies_id in ($agencies_id) and agencies_act=1";
        }
        else{
                        $where="agencies_act=1";

        }
        $q = $this->db->select('agencies_emp_id')->from('tbl_agencies')->where($where)->get()->num_rows();
        $response = array();

        if ($q > 0) {
            $q = $this->db->select('*')->from('tbl_agencies')->where($where)->get()->result();
            foreach ($q as $row) {
                $dis_profile = array();
                $dis_profile["agencies_id"] = $row->agencies_id;
                $id = $row->agencies_id;
                $eid = $row->agencies_emp_id;
                $wheres = "employee_id=$eid";
                $wheresr = "agency_id=$id";
                $qsc = $this->db->select('count(*) as t')->from('tbl_shop')->where($wheresr)->get()->num_rows();
                $dis_profile["count"] = $row->agencies_outlet;
                $dis_profile["agencies_name"] = $row->agencies_name;
                $dis_profile["order_amt"] = $row->order_amt;
                //$dis_profile["user_id"] = $row->user_id;
                array_push($response, $dis_profile);
            }
            return $response;

            // push single location into final response array
        }
    }

    public function get_agenciesreports($date) {
         $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id']; 
        if ($usertype == 3) {
         $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;
            $where="agency_id in ($agencies_id) and date='$date'";
        }
        else{
                        $where="agencies_act=1";

        }
     
        $q = $this->db->select('*')->from('tbl_agencies_locations')->where($where)->group_by('agency_id')->get()->result();
        return $q;
    }

    public function locations() {
        $q = $this->db->select('*')->from('tbl_location')->get()->result();
        return $q;
    }

    public function shop_list($user_id) {
        $where = "shop_act ='1'";
        $q = $this->db->select('shop_id')->from('tbl_shop')->where($where)->get()->num_rows();
        if ($q > 0) {
            $response = array();
            $wheres = "employee_id ='$user_id' and 	admin_type=1";
            $m = $this->db->select('employee_id')->from('tbl_admin')->where($wheres)->get()->num_rows();
            if ($m > 0) {


                $q = $this->db->select('shop_id, tbl_agencies.agencies_name,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, shop_types as shop_type')
                                ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->limit(400,0)->order_by('shop_id','ASC')->get()->result();
                foreach ($q as $row) {
                    $dis_profile = array();
$disprofile['shop_id']=$row->shop_id;
$disprofile['agencies_name']=$row->agencies_name;
$disprofile['remarks']=$row->remarks;
$disprofile['shop_name']=$row->shop_name;
$disprofile['shop_owner_name']=$row->shop_owner_name;
$disprofile['shop_contact']=$row->shop_contact;
$disprofile['shop_landline']=$row->shop_landline;
$disprofile['shop_location']=$row->shop_location;
$disprofile['shop_photos']=$row->shop_photos;
$disprofile['shop_previous']=$row->shop_previous;
if($row->shop_type==1){
    $type="Retail";
}
if($row->shop_type==2){
    $type="Wholesale";
}
if($row->shop_type==3){
    $type="Distributor";
}
$disprofile['shop_type']=$type;
                    array_push($response, $disprofile);
                }

                // push single location into final response array
                return array('success' => 1, 'message' => $response);
            } else {
                $date = date("Y-m-d");
                $wherem = "shop_act=1 and emp_id=$user_id and date(shop_created_on)='$date'";
                $q = $this->db->select('shop_id, tbl_agencies.agencies_name,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, shop_type')
                                ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($wherem)->get()->result();
                foreach ($q as $row) {
                    $dis_profile = array();


                    array_push($response, $row);
                }

                // push single location into final response array
                return array('success' => 1, 'message' => $response);
            }
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }
    
     public function shop_lists($user_id, $start, $limit) {
        $where = "shop_act ='1'";
        $q = $this->db->select('shop_id')->from('tbl_shop')->where($where)->get()->num_rows();
        if ($q > 0) {
            $response = array();
            $wheres = "employee_id ='$user_id' and admin_type=1";
            $m = $this->db->select('employee_id')->from('tbl_admin')->where($wheres)->get()->num_rows();
            if ($m > 0) {
                    
                $q = $this->db->select('shop_id, tbl_agencies.agencies_name,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, shop_type')
                                ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->limit($start,$limit)->order_by('shop_id','ASC')->get()->result();
                foreach ($q as $row) {
                    $dis_profile = array();


                    array_push($response, $row);
                }

                // push single location into final response array
                return array('success' => 1, 'message' => $response);
            } else {
                $date = date("Y-m-d");
                $wherem = "shop_act=1 and emp_id=$user_id and date(shop_created_on)='$date'";
                $q = $this->db->select('shop_id, tbl_agencies.agencies_name,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, shop_type')
                                ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($wherem)->limit($start,$limit)->get()->result();
                foreach ($q as $row) {
                    $dis_profile = array();


                    array_push($response, $row);
                }

                // push single location into final response array
                return array('success' => 1, 'message' => $response);
            }
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }

    public function order_list($user_id) {
         $date = date("Y-m-d");
        $where = "act ='1'";
        $q = $this->db->select('order_id')->from('tbl_order')->where($where)->get()->num_rows();
        $response = array();
        $wheres = "employee_id ='$user_id' and admin_type=1";
        $m = $this->db->select('employee_id')->from('tbl_admin')->where($wheres)->get()->num_rows();
        if ($q > 0) {
            if ($m > 0) {



                $q = $this->db->select('tbl_shop.shop_name, sum(qty) as qty,sum(price) as price,')
                                ->join('tbl_product', 'tbl_product.product_id=tbl_order.product_id')
                                ->join('tbl_productgroup', 'tbl_productgroup.productgroup_id=tbl_order.product_group_id')
                                ->join('tbl_shop', 'tbl_shop.shop_id=tbl_order.shop_id')->from('tbl_order')->where($where)->group_by('tbl_shop.shop_id')->limit(500,0)->get()->result();
                foreach ($q as $row) {
                    $dis_profile = array();


                    array_push($response, $row);
                }

                // push single location into final response array
                return array('success' => 1, 'message' => $response);
            } else {
               
                $wherem = "shop_act=1 and emp_id=$user_id and date(shop_created_on)='$date'";
                $q = $this->db->select('shop_id, tbl_agencies.agencies_name,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, shop_type')
                                ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($wherem)->get()->result();
                foreach ($q as $row) {
                    $dis_profile = array();


                    array_push($response, $row);
                }

                // push single location into final response array
                return array('success' => 1, 'message' => $response);
            }
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }

    public function order_lisst($user_id) {
        $where = "act ='1'";
        $q = $this->db->select('order_id')->from('tbl_order')->where($where)->get()->num_rows();
        $response = array();
        $wheres = "employee_id ='$user_id' and admin_type=1 ";
        $m = $this->db->select('employee_id')->from('tbl_admin')->where($wheres)->get()->num_rows();
        if ($m > 0) {


            if ($q > 0) {
                $q = $this->db->select('tbl_shop.shop_id,tbl_shop.shop_name, sum(qty) as qty,sum(price) as price,')
                                ->join('tbl_product', 'tbl_product.product_id=tbl_order.product_id')
                                ->join('tbl_productgroup', 'tbl_productgroup.productgroup_id=tbl_order.product_group_id')
                                ->join('tbl_shop', 'tbl_shop.shop_id=tbl_order.shop_id')->from('tbl_order')->where($where)->group_by('tbl_shop.shop_id')->get()->result();
                foreach ($q as $row) {
                    $dis_profile = array();


                    array_push($response, $row);
                }

                // push single location into final response array
                return array('success' => 1, 'message' => $response);
            } else {
                return array('success' => 0, 'data' => "Error Occured");
            }
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }

    public function user_shop_list($user_id) {
        if ($user_id == 0) {
            $date = date('Y-m-d');
            $where = "shop_act ='1' and emp_id=$user_id and  shop_id not IN (SELECT shop_id from tbl_order)  and date(`shop_created_on`)='$date'";
            $q = $this->db->select('shop_id')->from('tbl_shop')->where($where)->get()->num_rows();
            $response = array();


            if ($q > 0) {
                $q = $this->db->select('shop_id,shop_name')->from('tbl_shop')->where($where)->get()->result();
                foreach ($q as $row) {
                    $dis_profile = array();


                    array_push($response, $row);
                }

                // push single location into final response array
                return array('success' => 1, 'message' => $response);
            } else {
                return array('success' => 0, 'data' => "Error Occured");
            }
        } else {
            $date = date('Y-m-d');
            $wheres="emp_id =$user_id";
            $mm='';
              $q = $this->db->select('agency_id')->from('tbl_agencies_location')->where($wheres)->get()->result();
         // print_r($this->db->last_query());exit();
              foreach ($q as $t){
                  $mm.=$t->agency_id;
                   $mm.=",";
              }
             $mm= substr($mm, 0, -1);
              if($mm!=''){
            $where = "shop_act ='1' and emp_id=$user_id and tbl_shop.agency_id in ($mm)";
           
         
            $q = $this->db->select('shop_id')->from('tbl_shop')->where($where)->get()->num_rows();
            $response = array();


            if ($q > 0) {
                $q = $this->db->select('shop_id,shop_name,shop_contact')->from('tbl_shop')->where($where)->get()->result();
                foreach ($q as $row) {
                    $dis_profile = array();
                    $dis_profile['shop_id'] = $row->shop_id;
                    $name = $row->shop_name;
                    $name.=",";
                    $name.= $row->shop_contact;
                    $dis_profile['shop_name'] = $name;
                    array_push($response, $dis_profile);
                }

                // push single location into final response array
                return array('success' => 1, 'message' => $response);
                   }
            } else {
                return array('success' => 0, 'data' => "Error Occured");
            }
        }
    }

//    public function productlist($groupid) {
//        $where = "product_act ='1' and productgroup_id=$groupid";
//        $q = $this->db->select('productgroup_id')->from('tbl_product')->where($where)->get()->num_rows();
//        $response = array();
//  
//
//        if ($q > 0) {
//            $q = $this->db->select('product_id,product_name,product_price')->from('tbl_product')->where($where)->get()->result();
//            foreach ($q as $row) {
//                $dis_profile = array();
//              
//            
//                array_push($response, $row);
//            }
//
//            // push single location into final response array
//            return array('success' => 1, 'message' => $response);
//        } else {
//            return array('success' => 0, 'data' => "Error Occured");
//       }
//        
//    }
    public function productlist($group_id, $branch_id, $shop_type) {
        $where = "product_act ='1' and productgroup_id=$group_id";
        $q = $this->db->select('productgroup_id')->from('tbl_product')->where($where)->get()->num_rows();
        $response = array();

        if ($q > 0) {
            $q = $this->db->select('product_id,product_name')->from('tbl_product')->where($where)->get()->result();
            foreach ($q as $row) {
                $dis_profile = array();
                $pid = $row->product_id;
                $dis_profile['product_id'] = $pid;
                $dis_profile['product_name'] = $row->product_name;

                $wheres = "product_id =$pid and act=1 and branch_id=$branch_id and retail_price!='' and retail_price!=0 and distributor_price!='' and  distributor_price!=0";

                $qs = $this->db->select('product_id')->from('tbl_price')->where($wheres)->get()->num_rows();
                if ($qs > 0) {
                    $qsw = $this->db->select('retail_price,distributor_price')->from('tbl_price')->where($wheres)->get()->row();
                    if ($shop_type == 1 || $shop_type == 2) {
                        $dis_profile['product_price'] = $qsw->retail_price;
                    } elseif ($shop_type == 3) {
                        $dis_profile['product_price'] = $qsw->distributor_price;
                    }
                    array_push($response, $dis_profile);
                }
            }

            // push single location into final response array
            return array('success' => 1, 'message' => $response);
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }

    public function productgrouplist() {
        $where = "productgroup_status ='1'";
        $q = $this->db->select('productgroup_name')->from('tbl_productgroup')->where($where)->get()->num_rows();
        $response = array();


        if ($q > 0) {
            $q = $this->db->select('productgroup_id,productgroup_name')->from('tbl_productgroup')->where($where)->get()->result();
            foreach ($q as $row) {
                $dis_profile = array();


                array_push($response, $row);
            }

            // push single location into final response array
            return array('success' => 1, 'message' => $response);
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }

    public function agencylocation_list($aid, $eid) {
        $where = "agency_id ='$aid' and FIND_IN_SET($eid,emp_id) and act=1";
        $q = $this->db->select('location_id')->from('tbl_agencies_location')->where($where)->get()->num_rows();
        $response = array();

        if ($q > 0) {
            $qs = $this->db->select('location_id')->from('tbl_agencies_location')->where($where)->get()->result();
            $response = array();
            foreach ($qs as $r) {
                $row = array();
                $lid = $r->location_id;
                $where = "location_id ='$lid'";

                $qsm = $this->db->select('location_name,location_id')->from('tbl_location')->where($where)->get()->row();


                $row['location_name'] = $qsm->location_name;
                $row['location_id'] = $qsm->location_id;

                array_push($response, $row);
            }

            // push single location into final response array
            return array('success' => 1, 'message' => $response);
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }

    public function task_list($user_id) {
        $where = "schedule_assigned_to =$user_id and schedule_note='' ";
        $q = $this->db->select('schedule_assigned_to')->from('tb_schedule')->where($where)->get()->num_rows();

        $response = array();

        if ($q > 0) {
            $q = $this->db->select('*')->from('tb_schedule')->where($where)->get()->result();

            foreach ($q as $row) {
                $dis_profile = array();

                $dis_profile["schedule_id"] = $row->schedule_id;
                $dis_profile["schedule_title"] = $row->schedule_title;
                $dis_profile["schedule_description"] = $row->schedule_description;
                $dis_profile["schedule_note"] = $row->schedule_note;
                $dis_profile["schedule_date"] = $row->schedule_date;
                array_push($response, $dis_profile);
            }

            // push single location into final response array
            return array('success' => 1, 'schedule' => $response);
        } else {
            return array('success' => 0, 'message' => "Error Occured");
        }
    }

    public function schedule_list($user_id) {
        $where = "task_created_by ='$user_id'";
        $q = $this->db->select('task_created_by')->from('tb_task')->where($where)->get()->num_rows();
        $response = array();

        if ($q > 0) {
            $q = $this->db->select('*')->from('tb_task')->where($where)->get()->result();
            foreach ($q as $row) {
                $dis_profile = array();
                $dis_profile["task_id"] = $row->task_id;

                $dis_profile["task_name"] = $row->task_name;
                $dis_profile["task_description"] = $row->task_description;
                $dis_profile["task_note"] = $row->task_note;
                $dis_profile["task_date"] = $row->task_date;
                array_push($response, $dis_profile);
            }

            // push single location into final response array
            return array('success' => 1, 'schedule' => $response);
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }

    public function single_schedule($user_id) {
        $where = "task_id ='$user_id'";
        $q = $this->db->select('task_created_by')->from('tb_task')->where($where)->get()->num_rows();
        $response = array();

        if ($q > 0) {
            $q = $this->db->select('*')->from('tb_task')->where($where)->get()->result();
            foreach ($q as $row) {
                $dis_profile = array();
                $dis_profile["task_id"] = $row->task_id;

                $dis_profile["task_name"] = $row->task_name;
                $dis_profile["task_description"] = $row->task_description;
                $dis_profile["task_note"] = $row->task_note;
                $dis_profile["task_date"] = $row->task_date;
                array_push($response, $dis_profile);
            }

            // push single location into final response array
            return array('success' => 1, 'schedule' => $response);
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }

    public function single_task($user_id) {
        $where = "schedule_id =$user_id";
        $q = $this->db->select('schedule_assigned_to')->from('tb_schedule')->where($where)->get()->num_rows();

        $response = array();

        if ($q > 0) {
            $q = $this->db->select('*')->from('tb_schedule')->where($where)->get()->result();

            foreach ($q as $row) {
                $dis_profile = array();

                $dis_profile["schedule_id"] = $row->schedule_id;
                $dis_profile["schedule_title"] = $row->schedule_title;
                $dis_profile["schedule_description"] = $row->schedule_description;
                $dis_profile["schedule_note"] = $row->schedule_note;
                $dis_profile["schedule_date"] = $row->schedule_date;
                array_push($response, $dis_profile);
            }

            // push single location into final response array
            return array('success' => 1, 'task' => $response);
        } else {
            return array('success' => 0, 'message' => "Error Occured");
        }
    }

    public function update_location($user_id, $lat, $long) {
        $date = date('Y-m-d H:i:s');
        $qq = "select employee_latitude from tbl_employee where employee_act=1";
        $results = $this->db->query($qq)->num_rows();
        if ($results > 0) {
            $query = "update tbl_employee set `employee_latitude` ='$lat' , `employee_longitude` = '$long', `employee_last_seen` = '$date' where `employee_id` ='$user_id'";

            $result = $this->db->query($query);



            if ($result) {
                $time = date("H");

                if ($time > 9 || $time <= 18) {
                    $m = date('n');
                    $querys = "select `user_time` from `tbl_user_reports` where `user_id`='$user_id' order by `r_id` desc";
                    $result = $this->db->query($querys);
                    $rows = $result->num_rows();

                    if ($rows == 0) {
                        $query = "INSERT INTO `tbl_user_reports`(`user_id`, `user_time`, `user_latitude`, `user_longtitude`,`user_month`) VALUES ('$user_id','$date','$lat','$long',$m)";
                        $this->db->query($query);



                        // echoing JSON response
                    } else {
                        $date_array = $this->db->query($querys)->row();
                        $last_time = $date_array->user_time;
                        $current_time = date("Y-m-d H:i:s");
                        $to_time = strtotime($current_time);

                        $from_time = strtotime($last_time);
                        $minute = round(abs($to_time - $from_time) / 60);
                        if ($minute > 59) {
                            $query = "INSERT INTO `tbl_user_reports`(`user_id`, `user_time`, `user_latitude`, `user_longtitude`,`user_month`) VALUES ('$user_id','$date','$lat','$long',$m)";

                            $this->db->query($query);
                        }
                    }
                }
                return array('success' => 1, 'notification' => "Updated Successfully ");
            } else {

                return array('success' => 1, 'notification' => " Not Updated Successfully ");
            }
        } else {

            return array('success' => 1, 'notification' => " Not Updated Successfully ");
        }
    }

    public function user_attendance($user_id, $lat, $long) {
        $current_date = date('Y-m-d');
        $current_time = date('H:i:s');

        $query1 = "select * from tb_attendace where attendance_date = '$current_date' and attendance_user_id ='$user_id'";

        $result = $this->db->query($query1);
        if ($result->num_rows() > 0) {

            return array('success' => 2, 'notification' => "Attendance Present ");
        } else {
            $query = "INSERT INTO `tb_attendace`(`attendance_user_id`, `attendance_status`,`attendance_latitude`,`attendance_longitude`, `attendance_date`,`login_time`) VALUES ('$user_id','1','$lat','$long','$current_date','$current_time')";



            $result = $this->db->query($query);

            if ($result) {
                return array('success' => 1, 'notification' => "Attendance Added Sucessfully ");
            }
            // echoing JSON response
            else {
                return array('success' => 0, 'notification' => "Message Not Inserted Sucessfully ");
            }
        }
    }

    //NEW ENQUIRY PROCESS
    public function get_new_enq() {
        $where = "enquiry_status='New' AND  enquiry_act='1'";
        return $q1 = $this->db->select('enquiry_no,enquiry_cus_name,enquiry_id,enquiry_cus_mobileno,enquiry_cus_email,enquiry_empid')->from('tbl_enquiry')->where($where)->get()->result();
    }

    public function fetch_new_enq($key) {
        $where = "enquiry_no='$key' AND  enquiry_act='1'";
        return $q1 = $this->db->select('tbl_enquiry.enquiry_no,tbl_enquiry.enquiry_cus_name,tbl_enquiry.design_sheet,tbl_enquiry.referred_by,tbl_enquiry.customer_type,tbl_enquiry.enquiry_cus_area,tbl_enquiry.enquiry_cus_mobileno,tbl_enquiry.enquiry_cus_email,tbl_enquiry.enquiry_cus_image,tbl_enquiry.enquiry_desc,tbl_enquiry.enquiry_project,tbl_enquiry.enquiry_com_project,tbl_enquiry.enquiry_qty,tbl_enquiry.enquiry_sq_ft,tbl_enquiry.location_lat,tbl_enquiry.location_lon,tbl_employee.employee_name,tbl_employee.employee_phone')->from('tbl_enquiry')->join('tbl_employee', 'tbl_employee.employee_id=tbl_enquiry.enquiry_empid')->where($where)->get()->result();
    }

    public function update_new_quotaiton($data, $status) {
        $where = "quotaion_no =" . "'" . $data['quotaion_no'] . "'";
        // echo $where;
        $q = $this->db->select('quotaion_no')->from('tb_new_quotaion')->where($where)->get()->row();
        if ($q == "") {
            $condition = "enquiry_no =" . "'" . $data['enquiry_no'] . "'";
            $this->db->where($condition)->update('tbl_enquiry', array('enquiry_status' => $status));
            $q1 = $this->db->insert('tb_new_quotaion', $data);

            if ($q1) {
                return 1;
            } else {
                return 2;
            }
        } else {
            return 3;
        }
    }

    public function drop_new_quotaiton($datas, $quotaions) {
        $where = "enquiry_no =" . "'" . $datas['enquiry_no'] . "'";
        $this->db->where($where);
        if ($this->db->update('tbl_enquiry', $datas)) {
            $where = "enquiry_no =" . "'" . $quotaions['enquiry_no'] . "'";
            $this->db->where($where);
            $this->db->update('tb_new_quotaion', $quotaions);
            return 1;
        } else {
            return 2;
        }
    }

    //PROCESSING ENQUIRY PROCESS
    public function get_process_enq() {
        $where = "enquiry_status='Processing' AND  enquiry_act='1'";
        return $q1 = $this->db->select('enquiry_no,enquiry_cus_name,enquiry_id,enquiry_cus_mobileno,enquiry_cus_email,referred_by')->from('tbl_enquiry')->where($where)->get()->result();
    }

    public function fetch_processing_quotation($key) {
        $where = "enquiry_no='$key' AND  quotaion_act='1'";
        return $q1 = $this->db->select('quotaion_no,quotaion_id')->from('tb_new_quotaion')->where($where)->get()->result();
    }

    public function fetch_process_quota($id) {
        $where = "quotaion_id='$id' AND  quotaion_act='1'";
        return $q1 = $this->db->select('quotaion_date,quotaion_amount,quotaion_sq_feet,quotaion_qty')->from('tb_new_quotaion')->where($where)->get()->result();
    }

    public function update_complete_quotaiton($datas, $enquiry) {
        $where = "quotaion_id =" . "'" . $datas['quotaion_id'] . "' AND enquiry_no =" . "'" . $datas['enquiry_no'] . "' AND quotaion_act='1'";
        $this->db->where($where)->update('tb_new_quotaion', $datas);
        $condition = "enquiry_no =" . "'" . $enquiry['enquiry_no'] . "'";
        $q1 = $this->db->where($condition)->update('tbl_enquiry', $enquiry);
        if ($q1) {
            return 1;
        } else {
            return 2;
        }
    }

    //COMPLETED ENQUIRY PROCESS
    public function get_completed_enq() {
        $where = "enquiry_status='Completed' AND  enquiry_act='1'";
        return $q1 = $this->db->select('enquiry_no,enquiry_cus_name,enquiry_id,enquiry_cus_mobileno,enquiry_cus_email,referred_by,enquiry_updatedon')->from('tbl_enquiry')->where($where)->get()->result();
    }

    public function fetch_completed_enq($key) {
        $where = "tbl_enquiry.enquiry_no='$key' AND  tbl_enquiry.enquiry_act='1' AND tb_new_quotaion.quotaion_act='2'";
        return $q1 = $this->db->select('tbl_enquiry.design_sheet,tbl_enquiry.enquiry_act,tbl_enquiry.enquiry_no,tbl_enquiry.enquiry_cus_name,tbl_enquiry.design_sheet,tbl_enquiry.referred_by,tbl_enquiry.customer_type,tbl_enquiry.enquiry_cus_area,tbl_enquiry.enquiry_cus_mobileno,tbl_enquiry.enquiry_cus_email,tbl_enquiry.enquiry_cus_image,tbl_enquiry.enquiry_desc,tbl_enquiry.enquiry_project,tbl_enquiry.enquiry_com_project,tbl_enquiry.enquiry_qty,tbl_enquiry.enquiry_sq_ft,tbl_enquiry.location_lat,tbl_enquiry.location_lon,tbl_employee.employee_name,tbl_employee.employee_phone,tb_new_quotaion.quotaion_no,tb_new_quotaion.quotaion_act')->from('tbl_enquiry')->join('tbl_employee', 'tbl_employee.employee_id=tbl_enquiry.enquiry_empid')->join('tb_new_quotaion', 'tb_new_quotaion.enquiry_no=tbl_enquiry.enquiry_no')->where($where)->get()->result();
    }

    //DROPPED ENQUIRY PROCESS
    public function get_dropped_enq() {
        $where = "enquiry_status='Drop' AND  enquiry_act='0'";
        return $q1 = $this->db->select('enquiry_no,enquiry_cus_name,enquiry_id,enquiry_cus_mobileno,enquiry_cus_email,referred_by,enquiry_updatedon')->from('tbl_enquiry')->where($where)->get()->result();
    }

    public function delete_enq($data, $enq_no) {
        $this->db->where('enquiry_no', $enq_no);
        if ($this->db->update('tbl_enquiry', $data)) {
            return 1;
        } else {
            return 2;
        }
    }

    public function search($emp) {
        if ($emp == 'all') {
            $q = $this->db->select('tbl_enquiry.*,tbl_employee.employee_name')->from('tbl_enquiry')->join('tbl_employee', 'tbl_employee.employee_id=tbl_enquiry.enquiry_empid')->get()->result();
        } else {
            $where = "enquiry_empid='$emp'";
            $q = $this->db->select('tbl_enquiry.*,tbl_employee.employee_name')->from('tbl_enquiry')->join('tbl_employee', 'tbl_employee.employee_id=tbl_enquiry.enquiry_empid')->where($where)->get()->result();
        }
        if ($q) {
            return $q;
        } else {
            return 0;
        }
    }

    public function process($emp) {

        if ($emp == 'all') {

            $where = "enquiry_status='Processing' AND  enquiry_act='1'";
            $q = $this->db->select('tbl_enquiry.*,tbl_employee.employee_name')->from('tbl_enquiry')->join('tbl_employee', 'tbl_employee.employee_id=tbl_enquiry.enquiry_empid')->where($where)->get()->result();
        } else {
            $where = "enquiry_empid='$emp' and enquiry_status='Processing' AND  enquiry_act='1'";
            $q = $this->db->select('tbl_enquiry.*,tbl_employee.employee_name')->from('tbl_enquiry')->join('tbl_employee', 'tbl_employee.employee_id=tbl_enquiry.enquiry_empid')->where($where)->get()->result();
        }
        if ($q) {
            return $q;
        } else {
            return 0;
        }
    }

    public function complete($emp) {

        if ($emp == 'all') {

            $where = "enquiry_status='Completed' AND  enquiry_act='1'";
            $q = $this->db->select('tbl_enquiry.*,tbl_employee.employee_name')->from('tbl_enquiry')->join('tbl_employee', 'tbl_employee.employee_id=tbl_enquiry.enquiry_empid')->where($where)->get()->result();
        } else {
            $where = "enquiry_empid='$emp' and enquiry_status='Completed' AND  enquiry_act='1'";
            $q = $this->db->select('tbl_enquiry.*,tbl_employee.employee_name')->from('tbl_enquiry')->join('tbl_employee', 'tbl_employee.employee_id=tbl_enquiry.enquiry_empid')->where($where)->get()->result();
        }
        if ($q) {
            return $q;
        } else {
            return 0;
        }
    }

    public function fetch_agencies($id) {

        $where = "agencies_id=$id";
        return $this->db->select('*')->from('tbl_agencies')->where($where)->get()->result();
    }

    public function agencies_list($user_id, $branch_id) {

        $q = $this->db->query("select emp_id from tbl_agencies_location where find_in_set($user_id,emp_id) and branch_id=$branch_id")->num_rows();

        $response = array();
        if ($q > 0) {
            $q = $this->db->query("select * from tbl_agencies_location where find_in_set($user_id,emp_id) and branch_id=$branch_id group by agency_id")->result();

            foreach ($q as $row) {
                $dis_profile = array();
                $aid = $row->agency_id;
                $wheres = "agencies_id=$aid";
                $qs = $this->db->select('*')->from('tbl_agencies')->where($wheres)->get()->row();


                $dis_profile["agencies_id"] = $row->agency_id;

                $dis_profile["agencies_name"] = $qs->agencies_name;

                array_push($response, $dis_profile);
            }

            // push single location into final response array
            return array('success' => 1, 'message' => $response);
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }

    /* public function agencies_list($user_id) {

      $q = $this->db->query("select emp_id from tbl_agencies_location where find_in_set($user_id,emp_id)")->num_rows();
      $response = array();
      if ($q > 0) {
      $q = $this->db->query("select * from tbl_agencies_location where find_in_set($user_id,emp_id) group by agency_id")->result();

      foreach ($q as $row) {
      $dis_profile = array();
      $aid= $row->agency_id;
      $wheres="agencies_id=$aid";
      $qs = $this->db->select('*')->from('tbl_agencies')->where($wheres)->get()->row();


      $dis_profile["agencies_id"] = $row->agency_id;

      $dis_profile["agencies_name"] = $qs->agencies_name;

      array_push($response, $dis_profile);
      }

      // push single location into final response array
      return array('success' => 1, 'message' => $response);
      } else {
      return array('success' => 0, 'data' => "Error Occured");
      }
      } */

//    public function agencieslist($user_id) {
//        $where = "";
//        $q = $this->db->query("select emp_id from tbl_agencies_location where find_in_set($user_id,emp_id) group by agency_id")->num_rows();
//        $response = array();
//
//        if ($q > 0) {
//            $q = $this->db->query("select * from tbl_agencies_location where find_in_set($user_id,emp_id) group by agency_id")->result();
//            foreach ($q as $row) {
//                $names = '';
//                $dis_profile = array();
//                $aid = $row->agency_id;
//                $wheres = "agencies_id=$aid";
//                $wheresy = "find_in_set($user_id,emp_id) and agency_id='$aid'";
//                $qsr = $this->db->select('location_id')->from('tbl_agencies_location')->where($wheresy)->get()->num_rows();
//                if ($qsr > 0) {
//
//                    $qr = $this->db->select('location_id')->from('tbl_agencies_location')->where($wheresy)->get()->result();
//                    foreach ($qr as $tm) {
//                        $dd = $tm->location_id;
//                        $wherem = "location_id in($dd)";
//                        $qts = $this->db->select('location_name')->from('tbl_location')->where($wherem)->get()->result();
//                        foreach ($qts as $qq) {
//                            $names .= $qq->location_name;
//                            $names .= ",";
//                        }
//                    }
//                } else {
//                    $names .= "";
//                }
//
//                $qs = $this->db->select('*')->from('tbl_agencies')->where($wheres)->get()->row();
//
//
//                $dis_profile["agencies_id"] = $row->agency_id;
//                $dis_profile["location_name"] = $names;
//                $dis_profile["agencies_name"] = $qs->agencies_name;
//                $dis_profile["agencies_outlet"] = $qs->agencies_outlet;
//                array_push($response, $dis_profile);
//            }
//
//            // push single location into final response array
//            return array('success' => 1, 'message' => $response);
//        } else {
//            return array('success' => 0, 'data' => "Error Occured");
//        }
//    }
    public function agencieslist($user_id) {
        $where = "";
        $q = $this->db->query("select emp_id from tbl_agencies_location where find_in_set($user_id,emp_id)  group by agency_id")->num_rows();
        $response = array();

        if ($q > 0) {
            $q = $this->db->query("select * from tbl_agencies_location where find_in_set($user_id,emp_id)   group by agency_id")->result();
            foreach ($q as $row) {
                $names = '';
                $dis_profile = array();
                $aid = $row->agency_id;
                $wheres = "agencies_id=$aid";
                $wheresy = "find_in_set($user_id,emp_id) and agency_id='$aid'";
                $qsr = $this->db->select('location_id')->from('tbl_agencies_location')->where($wheresy)->get()->num_rows();
                if ($qsr > 0) {

                    $qr = $this->db->select('location_id')->from('tbl_agencies_location')->where($wheresy)->get()->result();
                    foreach ($qr as $tm) {
                        $dd = $tm->location_id;
                        $wherem = "location_id in($dd)";
                        $qts = $this->db->select('location_name')->from('tbl_location')->where($wherem)->get()->result();
                        foreach ($qts as $qq) {
                            $names .= $qq->location_name;
                            $names .= ",";
                        }
                    }
                } else {
                    $names .= "";
                }

                $qs = $this->db->select('*')->from('tbl_agencies')->where($wheres)->get()->row();


                $dis_profile["agencies_id"] = $row->agency_id;
                $dis_profile["location_name"] = $names;
                $dis_profile["agencies_name"] = $qs->agencies_name;
                $dis_profile["agencies_outlet"] = $qs->agencies_outlet;
                array_push($response, $dis_profile);
            }

            // push single location into final response array
            return array('success' => 1, 'message' => $response);
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }

    public function branchlist() {

        $where = "branch_act=1";
        $qsr = $this->db->select('branch_id')->from('tbl_branch')->where($where)->get()->num_rows();
        if ($qsr > 0) {
            $data = $this->db->select('branch_name,branch_id')->from('tbl_branch')->where($where)->get()->result();
            return array('success' => 1, 'message' => $data);
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }
	public function shop_searching($user_id, $search) {
		$start = 10;
		$limit = 100;
        $where = "shop_act ='1'";
        $q = $this->db->select('shop_id')->from('tbl_shop')->where($where)->get()->num_rows();
        if ($q > 0) {
            $response = array();
            $wheres = "employee_id ='$user_id' and admin_type=1";
            $m = $this->db->select('employee_id')->from('tbl_admin')->where($wheres)->get()->num_rows();
            if ($m > 0) {
                $where1 = "(shop_contact like '%$search%' or shop_name like '%$search%') and shop_act ='1'";
                $q = $this->db->select('shop_id, tbl_agencies.agencies_name,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, shop_types as shop_type')
                                ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where1)->order_by('shop_id','ASC')->get()->result();
                $q1 = $this->db->select('shop_id, tbl_agencies.agencies_name,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, shop_type')
                                ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where1)->order_by('shop_id','ASC')->get()->num_rows();
                foreach ($q as $row) {
                    $dis_profile = array();
       $dis_profile = array();
$disprofile['shop_id']=$row->shop_id;
$disprofile['agencies_name']=$row->agencies_name;
$disprofile['remarks']=$row->remarks;
$disprofile['shop_name']=$row->shop_name;
$disprofile['shop_owner_name']=$row->shop_owner_name;
$disprofile['shop_contact']=$row->shop_contact;
$disprofile['shop_landline']=$row->shop_landline;
$disprofile['shop_location']=$row->shop_location;
$disprofile['shop_photos']=$row->shop_photos;
$disprofile['shop_previous']=$row->shop_previous;
if($row->shop_type==1){
    $type="Retail";
}
if($row->shop_type==2){
    $type="Wholesale";
}
if($row->shop_type==3){
    $type="Distributor";
}
$disprofile['shop_type']=$type;

                    array_push($response, $disprofile);
                }

                // push single location into final response array
                if($q1 > 0){
                    return array('success' => 1, 'message' => $response);
                }else{
                    return array('success' => 0, 'message' => $response);
                }
                
            } else {
                $date = date("Y-m-d");
                $where1 = "(shop_contact like '%$search%' or shop_name like '%$search%') and shop_act ='1'";
                $q = $this->db->select('shop_id, tbl_agencies.agencies_name,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, shop_type')
                                ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where1)->get()->result();
                $q1= $this->db->select('shop_id, tbl_agencies.agencies_name,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, shop_type')
                                ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where1)->get()->num_rows();
                foreach ($q as $row) {
                    $dis_profile = array();


                    array_push($response, $row);
                }

                // push single location into final response array
                 if($q1 > 0){
                     return array('success' => 1, 'message' => $response);
                 }else{
                     return array('success' => 0, 'message' => $response);
                 }
                
            }
        } else {
            return array('success' => 0, 'data' => "Error Occured");
        }
    }
	 public function return_list($userid){
        $where = "employee_id='$userid'";
        $q = $this->db->select('employee_id')->from('tbl_employee')->where($where)->get()->num_rows();
        $response = array();
        if ($q > 0) {
            $wheres= "created_userid='$userid'";
            $q1 = $this->db->select('*')->from('tb_salesreturn')->where($wheres)->get()->result();
            foreach ($q1 as $row) {
                $res = $this->db->select('*')->from('tbl_product')->where('product_id='.$row->product_id.' and product_act=1')->get()->result();
                $shop = $this->db->select('*')->from('tbl_shop')->where('shop_id='.$row->shop_id.' and shop_act=1')->get()->result();
                $dis_profile = array();
                $dis_profile["shop_name"] = $shop[0]->shop_name;
                $dis_profile["product_name"] = $res[0]->product_name;
                $dis_profile["qty"] = $row->qty;
                $dis_profile["approval_status"] = $row->approval_status;
                array_push($response, $dis_profile);
            }
            return array('success' => 1, 'salesreturn' => $response);
        } else {
            return array('success' => 0, 'message' => "Error Occured");
        }
    }
	 public function target_list($userid){
        $where = "employee_id='$userid'";
        $q = $this->db->select('employee_id')->from('tbl_employee')->where($where)->get()->num_rows();
        $response = array();
        if ($q > 0) {
            $wheres= "salesPersonid='$userid'";
            $q1 = $this->db->select('*')->from('tbl_target')->where($wheres)->get()->result();
            foreach ($q1 as $row) {
                $dis_profile = array();
                $dis_profile["from_date"] = date('Y-m-d',strtotime($row->from_date));
                $dis_profile["to_date"] = date('Y-m-d',strtotime($row->to_date));
                $dis_profile["target_amount"] = $row->target_amount;
                $dis_profile["reached_amount"] = $row->reached_target;
                array_push($response, $dis_profile);
            }
            return array('success' => 1, 'target' => $response);
        } else {
            return array('success' => 0, 'message' => "Error Occured");
        }
    }
	  public function combo_list(){
        $where = "status='1' and approval_status='1'";
        $q = $this->db->select('combo_id')->from('tbl_combo_offer')->get()->num_rows();
        $response = array();
        if ($q > 0) {
            $wheres= "status='1' and approval_status='1'";
            $q1 = $this->db->select('*')->from('tbl_combo_offer')->where($wheres)->get()->result();
            foreach ($q1 as $row) {
                $prodId = explode(",", $row->product_id);
                $count = count($prodId);
                $product = "";
                for($i=0; $i<$count; $i++){
                    $proname = getProname($prodId[$i]);
                    $productval = $proname[0]->product_name;
                    $product .= $productval.',<br>';
                }
                $category = getcategoryname($row->category_id);
                $dis_profile = array();
                $dis_profile["offer_name"] = $row->offer_name;
                $dis_profile["scheme_code"] = $row->scheme_code;
                $dis_profile["from_date"] = $row->from_date;
                $dis_profile["to_date"] = $row->to_date;
                $dis_profile["category_name"] = $category[0]->productgroup_name;
                $dis_profile["product_name"] = $product;
                array_push($response, $dis_profile);
            }
            return array('success' => 1, 'combooffer' => $response);
        } else {
            return array('success' => 0, 'message' => "Error Occured");
        }
    }

}
