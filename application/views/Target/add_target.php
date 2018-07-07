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
                    <h5 class="txt-dark">ADD Target </h5>
                </div>

                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Target"><span>Target</span></a></li>
                        <li class="active"><span>Add Target </span></li>
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
                                    <form data-toggle="validator" role="form" action="<?php echo base_url(); ?>Target/add_target_details" method="POST">
									<?php //print_r($company_id); ?>
									<input type="hidden" name="company_id" id="company_id" value="<?php echo $company_id; ?>">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10">Select Employee</label>
                                                <select class="form-control select2" id="employee" name="employee"  data-validation="required" data-validation-error-msg="Please  Select employee">
                                                    <option value="">Please Select Employee</option>
                                                    <?php foreach($employee as $employees){ ?>
                                                    <option value="<?php echo $employees->employee_id; ?>"><?php echo $employees->employee_name; ?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10">Select Year</label>
                                                <select class="form-control select2" id="year" name="year"  data-validation="required" data-validation-error-msg="Please Select year">
                                                    <option value="">Please Select Year</option>
                                                    <?php 
                                                    $date=date("Y");
                                                    for($i=2017;$i<=$date;$i++){
                                                        $dates=$i;
                                                        $dates.='-';
                                                        $dates.=$i+1;
                                                        ?>
                                                   
                                                    <option value="<?php echo $dates; ?>"><?php echo $dates; ?></option>
                                                    <?php }         
                                                           
                                                ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10">Select Month</label>
                                                <select class="form-control select2" id="month" name="month"  data-validation="required" data-validation-error-msg="Please Select Month">
                                                    <option value="">Please Select Month</option>
                                                 <?php //foreach($month as $months){ 
                                                 
                                                 if($companies->company_financial_year==1 && $companies->company_target_wise==6){
                                                 ?>
                                                       <option value="<?php echo $month[0]->target_month_id.','.$month[1]->target_month_id.','.$month[2]->target_month_id;?>"><?php echo $month[0]->month_name.', '.$month[1]->month_name.', '.$month[2]->month_name; ?><?php  ?></option>
													   
                                                       <option value="<?php echo $month[3]->target_month_id.','.$month[4]->target_month_id.','.$month[5]->target_month_id;?>"><?php echo $month[3]->month_name.', '.$month[4]->month_name.', '.$month[5]->month_name; ?></option>
													   
                                                       <option value="<?php echo $month[6]->target_month_id.','.$month[7]->target_month_id.','.$month[8]->target_month_id;?>"><?php echo $month[6]->month_name.','.$month[7]->month_name.', '.$month[8]->month_name; ?></option>
													   
                                                       <option value="<?php echo $month[9]->target_month_id.','.$month[10]->target_month_id.','.$month[11]->target_month_id;?>"><?php echo $month[9]->month_name.', '.$month[10]->month_name.', '.$month[11]->month_name; ?></option>
                                                       
                                                 <?php } if($companies->company_financial_year==2 && $companies->company_target_wise==6){ ?>
                                                      <option value="<?php echo $month[3]->target_month_id.','.$month[4]->target_month_id.','.$month[5]->target_month_id;?>"><?php echo $month[3]->month_name.', '.$month[4]->month_name.', '.$month[5]->month_name; ?><?php  ?></option>
													   
                                                       <option value="<?php echo $month[6]->target_month_id.','.$month[7]->target_month_id.','.$month[8]->target_month_id;?>"><?php echo $month[6]->month_name.', '.$month[7]->month_name.', '.$month[8]->month_name; ?></option>
													   
                                                       <option value="<?php echo $month[9]->target_month_id.','.$month[10]->target_month_id.','.$month[11]->target_month_id;?>"><?php echo $month[9]->month_name.','.$month[10]->month_name.', '.$month[11]->month_name; ?></option>
													   
                                                       <option value="<?php echo $month[0]->target_month_id.','.$month[1]->target_month_id.','.$month[2]->target_month_id;?>"><?php echo $month[0]->month_name.', '.$month[1]->month_name.', '.$month[2]->month_name; ?></option>
                                                <?php } ?>       
                                                        
                                                        
                                                </select>
                                            </div>
                                        </div>
                                            <div class="row">
                                             


                                                <div class="form-group col-md-6">
                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Enter Amount</label>
                                                    <div class="input-group">
                                                        <input type="text" id="amount" name="amount" class="form-control" placeholder="Enter Amount" data-validation="required" data-validation-error-msg="Please Enter Amount">
                                                        <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                                                    </div>
                                                </div>
                                                
												<?php if($company_id ==1) { ?>
                                                <div class="form-group col-md-6">
                                                <label class="control-label mb-10">Select Machine Category</label>
                                               
                                                <select class="form-control select2" id="m_category" name="m_category"  data-validation="required" data-validation-error-msg="Please  Select employee">
                                                    <option value="">Select Machine Category</option>
                                                    <?php foreach($machinecategory as $m_category){ ?>
                                                    <option value="<?php echo $m_category->machinery_category_id; ?>"><?php echo $m_category->machiney_category_name; ?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
												<?php } else { ?>
												<div class="form-group col-md-6">
													<label class="control-label mb-10" for="exampleInputEmail_4">Item Group</label>
													<div class="input-group">
													  <select class="form-control select2" id="itemgroup" name="itemgroup"  data-validation="required" data-validation-error-msg="Please Select">
														<option value="">Please Select Item Group</option>
														<?php foreach($itemgroup as $data){ ?>
														<option value="<?php echo $data->itemgroup_id;  ?>"><?php echo $data->itemgroup_itemname; ?></option>
														<?php } ?>
													  </select>
													  <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
													</div>
												  </div>
												<?php }?>

                                            </div>

                                            <div class="row">

                                                <div class="form-group mb-0 col-md-12">

                                                    <button type="submit" class="btn btn-success btn-anim pull-right"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
                                                </div> 
                                            </div>
                                    </form>  
                                </div></div></div></div>

                </div>
            </div>

        </div>

</body></html>



