<style>
    .data-wrap-left{color:#fff;}
    .data-wrap-left{color:#fff;}
    .hov_row:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .blog-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    .blog-overlay:hover {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.67);
        content: '';
        transition: transform .6s;
        transform: scale3d(1.9,1.4,1) rotate3d(0,0,1,50deg) translate3d(0,-108%,0);
    }

</style>
<div class="page-wrapper">
    <div class="container-fluid pt-25">

        <?php $role = $_SESSION['userdata']['type']; ?>
        <?php if ($role == 1) { ?>
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #957cb8;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;">

                                                        250</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Employees</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-user-follow data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                            
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #81298f;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                echo $data['employee'];
                                                        ?>250</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Active Employees</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #4a0055;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                echo $data['enquiry']; 
                                                        ?>2530</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Shops</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-basket-loaded data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #02205f;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                echo $data['agencies']; 
                                                        ?>50</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Agencies</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-briefcase data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- ROW -->


            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #6f61aa;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                echo $data['agencies']; 
                                                        ?>6,20,000</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Total Order Value</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #a4006f;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                $mss = $this->db->query("select sum(price) as t from tbl_order")->row();
                                                        ?>25,000</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Today Order Value</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="fa fa-calendar data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #650051;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                        $date = date("Y-m-d");
//                                        $mss = $this->db->query("select sum(price) as t from tbl_order where date(`created_on`)='$date'")->row();
                                                        ?>5</span></span>
                                                <span class="weight-500 uppercase-font block font-13">NO OF ASO</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-emotsmile data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #007cb0;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;">80,000</span></span>
                                                <span class="weight-500 uppercase-font block font-13">CSR TARGET</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-trophy data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- ROW -->


            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #b41e8c;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                echo $data['agencies']; 
                                                        ?>3</span></span>
                                                <span class="weight-500 uppercase-font block font-13">COMBO OFFER</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-badge data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #bb005e;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;">125</span></span>
                                                <span class="weight-500 uppercase-font block font-13">ONLINE- CSR</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-globe data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #6f2b8f;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;">12</span></span>
                                                <span class="weight-500 uppercase-font block font-13">TODAY'S ABSENT</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="fa fa-file data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #00a894;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;">220</span></span>
                                                <span class="weight-500 uppercase-font block font-13">TODAY'S ATTENDANCE</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="fa fa-folder data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- ROW -->



            <?php
        }


        /*         * *********************** FOR ROLE 3 ************************************** */

        if ($role == 3) {
            ?>
            <div class="row">


                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #957cb8;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                echo $data['enquiry']; 
                                                        ?>250</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Shops</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-basket-loaded data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #81298f;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                echo $data['agencies']; 
                                                        ?>250</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Agencies</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-briefcase data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #4a0055;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"> 6,20,000</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Total Order Value</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #02205f;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;">25,000</span></span>
                                                <span class="weight-500 uppercase-font block font-13">Today Order Value</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="fa fa-calendar data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- ROW -->


            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #6f61aa;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;">80,000</span></span>
                                                <span class="weight-500 uppercase-font block font-13">CSR TARGET</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-trophy data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #650051;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                echo $data['agencies']; 
                                                        ?>3</span></span>
                                                <span class="weight-500 uppercase-font block font-13">COMBO OFFER</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-badge data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #007cb0;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;">125</span></span>
                                                <span class="weight-500 uppercase-font block font-13">ONLINE- CSR</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-globe data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #b41e8c;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;">12</span></span>
                                                <span class="weight-500 uppercase-font block font-13">TODAY'S ABSENT</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="fa fa-file data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- ROW -->


            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row hov_row" style="background-color: #00a894;">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;">220</span></span>
                                                <span class="weight-500 uppercase-font block font-13">TODAY'S ATTENDANCE</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="fa fa-folder data-right-rep-icon txt-light-grey"></i>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- ROW -->                
            <?php
        }

        /*         * *********************** FOR ROLE 4 ************************************** */
        if ($role == 4) {
            $emp_id = $_SESSION['userdata']['emp_id'];
            $data = $this->load->Agent_Model->get_distributor($emp_id);

            $emp_id = $_SESSION['userdata']['emp_id'];
            ?>





            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row hov_row" style="background-color: #81298f;">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                echo $data['enquiry']; 
                                                    ?>2530</span></span>
                                            <span class="weight-500 uppercase-font block font-13">Shops</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="icon-basket-loaded data-right-rep-icon txt-light-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row hov_row" style="background-color: #02205f;">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                echo $data['agencies']; 
                                                    ?>6,20,000</span></span>
                                            <span class="weight-500 uppercase-font block font-13">Total Order Value</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box">
                                <div class="container-fluid">
                                    <div class="row hov_row" style="background-color: #6f61aa;">
                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter"><span class="counter-anim" style="color: #fff !important;"><?php
//                                                $mss = $this->db->query("select sum(price) as t from tbl_order")->row();
                                                    ?>25,000</span></span>
                                            <span class="weight-500 uppercase-font block font-13">Today Order Value</span>
                                        </div>
                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                            <i class="fa fa-calendar data-right-rep-icon txt-light-grey"></i>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>


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


