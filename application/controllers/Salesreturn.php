<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesreturn extends CI_Controller {
	function __construct() {
            parent::__construct();
            if (is_logged_in() == true) {
                redirect("Welcome");
            }
            $this->load->helper('url');
            $this->load->helper('cookie');
            $this->load->model('Salesreturn_Model');
        }
        public function index($page = 1)
	{
            $data = array();
            $data['title'] = "Manage Sales Return";
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
            $select1 = ('count(distinct sa.salesreturn_id) as count');
            $all = $this->Salesreturn_Model->getsalesreturndetail($where,$orderby,$select1,$join,"","","","",$like,$or_like,$or_where, $where_in, $where_not);
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
            $data["salesreturn"] = $this->Salesreturn_Model->getsalesreturndetail($where,$orderby,$select1,$join,$groupby,$limit,$offset,"",$like,$or_like,$or_where, $where_in, $where_not);
            $this->load->view('template/header');
            $this->load->view('Salesreturn/view',$data);
            $this->load->view('template/footer');
	}
        
         public function report($page = 1)
	{
            $data = array();
            $data['title'] = "Manage Sales Return Reports";
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
            $select1 = ('count(distinct sa.salesreturn_id) as count');
            $data['filterenquiry'] = $get = $this->input->get();
            if(isset($get) && !empty($get)){
                if(!empty($get['from_date'])){
                        $where=array('date(sa.created_date) >= '=> date('Y-m-d',strtotime($get['from_date'])), 'date(sa.created_date) <= '=> date('Y-m-d',strtotime($get['to_date'])));
                }
                
               
        }
            $all = $this->Salesreturn_Model->getsalesreturndetail($where,$orderby,$select1,$join,"","","","",$like,$or_like,$or_where, $where_in, $where_not);
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
            $data["salesreturn"] = $this->Salesreturn_Model->getsalesreturndetail($where,$orderby,$select1,$join,$groupby,$limit,$offset,"",$like,$or_like,$or_where, $where_in, $where_not);
            $this->load->view('template/header');
            $this->load->view('Salesreturn/report_view',$data);
            $this->load->view('template/footer');
	}
          /*Add New Sales Return */
	public function addnew(){
            $this->load->view('template/header');
            //$roles = $this->Salesreturn_Model->get_employees();
          
            $data['title'] = 'Sales Return Details';
            $this->load->view('Salesreturn/addnew', $data);
            $this->load->view('template/footer');
        }
        /* Save & Update Task */
        public function save(){
            $post = $this->input->post();
            if(isset($post) && !empty($post)){
            $result = $this->Salesreturn_Model->save_update_sales($post);
            if($result == ""){redirect("/Salesreturn");} 
            else if($result){
                if(!empty($post['tb_salesreturn']['salesreturn_id'])){
                        $this->session->set_flashdata('message', '<div class="success_msg">Enquiry has been updated successfully.</div>');
                        redirect("/Salesreturn");
                } else {
                        $this->session->set_flashdata('message', '<div class="success_msg">Enquiry has been added successfully.</div>');
                        redirect("/Salesreturn");
            }
            }else{
                    redirect("/Salesreturn");
            }
            }
        }
        public function getShopmobile(){
            $search =$_POST['terms'];
            $data = $this->Salesreturn_Model->getShoplist($search);
            echo json_encode($data);
        }
        public function getShopname(){
            $search =$_POST['terms'];
            $data = $this->Salesreturn_Model->getShopnames($search);
            echo json_encode($data);
        }
        public function getPronames(){
            $search =$_POST['terms'];
            $data = $this->Salesreturn_Model->getPronames($search);
            echo json_encode($data);
        }
        public function delete(){
            $id = $_POST['id'];
            echo $result = $this->Salesreturn_Model->delete($id);
        }
        
        public function approved(){
            $id = $_POST['id'];
            $result = $this->Salesreturn_Model->approved($id);
            if($result){
                
                $message='<table style="border:1px solid #dbdde0;border-style:double;background-color:#fbfafa;align:center">
<tbody>
	<tr><!--header starts-->
		<td>
			<table style="overflow:visible;text-align:center;font-variant:normal;font-weight:normal;font-size:14px;background-color:#fff;line-height:20px;font-family:Asap,sans-serif;color:#333;padding:0;font-style:normal;width:900px;border-spacing: 0px;">
          <tbody>
            <tr>
              <td colspan="6" style="margin:0px,width:450px;padding:0px;width:50%;background-color: #efefef;">
				<img style="padding:10px;width: 100px;" src="http://epictech.in/anilcrm/app-assets/img/inner-logo.png" alt="logo">
              </td>
            </tr>
			</tbody>
        </table>
		</td>
	</tr><br>
  <!--header ends-->
  <!--body starts-->
	<tr>
		<td>
			<table style="overflow:visible;text-align:left;font-variant:normal;font-weight:normal;font-size:14px;background-color:fff;line-height:20px;font-family:Asap,sans-serif;color:#333;padding:0;font-style:normal;width:900px;border-spacing: 0px;">
          <tbody>
            <tr>
              <td colspan="6" style="margin:0px;margin:0px,width:450px;padding-top:10px;width:50%;">
				<h2 style="color: #d29921;"> &nbsp; &nbsp; &nbsp;Notification for sales return approved,</h2>
				<p style="color:#777;margin-bottom:0px;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Some Products return by XYZ shop.</b></p>
              </td>
            </tr>
            <tr>
            	<td style="font-family:Asap,sans-serif;color:#333;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 0px 1px;margin:0;line-height:18px">
				<h1 style="font-family:Asap,sans-serif;font-weight:normal;font-size:14px;margin-bottom:25px;margin-top:5px;line-height:28px">
				<table style="overflow:visible;text-align:left;font-variant:normal;font-weight:normal;font-size:14px;background-color:fff;line-height:20px;font-family:Asap,sans-serif;color:#333;padding:0;font-style:normal;width:890px;border-spacing: 0px;border:1px solid #ddd;margin-left:5px;">
				<tr>
					<thead style="color:#4c4c4c">
					<th style="border-bottom: 1px solid #ddd;width: 10%;border-right: 1px solid #ddd;text-align: center;"> S.No</th>
					<th style="border-bottom: 1px solid #ddd;border-right: 1px solid #ddd;text-align: center;">NAME</th>
					<th style="border-bottom: 1px solid #ddd;text-align: center;">QTY</th>
					</thead>
					<tbody>
					<tr>
					<td style="border-bottom: 1px solid #ddd;border-right: 1px solid #ddd;text-align: center;">1</td>
					<td style="border-bottom: 1px solid #ddd;border-right: 1px solid #ddd;text-align: center;text-align: left;padding-left: 10px;">abc</td>
					<td style="border-bottom: 1px solid #ddd;text-align: center;">50</td>
					</tr>
					
					<tr>
					<td style="border-bottom: 1px solid #ddd;border-right: 1px solid #ddd;text-align: center;">2</td>
					<td style="border-bottom: 1px solid #ddd;border-right: 1px solid #ddd;text-align: center;text-align: left;padding-left: 10px;">def</td>
					<td style="border-bottom: 1px solid #ddd;text-align: center;" >50</td>
					</tr>
					
					<tr>
					<td style="border-bottom: 1px solid #ddd;border-right: 1px solid #ddd;text-align: center;">3</td>
					<td style="border-bottom: 1px solid #ddd;border-right: 1px solid #ddd;text-align: center;text-align: left;padding-left: 10px;">def</td>
					<td style="border-bottom: 1px solid #ddd;text-align: center;">50</td>
					</tr>
					</tbody>
				</tr>
					
					</table>
                 </td>
            </tr>
            <tr>
	</tr>
	<!--button-->
  
<!--button ends-->
			<tr>
              <td colspan="12">
                
              </td>
            </tr>
            </tbody>
        </table>
		</td>
	</tr><br>
  <!--body ends-->
	<!--footer starts-->
  <tr>
		<td>
			<table style="overflow:visible;text-align:center;font-variant:normal;font-weight:normal;font-size:14px;background-color:#fff;line-height:20px;font-family:Asap,sans-serif;color:#f6b413;padding:0;font-style:normal;width:900px;border-spacing: 0px;">
          <tbody>
            <tr>
              <td style="margin:0px;width:450px;padding:0px;width:50%;background-color:#f8b117;text-align:center;">
              <p  style="color: #feffff;margin: 0px;padding: 0;line-height: 50px;font-size: 14px">&copy; 2017 Anil CRM All rights reserved</p><br>
              </td>
            </tr>
			</tbody>
        </table>
		</td>
	</tr>
<!--footer ends-->
</tbody>
</table>';

$subject="Sales Return: #";   
$to = "ramesh@banyaninfotech.com";
$build = "sridhar@banyaninfotech.com";
$headers = "From: Notification From <" . $build . ">\r\n" ;

$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

if (mail($to, $subject, $message, $headers)) {
   echo "1";
}
else{
    echo "0";
}   
            }else{
                echo "2";
            }
        }
        
}