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
                    <h5 class="txt-dark"><?php echo $title; ?></h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Salesreturn/">Sales Return List</a></li>
                        <li class="active"><span><?php echo $title; ?></span></li>
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
                                    
                                    <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Salesreturn/save" method="POST" enctype="multipart/form-data">
                                        <?php 
                                            if(!empty($edit_task)){$task = $edit_task[0];}
                                            if(!empty($task) && $task->target_id != ''){
                                        ?>
                                            <input type="hidden" name="tbl_target[target_id]" id="target_id" value="<?php echo $task->target_id; ?>"/>
                                        <?php } ?>
                                        <div class="row">
                                          <div class="col-md-3">
                                                <div class="example">
                                                    <input type="hidden" name="tb_salesreturn[shop_id]" id="shopId" value=""/>
                                                    <label class="control-label mb-10 text-left"> Choose Input type</label>
                                                    <div class="input-group">
                                                    <select name="tb_salesreturn[input_type]" class="form-control" id="inputType" onchange="return selectType(this.value)">
                                                        <option value="1">Shop Name</option>
                                                        <option value="2">Contact No</option>
                                                    </select>
                                                    <div class="input-group-addon"><i class="icon-list"></i></div>
                                                </div>
                                                   

                                                </div></div>
                                                <div class="form-group col-md-3" id="shopData">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Shop Name</label>
                                                <div class="input-group">
                                                    <input type="text" name="shopName" id="shopName" class="form-control shopName" placeholder="Enter the Shop Name"  data-validation="required" data-validation-error-msg="Please Enter the Shop Name"/>
                                                    <div class="input-group-addon"><i class="icon-target"></i></div>
                                                </div>
                                                </div>
                                                <div class="form-group col-md-3" id="contactData" style="display: none">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Contact No</label>
                                                <div class="input-group">
                                                    <input type="text" name="mobileNo" id="mobileNo" class="form-control mobile"  placeholder="Enter Contact Number" data-validation="length number" data-validation-length="min10" maxlength="10" onkeypress="return isNumberKey(this.value)"/>
                                                    <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Product Name</label>
                                                <div class="input-group">
                                                    <input type="text" name="proName" id="proName" placeholder="Please Enter the Product Name" class="form-control proName"/>
                                                    <input type="hidden" name="tb_salesreturn[product_id]" id="proId"/>
                                                    <div class="input-group-addon"><i class="icon-bag"></i></div>
                                                </div>
                                                </div>
                                            <div class="form-group col-md-3">
                                            <label class="control-label mb-10" for="exampleInputuname_2">Qty</label>
                                            <div class="input-group">
                                                <input type="text" name="tb_salesreturn[qty]" id="proQty" class="form-control" maxlength="3" onkeypress="return isNumberKey(this.value)" data-validation="required" data-validation-error-msg="Please Enter the Product Qty"/>
                                                <div class="input-group-addon"><i class="icon-target"></i></div>
                                            </div>
                                            </div>
                                        </div>
                                        <span id="xx"></span>
                                        <div class="row">
                                            <div class="form-group mb-0 col-md-12">
                                                <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>"/>
                                                <input type="button" name="Add New" id="Add New" class="btn btn-success btn-anim pull-right" value="Back" onclick="window.location.href='<?php echo base_url().'Salesreturn' ?>'"/>
                                                <button type="submit" class="btn btn-success btn-anim pull-right" id="but" style="margin-right: 50px;"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
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
           
<script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>

        <!-- Bootstrap Daterangepicker JavaScript -->
        <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
        <script src="<?php echo base_url('app-assets/dist/js/form-picker-data.js'); ?>"></script>  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        function selectType(str){
            if(str == 1){
                $("#shopData").show();
                $("#contactData").hide();
            }else if(str == 2){
                $("#contactData").show();
                $("#shopData").hide();
                
            }
        }
        $(document).ready(function () {
        
        var base_url = $('#base_url').val();
     $(".shopName").keypress(function () {
        
         $.ajax({
            type: "POST",
            url: base_url+'Salesreturn/getShopname',
            data: {
                terms: this.value,
            },
            dataType: "json",
            success: function (data) {
               $( ".shopName" ).autocomplete({
                minLength: 1,
                source: data,
                focus: function( event, ui ) {
                    $( ".shopName" ).val( ui.item.label );
                    return false;
                },
                select: function( event, ui ) {
                    $( ".shopName" ).val( ui.item.label );
                    $( "#shopId" ).val( ui.item.value);
                    return false;
                }
            })
            }
        });
    });    
    $(".mobile").keypress(function () {
        
         $.ajax({
            type: "POST",
            url: base_url+'Salesreturn/getShopmobile',
            data: {
                terms: this.value,
            },
            dataType: "json",
            success: function (data) {
               $( ".mobile" ).autocomplete({
                minLength: 1,
                source: data,
                focus: function( event, ui ) {
                    $( ".mobile" ).val( ui.item.label );
                    return false;
                },
                select: function( event, ui ) {
                    $( ".mobile" ).val( ui.item.label );
                    $( "#shopId" ).val( ui.item.value);
                    return false;
                }
            })
            }
        });
    });
    $(".proName").keypress(function () {
        
         $.ajax({
            type: "POST",
            url: base_url+'Salesreturn/getPronames',
            data: {
                terms: this.value,
            },
            dataType: "json",
            success: function (data) {
               $( ".proName" ).autocomplete({
                minLength: 1,
                source: data,
                focus: function( event, ui ) {
                    $( ".proName" ).val( ui.item.label );
                    return false;
                },
                select: function( event, ui ) {
                    $( ".proName" ).val( ui.item.label );
                    $( "#proId" ).val( ui.item.value);
                    return false;
                }
            })
            }
        });
    });
  } );
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
    </script>