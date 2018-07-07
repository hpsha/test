<?php //print_r($product[0]);exit();  ?>
<body>
    <div class="right-sidebar-backdrop"></div>
    <!-- /Right Sidebar Backdrop -->
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Product Edit</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Products/list_product">Product List</a></li>
                        <li class="active"><span>Product Edit</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
            <!-- Row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel card-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="form-wrap">

                                    <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Products/update_productdetails" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                          <div class="col-md-3">
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left"> Product Group</label>
                                                    <select class="form-control" id="group_name" name="group_name"  data-validation="required">
                                                        <?php foreach($list as $data){ ?>
                                                        <option value="<?php echo $data->productgroup_id ?>" <?php if($product[0]->productgroup_id==$data->productgroup_id)echo "selected" ?> ><?php echo $data->productgroup_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div></div>
                                                <div class="col-md-3">
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left"> Product Name</label>
                                                    <input type="text" class="form-control" placeholder="Product Name" name="product_name"  data-validation="required" value="<?php echo $product[0]->product_name ?>">
                                                </div></div> </div>          
                                                <input type="hidden" name="id" value="<?php echo $id=$product[0]->product_id ?>">

                                                <?php 
                                        $where="branch_act=1";
                                         $data = $this->db->select('branch_name,branch_id')->from('tbl_branch')->where($where)->get()->result();
                                         foreach($data as $dat){
                                         
                                         ?>
                                          <div class="row">
                                              <h5 style="text-align:center"><?php echo $dat->branch_name; ?></h5>
                                        <div class="col-md-3">
                                            <input type="hidden" name="branch_id[]" value="<?php echo $bid=$dat->branch_id; ?>">      
                                            <?php   $price= $this->db->query("select retail_price,distributor_price from  tbl_price  where branch_id=$bid and	product_id=$id")->row();?>
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left"> Retail Price</label>
                                                    <input type="text" class="form-control" placeholder="Retail Price" name="retail_price[]" value="<?php echo $price->retail_price;?>" >
                                                </div></div>
                                        <div class="col-md-3">
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left"> Distributor Price</label>
                                                    <input type="text" class="form-control" placeholder="Distributor Price" name="distributor_price[]" value="<?php echo $price->distributor_price;?>" >
                                                </div></div>  </div> 
                                         <?php } ?>		
                                        </div>
                                        
										<span id="xx"></span>
                                        <div class="row">
                                            <div class="form-group mb-0 col-md-12">
                                                 <input type="hidden" name="id" value="<?php echo $product[0]->product_id ?>">
                                                <button type="submit" class="btn btn-success btn-anim pull-right" id="but"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>

        <!-- Bootstrap Daterangepicker JavaScript -->
        <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
        <script src="<?php echo base_url('app-assets/dist/js/form-picker-data.js'); ?>"></script>    <script>
            $("#group_name").select2({
             placeholder: "Select Product",
             allowClear: true});

        </script>