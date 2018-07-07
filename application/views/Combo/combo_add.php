<body><br><br>
<div class="right-sidebar-backdrop"></div>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark"><?php echo $title; ?></h5>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Target"><span>Combo Offer</span></a></li>
                        <li class="active"><span><?php echo $title; ?></span></li>
                    </ol>
                </div>
            </div>
<div class="row">
    <div class="col-md-12">
        <div class="panel card-view">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        <form data-toggle="validator" role="form" action="<?php echo base_url(); ?>Combo/save" method="POST">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="control-label mb-10">Offer Name</label>
                                      <div class="input-group">
                                        <input type="text" class="form-control" id="offer_name" name="tbl_combo_offer[offer_name]" placeholder="Enter Offer Name" data-validation="required" >
                                        <div class="input-group-addon"><i class="icon-basket"></i></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label mb-10">Scheme Code</label>
                                      <div class="input-group">
                                        <input type="text" class="form-control" id="scheme_code" name="tbl_combo_offer[scheme_code]" placeholder="Enter Scheme Code" data-validation="required" >
                                        <div class="input-group-addon"><i class="icon-badge"></i></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label mb-10" for="exampleInputuname_2">From Date</label>
                                    <div class="input-group">
                                        <input type="text" name="tbl_combo_offer[from_date]" id="from_date" class="form-control  input-daterange-datepicker"/>
                                        <div class="input-group-addon"><i class="icon-calender"></i></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label mb-10" for="exampleInputuname_2">To Date</label>
                                    <div class="input-group">
                                        <input type="text" name="tbl_combo_offer[to_date]" id="toDate" class="form-control  input-daterange-datepicker"/>
                                        <div class="input-group-addon"><i class="icon-calender"></i></div>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="control-label mb-10" for="exampleInputEmail_2">Discount Amount</label>
                                        <div class="input-group">
                                            <input type="text" id="amount" name="tbl_combo_offer[amount]" class="form-control" placeholder="Enter Amount" data-validation="required" data-validation-error-msg="Please Enter Amount">
                                            <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label mb-10" for="exampleInputEmail_4">Category Name</label>
                                        <div class="input-group">
                                            <select  class="form-control" id="categoty_names"  name="tbl_combo_offer[category_id]" class="form-control" id="salesPersonid" data-validation="required" data-validation-error-msg="Please Select Category" onchange="return filterProduct(this.value)">
                                            <option value="">Please Select Category</option>
                                            <?php  foreach ($category as $cate) { ?>
                                                <option value="<?php echo $cate->productgroup_id; ?>"><?php echo $cate->productgroup_name; ?></option>
                                            <?php } ?>
                                        </select>
                                         
                                          <div class="input-group-addon"><i class="icon-pin"></i></div>
                                        </div>
                                  </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label mb-10" for="exampleInputEmail_4">Product Name</label>
                                        <div class="input-group">
                                            <select  class="form-control" id="product_name"  multiple name="tbl_combo_offers[product_id][]" class="form-control" id="salesPersonid" data-validation="required" data-validation-error-msg="Please Select Assigned to">
                                            <option value="">Please Select Products</option>
                                            <?php  foreach ($product as $pro) { ?>
                                                <option value="<?php echo $pro->product_id; ?>"><?php echo $pro->product_name; ?></option>
                                            <?php } ?>
                                        </select>
                                         
                                          <div class="input-group-addon"><i class="icon-pin"></i></div>
                                        </div>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-0 col-md-12">
                                        <button type="button" class="btn btn-danger btn-anim pull-right" style="margin-left: 40px;" onclick="window.location.href='<?php echo base_url(); ?>/Combo'"><i class="fa fa-cloud-upload"> Back</i> <span class="btn-text">Back</span></button>
                                        <button type="submit" class="btn btn-success btn-anim pull-right"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
                                        
                                    </div> 
                                </div>
                        </form>  
                    </div></div></div></div>

    </div>
</div>

</div>

</body>
<script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/dist/js/form-picker-data.js'); ?>"></script>    <script>
        
     $('.input-daterange-datepicker').datetimepicker({
                format: 'DD-MM-YYYY',
                sideBySide: true,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
            });
             $("#categoty_name").select2({
             placeholder: "Categoty Name",
             allowClear: true});
               $("#product_name").select2({
             placeholder: "Product Name",
             allowClear: true});
              $("#name").select2({
             placeholder: "Agencies name",
             allowClear: true});
                 $("#location").select2({
             placeholder: "Locations name",
             allowClear: true});
           function filterProduct(str){
                 $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Combo/get_products',
                    data: {
                        cateId: str
                    },
                    success: function (data) {
                        
                        $("#product_name").html(data);
                    }
                });
           }
            </script>
</html>



