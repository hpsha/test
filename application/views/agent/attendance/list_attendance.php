		<div class="page-wrapper">
			<div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">LIST Attendance</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
                               <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="active"><span>List Attendance</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				 <form  class="hidden-xs col-md-12" style="margin-bottom:3%" action="<?php echo base_url(); ?>Attendance/" method="POST">
		    <div class="col-md-3">
			<div class="example">
                  <h5 class="box-title m-t-30">Please select Date </h5>
              
                      <input type="text" class="form-control input-daterange-datepicker" placeholder="mm/dd/yyyy" name="date">
                 
                </div></div>
				  
				  <div class="col-md-3" style="">
				
                                      <input type="submit" name="submit"  class="btn btn-success"   value="filter"style="margin-left: 18px;margin-top: 30px;">
				  </div>
          </form>
			
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
													<tr>
                  
					<th>Name</th>
                    <th>Email</th>
					
					<th>Attendance</th>
					
                  
                    
                    
                  </tr>
													</tr>
												</thead>
												<tfoot>
													<tr>
                  
					<th>Name</th>
                    <th>Email</th>
					
					<th>Attendance</th>
					
                  
                    
                    
                  </tr>
												</tfoot>
												<tbody>
													<?php 
													 $this->db->last_query();
													foreach($attendance as $data){
													    $lat=$data->attendance_latitude;
$lon=$data->attendance_longtitude;
 $count=$data->count;
													?>
													<tr>
														<td><?php echo $data->name ?></td>
														<td><?php echo $data->email ?></td>
													<?php if($data->count!=0){ ?>
														  <td>
<?php echo "<a href='http://maps.google.com/maps?q=$lat,$lon' target='_blank' class='btn btn-success' style='border-radius:60px;'> Present</a>"  ?></td>
<?php } else { 
?>
							<td>	<button class="btn btn-danger" style="border-radius:60px;" >Absent</button> </td>
								<?php } ?>
							
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
			 <script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>

        <!-- Bootstrap Daterangepicker JavaScript -->
        <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<script>
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
</script>