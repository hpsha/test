<?php
$from = date("Y-m-d");
$to = date("Y-m-d");
$settings = $this->Settings_Model->get_settings();
$datacompanies = $settings;
$date = date("Y-m-d");
$qm = "select * from tbl_agencies_locations where date='$date'";
$result = $this->db->query($qm)->result();
$qqs = "update tbl_agencies_location set emp_id = '0',user_id='0'";
$this->db->query($qqs);
foreach ($result as $dat) {
    $nn = $dat->location_id;
    $yy = $dat->agency_id;
    $mm = $dat->emp_id;
    $uu = $dat->user_id;
    $qq = "update tbl_agencies_location set user_id=$uu,emp_id = '$mm' where location_id =$nn and agency_id=$yy and act=1";
    $this->db->query($qq);
}
$userid = $_SESSION['userdata']['type'];
if ($_SESSION['userdata']['type'] == 1) {
    $userRole = 'Admin';
} else if ($_SESSION['userdata']['type'] == 2) {
    $userRole = 'General Admin';
} else if ($_SESSION['userdata']['type'] == 3) {
    $userRole = 'ASM / ASO';
} else if ($_SESSION['userdata']['type'] == 4) {
    $userRole = 'Distributor';
}
?>


<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="" type="image/x-icon">
        <title><?php echo $datacompanies->company_name; ?></title>
        <!-- vector map CSS -->
        <link href="<?php echo base_url('app-assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- SELECT 2 -->
        <link href="<?php echo base_url('app-assets/vendors/bower_components/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" type="text/css">
        <!-- WIZARD CSS -->
        <link href="<?php echo base_url('app-assets/vendors/bower_components/jquery-wizard.js/css/wizard.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('app-assets/vendors/bower_components/jquery.steps/demo/css/jquery.steps.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('app-assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css'); ?>" rel="stylesheet" type="text/css">
        <!-- Custom CSS -->
        <link href="<?php echo base_url('app-assets/full-width-light/dist/css/style.css'); ?>" rel="stylesheet" type="text/css">
        <!--dashboard-->
        <link href="<?php echo base_url('app-assets/vendors/bower_components/sweetalert/dist/sweetalert.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('app-assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css'); ?>" rel="stylesheet" type="text/css">
        <!-- SCRIPT -->
        <script src="<?php echo base_url('app-assets/vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('app-assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js'); ?>"></script>
        <!-- VALIDATION SCRIPT -->
        <script src="<?php echo base_url('app-assets/dist/js/form-validation.min.js'); ?>"></script>
        <script src="<?php echo base_url('app-assets/vendors/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
        <link href="<?php echo base_url('app-assets/vendors/bower_components/chartist/dist/chartist.min.css'); ?>" rel="stylesheet" type="text/css"/>

        <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js'); ?>"></script>
        <link href="<?php echo base_url('app-assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('app-assets//vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap Daterangepicker CSS -->
        <link href="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet" type="text/css"/>
        <style>.sm-data-box-3 .panel-heading .pull-left i.zmdi {
                padding-top: 11px; }
            .sm-data-box-3 .easypiechart {
                height: 165px;
                width: 165px; }
            .sm-data-box-3 .easypiechart .percent {
                font-size: 30px;
                line-height: 30px;
                margin-top: 56px; }
            .sm-data-box-3 .easypiechart .percent::after {
                font-size: 30px; }
            .sm-data-box-3 i.zmdi-caret-up, .sm-data-box-3 i.zmdi-caret-down {
                position: relative;
                top: 2px; }
            </style>
        </head>
        <!--Preloader-->
        <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>    
    <!--/Preloader-->
    <div class="wrapper box-layout theme-1-active pimary-color-green">
        <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="mobile-only-brand pull-left">
                <div class="nav-header pull-left">
                    <div class="logo-wrap">
                        <a href="<?php echo base_url(); ?>Dashboard">
                            <img class="brand-img" style="height:70px;margin-left: 27px;" src="<?php echo base_url('app-assets/img/anil-foods.png'); ?>" alt=""/>
                          <!--  <span class="brand-text" style="font-size:  33px;">Anil Foods</span>-->

                        </a>
                    </div>
                </div>
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
                <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>

            </div>

            <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                <ul class="nav navbar-right top-nav pull-right">
                    <li class="dropdown auth-drp">
                        <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?>uploads/<?php echo $_SESSION['userdata']['photo'] ?>" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span>
                            <span> Welcome <?php echo $userRole; ?></span>
                        </a> 

                        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                            <li class="divider"></li>
                            <?php if ($userid == 4 || $userid == 3) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>Agent/logout "><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                </li>
                            <?php } ?>

                            <?php if ($userid == 1 || $userid == 2) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>Dashboard/logout "><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                </li>
                            <?php } ?>                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="fixed-sidebar-left">
            <ul class="nav navbar-nav side-nav nicescroll-bar">
                <li class="navigation-header">
                    <span>MENU</span>
                    <i class="zmdi zmdi-more"></i>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>Dashboard" ><div class="pull-left"><i class=" fa fa-tachometer mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
                </li>

                <!--                <li><hr class="light-grey-hr mb-10"/></li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Enquiry"><div class="pull-left">
                                            <i class="fa fa-envelope-o mr-20"></i><span class="right-nav-text">Enquiry </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                    <ul id="Enquiry" class="collapse collapse-level-1">
                                        <li>
                                            <a href="<?php //echo base_url(); ?>Enquiry/add_enquiry">Add Enquiry</a>
                                        </li>
                                        <li>
                                            <a href="<?php //echo base_url(); ?>Enquiry/">List Enquiry</a>
                                        </li>

                                    </ul>
                                </li>-->


                <li><hr class="light-grey-hr mb-10"/></li>
                <?php if ($userid == 1 || $userid == 2) { ?>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#emp"><div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Users </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                        <ul id="emp" class="collapse collapse-level-1">
                            <li><a href="<?php echo base_url(); ?>Employee/add">Add New User</a></li>
                            <li><a href="<?php echo base_url(); ?>Employee">List Active Users</a></li>
                            <li><a href="<?php echo base_url(); ?>Employee/active">List Inactive Users</a></li>
                            <li><a href="<?php echo base_url(); ?>Employee/Asm">List ASM/Aso</a></li>

                            <li><a href="<?php echo base_url(); ?>Employee/addgroup">Add Users Group</a></li>
                            <li><a href="<?php echo base_url(); ?>Employee/group">List Users Group</a></li>
                        </ul>
                    </li>
                    <li><hr class="light-grey-hr mb-10"/></li>
                <?php } ?>

                <li><a href="javascript:void(0);" data-toggle="collapse" data-target="#shop"><div class="pull-left"><i class="fa fa-shopping-cart mr-20"></i><span class="right-nav-text">Shop List </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="shop" class="collapse collapse-level-1">
                        <li><a href="<?php echo base_url(); ?>Shop_list">List Shop</a></li>

                    </ul>
                </li>

                <li><hr class="light-grey-hr mb-10"/></li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#order">
                        <div class="pull-left"><i class="fa fa-bars mr-20"></i><span class="right-nav-text">Order List </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="order" class="collapse collapse-level-1">
                        <li>
                            <a href="<?php echo base_url(); ?>Orders">List Order</a>
                        </li>
                        <?php if ($userid == 1 || $userid == 2) { ?>
                            <li>
                                <a href="<?php echo base_url(); ?>Orders/distributor">List Distributor Order</a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li><hr class="light-grey-hr mb-10"/></li>

 <?php if ($userid == 1 || $userid == 2 || $userid == 3) { ?>
                
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#agency"><div class="pull-left">
                            <i class="fa fa-users mr-20"></i><span class="right-nav-text">Agencies List </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="agency" class="collapse collapse-level-1">
                        <?php if ($userid == 1 || $userid == 2 || $userid == 3) { ?>
                            <li>
                                <a href="<?php echo base_url(); ?>Agencies">List Agencies</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Agencies/reports">List Agencies Reports</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Agencies/add">Add  Agencies</a>
                            </li>

                        <?php } ?>

                        <?php if ($userid == 1 || $userid == 2) { ?>
                            <li>
                                <a href="<?php echo base_url(); ?>Agencies/addnew">Add New Agencies</a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>Agencies/addlocation">Add  Location</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Agencies/location">List  Location</a>
                            </li>
                        <?php } ?>

                    </ul>
                </li>
                <li><hr class="light-grey-hr mb-10"/></li>
 <?php } ?>
			

                <?php if ($userid == 1 || $userid == 2) { ?>
                  	
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#branch"><div class="pull-left"><i class="fa fa-sitemap mr-20"></i><span class="right-nav-text">Branch List </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                        <ul id="branch" class="collapse collapse-level-1">



                            <li>
                                <a href="<?php echo base_url(); ?>Branch/addbranch">Add  Branch</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Branch/listbranch">List  Branch</a>
                            </li>

                        </ul>
                    </li>
			<li><hr class="light-grey-hr mb-10"/></li>		
                <?php } ?>

                <?php if ($userid == 1 || $userid == 2) { ?>
                    
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#products"><div class="pull-left"><i class="fa fa-product-hunt mr-20"></i><span class="right-nav-text">Product Master</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                        <ul id="products" class="collapse collapse-level-1">

                            <li>
                                <a href="<?php echo base_url(); ?>Products/add_product">Add Product</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Products/list_product">List Product</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Products/add_productgroup">Add Product Group</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Products/list_productgroup">List Product Group</a>
                            </li>

                        </ul>
                    </li>
			<li><hr class="light-grey-hr mb-10"/></li>		
                <?php } ?> 
                <?php if ($userid == 1 || $userid == 2) { ?>
                  

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#target"><div class="pull-left"><i class="fa fa-product-hunt mr-20"></i><span class="right-nav-text">Target Management</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                        <ul id="target" class="collapse collapse-level-1">

                            <li>
                                <a href="<?php echo base_url(); ?>target">View Targets</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>target/addnew">Add New Targets</a>
                            </li>
                        </ul>
                    </li>
			<li><hr class="light-grey-hr mb-10"/></li>	
                <?php } ?>

                <?php if ($userid == 1 || $userid == 2 || $userid == 3) { ?>
                                        	

                    <?php if ($userid == 1 || $userid == 2) { ?>
                    
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#salesreturn"><div class="pull-left"><i class="fa fa fa-sign-in mr-20"></i><span class="right-nav-text">Sales Return </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                            <ul id="salesreturn" class="collapse collapse-level-1">

                                <li>
                                    <a href="<?php echo base_url(); ?>Salesreturn">View Sales Return</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>Salesreturn/addnew">Add New Sales Return</a>
                                </li>
								  <li>
                                    <a href="<?php echo base_url(); ?>Salesreturn/report">Sales Return Reports</a>
                                </li>
                            </ul>
                        </li>
                     
                    <?php } ?>   
                           <li><hr class="light-grey-hr mb-10"/></li>
                    <li>
                        <a href="<?php echo base_url(); ?>Attendance" ><div class="pull-left"><i class=" fa fa-tachometer mr-20"></i><span class="right-nav-text">Attendance</span></div><div class="clearfix"></div></a>
                    </li>
			<li><hr class="light-grey-hr mb-10"/></li>		
                <?php } ?>
				<?php if($userid == 1 || $userid == 2) { ?>
                   
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#combooffer"><div class="pull-left"><i class="fa fa-product-hunt mr-20"></i><span class="right-nav-text">Combo Offers </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="combooffer" class="collapse collapse-level-1">

                        <li>
                            <a href="<?php echo base_url(); ?>Combo">View Combo Offers List</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Combo/addnew">Add New Combo Offer</a>
                        </li>
                    </ul>
                </li>
              <li><hr class="light-grey-hr mb-10"/></li>
               <?php } ?>   
                <!--  <li>
                     <a href="<?php echo base_url(); ?>Reports" ><div class="pull-left"><i class=" fa fa-tachometer mr-20"></i><span class="right-nav-text">Reports</span></div><div class="clearfix"></div></a>
                 </li> -->
                <?php if ($userid == 1 || $userid == 2 || $userid == 3) { ?>
                   
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#rep"><div class="pull-left">
                                <i class="fa fa-tachometer mr-20"></i><span class="right-nav-text">Reports </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                        <ul id="rep" class="collapse collapse-level-1">

                            <li>
                                <a href="<?php echo base_url(); ?>Reports">Reports</a>
                            </li>

                        </ul>
                    </li> <li><hr class="light-grey-hr mb-10"/></li>
                <?php } ?>



                <?php if ($userid == 1 || $userid == 2 || $userid == 3) { ?>
                   
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#task"><div class="pull-left">
                                <i class="fa fa-tasks mr-20"></i><span class="right-nav-text">Task </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                        <ul id="task" class="collapse collapse-level-1">

                            <li>
                                <a href="<?php echo base_url(); ?>Task/add">Add Task</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Task/">List Task</a>
                            </li>
                        </ul>
                    </li> <li><hr class="light-grey-hr mb-10"/></li>
                <?php } ?>

                <?php if ($userid == 1 || $userid == 2 || $userid == 3) { ?>
                   

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#schedule"><div class="pull-left">
                                <i class="fa fa-book mr-20"></i><span class="right-nav-text">Schedule </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                        <ul id="schedule" class="collapse collapse-level-1">


                            <li>
                                <a href="<?php echo base_url(); ?>Schedule/">List Schedule</a>
                            </li>
                        </ul>
                    </li> <li><hr class="light-grey-hr mb-10"/></li>
                <?php } ?>

                <?php if ($userid == 4) { ?>
                   

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#schedule"><div class="pull-left">
                                <i class="fa fa-book mr-20"></i><span class="right-nav-text">Orders Import </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                        <ul id="schedule" class="collapse collapse-level-1">


                            <li>
                                <a href="<?php echo base_url(); ?>orders/import"> Orders Import</a>
                            </li>
                        </ul>
                    </li>
 <li><hr class="light-grey-hr mb-10"/></li>
                <?php } ?>             
                <li>
                    <a href="<?php echo base_url(); ?>Dashboard/changepassword"><div class="pull-left"><i class="fa fa-key mr-20"></i>
                            <span class="right-nav-text">Change Password</span></div></a>
                </li>

 <li><hr class="light-grey-hr mb-10"/></li>
                <?php if ($userid == 1) { ?>
                   
                    <li>
                        <a href="<?php echo base_url(); ?>Dashboard/logout"><div class="pull-left"><i class="fa fa-power-off mr-20"></i>
                                <span class="right-nav-text">Logout</span></div></a>
                    </li>

                <?php } ?>

                <?php if ($userid == 4) { ?>
                   
                    <li>
                        <a href="<?php echo base_url(); ?>Agent/logout"><div class="pull-left"><i class="fa fa-power-off mr-20"></i>
                                <span class="right-nav-text">Logout</span></div></a>
                    </li>

                <?php } ?>



            </ul>
        </div>
        <!-- /Left Sidebar Menu -->

        <!-- Right Sidebar Menu -->

        <!-- /Right Sidebar Menu -->

        <!-- Right Setting Menu -->

        <!-- /Right Setting Menu -->