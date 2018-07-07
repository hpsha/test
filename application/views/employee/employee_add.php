<?php //print_r($_SESSION['userdata']['email']);exit(); ?>
<body>
            <div class="right-sidebar-backdrop"></div>
            <!-- /Right Sidebar Backdrop -->
            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5 class="txt-dark">ADD EMPLOYEE</h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                                <li><a href="<?php echo base_url(); ?>Employee/list_employee">User List Details</a></li>
                                <li class="active"><span>Add New User</span></li>
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
                                            <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Employee/adddetails" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputuname_2">Name</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Name" data-validation="required" data-validation-error-msg="Please Enter the Name">
                                                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>"/>
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="Mobile Number">Mobile Number</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="emp_number" name="emp_number" placeholder="Enter Mobile Number" data-validation="length number" data-validation-length="min10" maxlength="10" onkeypress="return isNumberKey(this.value)" >
                                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
                                                        <div class="input-group">
                                                            <input type="email" class="form-control" id="emp_email" name="emp_email" placeholder="Enter email" data-validation="email" data-validation-error-msg="Please enter a valid e-mail" onkeyup="return checkEmployemail(this.value);" onkeypress="return emails(event)">
                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                            
                                                        </div><span id="email_errorMsg" class="error_msg" style="display: none">The Email-ID already exists.</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4" style="display:none">
                                                        <label class="control-label mb-10" for="exampleInputEmail_2">Address line1</label>
                                                        <div class="input-group">
                                                            <input type="hidden" class="form-control" id="emp_addr1" name="emp_addr1" placeholder="Address line1" data-validation="required" data-validation-error-msg="Please enter Address line1">
                                                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" style="display:none">
                                                        <label class="control-label mb-10" style="displa:none" for="exampleInputEmail_2">Address line2</label>
                                                        <div class="input-group">
                                                            <input type="hidden" class="form-control" id="emp_addr2" name="emp_addr2" placeholder="Address line2" data-validation="required" data-validation-error-msg="Please enter Address line2">
                                                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4"style="display:none">
                                                        <label class="control-label mb-10"  for="exampleInputEmail_3">Address line3</label>
                                                        <div class="input-group">
                                                            <input type="hidden" class="form-control" id="emp_addr3" name="emp_addr3" placeholder="Address line3" data-validation="required" data-validation-error-msg="Please enter Address line3">
                                                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4"style="display:none">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Address line4</label>
                                                        <div class="input-group">
                                                            <input type="hidden" class="form-control" id="emp_addr4" name="emp_addr4" placeholder="Address line4" data-validation="required" data-validation-error-msg="Please enter Address line4">
                                                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Pincode</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="emp_pin" name="emp_pin" placeholder="Pincode" data-validation="length number" data-validation-length="6" data-validation-error-msg="Please enter Valid Pincode" maxlength="6" onkeypress="return isNumberKey(this.value)">
                                                            <div class="input-group-addon"><i class="ti-direction"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">User Type</label>
                                                        <div class="input-group">
                                                            <select name="employee_usertype" id="employee_usertype" class="form-control" onchange="return userchanges(this.value);">
                                                                <option value="None">None</option>
                                                                <option value="2">General Admin/ROTN</option>
                                                                <option value="3">ASM/ASO</option>
                                                                <option value="5">Sales Person/CSR</option>
                                                            </select>
                                                            <div class="input-group-addon"><i class="ti-user"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4" id="userChange" style="display: none">
                                                    <label class="control-label mb-10" for="exampleInputEmail_4">Agencies Assigned to</label>
                                                        <div class="input-group">	
                                                            <select class="form-control" id="created_by"  multiple name="created_by[]"  data-validation="required" data-validation-error-msg="Please Select Assigned to">
                                                                <option value="">Please Select Assigned to</option>
                                                                    <?php  foreach ($agency as $emp_data) { ?>
                                                                 <option value="<?php echo $emp_data->agencies_id; ?>" ><?php echo $emp_data->agencies_name; ?></option>
                                                                <?php } ?>
                                                        </select>
                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Employee Password</label>
                                                        <div class="input-group">
                                                            <input type="password" class="form-control" id="emp_pass" name="emp_pass" placeholder="Employee Password" data-validation="required" data-validation-error-msg="Please enter Employee Password">
                                                            <div class="input-group-addon"><i class="ti-direction"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-30 col-md-4">
                                                        <label class="control-label mb-10 text-left">File upload</label>
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                            <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
                                                                <input type="file" name="userfile" accept=".png,.jpg,.jpeg" >
                                                            </span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text">Remove</span></a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Current Login Password</label>
                                                        <div class="input-group">
                                                            <input type="password" class="form-control" id="login_pass" name="login_pass" placeholder="Current Login Password"  data-validation-error-msg="Please enter Login Password" onfocusout="check_pass()">
                                                            <div class="input-group-addon"><i class="ti-direction"></i></div>
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
                <style type="text/css">
                    .error_msg{
                        color:red;
                    }
                    </style>
<script>
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
});*/
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
    });
</script>
<script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>

        <!-- Bootstrap Daterangepicker JavaScript -->
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
        //SCHEDULE page select2
        $("#created_by").select2({
             placeholder: "Agencies assigned to",
             allowClear: true});
               $("#names").select2({
             placeholder: "Branch name",
             allowClear: true});
              $("#name").select2({
             placeholder: "Agencies name",
             allowClear: true});
                 $("#location").select2({
             placeholder: "Locations name",
             allowClear: true});
           
             function getlocation(){
                
                 var id=$("#name").val();
                     $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Agencies/get_location',
                    data: {
                        id: id,
						
                    },
                    success: function (data) {
                          $("#location").html('');
                      $("#location").html(data);

                    }
                });
             }
             
             /*User Type */
             function userchanges(str){
                if(str == 3){
                    $("#userChange").show();
                }else{
                    $("#userChange").hide();
                }
             }
             
               function getagencies(){
                
                 var id=$("#names").val();
                     $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Agencies/getagencies',
                    data: {
                        id: id,
						
                    },
                    success: function (data) {
                        
                          $("#name").html('');
                      $("#name").html(data);

                    }
                });
             }
             /*Numeric Value Only Accept*/
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46)
    {
        return false;
    }
    return true;
}
/*Alpha Value Only Accept*/
function isAlphaKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //alert(charCode);
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode != 8 && charCode != 32 &&  charCode != 46 &&  charCode != 39)
    {
        return false;
    }
    return true;
}
/* Email ID Validation */
 function emails(event) {
       var regex = new RegExp("^[A-Za-z0-9@_.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
   if (!regex.test(key)) {
       event.preventDefault();
       return false;
   }
   }
    /*Check Customer Email ID*/
    function checkEmployemail(str){
        var base_url = $("#base_url").val();
        $.ajax({
            type: 'post',
            url: base_url+'employee/getcustomerEmail',
            data: {
                email:str
            },
            success: function (data) {
               if(data != 0){
                   $("#email_errorMsg").show(); 
                    $('#but').attr('disabled',true);
                   return false;
               }else{
                   $("#email_errorMsg").hide();
                    $('#but').attr('disabled',false);
               }
            }
         });
    }
        </script>