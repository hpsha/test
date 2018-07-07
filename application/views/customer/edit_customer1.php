<body>
   <!-- Right Sidebar Backdrop -->
   <div class="right-sidebar-backdrop"></div>
   <!-- /Right Sidebar Backdrop -->
   <!-- Main Content -->
   <div class="page-wrapper">
   <div class="container-fluid">
      <!-- Title -->
      <div class="row heading-bg">
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">CUSTOMER ADD</h5>
         </div>
         <!-- Breadcrumb -->
         <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
               <li><a href="javascript:void(0);">Dashboard</a></li>
               <li><a href="<?php base_url(); ?>Customer/list_employee"><span>Customers List </span></a></li>
               <li class="active"><span>Add</span></li>
            </ol>
         </div>
         <!-- /Breadcrumb -->
      </div>
      <!-- /Title -->
      <!-- Row -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default card-view">
               <div class="panel-heading">
                  <div class="pull-left">
                     <h6 class="panel-title txt-dark">Customer Add Form</h6>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                     <form id="example-advanced-form" class="customer_addform" name="form" action="<?php echo base_url(); ?>Customer/customer_details_add" method="POST">
                        <?php $data=$customer_detail; ?>
                        <h3>
                           <span class="number"><i class="icon-user-following txt-black"></i></span><span class="head-font capitalize-font">Customer Details</span>
                        </h3>
                        <fieldset>
                           <div class="row">
                              <div class="col-sm-12 col-md-12">
                                 <div class="form-wrap">
                                    <div class="row">
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputuname_2">Customer Name</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_name" name="customer_name" placeholder="Customer Name" data-validation="required" data-validation-error-msg="Please Enter Customer Name" value="<?php echo $data->customer_name; ?>"> 
                                             <div class="input-group-addon"><i class="icon-user"></i></div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_2">Customer Phone</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_phone" name="customer_phone" placeholder="Enter Phone" data-validation="required" data-validation-error-msg="Please Enter Customer phone" value="<?php echo $data->customer_phone; ?>">
                                             <div class="input-group-addon"><i class="icon-phone"></i></div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_2">Customer Email</label>
                                          <div class="input-group">
                                             <input type="email" class="form-control required" id="customer_mail" name="customer_mail" placeholder="Enter Email" data-validation="required" data-validation-error-msg="Please Enter Customer email" value="<?php echo $data->customer_mail; ?>">
                                             <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_1">Address line1</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_addr1" name="customer_addr1" placeholder="Address line1" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_address_line1; ?>">
                                             <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_2">Address line2</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_addr2" name="customer_addr2" placeholder="Address line2" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_address_line2; ?>">
                                             <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_3">Address line3</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_addr3" name="customer_addr3" placeholder="Address line3" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_address_line3; ?>">
                                             <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_4">Address line4</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_addr4" name="customer_addr4" placeholder="Address line4" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_address_line4; ?>">
                                             <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_4">Pincode</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_pin" name="customer_pin" placeholder="Enter Pincode" data-validation="length number" data-validation="required" data-validation-length="6" data-validation-error-msg="Please enter Valid Pin Number" value="<?php echo $data->customer_pincode; ?>">
                                             <div class="input-group-addon"><i class="ti-direction"></i></div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_4">Spindles</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_Spindles" name="customer_Spindles" placeholder="Enter Spindles" data-validation="required" data-validation-error-msg="Please enter Valid Pin Number" value="<?php echo $data->customer_name; ?>">
                                             <div class="input-group-addon"><i class="fa fa-cogs"></i></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_4">GST No</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_gst_no" name="customer_gst_no" placeholder="GST No" data-validation="required" data-validation-error-msg="Please Enter GST No" pattern="[A-Z0-9]{15}" maxlength="15" value="<?php echo $data->customer_gst_no; ?>">
                                             <div class="input-group-addon"><i class="icon-notebook"></i></div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_4">PAN No</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_pan_no" name="customer_pan_no" placeholder="Enter Pincode" data-validation="length number" data-validation="required" data-validation-error-msg="Please enter Valid Pin Number" value="<?php echo $data->customer_pan_no; ?>">
                                             <div class="input-group-addon"><i class="icon-credit-card"></i></div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class="control-label mb-10" for="exampleInputEmail_4">Area</label>
                                          <div class="input-group">
                                             <input type="text" class="form-control required" id="customer_area" name="customer_area" placeholder="Enter Area" data-validation="length number" data-validation="required" data-validation-error-msg="Please enter Valid Pin Number" value="<?php echo $data->customer_area; ?>">
                                             <div class="input-group-addon"><i class="fa fa-crosshairs"></i></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </fieldset>
                        <h3>
                           <span class="number"><i class="icon-screen-desktop txt-black"></i></span><span class="head-font capitalize-font">Office Details</span>
                        </h3>
                        <fieldset>
                           <div class="row">
                              <?php
                                 $i=1;
                                 $count=count($companies);
                                 for($j=0;$j<$count;$j++ ){
                                 $datas=$companies[$j];
                                 //print_r($datas);
                                 ?>
                              <center>
                                 <p>Company Name : <b><?php echo $datas->company_name; ?></b></p>
                                 <input type="hidden" name="company_id[]" value="<?php echo $cid=$datas->company_id; ?>">
                              </center>
                              <div class="row">
                                 <div class="col-sm-2 col-md-2">
                                    <div class="checkbox checkbox-success">
                                       <input class="sales_through" id="sales_through<?php echo $i; ?>" type="checkbox" name="customer_through[]" value="1" 
                                          <?php
                                             $counts=count($company_detail);
                                             for($k=0;$k<$counts;$k++) {
                                                 $datak=$company_detail[$k];
                                              $ccid=$datak['company_id'];
                                               $ctype=$datak['customer_sale_type'];
                                               if($ctype==1 && $cid==$ccid){
                                                     echo "CHECKED";
                                               }
                                                 
                                             } ?>>
                                       <label for="checkbox3">Salesperson</label>
                                    </div>
                                 </div>
                                 <div class="col-sm-1 col-md-1">
                                    <div class="checkbox checkbox-success">
                                       <input class="agent_through" id="agent_through<?php echo $i; ?>" type="checkbox" name="agent_through[]" value="2" 	<?php
                                          $counts=count($company_detail);
                                          for($k=0;$k<$counts;$k++) {
                                              $datak=$company_detail[$k];
                                           $ccid=$datak['company_id'];
                                            $ctype=$datak['customer_sale_type'];
                                            if($ctype==2 && $cid==$ccid){
                                                  echo "CHECKED";
                                            }
                                              
                                          } ?>>
                                       <label for="checkbox3">Agent</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12 col-md-12">
                                    <div class="form-wrap">
                                       <div class="row">
                                          <?php
                                             $counts=count($company_detail);
                                             for($k=0;$k<$counts;$k++) {
                                                 $datak=$company_detail[$k];
                                              $ccid=$datak['company_id'];
                                               $ctype=$datak['customer_sale_type'];
                                               if($cid==$ccid){
                                                    if($ctype==2){
                                                          ?>                
                                          <div class="form-group col-md-4" style="" id="agent<?php echo $i; ?>">
                                             <?php
                                                }
                                                else{
                                                						             ?>                
                                             <div class="form-group col-md-4" style="display:none;" id="agent<?php echo $i; ?>">
                                                <?php
                                                   }
                                                     
                                                   } }?>
                                                <div class="form-group">
                                                   <label class="control-label mb-10">Agent</label>
                                                   <select class="form-control select2" id="agent" name="agent[]">
                                                      <?php 
                                                         foreach($agents as $agent_data){ ?>
                                                      <option value="<?php echo $a_id=$agent_data->agent_id; ?>" <?php
                                                         $counts=count($company_detail);
                                                         for($k=0;$k<$counts;$k++) {
                                                             $datak=$company_detail[$k];
                                                          $ccid=$datak['company_id'];
                                                           $ctype=$datak['customer_sale_type'];
                                                           if($cid==$ccid){
                                                               							 $aaid=$datak['customer_sale_agent'];
                                                         
                                                                if($ctype==2){ if($a_id==$aaid) { echo "Selected";} }}} ?>><?php echo $agent_data->agent_name; ?></option>
                                                      <?php } ?>
                                                   </select>
                                                </div>
                                             </div>
                                             <?php
                                                $counts=count($company_detail);
                                                for($k=0;$k<$counts;$k++) {
                                                    $datak=$company_detail[$k];
                                                 $ccid=$datak['company_id'];
                                                  $ctype=$datak['customer_sale_type'];
                                                  if($cid==$ccid){
                                                       if($ctype==1 || $ctype==2){ 
                                                           ?>
                                             <div class="form-group col-md-4" style="" name="sales" id="sales<?php echo $i; ?>">
                                                <?php } else { ?>
                                                <div class="form-group col-md-4" style="display:none;" name="sales" id="sales<?php echo $i; ?>">
                                                   <?php }
                                                      }
                                                      }
                                                                             ?>
                                                   <div class="form-group">
                                                      <label class="control-label mb-10">Salesperson Details</label>
                                                      <select class="form-control select2" id="sales_person" name="sales_person[]">
                                                         <?php 
                                                            foreach($employee as $emp_data){ ?>
                                                         <option value="<?php echo $eid=$emp_data->employee_id;  ?>"   <?php
                                                            $counts=count($company_detail);
                                                            for($k=0;$k<$counts;$k++) {
                                                                $datak=$company_detail[$k];
                                                             $ccid=$datak['company_id'];
                                                              $ctype=$datak['customer_sale_type'];
                                                              if($cid==$ccid){
                                                                  							 $eeid=$datak['customer_sale_salesperson'];
                                                            
                                                                   if($ctype==1 || $ctype==2 ){ if($eid==$eeid) { echo "Selected";} }}} ?>><?php echo $emp_data->employee_name;  ?></option>
                                                         <?php } ?>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <?php $i++; }   ?>
                                 </div>
                        </fieldset>
                        <h3>
                        <span class="number"><i class="icon-credit-card txt-black"></i></span><span class="head-font capitalize-font">Billing Details</span>
                        </h3>
                        <fieldset>
                        <center>
                        <div class="row">
                        <div class="checkbox mr-15">
                        <input id="billing_address" type="checkbox">
                        <label>Same as previous Customer Details</label>
                        </div>
                        </div>
                        </center>
                        <div class="row" id="billing_addr">
                        <div class="col-sm-12 col-md-12">
                        <div class="form-wrap">
                        <div class="row">
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputuname_2">Billing Customer Name</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="billing_name" name="billing_name" placeholder="Billing Customer Name" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_billing_name; ?>"> 
                        <div class="input-group-addon"><i class="icon-user"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Billing Customer Phone</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="billing_phone" name="billing_phone" placeholder="Billing Customer Phone" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_billing_phone; ?>">
                        <div class="input-group-addon"><i class="icon-phone"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Billing Customer Email</label>
                        <div class="input-group">
                        <input type="email" class="form-control required" id="billing_mail" name="billing_mail" placeholder="Billing Customer Email" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_billing_mail; ?>">
                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_1">Billing Address line1</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="billing_address1" name="billing_address1" placeholder="Billing Address line1" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_billing_address1; ?>">
                        <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Billing Address line2</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="billing_address2" name="billing_address2" placeholder="Billing Address line2" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_billing_address2; ?>">
                        <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_3">Billing Address line3</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="billing_address3" name="billing_address3" placeholder="Billing Address line3" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_billing_address3; ?>">
                        <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_4">Billing Address line4</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="billing_address4" name="billing_address4" placeholder="Billing Address line4" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_billing_address4; ?>">
                        <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_4">Billing Pincode</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="billing_pin" name="billing_pin" placeholder="Billing Pincode" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_billing_pincode; ?>">
                        <div class="input-group-addon"><i class="ti-direction"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_4">Billing GST No</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="billing_gst_no" name="billing_gst_no" placeholder="GST No" data-validation="required" data-validation-error-msg="Please Enter GST No" value="<?php echo $data->customer_billing_gst; ?>">
                        <div class="input-group-addon"><i class="icon-notebook"></i></div>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_4">Billing PAN No</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="billing_pan_no" name="billing_pan_no" placeholder="Enter Pincode" data-validation="length number" data-validation="required" data-validation-length="6" data-validation-error-msg="Please enter Valid Pin Number" value="<?php echo $data->customer_billing_pan; ?>">
                        <div class="input-group-addon"><i class="icon-credit-card"></i></div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </fieldset>
                        <h3>
                        <span class="number"><i class="icon-bag txt-black"></i></span><span class="head-font capitalize-font">Shipping Details</span>
                        </h3>
                        <fieldset>
                        <center>
                        <div class="row">
                        <div class="checkbox mr-15">
                        <input id="shipping_addr" type="checkbox">
                        <label>Same as Previous Details</label>
                        </div>
                        </div>
                        </center>
                        <div class="row" id="shipping_address">
                        <div class="col-sm-12 col-md-12">
                        <div class="form-wrap">
                        <div class="row">
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputuname_2">Shipping Customer Name</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="shipping_name" name="shipping_name" placeholder="Shipping Customer Name" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_shipping_name; ?>"> 
                        <div class="input-group-addon"><i class="icon-user"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Shipping Customer Phone</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="shipping_phone" name="shipping_phone" placeholder="Shipping Customer Phone" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_shipping_phone; ?>">
                        <div class="input-group-addon"><i class="icon-phone"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Shipping Customer Email</label>
                        <div class="input-group">
                        <input type="email" class="form-control required" id="shipping_mail" name="shipping_mail" placeholder="Shipping Address line1" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_shipping_mail; ?>">
                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_1">Shipping Address line1</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="shipping_addr1" name="shipping_addr1" placeholder="Shipping Address line1" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_shipping_address1; ?>">
                        <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Shipping Address line2</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="shipping_addr2" name="shipping_addr2" placeholder="Shipping Address line2" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_shipping_address2; ?>">
                        <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_3">Shipping Address line3</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="shipping_addr3" name="shipping_addr3" placeholder="Shipping Address line3" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_shipping_address3; ?>">
                        <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_3">Shipping Address line4</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="shipping_addrs4" name="shipping_addrs4" placeholder="Shipping Address line3" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_shipping_address4; ?>">
                        <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_4">Shipping Pincode</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="shipping_pin" name="shipping_pin" placeholder="Shipping Pincode" data-validation="required" data-validation-error-msg="Please Enter Customer Address" value="<?php echo $data->customer_shipping_pincode; ?>">
                        <div class="input-group-addon"><i class="ti-direction"></i></div>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_4">Shipping GST No</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="shipping_gst_no" name="shipping_gst_no" placeholder="GST No" data-validation="required" data-validation-error-msg="Please Enter GST No" value="<?php echo $data->customer_shipping_gst; ?>">
                        <div class="input-group-addon"><i class="icon-notebook"></i></div>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-4">
                        <label class="control-label mb-10" for="exampleInputEmail_4">Shipping PAN No</label>
                        <div class="input-group">
                        <input type="text" class="form-control required" id="shipping_pan_no" name="shipping_pan_no" placeholder="Enter Pincode" data-validation="length number" data-validation="required" data-validation-length="6" data-validation-error-msg="Please enter Valid Pin Number" value="<?php echo $data->customer_shipping_pan; ?>">
                        <div class="input-group-addon"><i class="icon-credit-card"></i></div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </fieldset>
                     </form>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Row -->
         </div>
         <!-- Footer -->
         <footer class="footer container-fluid pl-30 pr-30">
            <div class="row">
               <div class="col-sm-12">
                  <p>2017 &copy; SIMTA. Developed by <a href="http://www.banyaninfotech.com/" target="_blank">BANYAN INFOTECH</a></p>
               </div>
            </div>
         </footer>
         <!-- /Footer -->
      </div>
      <!-- /Main Content -->
   </div>
   <!-- /#wrapper -->
   <!-- JavaScript -->
   <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/vendors/bower_components/jquery.steps/build/jquery.steps.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/dist/jquery.validate.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/dist/js/form-wizard-data.js');?>"></script>
   <script src="<?php echo base_url('app-assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/dist/js/starrr.js');?>"></script>
   <script src="<?php echo base_url('app-assets/dist/js/jquery.slimscroll.js');?>"></script>
   <script src="<?php echo base_url('app-assets/dist/js/dropdown-bootstrap-extended.js');?>"></script>
   <script src="<?php echo base_url('app-assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/vendors/bower_components/switchery/dist/switchery.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/dist/js/init.js');?>"></script>
   <!-- Select 2 -->
   <script src="<?php echo base_url('app-assets/vendors/bower_components/select2/dist/js/select2.full.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/vendors/bower_components/multiselect/js/jquery.multi-select.js');?>"></script>
   <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js');?>"></script>
   <script src="<?php echo base_url('app-assets/dist/js/form-advance-data.js');?>"></script>
   <!--VALIDATION SCRIPT -->
   <script>
      //SALESPERSON THROUGH
       $(function () {
            	$(".sales_through").click(function () {
      // var t=$(".sales_through").val();
      // alert(t);
            	if ($(this).is(":checked")) {
      var id =$(this).attr('id');
      var ret = id.replace('sales_through','');
      
      
       
      //var id_name = "sales_through";
      //var id_val = (id_name + +id);
      //var agent_name = "agent";
      //var id_val = (agent_name + +id);
      
            		$("#sales" +ret).show();
            		$("#agent" +ret).hide();
      $('#agent_through' +ret).prop('checked', false);
            		} else {
      	$("#sales" +id).hide();
      	$("#agent" +id).hide();
            		}
            });
      });
      
      //AGENT THROUGH
       $(function () {
            	$(".agent_through").click(function () {
            	if ($(this).is(":checked")) {
      var ids = $(this).attr('id');
      				var ret = ids.replace('agent_through','');
      
      $("#sales" +ret).show();
            		$("#agent" +ret).show();
      $('#sales_through' +ret).prop('checked', false);
            		} else {
      	$("#sales" +ret).hide();
      	$("#agent" +ret).hide();
            		}
            });
            });
      
      //BILLING ADDRESS
       $(function () {
            	$("#billing_address").click(function () {
            	if ($(this).is(":checked")) {
      //values of customer details
      var customer_name 		= $("#customer_name").val();
      var customer_ph 		= $("#customer_phone").val();
      var customer_mail 		= $("#customer_mail").val();
      var customer_addr1 		= $("#customer_addr1").val();
      var customer_addr2 		= $("#customer_addr2").val();
      var customer_addr3 		= $("#customer_addr3").val();
      var customer_addr4 		= $("#customer_addr4").val();
      var customer_pin 		= $("#customer_pin").val();
      var customer_gst_no 	= $("#customer_gst_no").val();
      var customer_pan_no 	= $("#customer_pan_no").val();
      //billing_addr
      
      var bill_name		= $("#billing_name").val(customer_name);
      var bill_ph			= $("#billing_phone").val(customer_ph);
      var bill_mail		= $("#billing_mail").val(customer_mail);
      var bill_addr1		= $("#billing_address1").val(customer_addr1);
      var bill_addr2		= $("#billing_address2").val(customer_addr2);
      var bill_addr3		= $("#billing_address3").val(customer_addr3);
      var bill_addr4		= $("#billing_address4").val(customer_addr4);
      var bill_pin		= $("#billing_pin").val(customer_pin);
      var billing_gst_no	= $("#billing_gst_no").val(customer_gst_no);
      var billing_pan_no	= $("#billing_pan_no").val(customer_pan_no);
      
            		$("#billing_addr").hide();
            		
      
            		} else {
            			$("#billing_addr").show();
            				}
            });
            });
      //SHIPPING ADDRESS
       $(function () {
            	$("#shipping_addr").click(function () {
            	if ($(this).is(":checked")) {
      //BILLING DETAILS
      var bill_name	= $("#billing_name").val();
      var bill_ph		= $("#billing_phone").val();
      var bill_mail	= $("#billing_mail").val();
      var bill_addr1	= $("#billing_address1").val();
      var bill_addr2	= $("#billing_address2").val();
      var bill_addr3	= $("#billing_address3").val();
      var bill_addr4	= $("#billing_address4").val();
      var bill_pin	= $("#billing_pin").val();
      var billing_gst_no	= $("#billing_gst_no").val();
      var billing_pan_no	= $("#billing_pan_no").val();
      //	alert(bill_addr4);
      //SHIPPING DETAILS
      $("#shipping_name").val(bill_name);
      $("#shipping_phone").val(bill_ph);
      $("#shipping_mail").val(bill_mail);
      $("#shipping_addr1").val(bill_addr1);
      $("#shipping_addr2").val(bill_addr2);
      $("#shipping_addr3").val(bill_addr3);
      $("#shipping_addrs4").val(bill_addr4);
      $("#shipping_pin").val(bill_pin);
      $("#shipping_gst_no").val(billing_gst_no);
      $("#shipping_pan_no").val(billing_pan_no);
      
            		$("#shipping_address").hide();
            	} 
      else {
            		$("#shipping_address").show();
            	}
            });
            });
   </script>
</body>
</html>