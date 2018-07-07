<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

  function __construct() {
    parent::__construct();
  $this->load->helper('url');
  $this->load->library('session');
  $this->load->model('Task_Model');
        $this->load->model('Employee_Model');
        if (is_logged_in() == true) {
            redirect("Welcome");
        }
    }
public function index()
{

    $this->load->view('template/header');
    $roles = $this->Task_Model->get_task();
    $data['schedule'] = $roles;
    $this->load->view('Task/list_task',$data);
    $this->load->view('template/footer');
}
public function delete_task(){
    $id=$_POST['id'];
    $data = array(
    'schedule_status' =>0,);
    $result = $this->Task_Model->update_datas($data,$id);
    echo $result;
    }
public function edit_task($id)
  {
        $this->load->view('template/header');
        $get_task = $this->Task_Model->fetch_task($id);

        $roles = $this->Employee_Model->get_employees();
        $data['employee'] = $roles;

        $data['fetch_task'] = $get_task;
        $this->load->view('Task/task_edit',$data);
        $this->load->view('template/footer');
  }
        public function add()
  {
        $this->load->view('template/header');

        $roles = $this->Employee_Model->get_employees();
        $data['employee'] = $roles;

        $this->load->view('Task/add_task',$data);
        $this->load->view('template/footer');
  }

public function updatedetails()
  {

        $date = date('Y-m-d H:i:s');
          $id=$_POST['key'];
      $title=$_POST['name'];
     $description=$_POST['schedule_des'];
     $notes=$_POST['note'];
     $status=$_POST['status'];
         //echo "
     $q=$this->db->query("UPDATE  tb_schedule SET schedule_title='$title',schedule_status='$status',schedule_description='$description',schedule_note='$notes' where schedule_id='$id'");
        if ($q) {
            $cookie= array(
           'name'   => 'update',
           'value'  => '1',
           'expire' => '3',
       );
        }
        else{
              $cookie= array(
           'name'   => 'update',
           'value'  => '2',
           'expire' => '3',
       );
    }
    $this->input->set_cookie($cookie);
    redirect("Task");
  }

public function adddetails()
  {
      $user_id=$_POST['created_by'];
      $title=$_POST['name'];
      $description=$_POST['schedule_des'];
      $notes="";
      $status=1;
      $date=  date('y-m-d H:i:s');
     $q=$this->db->query("INSERT INTO `tb_schedule` (`schedule_id`, `schedule_title`, `schedule_description`, `schedule_note`,`schedule_date`, `schedule_assigned_to`, `schedule_status`) VALUES (NULL, '$title', '$description', '$notes', '$date', '$user_id', '1')" );
        if ($q) {
            $cookie= array(
           'name'   => 'success',
           'value'  => '1',
           'expire' => '3',
       );
        }
       else{
             $cookie= array(
           'name'   => 'success',
           'value'  => '3',
           'expire' => '3',
       );

    }
    $this->input->set_cookie($cookie);
    redirect("Task");
  }


}
?>