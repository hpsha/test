<?php

class Terms_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // Read data using username and password
    // Read data from database to show data in admin page
    public function add_data($data) {
        $condition = "term_condition_data =" . "'" . $data['term_condition_data'] . "' and company_id=" . "'" . $data['company_id'] . "'";
        $this->db->select('term_condition_id');
        $this->db->from('tbl_terms_condition');
        $this->db->where($condition);
        $this->db->limit(1);

        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 0) {
            $this->db->insert('tbl_terms_condition', $data);
            if ($this->db->affected_rows() > 0) {

                return 1;
            } else {
                return 2;
            }
        } else {
            return 3;
        }
    }

    public function get_inactiveterms() {
        $condition = "term_condition_act =0";
        return $this->db->select("tbl_company.company_name,term_condition_rand,term_condition_data")->
                        join('tbl_company', 'tbl_company.company_id=tbl_terms_condition.company_id')->
                        from('tbl_terms_condition')->where($condition)->get()->result();
    }

    public function get_terms() {
        $condition = "term_condition_act =1";
        return $this->db->select("tbl_company.company_name,term_condition_rand,term_condition_data")->
                        join('tbl_company', 'tbl_company.company_id=tbl_terms_condition.company_id')->
                        from('tbl_terms_condition')->where($condition)->get()->result();
    }

    public function get_singleterms($key) {
        $condition = "term_condition_act =1 and term_condition_rand='$key'";
        return $this->db->select("company_id,term_condition_rand,term_condition_data")->
                        from('tbl_terms_condition')->where($condition)->get()->row();
    }

    public function get_companies_name() {
        $condition = "company_act =1";
        return $this->db->select("company_name,company_id")->from('tbl_company')->where($condition)->get()->result();
    }

    public function get_company($key) {
        $condition = "company_rand ='$key'";
        return $this->db->select("company_rand, company_name, company_phone, company_mail, company_address, company_address2, company_address3,"
                        . " company_address4, company_pincode, company_gst, company_bank_account_no, company_bank_name, company_bank_branch_name,"
                        . " company_bank_ifsc, company_pan_no,company_logo")->from('tbl_company')->where($condition)->get()->row();
    }

    public function update_data($data, $id) {

        $this->db->where('shop_id', $id);

        if ($this->db->update('tbl_shop', $data)) {
            return 1;
        } else {
            return 2;
        }
    }

    public function fetch_shop_list() {
        $date = date("Y-m-d");
        $where = "shop_act ='1' and date(shop_created_on)='$date' and shop_types!=3";

        return $this->db->select('shop_created_on,shop_id,agency_id,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos,emp_id, shop_previous, address,shop_type,tbl_agencies.agencies_name')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->get()->result();
    }
       
 function allorderposts_count($from, $to) {
        $where = "shop_act ='1' and `created_on` between '$from' and '$to'  and  tbl_shop.shop_type!=3";

     return $this->db->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')->join('tbl_shop','tbl_shop.shop_id=tbl_order.shop_id')->where($where)->group_by('tbl_order.shop_id')->get()->num_rows();
    }
    
     function postsorder_search($limit, $start, $search,$order, $dir, $from, $to) {
        $where = "shop_act ='1' and `created_on` between '$from' and '$to'  and  tbl_shop.shop_type!=3 and  (tbl_shop.shop_name like %$search% or tbl_shop.shop_owner_name like %search%)";

     return $this->db->limit($limit, $start)->order_by($col, $dir)->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')->join('tbl_shop','tbl_shop.shop_id=tbl_order.shop_id')
     ->where($where)->group_by('tbl_order.shop_id')->get()->result();
    }
      function postorders_search_count($search, $from, $to) {
        $where = "shop_act ='1' and `created_on` between '$from' and '$to'  and  tbl_shop.shop_type!=3 and  (tbl_shop.shop_name like %$search% or tbl_shop.shop_owner_name like %search%)";

     return $this->db->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')->join('tbl_shop','tbl_shop.shop_id=tbl_order.shop_id')
     ->where($where)->group_by('tbl_order.shop_id')->get()->result();
    }
    
    function allorderposts($limit, $start, $order, $dir, $from, $to) {
        $where = "shop_act ='1' and `created_on` between '$from' and '$to'   and  tbl_shop.shop_type!=3";

     return $this->db->limit($limit, $start)->order_by($order, $dir)->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')->join('tbl_shop','tbl_shop.shop_id=tbl_order.shop_id')->where($where)->group_by('tbl_order.shop_id')->get()->result();
    }
   public function distributor_order_list() {
        $date = date("Y-m-d");
        $where = "act ='1' and created_on='$date' and tbl_shop.shop_type=3";

        return $this->db->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')->join('tbl_shop','tbl_shop.shop_id=tbl_order.shop_id')->where($where)->group_by('tbl_order.shop_id')->get()->result();
    }

    public function fetch_shop_list_count() {
        $date = date("Y-m-d");
        $where = "shop_act ='1' and date(shop_created_on)='$date' and shop_types!=3";

        return $this->db->select('shop_created_on,shop_id,agency_id,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos,emp_id, shop_previous, address,shop_type,tbl_agencies.agencies_name')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->get()->num_rows();
    }

    public function fetch_distributor_list() {
        $date = date("Y-m-d");
        $where = "shop_act ='1' and date(shop_created_on)='$date' and shop_types=3";

        return $this->db->select('shop_created_on,shop_id,agency_id,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos,emp_id, shop_previous, address,shop_type,tbl_agencies.agencies_name')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->get()->result();
    }

    public function fetch_distributor_lists($from, $to) {
        $where = "shop_act ='1' and date(`shop_created_on`) between '$from' and '$to'  and shop_types=3";

        return $this->db->select('shop_created_on,agency_id,remarks,shop_id,shop_id, shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, address,shop_type,tbl_agencies.agencies_name,emp_id')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->get()->result();
    }

    public function fetch_shop_lists($from, $to) {
          $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!=''";
          $q= $this->db->select('shop_id')->from('tbl_order')->where($wheres)->group_by('shop_id')->get()->result();
          $shopss="";
      foreach($q as $ssr){
          $shopss.=$ssr->shop_id;
          $shopss.=",";
      }
$ssw=  substr($shopss, 0, -1);

         if($ssw!=''){
          
        $where = "shop_id in($ssw) and shop_types!=3  or (date(shop_created_on) between '$from' and '$to' and shop_types!=3) ";
 $nn=$this->db->select('shop_created_on,shop_id,agency_id,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos,emp_id, shop_previous, address,shop_type,tbl_agencies.agencies_name')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->order_by('shop_id','ASC')->get()->num_rows();
if($nn>0){
        return $this->db->select('shop_created_on,shop_id,agency_id,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos,emp_id, shop_previous, address,shop_type,tbl_agencies.agencies_name')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->order_by('shop_id','ASC')->get()->result();
}
         }
    }
  public function fetch_order_lists($from, $to) {
        $where = "act ='1' and created_on between '$from' and '$to' and tbl_order.shop_type!=3";

              return $this->db->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')
              ->join('tbl_shop','tbl_shop.shop_id=tbl_order.shop_id')->where($where)->group_by('tbl_order.created_on')->group_by('tbl_order.shop_id')->get()->result();

    }
    
     public function fetch_distributors_lists($from, $to) {
        $where = "act ='1' and created_on between '$from' and '$to' and tbl_order.shop_type=3";

              return $this->db->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')
              ->join('tbl_shop','tbl_shop.shop_id=tbl_order.shop_id')->where($where)->group_by('tbl_order.created_on')->group_by('tbl_order.shop_id')->get()->result();

    }
    public function fetch_shop_view($shop_id) {
        $where = "shop_id='$shop_id'";
        return $this->db->select('emp_id,remarks,location_name,address,shop_id, shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous,address, shop_type,tbl_agencies.agencies_name')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->join('tbl_location', 'tbl_location.location_id=tbl_shop.loc_id')->from('tbl_shop')->where($where)->get()->result();
    }

  
    public function fetch_shop_views($shop_id) {
        $where = "shop_id='$shop_id'";
        return $this->db->select('emp_id,remarks,location_name,address,shop_id, shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous,address, shop_type,tbl_agencies.agencies_name')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->join('tbl_location', 'tbl_location.location_id=tbl_shop.loc_id')->from('tbl_shop')->where($where)->get()->row();
    }

    public function fetch_shop_view_img($shop_id) {
        $where = "tbl_shop.shop_id='$shop_id'";
        return $this->db->select('tbl_shop.shop_id,tbl_shop_image.img_path')->join('tbl_shop_image', 'tbl_shop_image.shop_id=tbl_shop.shop_id')->from('tbl_shop')->where($where)->get()->result();
    }

}

?>