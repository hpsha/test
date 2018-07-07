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
          <h5 class="txt-dark">ENQUIRY ADD</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="javascript:void(0);">Dashboard</a></li>
            <li><a href="<?php base_url(); ?>Enquiry/"><span>Enquiry List </span></a></li>
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
                <h6 class="panel-title txt-dark">Enquiry Add Form</h6>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
              <div class="panel-body">
                <form id="enquiry_form" class="enquiry_addform" name="form" action="<?php echo base_url(); ?>Enquiry/enquiry_details_add" method="POST">
        <h3>
          <span class="number"><i class="icon-user-following txt-black"></i></span><span class="head-font capitalize-font">Customer Details</span>
        </h3>
                  <fieldset>
                    <div class="row">
                      <div class="col-sm-12 col-md-12">
                        <div class="form-wrap">
                          <div class="row">
                            <div class="form-group col-md-6">
                              <label class="control-label mb-10" for="exampleInputuname_2">Customer Name</label>
                              <div class="input-group">
                                <select class="form-control required select2" id="customer_name" name="customer_name" data-validation="required" data-validation-error-msg="Please Select Customer" onchange="get_agent()">
                                  <option></option>
                                  <?php foreach($customers as $data){ ?>
                                  <option value="<?php echo $data->customer_id ?>"><?php echo $data->customer_name ?></option>
                                  <?php } ?>
                                </select>
                                <div class="input-group-addon"><i class="icon-user"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Company Name</label>
                              <div class="input-group">
                                <select class="form-control required select2" id="company_name" name="company_name" data-validation="required" data-validation-error-msg="Please Select Customer" onchange="get_agent()">
                                <option></option>
                                <?php foreach($companies as $data){ ?>
                                <option value="<?php echo $data->company_id ?>"><?php echo $data->company_name ?></option>
                                <?php } ?>
                                </select>
                                <div class="input-group-addon"><i class="fa fa-industry"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6" style="display:none;" id="agent">
                              <label class="control-label mb-10" for="exampleInputuname_2">Agent</label>
                              <div class="input-group">
                                <select class="form-control required select2" id="agent_name" name="agent_name" data-validation="required" data-validation-error-msg="Please Select Agent">
                                  <option></option>
                                  <?php foreach($agents as $data){ ?>
                                  <option value="<?php echo $data->agent_id ?>"><?php echo $data->agent_name ?></option>
                                  <?php } ?>
                                </select>
                                <div class="input-group-addon"><i class="icon-user"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-6" style="display: none;" id="sales">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Salesperson</label>
                              <div class="input-group">
                                <select class="form-control required select2" id="sales_person_name" name="sales_person_name" data-validation="required" data-validation-error-msg="Please Select Salesperson">
                                  <option></option>
                                  <?php foreach($employee as $data){ ?>
                                  <option value="<?php echo $data->employee_id ?>"><?php echo $data->employee_name ?></option>
                                  <?php } ?>
                                </select>
                                <div class="input-group-addon"><i class="icon-user"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6" style="display: none;" id="address">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Address View</label>
                              <div class="input-group">
                                <select class="form-control required select2" id="address_view" name="address_view" data-validation="required" data-validation-error-msg="Please Select Salesperson" onchange="get_address()">
                                  <option value="">Select</option>
                                  <option value="1">Customer</option>
                                  <option value="2">Agent</option>
                                </select>
                                <div class="input-group-addon"><i class="icon-user"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                <h3>
          <span class="number"><i class="fa fa-product-hunt txt-black"></i></span><span class="head-font capitalize-font">Product Details</span>
        </h3>
        <fieldset>
                    <div class="row">
                    </div>
                  </fieldset>
        <h3>
          <span class="number"><i class="icon-credit-card txt-black"></i></span><span class="head-font capitalize-font">Billing Details</span>
        </h3>
                  <fieldset>
                    <div class="row" id="billing_addr">
                      <div class="col-sm-12 col-md-12">
                        <div class="form-wrap">
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputuname_2">Billing Customer Name</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="billing_name" name="billing_name" placeholder="Billing Customer Name" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="icon-user"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Billing Customer Phone</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="billing_phone" name="billing_phone" placeholder="Billing Customer Phone" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="icon-phone"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Billing Customer Email</label>
                              <div class="input-group">
                                <input type="email" class="form-control required" id="billing_mail" name="billing_mail" placeholder="Billing Customer Email" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_1">Billing Address line1</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="billing_address1" name="billing_address1" placeholder="Billing Address line1" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Billing Address line2</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="billing_address2" name="billing_address2" placeholder="Billing Address line2" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_3">Billing Address line3</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="billing_address3" name="billing_address3" placeholder="Billing Address line3" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_4">Billing Address line4</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="billing_address4" name="billing_address4" placeholder="Billing Address line4" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_4">Billing Pincode</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="billing_pin" name="billing_pin" placeholder="Billing Pincode" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="ti-direction"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_4">Billing GST</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="billing_gst" name="billing_gst" placeholder="Billing GST" data-validation="required" data-validation-error-msg="Please Enter Customer GST" onKeyPress="return AlphaNumberKey(event)" minlength="15" maxlength="15">
                                <div class="input-group-addon"><i class="ti-direction"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_4">Billing PAN Number</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="billing_pan" name="billing_pan" placeholder="Billing PAN" data-validation="required" data-validation-error-msg="Please Enter Customer PAN">
                                <div class="input-group-addon"><i class="ti-direction"></i></div>
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
                    <div class="row" id="shipping_address">
                      <div class="col-sm-12 col-md-12">
                        <div class="form-wrap">
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputuname_2">Shipping Customer Name</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="shipping_name" name="shipping_name" placeholder="Shipping Customer Name" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="icon-user"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Shipping Customer Phone</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="shipping_phone" name="shipping_phone" placeholder="Shipping Customer Phone" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="icon-phone"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Shipping Customer Email</label>
                              <div class="input-group">
                                <input type="email" class="form-control required" id="shipping_mail" name="shipping_mail" placeholder="Shipping Address line1" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_1">Shipping Address line1</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="shipping_addr1" name="shipping_addr1" placeholder="Shipping Address line1" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_2">Shipping Address line2</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="shipping_addr2" name="shipping_addr2" placeholder="Shipping Address line2" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_3">Shipping Address line3</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="shipping_addr3" name="shipping_addr3" placeholder="Shipping Address line3" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_3">Shipping Address line4</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="shipping_addrs4" name="shipping_addrs4" placeholder="Shipping Address line3" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_4">Shipping Pincode</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="shipping_pin" name="shipping_pin" placeholder="Shipping Pincode" data-validation="required" data-validation-error-msg="Please Enter Customer Address">
                                <div class="input-group-addon"><i class="ti-direction"></i></div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_4">Shipping GST</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="shipping_gst" name="shipping_gst" placeholder="Shipping GST" data-validation="required" data-validation-error-msg="Please Enter Customer GST" onKeyPress="return AlphaNumberKey(event)" minlength="15" maxlength="15">
                                <div class="input-group-addon"><i class="ti-direction"></i></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label class="control-label mb-10" for="exampleInputEmail_4">Shipping PAN Number</label>
                              <div class="input-group">
                                <input type="text" class="form-control required" id="shipping_pan" name="shipping_pan" placeholder="Shipping PAN" data-validation="required" data-validation-error-msg="Please Enter Customer PAN">
                                <div class="input-group-addon"><i class="ti-direction"></i></div>
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
function get_agent()
{
 var cus=$('#customer_name').val();
 var cum=$('#company_name').val();
 //alert(cus);
 //alert(cum);
$.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>Enquiry/get_details',
            data: {
              company_id : cum,
              customer_id : cus
            },
            success: function (response) {
              //alert(response);
                var json = response;
                var obj = JSON.parse(json);
                var b=obj.customer_sale_type;
                var agent=obj.customer_sale_agent;
                var salesperson=obj.customer_sale_salesperson;
              if(b==1){
                $('#sales').show();
                $('#agent').hide();
                $('#address').hide();
                //$('#sales_person_name option[value="1"]').attr("selected",true);
                $('#sales_person_name').val(salesperson);
                $('#sales_person_name').trigger('change');
              }
              if(b==2){
                $('#agent').show();
                $('#sales').show();
                $('#address').show();
                //$('#sales_person_name option[value="1"]').attr("selected",true);
                //$('#agent_name option[value="1"]').attr("selected",true);
                $('#sales_person_name').val(salesperson);
                $('#sales_person_name').trigger('change');
                $('#agent_name').val(agent);
                $('#agent_name').trigger('change');
              }
            }
          });
