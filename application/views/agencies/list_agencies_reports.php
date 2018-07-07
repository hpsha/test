<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">LIST Agencies</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li class="active"><span>List Agencies</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->
        <div class="row heading-bg">				
            <div class="col-sm-12">
            </div>            </div>	
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="form-wrap">
                                    <form action="<?php echo base_url(); ?>Agencies/reports" method="post">
                                       
                                            <div class="col-md-3">
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left">Select From Date</label>

                                                    <input type="text" class="form-control input-daterange-datepicker" placeholder="mm/dd/yyyy" name="from">

                                                </div></div>
                                         
                                              <div class="col-md-3">
                                                <div class="example">
                                                    <button type="submit" class="btn btn-success btn-anim" id="but" style="margin-top: 30px;"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
                                                </div>
                                            </div> 
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                               
                                               
                                                 <th>Outlets</th>
                                                    <th>Date</th>
                                                <th>Location and Employee</th>
                                                <th>Assigned By</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                             <th>Name</th>
                                               
                                              
                                                 <th>Outlets</th>
                                                 <th>Date</th>
                                                  <th>Location and Employee</th>                                             

                                                 <th>Assigned By</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            foreach ($employee as $data) {
                                                
                                                $id=$data->agency_id;
                                                  $uid=$data->user_id;
$i=1;
$location_id=$this->db->query("select * from tbl_agencies_locations where agency_id=$id and date='$date'")->result();
                                                ?>
                                                
                                                <tr><td><?php $aid=$data->agency_id;
                                                $qq=$this->db->query("select agencies_name from tbl_agencies where agencies_id=$aid")->row();
                                                echo $qq->agencies_name;
                                                ?></td>
                                                  <td><?php   $qq=$this->db->query("select agency_id from tbl_shop where agency_id=$aid and date(shop_created_on)='$data->date'")->num_rows();
                                                echo $qq;?></td>
                                                   <td><?php echo $data->date; ?></td>
                                                    <td><?php
                                                    foreach($location_id as $locations){
     $lid=$locations->location_id;
        $eid=$locations->emp_id;
        echo $i++;echo ".";
        if($lid!=0){
            $lname=$this->db->query("select * from tbl_location where location_id=$lid")->row();
            echo $lname->location_name;
        } 
            if($eid!=0){
            $ename=$this->db->query("select * from tbl_employee where employee_id in($eid)")->result();
            foreach($ename as $name){
             echo "(".$name->employee_email.")";
            }
        }
        echo "<br>";
}
?></td>
          <td><?php
                                                    $i=1;
                                                        foreach ($location_id as $locations) {
                                                            $lid = $locations->location_id;
                                                            $eid = $locations->emp_id;
                                                            $uid=$locations->user_id;
                                                            echo $i++;
                                                            echo ".";
                                                            if ($lid != 0) {
                                                                $lname = $this->db->query("select * from tbl_location where location_id=$lid")->row();
                                                                echo $lname->location_name;
                                                            }
                                                            if($uid!=0){
                                                               $qq=$this->db->query("select admin_username from tbl_admin where admin_id=$uid")->row();
                                                 echo "(" . $qq->admin_username . ")";
}

                                                            echo "<br>";
                                                        }
                                                        
                                                 ?></td>                                   </tr><?php
} ?>
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
   
<script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>

        <!-- Bootstrap Daterangepicker JavaScript -->
        <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
        <script src="<?php echo base_url('app-assets/dist/js/form-picker-data.js'); ?>"></script>    <script>
    
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
<?php if (isset($_COOKIE['success'])) { ?>
            var success =<?php echo $_COOKIE['success']; ?>;
            $(window).load(function () {
                if (success == 1) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Agencies List', text: 'Agencies Added Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                    });
                } else if (success == 2) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Agencies List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                    });
                } else {
                    window.setTimeout(function () {
                        $.toast({heading: 'Agencies List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                    });
                }
            });
<?php } ?>
<?php if (isset($_COOKIE['update'])) { ?>
            var success =<?php echo $_COOKIE['update']; ?>;
            $(window).load(function () {
                if (success == 1) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Agencies List', text: 'Agencies Updated Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                    });
                } else if (success == 2) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Agencies List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                    });
                } else {
                    window.setTimeout(function () {
                        $.toast({heading: 'Agencies List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                    });
                }
            });
<?php } ?>
        function deleteemployee(key) {
            swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: "Yes, Do it!",
                closeOnConfirm: false
            }, function (isConfirm) {
                if (!isConfirm)
                    return;
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Employee/delete_employee',
                    data: {
                        id: key,
						value:0,
                    },
                    success: function (data) {
                        if (data == 1) {
                            swal({title: 'Done!',
                                text: 'It was succesfully Deleted!!',
                                type: 'success'}, function () {
                                window.location.reload();
                            });
                        } else {
                            swal("Error!", "Error Occured", "error");
                        }

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("cancel!", "It was Cancelled", "error");
                    }
                });
            });
        }
         
     function active(key) {
            swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: "Yes, Do it!",
                closeOnConfirm: false
            }, function (isConfirm) {
                if (!isConfirm)
                    return;
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Employee/delete_employee',
                    data: {
                        id: key,
						value:1,
                    },
                    success: function (data) {
                        if (data == 1) {
                            swal({title: 'Done!',
                                text: 'It was succesfully Activated!',
                                type: 'success'}, function () {
                                window.location.reload();
                            });
                        } else {
                            swal("Error!", "Error Occured", "error");
                        }

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("cancel!", "It was Cancelled", "error");
                    }
                });
            });
        }
    </script>