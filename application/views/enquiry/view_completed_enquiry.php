<?php //print_r($_SESSION['userdata']['email']);exit();      ?>
<body>
    <div class="right-sidebar-backdrop"></div>
    <!-- /Right Sidebar Backdrop -->
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">VIEW COMPLETED ENQUIRY</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Enquiry/get_completed_enq">Completed Enquiry List</a></li>
                        <li class="active"><span>View Completed Enquiry</span></li>
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
                                    <form data-toggle="validator" role="form" id="emp_form" method="POST" enctype="multipart/form-data">
                                        <?php
                                  //      print_r($enquiry);
                                        foreach ($enquiry as $enq_data) ?>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Enquiry Number</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="enq_no" name="enq_no" placeholder="Company Name" readonly="true" data-validation="required" data-validation-error-msg="Please Enter Enquiry Number" value="<?php echo $enq_data->enquiry_no; ?>">
                                                    <div class="input-group-addon"><i class="fa fa-comment"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Customer Type</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cus_type" name="cus_type" placeholder="Company Name" readonly="true" data-validation="required" data-validation-error-msg="Please Enter Customer Type" value="<?php echo $enq_data->customer_type; ?>">
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Customer Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cus_name" name="cus_name" placeholder="Company Name" readonly="true" data-validation="required" data-validation-error-msg="Please Enter Customer Name" value="<?php echo $enq_data->enquiry_cus_name; ?>">
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="Mobile Number">Customer Mobile Number</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="emp_number" name="emp_number" placeholder="Enter Mobile Number" readonly="true"  data-validation="length number" data-validation-length="10" data-validation-error-msg="Please enter Valid Mobile Number" value="<?php echo $enq_data->enquiry_cus_mobileno; ?>">
                                                    <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Customer Email address</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="Enter email" readonly="true"  data-validation="email" data-validation-error-msg="Please enter a valid e-mail" value="<?php echo $enq_data->enquiry_cus_email; ?>">
                                                    <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Customer Area</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cus_area" name="cus_area" placeholder="Address line1" readonly="true"  data-validation="required" data-validation-error-msg="Please enter Customer Area" value="<?php echo $enq_data->enquiry_cus_area; ?>">
                                                    <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Enaquiry Description</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" rows="2" id="enq_des" name="enq_des" placeholder="Enaquiry Description" readonly="true"  data-validation="required" data-validation-error-msg="Please enter Enquiry Description"><?php echo $enq_data->enquiry_desc; ?></textarea>
                                                    <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10"  for="exampleInputEmail_3">Enaquiry Project</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="enq_project" name="enq_project" placeholder="Enaquiry Project" readonly="true"  data-validation="required" data-validation-error-msg="Please Enaquiry Project" value="<?php echo $enq_data->enquiry_project; ?>">
                                                    <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Enquiry Sf</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="sf" name="sf" placeholder="Enquiry Sf" readonly="true"  data-validation="required" data-validation-error-msg="Please enter Enquiry Sf" value="<?php echo $enq_data->enquiry_sq_ft; ?>">
                                                    <div class="input-group-addon"><i class="fa fa-bars"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Enquiry Created by</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="created_by" name="created_by" placeholder="Created by" readonly="true"  data-validation="required" data-validation-error-msg="Please enter Created by" value="<?php echo $enq_data->employee_name; ?> - <?php echo $enq_data->employee_phone; ?>">
                                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                </div>
                                            </div> <?php /*
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Location Latitude</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" readonly="true" value="<?php echo $enq_data->location_lat; ?>">
                                                    <div class="input-group-addon"><i class="ti-direction"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Location Longitude</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" readonly="true" value="<?php echo $enq_data->location_lon; ?>">
                                                    <div class="input-group-addon"><i class="ti-direction"></i></div>
                                                </div>
                                            </div> */ ?>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Referred By</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="referred_by" name="referred_by" placeholder="Referred By" readonly="true" value="<?php echo $enq_data->referred_by; ?>">
                                                    <div class="input-group-addon"><i class="ti-direction"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Design Sheet Required</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="design_sheet" name="design_sheet" placeholder="qty" readonly="true" value="<?php echo $enq_data->design_sheet; ?>">
                                                    <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Qty</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="qty" name="qty" placeholder="qty" readonly="true" value="<?php echo $enq_data->enquiry_qty; ?>">
                                                    <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                </div>
                                            </div>
                                                <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Quotaion Number</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="pre_quot" name="pre_quot" readonly="true" data-validation="required" data-validation-error-msg="Ente Quotation number" value="<?php echo $enq_data->quotaion_no; ?>">
                                                            <div class="input-group-addon"><i class="fa fa-info"></i></div>
                                                        </div>
                                                    </div>
                                        
                                              <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Current Location:</label>
                                              
                                           <div>    <?php 
                                               $lat=$enq_data->location_lat;
                                               $long=$enq_data->location_lon;
                                               $service_url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$long.'&key=AIzaSyB77iOLBywXmbZHUNNqqfYDutbk5aBYWog';
                                $curl = curl_init($service_url);

                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                $curl_response = curl_exec($curl);
                                $output = json_decode($curl_response);
                                                                echo $output->results[0]->formatted_address; 

                                ?></div> 
                                                </div>
                                            </div>
                                            </div>
                                                                                    <div class="row"><label class="control-label mb-10" for="exampleInputEmail_4">Customer Image</label><br><div class="col-md-6">  <img src="<?php echo $enq_data->	enquiry_cus_image; ?>" style="width:300px;height:300px"></div></div>

                                        <div class="row">
                                            <div class="form-group mb-0 col-md-12">
                                                <button type="submit" class="btn btn-warning btn-anim pull-right" id="but" onclick="history.go(-1);"><i class="fa fa-arrow-left"> Back</i> <span class="btn-text">Back</span></button>
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