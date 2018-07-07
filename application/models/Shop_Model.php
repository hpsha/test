<?php

class Shop_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function allposts_count($from, $to) {
        $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];
        if ($usertype == 1 || $usertype == 2) {
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!=''";
        } if ($usertype == 4) {
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!='' and agencies_id=$emp_id";
        }
        if ($usertype == 3) {
            $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!='' and agencies_id in ($emp_id)";
        }
        $q = $this->db->select('shop_id')->from('tbl_order')->where($wheres)->group_by('shop_id')->get()->result();


        $shopss = "";
        foreach ($q as $ssr) {
            $shopss .= $ssr->shop_id;
            $shopss .= ",";
        }
        $ssw = substr($shopss, 0, -1);



        $where = "shop_id in($ssw) and shop_types!=3  or (date(shop_created_on) between '$from' and '$to' and shop_types!=3) ";

        return $this->db->select('agency_id,remarks,shop_id,shop_id, shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos, shop_previous, address,shop_type,tbl_agencies.agencies_name,emp_id')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->get()->num_rows();
    }

    function allposts($limit, $start, $col, $dir, $from, $to) {

        $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];
        if ($usertype == 1 || $usertype == 2) {
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!=''";
        } if ($usertype == 4) {
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!='' and agencies_id=$emp_id";
        }
        if ($usertype == 3) {
            $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!='' and agencies_id in ($emp_id)";
        }
        $q = $this->db->select('shop_id')->from('tbl_order')->where($wheres)->group_by('shop_id')->get()->result();
        $this->db->last_query();
        $shopss = "";
        foreach ($q as $ssr) {
            $shopss .= $ssr->shop_id;
            $shopss .= ",";
        }
        $ssw = substr($shopss, 0, -1);


        $where = "shop_id in($ssw) and shop_types!=3  or (date(shop_created_on) between '$from' and '$to' and shop_types!=3) ";

        return $this->db->limit($limit, $start)->order_by($col, $dir)->select('shop_created_on,agency_id,remarks,shop_id,shop_id, shop_name, shop_owner_name,
        shop_contact, shop_landline, shop_location, shop_photos, shop_previous, address,shop_type,tbl_agencies.agencies_name,emp_id')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->get()->result();
    }

    function posts_search($limit, $start, $search, $col, $dir, $from, $to) {

        $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];
        if ($usertype == 1 || $usertype == 2) {
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!=''";
        } if ($usertype == 4) {
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!='' and 	agencies_id=$emp_id";
        }
        if ($usertype == 3) {
            $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!='' and 	agencies_id in($emp_id)";
        }
        $q = $this->db->select('shop_id')->from('tbl_order')->where($wheres)->group_by('shop_id')->get()->result();
        $this->db->last_query();
        $shopss = "";
        foreach ($q as $ssr) {
            $shopss .= $ssr->shop_id;
            $shopss .= ",";
        }
        $ssw = substr($shopss, 0, -1);


        $where = "shop_id in($ssw) and shop_types!=3  or (date(shop_created_on) between '$from' and '$to' and shop_types!=3) ";

        $query = $this->db
                        ->like('agency_id', $search)
                        ->or_like('remarks', $search)
                        ->or_like('shop_id', $search)
                        ->like('shop_name', $search)
                        ->or_like('shop_owner_name', $search)
                        ->or_like('shop_contact', $search)
                        ->like('shop_landline', $search)
                        ->or_like('shop_location', $search)
                        ->or_like('shop_photos', $search)
                        ->like('shop_previous', $search)
                        ->or_like('address', $search)
                        ->or_like('shop_type', $search)
                        ->or_like('agencies_name', $search)
                        ->or_like('emp_id', $search)
                        ->order_by($col, $dir)
                        ->select('shop_created_on,agency_id,remarks,shop_id, shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos,'
                                . ' shop_previous, address,shop_type,tbl_agencies.agencies_name,emp_id')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->get()->num_rows();


        if ($query > 0) {
            $query = $this->db
                            ->like('agency_id', $search)
                            ->or_like('remarks', $search)
                            ->or_like('shop_id', $search)
                            ->like('shop_name', $search)
                            ->or_like('shop_owner_name', $search)
                            ->or_like('shop_contact', $search)
                            ->like('shop_landline', $search)
                            ->or_like('shop_location', $search)
                            ->or_like('shop_photos', $search)
                            ->like('shop_previous', $search)
                            ->or_like('address', $search)
                            ->or_like('shop_type', $search)
                            ->or_like('agencies_name', $search)
                            ->or_like('emp_id', $search)
                            ->limit($limit, $start)
                            ->order_by($col, $dir)
                            ->select('shop_created_on,agency_id,remarks,shop_id, shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos,'
                                    . ' shop_previous, address,shop_type,tbl_agencies.agencies_name,emp_id')
                            ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->get()->result();
            return $query;
        } else {
            return null;
        }
    }

    function posts_search_count($search, $from, $to) {
     $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];
        if ($usertype == 1 || $usertype == 2) {
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!=''";
        } if ($usertype == 4) {
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!='' and 	agencies_id=$emp_id";
        }
        if ($usertype == 3) {
            $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!='' and 	agencies_id in($emp_id)";
        }
        $q = $this->db->select('shop_id')->from('tbl_order')->where($wheres)->group_by('shop_id')->get()->result();
        $this->db->last_query();
        $shopss = "";
        foreach ($q as $ssr) {
            $shopss .= $ssr->shop_id;
            $shopss .= ",";
        }
        $ssw = substr($shopss, 0, -1);


        $where = "shop_id in($ssw) and shop_types!=3  or (date(shop_created_on) between '$from' and '$to' and shop_types!=3) ";

        $query = $this->db
                        ->like('agency_id', $search)
                        ->or_like('remarks', $search)
                        ->or_like('shop_id', $search)
                        ->like('shop_name', $search)
                        ->or_like('shop_owner_name', $search)
                        ->or_like('shop_contact', $search)
                        ->like('shop_landline', $search)
                        ->or_like('shop_location', $search)
                        ->or_like('shop_photos', $search)
                        ->like('shop_previous', $search)
                        ->or_like('address', $search)
                        ->or_like('shop_type', $search)
                        ->or_like('agencies_name', $search)
                        ->or_like('emp_id', $search)
                        ->select('shop_created_on,agency_id,remarks,shop_id, shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos,'
                                . ' shop_previous, address,shop_type,tbl_agencies.agencies_name,emp_id')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->get()->num_rows();



        return $query;
    }

    public function fetch_shop_list() {
        $date = date("Y-m-d");

        $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];
        if ($usertype == 1) {
            $where = "shop_act ='1' and date(shop_created_on)='$date' and shop_types!=3";
        } if ($usertype == 4) {
            $where = "shop_act ='1' and date(shop_created_on)='$date' and shop_types!=3	agencies_id=$emp_id";
        }


        return $this->db->select('shop_created_on,shop_id,agency_id,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos,emp_id, shop_previous, address,shop_type,tbl_agencies.agencies_name')
                        ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->get()->result();
    }

    public function fetch_shop_lists($from, $to) {
        $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];
        if ($usertype == 1) {
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!=''";
        } if ($usertype == 4) {
            $wheres = "act ='1' and created_on between '$from' and '$to'  and shop_type!=3 and shop_id!='' and 	agencies_id=$emp_id";
        }
        $qs = $this->db->select('shop_id')->from('tbl_order')->where($wheres)->group_by('shop_id')->get()->num_rows();

        if ($qs > 0) {

            $q = $this->db->select('shop_id')->from('tbl_order')->where($wheres)->group_by('shop_id')->get()->result();
            $shopss = "";
            foreach ($q as $ssr) {
                $shopss .= $ssr->shop_id;
                $shopss .= ",";
            }
            $ssw = substr($shopss, 0, -1);



            $where = "shop_id in($ssw) and shop_types!=3  or (date(shop_created_on) between '$from' and '$to' and shop_types!=3) ";

            return $this->db->select('shop_created_on,shop_id,agency_id,remarks,shop_name, shop_owner_name, shop_contact, shop_landline, shop_location, shop_photos,emp_id, shop_previous, address,shop_type,tbl_agencies.agencies_name')
                            ->join('tbl_agencies', 'tbl_agencies.agencies_id=tbl_shop.agency_id')->from('tbl_shop')->where($where)->order_by('shop_id', 'ASC')->get()->result();
        }
    }

    function allorderposts_count($from, $to) {
        $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];
        if ($usertype == 1 || $usertype == 2) {
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!=''";
        } if ($usertype == 4) {
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!='' and 	agencies_id=$emp_id";
        }
        if ($usertype == 3) {
            $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!='' and agencies_id in($agencies_id)";
        }
        return $this->db->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')->join('tbl_shop', 'tbl_shop.shop_id=tbl_order.shop_id')->where($where)->group_by('tbl_order.shop_id')->get()->num_rows();
    }

    function postsorder_search($limit, $start, $search, $order, $dir, $from, $to) {
        $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];
        if ($usertype == 1) {
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!=''  and  (tbl_shop.shop_name like '%$search%' or tbl_shop.shop_owner_name like '%$search%')";
        } if ($usertype == 4) {
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!='' and 	agencies_id=$emp_id  and  (tbl_shop.shop_name like '%$search%' or tbl_shop.shop_owner_name like '%$search%')";
        }
        if ($usertype == 3) {
            $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!='' and 	agencies_id in ($emp_id)  and  (tbl_shop.shop_name like '%$search%' or tbl_shop.shop_owner_name like '%$search%')";
        }

        return $this->db->limit($limit, $start)->order_by($order, $dir)->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')->join('tbl_shop', 'tbl_shop.shop_id=tbl_order.shop_id')
                        ->where($where)->group_by('tbl_order.shop_id')->get()->result();
    }

    function postorders_search_count($search, $from, $to) {
        $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];
        if ($usertype == 1 || $usertype == 2) {
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!=''  and  (tbl_shop.shop_name like '%$search%' or tbl_shop.shop_owner_name like '%$search%')";
        } if ($usertype == 4) {
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!='' and 	agencies_id=$emp_id  and  (tbl_shop.shop_name like '%$search%' or tbl_shop.shop_owner_name like '%$search%')";
        }
        if ($usertype == 3) {
            $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!='' and 	agencies_id in ($emp_id)  and  (tbl_shop.shop_name like '%$search%' or tbl_shop.shop_owner_name like '%$search%')";
        }
        return $this->db->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')->join('tbl_shop', 'tbl_shop.shop_id=tbl_order.shop_id')
                        ->where($where)->group_by('tbl_order.shop_id')->get()->result();
    }

    function allorderposts($limit, $start, $order, $dir, $from, $to) {

        $usertype = $_SESSION['userdata']['type'];
        $emp_id = $_SESSION['userdata']['emp_id'];
        if ($usertype == 1 || $usertype == 2) {
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!=''";
        } if ($usertype == 4) {
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!='' and 	agencies_id=$emp_id";
        }
        if ($usertype == 3) {
            $row = $this->db->query("select employee_agencyId from tbl_employee where employee_id=$emp_id")->row();
            $agencies_id = $row->employee_agencyId;
            $where = "act ='1' and created_on between '$from' and '$to'  and tbl_order.shop_type!=3 and tbl_order.shop_id!='' and agencies_id in($agencies_id)";
        }

        return $this->db->limit($limit, $start)->order_by($order, $dir)->select('tbl_order.*,tbl_shop.*,sum(price) as t')->from('tbl_order')->join('tbl_shop', 'tbl_shop.shop_id=tbl_order.shop_id')->where($where)->group_by('tbl_order.shop_id')->get()->result();
    }

    public function addimport($data) {
        $q1 = $this->db->insert('tbl_import', $data);
        if ($q1) {
            return "1";
        } else {
            return "2";
        }
    }

}

?>