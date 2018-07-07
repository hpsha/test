<?php //print_r($customergroup);exit();    ?>
<body>
    <div class="right-sidebar-backdrop"></div>
    <!-- /Right Sidebar Backdrop -->
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Agencies add New</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Task/">Agencies List</a></li>
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
                                    <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Agencies/addnewdetails" method="POST" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Agencies Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder=" Agencies Name" data-validation="required" data-validation-error-msg="Please Enter Agencies Name" value="">
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                             <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Agencies Amount</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="amount" name="amount" placeholder=" Agencies Amount" data-validation="required" data-validation-error-msg="Please Enter Agencies Amount" onkeypress="return isNumberKey(event)" value="">
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                               
                                             <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Agencies Email id </label>
                                                <div class="input-group">
                                                     <input type="email" class="form-control" id="email" name="email" placeholder=" Agencies Email Id" data-validation="required" data-validation-error-msg="Please Enter email id" value="" onkeypress="return emails(event)"> 
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
											<div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Agencies Mobile No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="mobileno" name="mobileno" placeholder="Please Enter Mobile No" data-validation="required" data-validation-error-msg="Please Enter Mobile No" onkeypress="return phone(event)" value="">
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                            				<div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Agencies Password</label>
                                                <div class="input-group">
                                                     <input type="password" class="form-control" id="password" name="password" placeholder="Please Enter Password" data-validation="required" data-validation-error-msg="Please Enter Password" value="">
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                            
											             <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Branch Name</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="names" name="branch_id"  data-validation="required" data-validation-error-msg="Please Select Agencies">
                                                        <option value="">Please Select Branch </option>

                                                        <?php
                                                        $where = "branch_act=1";
                                                        $branch = $this->db->select('*')->from('tbl_branch')->where($where)->get()->result();
                                                        foreach ($branch as $emp_data) {
                                                            ?>

                                                            <option value="<?php echo $emp_data->branch_id; ?>"><?php echo $emp_data->branch_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
											 <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Location</label>
                                                <div class="input-group">	
                                                    <select class="form-control" id="created_by"  multiple name="document_name[]"  data-validation="required" data-validation-error-msg="Please Select Assigned to">
                                                        <option value="">Please Select Assigned to</option>
                                                        <?php foreach ($agency as $emp_data) { ?>
                                                            < <option value="<?php echo $emp_data->location_id; ?>" ><?php echo $emp_data->location_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>

                                            

                                        </div>
                                        <div class="row">
                                           
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

            <script>
                //SCHEDULE page select2
                $("#created_by").select2({
                    placeholder: "Select a Location by",
                    allowClear: true});
            </script>