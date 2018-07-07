<?php //print_r($shop_id);exit(); ?>
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
                                
                                <div class="col-lg-4 col-md-12 col-xs-12">
                                    <div class="panel panel-default card-view  pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body  pa-0">
                                                <div class="profile-box">
                                                    <div class="profile-cover-pic">
                                                        <div class="profile-image-overlay"></div>
                                                    </div>
                                                    <div class="profile-info">

                                                        <div class="profile-img-wrap" style="background: #fff0;">

                                                            <ul id="horizontal-list">
                                                                <?php foreach ($shop_view_img as $img) { ?>
                                                                    <li>
                                                                        <a class="image-popup-vertical-fit" href="<?php echo $img->img_path; ?>" target="_blank">
                                                                            <img class="inline-block mb-10" src="<?php echo $img->img_path; ?>" alt="" width="50px" height="50px"/>
                                                                        </a>
                                                                        <?php /*   <a href="#">
                                                                          <img class="inline-block mb-10" src="<?php echo $img->img_path; ?>" alt="" width="50px" height="50px"/></a> */ ?>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>

                                                        <center><h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-danger"><?php echo $shop_view[0]->shop_name; ?></h5>
                                                            <h6 class="block capitalize-font pb-20"><?php echo $shop_view[0]->shop_owner_name; ?></h6></center>
                                                    </div>
                                                    <div class="social-info">
                                                        <center><p>Agencies : <?php echo $shop_view[0]->agencies_name; ?></p></center>
                                                        <center><p>Location : <?php echo $shop_view[0]->location_name; ?></p></center>
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font">
                                                                    <span class="" style="font-size: 14px;">Shop Contact</span>
                                                                </span>
                                                            </div>
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font">
                                                                    <span class="counts-text block" style='font-size: 12px;margin-top: 13px;'><?php echo $shop_view[0]->shop_contact; ?></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font">
                                                                    <span class="" style="font-size: 14px;">Shop Landmark</span>
                                                                </span>
                                                            </div>
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font"><span class="counts-text block" style='font-size: 12px;margin-top: 13px;'><?php echo $shop_view[0]->shop_landline; ?></span></span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font">
                                                                    <span class="" style="font-size: 14px;">Shop Location</span>
                                                                </span>
                                                            </div>
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font"><span class="counts-text block" style='font-size: 12px;margin-top: 13px;text-align: left;'><?php echo $shop_view[0]->address; ?></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font">
                                                                    <span class="" style="font-size: 14px;">Previous Supplier</span>
                                                                </span>
                                                            </div>
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font"><span class="counts-text block" style='font-size: 12px;margin-top: 13px;' ><?php echo $shop_view[0]->shop_previous; ?></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font">
                                                                    <span class="" style="font-size: 14px;">Shop Type</span>
                                                                </span>
                                                            </div>
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font"><span class="counts-text block" style='font-size: 12px;margin-top: 13px;'><?php  
                                                                if($shop_view[0]->shop_type==1){ echo "Retailer";} 
                                                                else if($shop_view[0]->shop_type==2){ echo "Wholesale";}
                                                                  else if($shop_view[0]->shop_type==3){ echo "Distributor";}
                                                                  else{
                                                                      echo "Retailer";
                                                                  }
                                                                ?></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font">
                                                                    <span class="" style="font-size: 14px;">Remarks</span>
                                                                </span>
                                                            </div>
                                                            <div class="col-xs-6 text-center">
                                                                <span class="counts block head-font"><span class="counts-text block" style='font-size: 12px;margin-top: 13px;'><?php echo $shop_view[0]->remarks; ?></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                        <button class="btn btn-default btn-block btn-outline btn-anim mt-30" onclick="window.location.href = '<?php echo base_url(); ?>Shop_list'"><i class="fa fa-arrow-left"> BACK </i><span class="btn-text">BACK</span></button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button class="btn btn-default btn-block btn-outline btn-anim mt-30" onclick="window.location.href = '<?php echo base_url(); ?>Orders/order_view_pdf/<?php echo $shop_id; ?>'"><i class="fa fa-arrow-down"> Download </i><span class="btn-text">Download</span></button>
                                                    </div>
                                                        </div>
                                                        <div class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-xs-12">
                                    <h3>ORDER DETAILS</h3>
                                    <hr style="border-top:1px solid #ddd">
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Name</td>
                                                <td>Group</td>
                                                 <td>Qty</td>
                                                  <td>Price</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php 
                                                $wheres="tbl_order.order_id=$shop_id";
                                                $mmq=$this->db->select('created_on,shop_id')->from('tbl_order')->where($wheres)->get()->row();
                                                
                                                 $shop_idd=$mmq->shop_id;
                                                $cr=$mmq->created_on;
                                                $where="tbl_order.shop_id=$shop_idd and tbl_order.created_on='$cr'";
                                                   $count = $this->db->select('tbl_shop.shop_name,tbl_product.product_name,tbl_productgroup.productgroup_name,qty,price')
			->join('tbl_product','tbl_product.product_id=tbl_order.product_id')
					->join('tbl_productgroup','tbl_productgroup.productgroup_id=tbl_order.product_group_id')
					->join('tbl_shop','tbl_shop.shop_id=tbl_order.shop_id')->from('tbl_order')->where($where)->get()->num_rows();
					
                                                 $q = $this->db->select('tbl_shop.shop_name,tbl_product.product_name,tbl_productgroup.productgroup_name,qty,price')
			->join('tbl_product','tbl_product.product_id=tbl_order.product_id')
					->join('tbl_productgroup','tbl_productgroup.productgroup_id=tbl_order.product_group_id')
					->join('tbl_shop','tbl_shop.shop_id=tbl_order.shop_id')->from('tbl_order')->where($where)->get()->result();
					 $price=0;
					
					if($count>0){
					   
					    foreach($q as $data){
					       
					   
					    ?> <tr><td><?php echo $data->product_name;  ?></td>
					    <td><?php echo $data->productgroup_name;  ?></td>
					    <td><?php echo $data->qty;  ?></td>
					    <td>Rs.<?php echo  $prices=$data->price;
					    $price+=$prices;
					    
					    ?></td>
					    </tr>
					    
					    <?php
					    }
					}
                                                ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr >
                                                <td style="text-align:right" colspan="4">GrandTotal:<strong>Rs.<?php echo $price; ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                
                                
                                
                            </div>
                            <!-- Row -->


                        </div></div></div>

            </div>
        </div>
    </div>





