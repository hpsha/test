<?php
class Login_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    // Read data using username and password
    public function login($data) {
        $condition = "admin_username =" . "'" . $data['admin_username'] . "' AND " . "admin_password =" . "'" . $data['admin_password'] . "'";
        $this->db->select('admin_username');
        $this->db->from('tbl_admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
        public function logins($data) {
        $condition = "admin_username =" . "'" . $data['admin_username'] . "' AND " . "admin_password =" . "'" . $data['admin_password'] . "' and    admin_act='1'";
        $this->db->select('admin_username');
        $this->db->from('tbl_admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    // Read data from database to show data in admin page
    public function read_user_information($username) {
        $condition = "admin_username =" . "'" . $username . "'";
        $this->db->select('admin_id, admin_username, admin_password, admin_type,employee_id,admin_profile_picture,admin_role');
        $this->db->from('tbl_admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function check_pass($uid,$old_pass){
        $condition = "user_id = '$uid' AND user_password = '$old_pass'";
        $query=$this->db->select('user_id')->from('tbl_user_login')->where($condition)->limit(1)->get()->num_rows();
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    public function change_pass($uid,$old_pass,$new_pass){
        $condition = "admin_id = '$uid' AND admin_password = '$old_pass'";
        $query=$this->db->select('admin_id')->from('tbl_admin')->where($condition)->limit(1)->get()->num_rows();
        if($query){
            $q1 = $this->db->where($condition)->update('tbl_admin', array('admin_password' => $new_pass ));
            if($q1){
                return "1";
            }
            else{
                 return "2";
            }
        }
        else{
             return "3";
        }
    }
    public function change_username($uid, $old_pass, $new_username){
        $condition = "admin_id = '$uid' AND admin_password = '$old_pass'";
        $query=$this->db->select('admin_id')->from('tbl_admin')->where($condition)->limit(1)->get()->num_rows();
        if($query){
            $q1 = $this->db->where($condition)->update('tbl_admin', array('admin_username' => $new_username ));
            if($q1){
                return "1";
            }
            else{
                 return "2";
            }
        }
        else{
             return "3";
        }
    }
    public function forgot_check($user_mail,$code){
        $where = "user_name = '$user_mail'";
        $query=$this->db->select('user_id')->from('tbl_user_login')->where($where)->get()->row();
        if($query){
            $q1 = $this->db->insert('tbl_forgot_password', array('user_email' => $user_mail, 'activation_code' => $code, 'forgot_act' => '1'));
            if($q1){
                return true;
            }
        }
        else{
            return false;
        }
    }
       public function check_update_pass($user_mail,$code,$password){
        $where = "user_email = '$user_mail' and activation_code='$code' and forgot_act=1";
        $query=$this->db->select('user_email')->from('tbl_forgot_password')->where($where)->get()->num_rows();
        if($query>0){
                    $q = $this->db->where('user_name', $user_mail)->update('tbl_user_login', array('user_password' => $password));
                                        $q = $this->db->where('user_email', $user_mail)->update('tbl_forgot_password', array('forgot_act' => 0));
            if($q){
                return true;
            }
        }
        else{
            return false;
        }
    }
    public function get_employee(){
        $where = "employee_act=1";
        return $this->db->select('employee_id')->from('tbl_employee')->where($where)->get()->num_rows();
    }
    public function get_client(){
        $where = "client_act=1";
        return $this->db->select('client_id')->from('tbl_client')->where($where)->get()->num_rows();
    }
    public function get_clientservice(){
        $where = "service_act=1";
        return $this->db->select('service_id')->from('tbl_service')->where($where)->get()->num_rows();
    }
    public function get_clienttask(){
        $where = "client_document_submit=1 AND client_document_status=1";
        return $this->db->select('client_task_id')->from('tbl_client_task')->where($where)->get()->num_rows();
    }
    public function get_last24task(){
        $where = "client_document_submit=0 AND client_document_status=1";
        return $this->db->select('client_task_id')->from('tbl_client_task')->where($where)->get()->num_rows();
    }
    public function get_processingtask(){
        $where = "client_document_submit=1  AND client_document_approve=0  AND client_document_status=1";
        return $this->db->select('client_task_id')->from('tbl_client_task')->where($where)->get()->num_rows();
    }
    public function add_companydata($company_name, $company_mail, $base64, $base6) {
        $date = date('Y-m-d H:i:s');
        $logoname = "logo.png";
        $url = base_url() . "uploads/" . $logoname;
        $binarys = $base64;
        if ($binarys != '') {
            $binary = base64_decode($binarys);
            $file = fopen('uploads/' . $logoname, 'wb');
            fwrite($file, $binary);
            fclose($file);
        }
        $iconname = "icon.png";
        $url = base_url() . "uploads/" . $iconname;
        $binarys = $base6;
        if ($binarys != '') {
            $binary = base64_decode($binarys);
            $file = fopen('uploads/' . $iconname, 'wb');
            fwrite($file, $binary);
            fclose($file);
        }
        $q = $this->db->where('company_details_id', 1)->update('tbl_company_details', array('company_name' => $company_name, 'company_email_id' => $company_mail, 'company_logo' => $logoname, 'company_fav_icon' => $iconname));
        if ($q) {
            return true;
        } else {
            return false;
        }
    }
 public function get_mytask($id){
        $where = "client_document_submit=1 AND client_document_approve=1 AND client_document_status=1 and   client_task_employee_id=$id";
        return $this->db->select('client_task_id')->from('tbl_client_task')->where($where)->get()->num_rows();
    }
     public function get_myprocessingtask($id){
        $where = "client_document_submit=1 AND client_document_approve=0  AND client_document_status=1 and client_task_employee_id=$id";
        return $this->db->select('client_task_id')->from('tbl_client_task')->where($where)->get()->num_rows();
    }
    public function get_pending($id){
        $where = "client_document_submit=0 AND client_document_status=1 and     client_task_employee_id=$id";
        return $this->db->select('client_task_id')->from('tbl_client_task')->where($where)->get()->num_rows();
    }
    public function getdata() {
        return $this->db->get("tbl_company_details")->result();
    }
    public function list_products(){
        $where = "`product_act`='1'";
        $q = $this->db->select('product_id,product_size')->from('tbl_product')->where($where)->get()->result();
        if($q){
            return array('status' => 1, 'data' => $q);
        }
        else{
            return array('status' => 0, 'data' => 0);
        }
  }
  public function get_task(){
        $q = $this->db->select('tb_schedule.schedule_id,tb_schedule.schedule_title,tb_schedule.schedule_description,tb_schedule.schedule_status,tb_schedule.schedule_note,tb_schedule.schedule_date,tb_schedule.schedule_assigned_to,tbl_employee.employee_id,tbl_employee.employee_name,tbl_employee.employee_email')->from('tb_schedule')->join('tbl_employee','tbl_employee.employee_id=tb_schedule.schedule_assigned_to')->get()->result();
        if($q){
            return array('status' => 1, 'data' => $q);
        }
        else{
            return array('status' => 0, 'data' => 0);
        }
  }
  public function list_kilometer(){
        $date=date('Y-m-d');
        $where = "`date`='$date'";
        $q = $this->db->select('*')->from('tbl_kmdetails')->where($where)->get()->result();
        if($q){
            return array('status' => 1, 'data' => $q);
        }
        else{
            return array('status' => 0, 'data' => 0);
        }
  }
   public function getUserdetails($id){
       $this->db->select('*')->from('tbl_admin')->where("admin_id", $id);
        $query = $this->db->get();
        return $query->result();
  }
}
?>