addr(cus);
}
function addr(id)
{
  //alert(id);
  $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>Enquiry/get_customer_address',
            data: {
              customer_id : id
            },
            success: function (response) {
              //alert(response);
                var json = response;
                var obj = JSON.parse(json);
                  var name=obj.customer_name;
                  var phone=obj.customer_phone;
                  var email=obj.customer_mail;
                  var address1=obj.customer_address_line1;
                  var address2=obj.customer_address_line2;
                  var address3=obj.customer_address_line3;
                  var address4=obj.customer_address_line4;
                  var pin=obj.customer_pincode;
                  var gst=obj.customer_shipping_gst;
                  var pan=obj.customer_shipping_pan;
                $('#billing_name').val(name);
                $('#billing_phone').val(phone);
                $('#billing_mail').val(email);
                $('#billing_address1').val(address1);
                $('#billing_address2').val(address2);
                $('#billing_address3').val(address3);
                $('#billing_address4').val(address4);
                $('#billing_pin').val(pin);
                $('#billing_gst').val(gst);
                $('#billing_pan').val(pan);
                $('#shipping_name').val(name);
                $('#shipping_phone').val(phone);
                $('#shipping_mail').val(email);
                $('#shipping_addr1').val(address1);
                $('#shipping_addr2').val(address2);
                $('#shipping_addr3').val(address3);
                $('#shipping_addrs4').val(address4);
                $('#shipping_pin').val(pin);
                $('#shipping_gst').val(gst);
                $('#shipping_pan').val(pan);
            }
          });
}
function get_address()
{
 var add=$('#address_view').val();
 alert(add);

 var cus=$('#customer_name').val();
 var ag=$('#agent_name').val();


}

</script>
  </body>
</html>