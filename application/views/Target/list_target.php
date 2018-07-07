<div class="page-wrapper">

<div class="container-fluid">

   <!-- Title -->				

   <div class="row heading-bg">

      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

         <h5 class="txt-dark">List Target</h5>

      </div>

      <!-- Breadcrumb -->					

      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

         <ol class="breadcrumb">

            <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>

            <li class="active"><span>List Target</span></li>

         </ol>

      </div>

      <!-- /Breadcrumb -->		

   </div>

   <!-- /Title -->								<!-- Row -->				

   <div class="row">

      <div class="col-sm-12">

         <div class="panel panel-default card-view">

            <div class="panel-wrapper collapse in">

               <div class="panel-body">

                  <div class="table-wrap">

                     <div class="table-responsive">

                        <table id="example" class="table table-hover display  pb-30" >

                           <thead>

                              <tr>

                                 <th>Employee Name</th>

                                 <th>Year</th>
								 
                                 <th>Month</th>

                                 <th>Target Total Amount</th>

                                 <?php if($_COOKIE['company_id']==1){ ?>
                                 <th>Machine Category</th>
								<?php }else{ ?>
                                 <th>Item group</th>
								<?php } ?>


                                 <th>Action</th>

                              </tr>

                           </thead>

                           <tfoot>
                            
                              <tr>
<th>Employee Name</th>
			
                                 <th>Year</th>
								 
								  <th>Month</th>

                                 <th>Target Total Amount</th>
								<?php if($_COOKIE['company_id']==1){ ?>
                                 <th>Machine Category</th>
								<?php }else{ ?>
                                 <th>Item group</th>
								<?php } ?>


                                 <th>Action</th>

                              </tr>

                           </tfoot>

                           <tbody>
													<?php 
													foreach($target as $data){ ?>
													<tr>
														<td><?php echo $data->employee_name; ?></td>
														<td><?php echo $data->t_year; ?></td>
														<td><?php
														$month = explode(',',$data->t_month);
														foreach($month as $key => $value)
														{
															//echo $month[$key];
															if($month[$key]==1)
															{
																echo "Jan, ";
															}
															if($month[$key]==2)
															{
																echo "Feb, ";
															}
															if($month[$key]==3)
															{
																echo "Mar, ";
															}
															if($month[$key]==4)
															{
																echo "Apr, ";
															}
															if($month[$key]==5)
															{
																echo "May, ";
															}
															if($month[$key]==6)
															{
																echo "Jun, ";
															}
															if($month[$key]==7)
															{
																echo "Jully, ";
															}
															if($month[$key]==8)
															{
																echo "Aug, ";
															}
															if($month[$key]==9)
															{
																echo "Sep, ";
															}
															if($month[$key]==10)
															{
																echo "Oct, ";
															}
															if($month[$key]==11)
															{
																echo "Nov, ";
															}
															if($month[$key]==12)
															{
																echo "Dec";
															}
														}
														//echo $data->t_month; ?></td>
														<td><?php echo $data->t_amount; ?></td>
														<td><?php
														if($_COOKIE['company_id']==1){
															echo $data->machiney_category_name;
														} else {
																echo $data->itemgroup_itemname; 
															} ?></td>
														<td class="text-nowrap">
															<button onclick="window.location.href = '<?php echo base_url(); ?>Target/edit_target/<?php echo $data->t_id; ?>'" class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i> </button>
														</td>
													</tr>
													<?php } ?>
												</tbody>

                        </table>

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </div>

   </div>

   <!-- /Row -->			

</div>
<script type="text/javascript">
    <?php if (isset($_COOKIE['success'])) { ?>
                                         var success =<?php echo $_COOKIE['success']; ?>;
                                         $(window).load(function () {
                                             if (success == 1) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Target List', text: 'Target Added Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                                                 });
                                             } else if (success == 2) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Customer Group List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                                                 });
                                             } else {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Customer Group List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                                                 });
                                             }
                                         });
    <?php } ?>
         <?php if (isset($_COOKIE['update'])) { ?>
                                         var success =<?php echo $_COOKIE['update']; ?>;
                                         $(window).load(function () {
                                             if (success == 1) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Target List', text: 'Target Updated Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                                                 });
                                             }  else {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Customer Group List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                                                 });
                                             }
                                         });
    <?php } ?>
</script>	