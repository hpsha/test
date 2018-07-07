<?php
class Master_Model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
public function add($data){
	$where = "itemgroup_itemname =" . "'" . $data['itemgroup_itemname'] . "'";
	$q=$this->db->select('itemgroup_id')->from('tbl_itemgroup')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->insert('tbl_itemgroup', $data);
		if($q1){
			return 1;
		}
		else{
			return 2;
		}
	}
	else{
		return 3;
	}
}
public function get_itemgroup($cid){
	$where = "itemgroup_act=1 and company_id=$cid";
	return $this->db->select('itemgroup_rand,itemgroup_itemname,itemgroup_description,itemgroup_id')->from('tbl_itemgroup')->where($where)->get()->result();
}
public function get_itemgroups($key){
	$where = "itemgroup_act=1 AND itemgroup_rand='$key'";
	return $this->db->select('itemgroup_rand,itemgroup_itemname,itemgroup_description')->from('tbl_itemgroup')->where($where)->get()->row();
}
public function updateitemgroup_data($data, $id)
    {
        $this->db->where('itemgroup_rand', $id);
        if ($this->db->update('tbl_itemgroup', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
//Item grade
   public function get_itemgrade(){
	$where = "itemgrade_act=1";
	return $this->db->select('itemgrade_rand,itemgrade_name,itemgrade_description,itemgrade_id')->from('tbl_itemgrade')->where($where)->get()->result();
}
public function additemgrade($data){
	$where = "itemgrade_name =" . "'" . $data['itemgrade_name'] . "'";
	$q=$this->db->select('itemgrade_id')->from('tbl_itemgrade')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->insert('tbl_itemgrade', $data);
		if($q1){
			return 1;
		}
		else{
			return 2;
		}
	}
	else{
		return 3;
	}
}
public function updateitemgrade_data($data, $id)
    {
        $this->db->where('itemgrade_rand', $id);
        if ($this->db->update('tbl_itemgrade', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
    public function get_itemgrades($key){
	$where = "itemgrade_act=1 AND itemgrade_rand='$key'";
	return $this->db->select('itemgrade_rand,itemgrade_name,itemgrade_description')->from('tbl_itemgrade')->where($where)->get()->row();
}


//converion uom

  public function get_conversionuom($cid)
          {
	$where = "conversionuom_act=1 and company_id=$cid";
	return $this->db->select('conversionuom_rand,conversionuom_name,conversionuom_id')->from('tbl_conversionuom')->where($where)->get()->result();
}
public function addconversionuom($data){
	$where = "conversionuom_name =" . "'" . $data['conversionuom_name']  . "' and company_id=" . "'" . $data['company_id'] . "'";
	$q=$this->db->select('conversionuom_id')->from('tbl_conversionuom')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->insert('tbl_conversionuom', $data);
		if($q1){
			return 1;
		}
		else{
			return 2;
		}
	}
	else{
		return 3;
	}
}
public function updateconversionuom_data($data, $id)
    {
        $this->db->where('conversionuom_rand', $id);
        if ($this->db->update('tbl_conversionuom', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
    public function get_conversionuoms($key){
	$where = "conversionuom_act=1 AND conversionuom_rand='$key'";
	return $this->db->select('conversionuom_rand,conversionuom_name')->from('tbl_conversionuom')->where($where)->get()->row();
}

//ADD PRODUCT TYPE
 public function Product_typeadd($data){
	$where = "product_type_name =" . "'" . $data['product_type_name'] . "'";
	$q=$this->db->select('*')->from('tbl_prd_type')->where($where)->get()->num_rows();
	if($q==0){
		$q1=$this->db->insert('tbl_prd_type', $data);
		if($q1){
			return 1;
		}
		else{
			return 2;
		}
	}
	else{
		return 3;
	}
}
//Fetch holl data PROCESS
public function get_product_type(){
	$where = "product_type_act=1";
	return $this->db->select('product_type_rand,product_type_name,product_type_id')->from('tbl_prd_type')->where($where)->get()->result();
}
//Fetch PROCESS
 public function get_prd_type($key){
	$where = "product_type_act=1 AND product_type_rand ='$key'";
	return $this->db->select('product_type_rand,product_type_name')->from('tbl_prd_type')->where($where)->get()->row();
}

//UPDATE PROCESS
    public function update_prdtype_data($data,$rand) {
		$id = $data['product_type_rand'];
	  $condition = "`product_type_name` =" . "'" . $data['product_type_name'] . "' and `product_type_rand` !='$id' AND product_type_act=1";
        $this->db->select('*');
        $this->db->from('tbl_prd_type');
        $this->db->where($condition);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 0) {
				$this->db->where('product_type_rand', $rand);
			if ($this->db->update('tbl_prd_type', $data)) {
				return 1;
			}
			else{
				return 2;

            }
		}
		else {
            return 3;
        }
    }
//DELETE PRODUCT TYPE
public function delete_prdtype($data, $rand)
    {
        $this->db->where('product_type_rand', $rand);
        if ($this->db->update('tbl_prd_type', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }

	//Fetch holl data PROCESS
	public function get_uom($cid){
		$where = "uom_act=1 and company_id=$cid";
		return $this->db->select('uom_rand,uom_name,uom_id')->from('tbl_uom')->where($where)->get()->result();
	}


	//ADD PRODUCT TYPE
	 public function uom_add($data){
		$where = "uom_name =" . "'" . $data['uom_name'] . "' and company_id=" . "'" . $data['company_id'] . "'";
		$q=$this->db->select('*')->from('tbl_uom')->where($where)->get()->num_rows();
		if($q==0){
			$q1=$this->db->insert('tbl_uom', $data);
			if($q1){
				return 1;
			}
			else{
				return 2;
			}
		}
		else{
			return 3;
		}
	}

	//Fetch UOM PROCESS
	 public function get_uom_edit($key){
		$where = "uom_act=1 AND uom_rand ='$key'";
		return $this->db->select('uom_rand,uom_name')->from('tbl_uom')->where($where)->get()->row();
	}
	//UPDATE UOM
	    public function update_uom_data($data,$rand) {
		$id = $data['uom_rand'];
	  $condition = "`uom_name` =" . "'" . $data['uom_name'] . "' and `uom_rand` !='$id' AND uom_act=1";
        $this->db->select('*');
        $this->db->from('tbl_uom');
        $this->db->where($condition);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 0) {
				$this->db->where('uom_rand', $rand);
			if ($this->db->update('tbl_uom', $data)) {
				return 1;
			}
			else{
				return 2;

            }
		}
		else {
            return 3;
        }
    }

   //DELETE UOM
 public function delete_uom_detail($data, $rand)
    {
        $this->db->where('uom_rand', $rand);
        if ($this->db->update('tbl_uom', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
    //machine category
 public function get_machinecategory()
          {
	$where = "machinery_category_act=1";
	return $this->db->select('machinery_category_rand,machinery_category_id,machiney_category_name')->from('tbl_machinery_category')->where($where)->get()->result();
}
public function addmachinecategory($data){
	$where = "machiney_category_name =" . "'" . $data['machiney_category_name'] . "'";
	$q=$this->db->select('machinery_category_id')->from('tbl_machinery_category')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->insert('tbl_machinery_category', $data);
		if($q1){
			return 1;
		}
		else{
			return 2;
		}
	}
	else{
		return 3;
	}
}
public function updatemachinecategory_data($data, $id)
    {
        $this->db->where('machinery_category_rand', $id);
        if ($this->db->update('tbl_machinery_category', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
    public function get_machinecategorys($key){
	$where = "machinery_category_act=1 AND machinery_category_rand='$key'";
	return $this->db->select('machinery_category_rand,machiney_category_name')->from('tbl_machinery_category')->where($where)->get()->row();
}
public function get_subcategory(){
	$where = "machinery_subcategory_act=1";
	return $this->db->select('tbl_machinery_subcategory.machinery_subcategory_rand,tbl_machinery_subcategory.machinery_subcategory_name,tbl_machinery_category.machiney_category_name')->from('tbl_machinery_subcategory')->join('tbl_machinery_category','tbl_machinery_category.machinery_category_id=tbl_machinery_subcategory.machinery_category_id')->where($where)->get()->result();
}
public function getsubcategory(){
	$where = "machinery_subcategory_act=1 AND machinery_category_id=1";
	return $this->db->select('machinery_subcategory_name,machinery_subcategory_id')->from('tbl_machinery_subcategory')->where($where)->get()->result();
}
public function get_category(){
	$where = "machinery_category_act=1";
	return $this->db->select('machinery_category_id,machiney_category_name')->from('tbl_machinery_category')->where($where)->get()->result();
}
public function subcategory_add($data){
		$where = "machinery_category_id =" . "'" . $data['machinery_category_id'] . "' AND machinery_subcategory_name=" . "'" .$data['machinery_subcategory_name'] . "'";
		$q=$this->db->select('*')->from('tbl_machinery_subcategory')->where($where)->get()->num_rows();
		if($q==0){
			$q1=$this->db->insert('tbl_machinery_subcategory', $data);
			if($q1){
				return 1;
			}
			else{
				return 2;
			}
		}
		else{
			return 3;
		}
	}
	public function get_singlesubcategory($key){
	$where = "machinery_subcategory_act=1 AND machinery_subcategory_rand='$key'";
	return $this->db->select('tbl_machinery_subcategory.machinery_subcategory_rand,tbl_machinery_subcategory.machinery_subcategory_name,tbl_machinery_subcategory.machinery_category_id,tbl_machinery_category.machiney_category_name')->from('tbl_machinery_subcategory')->join('tbl_machinery_category','tbl_machinery_category.machinery_category_id=tbl_machinery_subcategory.machinery_category_id')->where($where)->get()->row();
}
public function update_subcategory($data, $id)
    {
        $this->db->where('machinery_subcategory_rand', $id);
        if ($this->db->update('tbl_machinery_subcategory', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
    public function machinery_models()
          {
	$where = "master1_act=1";
	return $this->db->select('master1_id,master1_rand,models_name')->from('tbl_model')->where($where)->get()->result();
}
public function addmachinery_models($data){
	$where = "models_name =" . "'" . $data['models_name'] . "'";
	$q=$this->db->select('master1_id')->from('tbl_model')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->insert('tbl_model', $data);
		if($q1){
			return 1;
		}
		else{
			return 2;
		}
	}
	else{
		return 3;
	}
}
public function update_machinery_models($data, $id)
    {
        $this->db->where('master1_rand', $id);
        if ($this->db->update('tbl_model', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
    public function edit_machinery_master1($key){
	$where = "master1_act=1 AND master1_rand='$key'";
	return $this->db->select('master1_rand,models_name')->from('tbl_model')->where($where)->get()->row();
}
public function machinery_master2()
          {
	$where = "master2_act=1";
	return $this->db->select('master2_id,master2_rand,master2_name')->from('tbl_master2')->where($where)->get()->result();
}
public function addmachinery_master2($data){
	$where = "master2_name =" . "'" . $data['master2_name'] . "'";
	$q=$this->db->select('master2_id')->from('tbl_master2')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->insert('tbl_master2', $data);
		if($q1){
			return 1;
		}
		else{
			return 2;
		}
	}
	else{
		return 3;
	}
}
	public function update_machinery_master2($data, $id)
    {
        $this->db->where('master2_rand', $id);
        if ($this->db->update('tbl_master2', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
    public function edit_machinery_master2($key){
		$where = "master2_act=1 AND master2_rand='$key'";
		return $this->db->select('master2_rand,master2_name')->from('tbl_master2')->where($where)->get()->row();
	}

	//Fetch HSN PROCESS
	public function get_hsn($cid){
		$where = "hsn_act=1 and hsn_company_id=$cid";
		return $this->db->select('hsn_rand,hsn_name,hsn_id')->from('tbl_hsn')->where($where)->get()->result();
	}
	
	//Fetch HSN PROCESS
	 public function get_hsn_details($key){
		$where = "hsn_act=1 AND hsn_rand ='$key'";
		return $this->db->select('hsn_rand,hsn_name')->from('tbl_hsn')->where($where)->get()->row();
	}


	//ADD PRODUCT TYPE
	 public function hsn_add($data){
		$where = "hsn_name =" . "'" . $data['hsn_name'] . "' and hsn_company_id=" . "'" . $data['hsn_company_id']."'";
		$q=$this->db->select('*')->from('tbl_hsn')->where($where)->get()->num_rows();
		if($q==0){
			$q1=$this->db->insert('tbl_hsn', $data);
			if($q1){
				return 1;
			}
			else{
				return 2;
			}
		}
		else{
			return 3;
		}
	}

	
	//UPDATE UOM
	    public function update_hsn_data($data,$rand) {
		$id = $data['hsn_rand'];
	  $condition = "`hsn_name` =" . "'" . $data['hsn_name'] . "' and `hsn_rand` !='$id' AND hsn_act=1";
        $this->db->select('*');
        $this->db->from('tbl_hsn');
        $this->db->where($condition);
        $query = $this->db->get();
        $query->num_rows();
        if ($query->num_rows() == 0) {
				$this->db->where('hsn_rand', $rand);
			if ($this->db->update('tbl_hsn', $data)) {
				return 1;
			}
			else{
				return 2;

            }
		}
		else {
            return 3;
        }
    }
 
   //DELETE UOM
 public function delete_hsn_data($data, $rand)
    {
        $this->db->where('hsn_rand', $rand);
        if ($this->db->update('tbl_hsn', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    } 
//machine make
 public function get_machinemake()
          {
	$where = "machinemake_act=1";
	return $this->db->select('machinemake_rand,machinemake_name')->from('tbl_machinemake')->where($where)->get()->result();
}
public function addmachinemake($data){
	$where = "machinemake_name =" . "'" . $data['machinemake_name'] . "'";
	$q=$this->db->select('machinemake_name')->from('tbl_machinemake')->where($where)->get()->row();
	if($q==""){
		$q1=$this->db->insert('tbl_machinemake', $data);
		if($q1){
			return 1;
		}
		else{
			return 2;
		}
	}
	else{
		return 3;
	}
}
public function updatemachinemake($data, $id)
    {
        $this->db->where('machinemake_rand', $id);
        if ($this->db->update('tbl_machinemake', $data)) {
            return 1;
            }
            else{
            return 2;
            }
    }
    public function edit_machinemake($key){
	$where = "machinemake_act=1 AND machinemake_rand='$key'";
	return $this->db->select('machinemake_rand,machinemake_name')->from('tbl_machinemake')->where($where)->get()->row();
}

}



?>