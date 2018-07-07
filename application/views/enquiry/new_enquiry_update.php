<?php //print_r($_SESSION['userdata']['email']);exit();   ?>
<body>
    <div class="right-sidebar-backdrop"></div>
    <!-- /Right Sidebar Backdrop -->
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">EDIT ENQUIRY</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Enquiry/new_enq_list">New Enquiry List</a></li>
                        <li class="active"><span>Enquiry Edit</span></li>
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
                                    <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Enquiry/update_newenquiry" method="POST" enctype="multipart/form-data">
                                        <?php //print_r($enquiry_details);

                                        foreach ($enquiry_details as $enq_data)
                                            
                                            ?>
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
                                                    <input type="text" class="form-control" id="cus_type" name="cus_type" placeholder="Company Name" readonly="true" value="<?php echo $enq_data->customer_type; ?>">
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
                                                    <input type="text" class="form-control" id="emp_number" name="emp_number" placeholder="Enter Mobile Number" readonly="true"   data-validation="length number" data-validation-length="10" data-validation-error-msg="Please enter Valid Mobile Number" value="<?php echo $enq_data->enquiry_cus_mobileno; ?>">
                                                    <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Customer Email address</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="Enter email" readonly="true"  value="<?php echo $enq_data->enquiry_cus_email; ?>">
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
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Enquiry Description</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" rows="2" id="enq_des" name="enq_des" placeholder="Enquiry Description" readonly="true" ><?php echo $enq_data->enquiry_desc; ?></textarea>
                                                    <div class="input-group-addon"><i class="fa fa-edit"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10"  for="exampleInputEmail_3">Enquiry Project</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="enq_project" name="enq_project" placeholder="Enaquiry Project" readonly="true"   value="<?php echo $enq_data->enquiry_project; ?>">
                                                    <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Enquiry Sf</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="sf" name="sf" placeholder="Enquiry Sf" readonly="true"   value="<?php echo $enq_data->enquiry_sq_ft; ?>">
                                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
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
                                            </div>
                                          <!--  <div class="form-group col-md-4">
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
                                            </div> -->
                                          <div class="form-group col-md-4">
                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Design Sheet Required</label>
                                                    <div class="input-group">
                                                         <input type="text" class="form-control" id="created_by" name="created_by" 
                                                         placeholder="Design Sheet Required" readonly="true" value="<?php echo $enq_data->design_sheet ?>">
                                                                                                             <div class="input-group-addon"><i class="fa fa-users"></i></div>

                                                   
                                                </div> </div>
                                          <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Referred By</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="referred_by" name="referred_by" placeholder="Referred By" readonly="true" value="<?php echo $enq_data->referred_by; ?>">
                                                    <div class="input-group-addon"><i class="ti-direction"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Qty</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="qty" name="qty" placeholder="qty" readonly="true" value="<?php echo $enq_data->enquiry_qty; ?>">
                                                    <div class="input-group-addon"><i class="ti-direction"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Enquiry Status</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="status" id="status"  data-validation="required" data-validation-error-msg="Please Select Enquiry Status" onchange="statuses(this.value);">
                                                        <option value="">Select Enquiry status</option>
                                                        <option value="Processing">New</option>
                                                        <option value="Drop">Drop</option>
                                                    </select>
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
                                if(count($output->results)>0){
                                                                echo $output->results[0]->formatted_address; 
                                }
                                else{
                                    Echo "No address found";
                                }
                                ?></div> 
                                                </div>
                                            </div>
                                            </div>
                                                                                    <div class="row"><label class="control-label mb-10" for="exampleInputEmail_4">Customer Image</label><br><div class="col-md-6">  <img src="<?php echo $enq_data->	enquiry_cus_image; ?>" style="width:300px;height:300px"></div></div>

                                            <span id="hidden_new" style="display:none;">
                                                <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10"  for="exampleInputEmail_3">Quotation No</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="quotation_no" name="quotation_no" placeholder="Enaquiry Quotation No"  data-validation="required" data-validation-error-msg="Please Quotation number" >
                                                    <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Date</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" id="new_date" name="new_date" placeholder="Enquiry Sf"  data-validation="required" data-validation-error-msg="Chooss date">
                                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                </div>
                                            </div>
                                                
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Amount</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="new_amt" name="new_amt" placeholder="Enter Amount"  data-validation="required" data-validation-error-msg="Please enter Amount">
                                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                                </div>
                                            </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">Quantity</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="new_qty" name="new_qty" placeholder="Enter Quantity"  data-validation="required" data-validation-error-msg="Please enter Quantity">
                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                                     <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_4">square feet</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="new_sf" name="new_sf" placeholder="Enter square feet"  data-validation="required" data-validation-error-msg="Please enter square feet">
                                                    <div class="input-group-addon"><i class="fa fa-bars"></i></div>
                                                </div>
                                            </div>
                                                </div>
                                            </span>
                                        
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
            function statuses(id){
               if(id=='Processing'){
                   $("#hidden_new").show();
               }
               else{
                   $("#hidden_new").hide();
               }
            }
            /*function pass_check(pss)
             {
             $.validate({});
             if(pss==123456){
             //$( "#emp_form" ).submit();
             }
             else{
             alert();
             }
             }*/
            /*$(function() {
             $('#emp_form').on('submit', function(e) {
             e.preventDefault();
             var i=0;
             var sum;
             var session_pass = '<?php echo $_SESSION['userdata']['email']; ?>';
             var login_pass = $('#login_pass').val();
             //alert(session_pass);
             if(session_pass==login_pass)
             {
             alert("matched");
             $('#emp_form').submit();
             i++;
             sum=i;
             }
             else{
             alert();
             }
             });
             });
             function check_pass(){
             var session_pass = '<?php echo $_SESSION['userdata']['email']; ?>';
             var login_pass = $('#login_pass').val();
             if(session_pass==login_pass){
             
             }
             else{
             $('#login_pass').val('');
             }
             }
             $("#role").select2({
             placeholder: "Select a Role",
             allowClear: true});
             $("#role").change(function () {
             
             $(this).valid()
             });*/
        </script>