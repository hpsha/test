

                    <div class="panel-wrapper collapse in sm-data-box-3">
                        <div class="panel-body col-md-6">
                            <div class="col-sm-6 pa-0">
                                <span id="pie_chart_4" class="easypiechart" data-percent="10">
                                    <span class="percent block txt-dark weight-500"></span>
                                    <span class="block txt-success text-center">
                                        Completed Enquiries
<!--                                        <i class="zmdi zmdi-caret-up pr-5 font-20"></i><span class="weight-500"></span>-->
                                    </span>
                                </span>
                            </div>	
                            <div class="col-sm-6 pr-0">
                                <ul class="flex-stat mb-15">
                                    <li class="text-left block no-float full-width mb-15">
                                        <span class="block">Dropped Enquiry</span>
                                        <span class="block txt-dark weight-500  font-18"><span class="counter-anim">0</span>%</span>
                                        <span class="block txt-success pull-left mt-5">
<!--                                            <i class="zmdi zmdi-caret-up pr-5 font-20 pull-left"></i><span class="weight-500 pull-left">+15%</span>-->
                                        </span>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li class="text-left block no-float full-width">
                                        <span class="block">Processing & Pending Enquiry</span>
                                        <span class="block txt-dark weight-500  font-18"><span class="counter-anim">10</span>%</span>
                                        <span class="block txt-success pull-left mt-5">
<!--                                            <i class="zmdi zmdi-caret-up pr-5 font-20 pull-left"></i><span class="weight-500 pull-left">+4%</span>-->
                                        </span>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </div>	
                        </div>	
                         <div class="panel-body col-md-6">
                            <div class="col-sm-6 pa-0">
                                <span id="pie_chart_6" class="easypiechart" data-percent="100">
                                    <span class="percent block txt-dark weight-500"></span>
                                    <span class="block txt-success text-center">
                                        Completed Enquiries
<!--                                        <i class="zmdi zmdi-caret-up pr-5 font-20"></i><span class="weight-500"></span>-->
                                    </span>
                                </span>
                            </div>	
                            <div class="col-sm-6 pr-0">
                                <ul class="flex-stat mb-15">
                                    <li class="text-left block no-float full-width mb-15">
                                        <span class="block">Dropped Enquiry</span>
                                        <span class="block txt-dark weight-500  font-18"><span class="counter-anim">0</span>%</span>
                                        <span class="block txt-success pull-left mt-5">
<!--                                            <i class="zmdi zmdi-caret-up pr-5 font-20 pull-left"></i><span class="weight-500 pull-left">+15%</span>-->
                                        </span>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li class="text-left block no-float full-width">
                                        <span class="block">Processing & Pending Enquiry</span>
                                        <span class="block txt-dark weight-500  font-18"><span class="counter-anim">10</span>%</span>
                                        <span class="block txt-success pull-left mt-5">
<!--                                            <i class="zmdi zmdi-caret-up pr-5 font-20 pull-left"></i><span class="weight-500 pull-left">+4%</span>-->
                                        </span>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </div>	
                        </div>	
                    </div>
<div class="col-md-12">
               <div class="panel-wrapper collapse in sm-data-box-3">
                                <div class="table-responsive">
                                    <table id="responsive" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Enquiry Np</th>
                                                <th>Customer Name</th>
                                                <th>Status</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                            <?php foreach ($companies as $company) { ?>                              
                                                <tr>
                                                    <td><?php echo $company->company_name; ?></td>
                                                    <td><?php echo $company->company_phone; ?></td>
                                                    <td><?php echo $company->company_mail; ?></td>
                                                   
                                                   
                                                </tr>
                                            <?php } ?>                                                                                   
                                        </tbody>
                                    </table>
                                </div>
               </div>
                 </div>
               
<script src="<?php echo base_url('app-assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('app-assets/vendors/bower_components/jquery.counterup/jquery.counterup.min.js'); ?>"></script>          
    <script src="<?php echo base_url('app-assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js'); ?>"></script>             
    <script src="<?php echo base_url('app-assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js'); ?>"></script>

    <script>
          if ($('#pie_chart_4').length > 0) {
            $('#pie_chart_4').easyPieChart({
                barColor: '#0193dc',
                lineWidth: 20,
                animate: 3000,
                size: 165,
                lineCap: 'square',
                trackColor: '#f4f4f4',
                scaleColor: false,
                onStep: function (from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
        }
          if ($('#pie_chart_6').length > 0) {
            $('#pie_chart_6').easyPieChart({
                barColor: '#0193dc',
                lineWidth: 20,
                animate: 3000,
                size: 165,
                lineCap: 'square',
                trackColor: '#f4f4f4',
                scaleColor: false,
                onStep: function (from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
        }
        </script>