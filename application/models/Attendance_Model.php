<?php
class Attendance_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    public function get_attendance($date){
		$where = "employee_act=1";
	$q1=$this->db->select('employee_id,employee_name,employee_phone,employee_email')->from('tbl_employee')->where($where)->get()->result();
	$response=array();
	foreach($q1 as $data){
	    $datas=array();
	    $datas['name']=$data->employee_name;
	     $datas['phone']=$data->employee_phone;
	     	     $datas['email']=$data->employee_email;
	     	     $eid=$data->employee_id;
	$wherey= "tb_attendace.attendance_date='$date' and attendance_user_id=$eid";

	    	$q2= $this->db->select('tb_attendace.attendance_user_id,tb_attendace.attendance_latitude,tb_attendace.attendance_longitude,login_time')->from('tb_attendace')->where($wherey)->get()->num_rows();
	$rows= $this->db->select('tb_attendace.attendance_user_id,tb_attendace.attendance_latitude,tb_attendace.attendance_longitude,login_time')->from('tb_attendace')->where($wherey)->get()->row();
	if($q2==0){
$datas['count']=$q2;
   $datas['attendance_latitude']='';
      $datas['attendance_longtitude']='';
      $datas['login_time']='';
}

else{
    $datas['count']=$q2;
   $datas['attendance_latitude']=$rows->attendance_latitude;
      $datas['attendance_longtitude']=$rows->attendance_longitude;
       $datas['login_time']=$rows->login_time;

}
array_push($response,$datas);

	}
	$response=json_encode($response);
		$response=json_decode($response);

	return $response;
	
	
}

}