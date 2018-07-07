<style>
    ul#horizontal-list {
        min-width: 696px;
        list-style: none;
        padding-top: 45px;
    }
    ul#horizontal-list li {
        display: inline;
    }
    .profile-box .profile-info .profile-img-wrap img{width: 60px !important;height: 60px !important;}
    .profile-box .profile-info .profile-img-wrap{width: 315px;}
</style>
<!-- Right Sidebar Backdrop -->
<div class="right-sidebar-backdrop"></div>
<!-- /Right Sidebar Backdrop -->

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">SHOP VIEW</h5>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li><a href="<?php echo base_url(); ?>/Shop_list"><span>List Shop</span></a></li>
                    <li class="active"><span>View</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->

        </div>
        <!-- /Title -->
        <?php // print_r($shop_view); ?>
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel card-view">

                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <?php //print_r($shop_view_img); ?>
                            <!-- Row -->
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-xs-12"></div>
                                <div class="col-lg-4 col-md-12 col-xs-12">
                                    <div class="panel panel-default card-view  pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body  pa-0">
                                                <div class="profile-box">
                                                    <div class="profile-cover-pic">
                                                        <div class="profile-image-overlay"></div>
                                                    </div>
                                                    <?php 
print_r($shop_view->agencies_name);
?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-xs-12"></div>
                            </div>	
                            <!-- Row -->


                        </div></div></div>

            </div>
        </div>
    </div>
        
 
 


