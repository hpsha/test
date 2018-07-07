    <div class="page-wrapper">
    <div class="container-fluid pt-25">
<?php
  $emp_id=$_SESSION['userdata']['emp_id'];
                                            $data = $this->load->Agent_Model->get_distributor($emp_id);
                                            $emp_id=$_SESSION['userdata']['emp_id'];
                                         ?>
        <div class="row">
      
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter"><span class="counter-anim"><?php echo $data['enquiry']; ?></span></span>
                                            <span class="weight-500 uppercase-font block">Shops</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="icon-control-rewind data-right-rep-icon txt-light-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter"><span class="counter-anim"><?php  echo round($data['order'],2);?></span></span>
                                            <span class="weight-500 uppercase-font block">Total Order Value</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="icon-control-rewind data-right-rep-icon txt-light-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row"><?php
                                  

                                        ?>
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter"><span class="counter-anim"><?php  echo round($data['today'],2);?></span></span>
                                            <span class="weight-500 uppercase-font block">Today Order Value</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="icon-control-rewind data-right-rep-icon txt-light-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
         

   


    </div>




    <script src="<?php echo base_url('app-assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('app-assets/vendors/bower_components/jquery.counterup/jquery.counterup.min.js'); ?>"></script>          
    <script src="<?php echo base_url('app-assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js'); ?>"></script>             
    <script src="<?php echo base_url('app-assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js'); ?>"></script>

    <script src="<?php echo base_url('app-assets/vendors/bower_components/chartist/dist/chartist.min.js'); ?>"></script>
    <script src="<?php echo base_url('app-assets/vendors/bower_components/raphael/raphael.min.js'); ?>"></script>

    <script src="<?php echo base_url('app-assets/vendors/bower_components/morris.js/morris.min.js'); ?>"></script>

    <!-- yEARLY tARGET-->
 

</body>


