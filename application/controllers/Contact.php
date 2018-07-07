<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct() {
    parent::__construct();
	$this->load->helper('url');
	$this->load->library('session');
	$this->load->model('Contact_Model');
        //$this->load->library('curl');
    }
	public function index()
	{
        $this->load->view('template/header');
        $roles = $this->Contact_Model->get_contacts();
        $data['contact'] = $roles;
        $this->load->view('contact/list_contact',$data);
		$this->load->view('template/footer');
	}
    public function sendmail()
    {
        $this->load->view('template/header');
        $roles = $this->Contact_Model->get_contacts();
        $data['contact'] = $roles;
        $this->load->view('contact/send_mail',$data);
        $this->load->view('template/footer');
    }
    public function mail()
    {
        $this->load->library('email');
        $count=count($_POST['name']);
        for($i=0;$i<$count;$i++){
        $email=$_POST['name'][$i];
        $msg=$_POST['message'];
        $logo=base_url()."uploads/logo.png";
                    
        $message1="<table style='border:1px solid #17518a;border-style: double;'>
  <tbody>
    <tr>
      <td>
        <table style='overflow:visible;text-align:left;font-variant:normal;font-weight:normal;font-size:14px;background-color:fff;line-height:20px;font-family:Asap,sans-serif;color:#333;padding:0;font-style:normal;width:900px;border-spacing: 0px;'>
          <tbody>
            <tr>
              <td colspan='6' style='margin:0px,width:450px;padding:0px;width:50%;'>
                <center><img style='padding:10px;width: 150px;' src='".$logo."' alt='GEM'></center>
              </td>
            </tr>
            <tr>
              <td colspan='12'>
                <hr style='border:1px solid #17518a'>
              </td>
            </tr>
            </tbody>
        </table><br>
        <table style='overflow:visible;text-align:left;font-variant:normal;font-weight:normal;font-size:14px;background-color:fff;line-height:20px;font-family:Asap,sans-serif;color:#333;padding:0;font-style:normal;width:900px;border-spacing: 0px;''>
          <tbody>
            <tr>
              <td colspan='6' style='margin:0px;margin:0px,width:450px;padding:0px;width:50%;'>
                <h2 style='color:#73879C;'> &nbsp; &nbsp; &nbsp;Hi,</h2>
        <p style='color:#73879c;margin-top:0px;'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Message: ".$msg."</p>
              </td>
            </tr>
            <tr>
              <td colspan='12'>
              </td>
            </tr><tr>
              <td colspan='12'>
              </td>
            </tr>
            </tbody>
        </table><br>
        <hr style='border:0px solid #17518a'>
        <table style='overflow:visible;text-align:left;font-variant:normal;font-weight:normal;font-size:14px;background-color:#354c69;font-family:Asap,sans-serif;color:#333;padding:5px;font-style:normal;width:900px'>
          <tbody>
            <tr>
            <td>
                <p style='color:#fff'>This e-mail is intended for the addressee. It may contain information that is privileged, confidential or otherwise protected from disclosure. Any review, dissemination, or use of this transmission or its contents by persons other than the addressee is strictly prohibited.</p>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>";
        $this->email->from('info@simta.com', 'SIMTA');
        $this->email->to($email);
        $this->email->subject('Greetings');
        $this->email->message($message1);
        $result = $this->email->send();
        $this->email->clear(TRUE);
        echo $result;
    }

    }
    public function sendsms()
    {
        $this->load->view('template/header');
        $roles = $this->Contact_Model->get_contacts();
        $data['contact'] = $roles;
        $this->load->view('contact/send_sms',$data);
        $this->load->view('template/footer');
    }
    public function sms()
    {
        print_r($_POST);exit();
    }
	public function add_contact()
	{
        $this->load->view('template/header');
        $this->load->view('contact/contact_add');
		$this->load->view('template/footer');
	}
	public function edit_contact($key)
	{
        $this->load->view('template/header');
        $get_emp = $this->Contact_Model->get_contact($key);
        $data['contact'] = $get_emp;
        $this->load->view('contact/contact_edit',$data);
		$this->load->view('template/footer');
	}
	public function adddetails()
	{
        //print_r($_POST);exit();
		 
    	//print_r($pic);exit();
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $rand = '';
        $random_string_length = 6;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $rand.= $characters[mt_rand(0, $max)];
        }
        $date = date('Y-m-d H:i:s');
        $data = array(
            'contact_rand' => $rand,
            'contact_name' => $_POST['name'],
            'contact_number ' => $_POST['number'],
            'contact_email' => $_POST['email'],
            'contact_created_on' => $date,
            'contact_act' => 1
        );
        $result = $this->Contact_Model->add($data);
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
    redirect("Contact");
	}
public function delete_contact(){
    $rand=$_POST['id'];
    $data = array(
    'contact_act' =>0,);
    $result = $this->Contact_Model->update_data($data,$rand);
    echo $result;
    }
    public function update()
	{
     	$rand=$_POST['key'];
        $date = date('Y-m-d H:i:s');
        $data = array(
            'contact_rand' => $rand,
            'contact_name' => $_POST['name'],
            'contact_number ' => $_POST['number'],
            'contact_email' => $_POST['email'],
            'contact_updated_on' => $date,
            'contact_act' => 1
            
        );
        $result = $this->Contact_Model->update_data($data,$rand);
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
    redirect("Contact");
	}
}