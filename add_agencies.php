<?php //print_r($customergroup);exit();  ?>
<body>
    <div class="right-sidebar-backdrop"></div>
    <!-- /Right Sidebar Backdrop -->
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Agencies Add</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Agencies/">Agencies List</a></li>
                        <li class="active"><span>Agencies Add</span></li>
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
                                    <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Agencies/adddetails" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                           
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Agencies Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" data-validation="required" data-validation-error-msg="Please Enter Agencies Name" value="">
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                              
												 <div class="form-group col-md-4">
                                                    <label class="control-label mb-10" for="exampleInputEmail_4">Agencies Assigned to</label>
													
												<select class="form-control" id="created_by" name="created_by"  data-validation="required" data-validation-error-msg="Please Select Assigned to">
                                                            <option value="">Please Select Assigned to</option>
                                                            <?php  foreach ($employee as $emp_data) { ?>
                                                               < <option value="<?php echo $emp_data->employee_id; ?>" ><?php echo $emp_data->employee_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                               

                                        </div>
                                        </div> 
										<div class="row">
										<div class="col-md-6">
                                            <label class="control-label mb-10" for="exampleInputEmail_4">Location</label>
                                            <div class="file-repeater">
                                                <div data-repeater-list="repeater-list">
                                                    <div data-repeater-item>
                                                        <div class="row mb-1">


                                                            <div class="form-group col-md-9">

                                                                <input type="text" name="document_name"  id="document_name" class="form-control" placeholder="Location" data-validation="required"  data-validation-error-msg="Enter the Location">
                                                            </div>

                                                            <button type="button" data-repeater-delete class="btn btn-icon btn-danger mr-1 cls" ><i class="fa fa-times"></i></button>

                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" data-repeater-create class="btn btn-info">
                                                    <i class="fa fa-plus"></i> Add more
                                                </button>
                                            </div></div>
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
        <script>
        //SCHEDULE page select2
        $("#created_by").select2({
             placeholder: "Agencies assigned to",
             allowClear: true});
        </script>