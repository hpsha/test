<body>
            <div class="right-sidebar-backdrop"></div>
            <!-- /Right Sidebar Backdrop -->
            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5 class="txt-dark">EDIT PRODUCT TYPE</h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                                 <li><a href="<?php echo base_url(); ?>Master/uom_list">UOM List</a></li>
                                <li class="active"><span>UOM Edit</span></li>
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
                                            <form data-toggle="validator" role="form" id="edit_prd_type_form" action="<?php echo base_url(); ?>Master/update_uom" method="POST">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputuname_2">UOM Name</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="uom_name" name="uom_name" placeholder="UOM Name" data-validation="required" data-validation-error-msg="Please Enter UOM Name" value="<?php echo $uom_edit->uom_name; ?>">
                                                            <div class="input-group-addon"><i class="fa fa-paste"></i></div>
                                                        </div>
                                                    </div>
												</div>
												<input type="hidden" name="key" id="key" value="<?php echo $uom_edit->uom_rand; ?>">
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
