<body>
            <div class="right-sidebar-backdrop"></div>
            <!-- /Right Sidebar Backdrop -->
            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5 class="txt-dark">ADD Customer Group</h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                                <li><a href="<?php echo base_url(); ?>Customergroup">Customer Group List</a></li>
                                <li class="active"><span>Customer Group Add</span></li>
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
                                            <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Customergroup/adddetails" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label mb-10" for="exampleInputuname_2">Customer Group Name</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" data-validation="required" data-validation-error-msg="Please Enter Customer Group Name">
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        </div>
                                                    </div>
                        <?php if($_COOKIE['company_id']==1){ ?>
                        <div class="form-group col-md-6">
                        <label class="control-label mb-10" for="exampleInputEmail_4">Category</label>
                        <div class="input-group">
                          <select class="form-control" id="category" name="category1"  data-validation="required" data-validation-error-msg="Please Select">
                            <option value="">Please Select Category</option>
                            <?php foreach($category as $data){ ?>
                            <option value="<?php echo $data->machinery_category_id;  ?>"><?php echo $data->machiney_category_name; ?></option>
                            <?php } ?>
                          </select>
                          <div class="input-group-addon"><i class="fa fa-sitemap"></i></div>
                        </div>
                      </div>
                      <?php } else { ?>
                    <div class="form-group col-md-6">
                        <label class="control-label mb-10" for="exampleInputEmail_4">Item Group</label>
                        <div class="input-group">
                          <select class="form-control" id="itemgroup" name="itemgroup"  data-validation="required" data-validation-error-msg="Please Select">
                            <option value="">Please Select Item Group</option>
                            <?php foreach($itemgroup as $data){ ?>
                            <option value="<?php echo $data->itemgroup_id;  ?>"><?php echo $data->itemgroup_itemname; ?></option>
                            <?php } ?>
                          </select>
                          <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                        </div>
                      </div>
                      <?php } ?>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label mb-10" for="exampleInputuname_2">Discount %</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount" data-validation="number" data-validation-allowing="float"  data-validation-error-msg="Please Enter Discount">
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        </div>
                                                    </div>

                      <div class="form-group col-md-6">
                                                        <label class="control-label mb-10" for="Mobile Number">Customer</label>
                                                        <div class="input-group">
                                                            <select class="form-control" id="customer" name="customer[]" data-validation="required" data-validation-error-msg="Select Customer" multiple>
                                                            <?php foreach($customer as $data){ ?>
                                                            <option value="<?php echo $data->customer_id ?>"><?php echo $data->customer_name ?></option>
                                                            <?php } ?>
                                                            </select>
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        </div>
                                                    </div>
                                                </div>




                                                    <div class="row">
                                                    <div class="form-group mb-0 col-md-12">
                                                        <button type="submit" class="btn btn-success btn-anim" id="but"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
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
<script>
    $("#category").select2({
    placeholder: "Select a Category",
    allowClear: true});
    $("#itemgroup").select2({
    placeholder: "Select a Item Group",
    allowClear: true});
    $("#customer").select2({
    placeholder: "Select Customers",
    allowClear: true});
</script>