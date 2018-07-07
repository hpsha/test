<?php //print_r($subcategory);exit(); ?>
<body>
            <div class="right-sidebar-backdrop"></div>
            <!-- /Right Sidebar Backdrop -->
            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5 class="txt-dark">Edit Machinery Subcategory</h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                                <li><a href="<?php echo base_url(); ?>Master/subcategory_list">List Machinery Subcategory</a></li>
                                <li class="active"><span>Edit Machinery Subcategory</span></li>
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
                                            <form data-toggle="validator" role="form" id="prd_type_form" action="<?php echo base_url(); ?>Master/update_subcategory" method="POST">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                        <label class="control-label mb-10" for="exampleInputuname_2">Machinery Category</label>
                                        <div class="input-group">
                                        <select class="form-control select2" id="category" name="category" data-validation="required" data-validation-error-msg="Select Category">
                                            <option value="">Select Machinery Category</option>
                                            <?php foreach($category as $data){ ?>
                                            <option value="<?php echo $data->machinery_category_id ?>" <?php if($data->machinery_category_id==$subcategory->machinery_category_id)echo "selected" ?> ><?php echo $data->machiney_category_name ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                        <label class="control-label mb-10" for="exampleInputuname_2">Machinery Subcategory Name</label>
                                        <div class="input-group">
                                        <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Machinery Subcategory Name" data-validation="required" data-validation-error-msg="Please Enter Machinery Subcategory Name" value="<?php echo $subcategory->machinery_subcategory_name ?>">
                                        <input type="hidden" name="key" value="<?php echo $subcategory->machinery_subcategory_rand ?>">
                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                        </div>
                                        </div>
									</div>
                                    <div class="row">
									   <div class="form-group mb-0 col-md-12">
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
