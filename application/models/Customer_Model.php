<?php

class Customer_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // Read data using username and password
    // Read data from database to show data in admin page
    public function add($data,$test) {

       $condition = "customer_mail =" . "'" . $data['customer_mail'] . "'";
        $this->db->select('customer_mail');
        $this->db->from('tbl_customer');
        $this->db->where($condition);
        $this->db->limit(1);

        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 0) {
            $this->db->insert('tbl_customer', $data);
            if ($this->db->affected_rows() > 0) {
				$id=$this->db->insert_id();
				$company_id=$test['company_id'];
				$customer_through=$test['customer_through'];
				$agent=$test['agent'];
				$sales_person=$test['sales_person'];
	$count=count($company_id);
	for($i=0;$i<$count;$i++){
    if($customer_through[$i]==1){
        $agent=0;
    }
    $datas=array(
    'customer_id'=>$id,
    'company_id'=>$company_id[$i],
    'customer_sale_type'=>$customer_through[$i],
    'customer_sale_agent'=>$agent,
    'customer_sale_salesperson'=>$sales_person[$i],
    );
                $this->db->insert('tbl_customer_sales', $datas);

}

               return 1;
            } else {
                return 2;
            }
        } else {
            return 3;
        }


    }

	//LIST CUSTOMER
   public function get_customer() {

        $condition = "customer_act =1";
        return $this->db->select("customer_name,customer_phone,customer_mail,customer_spindles,customer_gst_no,customer_gst_no,customer_pan_no,customer_rand,customer_id,customer_act")->from('tbl_customer')->where($condition)->get()->result();

    }
    public function get_customer_alldetails() {
        $condition = "customer_act =1";
        return $this->db->select("customer_id, customer_rand, customer_spindles, customer_name, customer_area, customer_phone, customer_mail, customer_gst_no, customer_pan_no, customer_address_line1, customer_address_line2, customer_address_line3, customer_address_line4, customer_pincode, customer_shipping_gst, customer_shipping_pan, customer_shipping_name, customer_shipping_phone, customer_shipping_mail, customer_shipping_address1, customer_shipping_address2, customer_shipping_address3, customer_shipping_address4, customer_shipping_pincode, customer_billing_gst, customer_billing_pan, customer_billing_name, customer_billing_phone, customer_billing_mail, customer_billing_address1, customer_billing_address2, customer_billing_address3, customer_billing_address4, customer_billing_pincode, customer_created_on")->from('tbl_customer')->where($condition)->limit(1)->get()->result();
    }
    public function get_employee_customer($id) {
        $condition = "customer_sale_salesperson =$id and customer_sale_act=1";
        $datas= $this->db->select("customer_id")->from('tbl_customer_sales')->where($condition)->group_by('customer_id')->get()->result();
        $datay=array();
        $customer_data=array();
        foreach($datas as $data)
        {
            $wheres="customer_id='$data->customer_id' and customer_act=1";

                    $sales_data= $this->db->select("customer_name,customer_phone,customer_mail,customer_spindles,customer_gst_no,customer_pan_no,
                    customer_rand,customer_id,customer_act")->from('tbl_customer')->where($wheres)->get()->row();

                    $cus_data=array();
		$cus_data['customer_name']=$sales_data->customer_name;
						$cus_data['customer_phone']=$sales_data->customer_phone;
						$cus_data['customer_mail']=$sales_data->customer_mail;
						$cus_data['customer_spindles']=$sales_data->customer_spindles;
						$cus_data['customer_gst_no']=$sales_data->customer_gst_no;
						$cus_data['customer_pan_no']=$sales_data->customer_pan_no;
						$cus_data['customer_rand']=$sales_data->customer_rand;
							$cus_data['customer_id']=$sales_data->customer_id;
					array_push($customer_data,$cus_data);
        }
        return $customer_data;
    }



	//EDIT CUSTOMER
   public function get_customer_details($key) {
         $condition = "customer_rand ='$key'";
        $query = $this->db->select("*")->from('tbl_customer')->where($condition)->get()->result();
            $querys = $this->db->select("*")->from('tbl_customer')->where($condition)->get()->num_rows();


		if($querys==1){
			$customer_data=$query;
			foreach($query as $result){
				$cus_data=array();

				$c_id= $result->customer_id;
				$conditions = "	customer_id='$c_id'";
			$cus_sale= $this->db->select("customer_id,company_id,customer_sale_type,customer_sale_agent,customer_sale_salesperson")->from("tbl_customer_sales")->where($conditions)->get()->result();

				foreach($cus_sale as $sales_data){
					//	$cus_data['company_id']=$sales_data->company_id;
						$cus_data['customer_sale_type']=$sales_data->customer_sale_type;
						$cus_data['customer_sale_agent']=$sales_data->customer_sale_agent;
						$cus_data['customer_sale_salesperson']=$sales_data->customer_sale_salesperson;
						$cus_data['company_id']=$sales_data->company_id;
						$cus_data['customer_id']=$result->customer_id;
					array_push($customer_data,$cus_data);
				}
			}

			return $customer_data;
		}
		else{
			return 2;
		}
    }





	//EDIT CUSTOMER
   public function edit_customer($data,$c_id,$test) {
        $condition = "customer_id ='$c_id'";
		$condition = "`customer_phone` =" . "'" . $data['customer_phone'] . "' and `customer_id` !='$c_id'";
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where($condition);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 0) {
				$this->db->where('customer_id', $c_id);
			if ($this->db->update('tbl_customer', $data)) {

			  $company_id=$test['company_id'];
				$customer_through=$test['customer_through'];
				$agent=$test['agent'];
				$sales_person=$test['sales_person'];
	$count=count($company_id);
	for($i=0;$i<$count;$i++){
	     $agents=$agent[$i];

    if($customer_through[$i]==1){
        $agents=0;
    }
    $cc_id=$company_id[$i];
    $where="customer_id=$c_id and company_id=$cc_id";
    $datas=array(
    'customer_sale_type'=>$customer_through[$i],
    'customer_sale_agent'=>$agents,
    'customer_sale_salesperson'=>$sales_person[$i],
    );

    $this->db->where($where)->update('tbl_customer_sales', $datas);
	}

				return 1;
			}
			else{
				return 2;

            }
		}
		else {
            return 3;
        }














        $query = $this->db->select("*")->from('tbl_customer')->where($condition)->get()->result();
		$customer_data=$query;
		foreach($query as $result){
			$cus_data=array();

			$c_id= $result->customer_id;
			$conditions = "	customer_id='$c_id'";
		$cus_sale= $this->db->select("customer_id,company_id,customer_sale_type,customer_sale_agent,customer_sale_salesperson")->from("tbl_customer_sales")->where($conditions)->get()->result();

			foreach($cus_sale as $sales_data){
					$cus_data['customer_sale_type']=$sales_data->customer_sale_type;
					$cus_data['customer_sale_agent']=$sales_data->customer_sale_agent;
					$cus_data['customer_sale_salesperson']=$sales_data->customer_sale_salesperson;
					$cus_data['company_id']=$sales_data->company_id;
					$cus_data['customer_id']=$result->customer_id;
				array_push($customer_data,$cus_data);
			}
		}
			return $customer_data;
    }




	//Delete Customer
	public function delete_data($data, $rand)
    {
			$this->db->where('customer_rand', $rand);
			if ($this->db->update('tbl_customer', $data)) {
            return 1;
            }
            else{
            return 2;

            }
    }

    function allposts_count()
    {
        $query = $this->db->get('tbl_customer');

        return $query->num_rows();

    }

    function allposts($limit,$start,$col,$dir)
    {
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('tbl_customer');

        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }

    }

    function posts_search($limit,$start,$search,$col,$dir)
    {
        $query = $this
                ->db
                ->like('customer_id',$search)
                ->or_like('customer_name',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('tbl_customer');


        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }
    }

    function posts_search_count($search)
    {
        $query = $this
                ->db
                ->like('customer_id',$search)
                ->or_like('customer_name',$search)
                ->get('tbl_customer');

        return $query->num_rows();
    }


}