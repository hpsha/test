<body>
            <div class="right-sidebar-backdrop"></div>
            <!-- /Right Sidebar Backdrop -->
            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5 class="txt-dark">Edit Machinery Master2</h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                                <li><a href="<?php echo base_url(); ?>Master/machinery_master2">Machinery Master2 List</a></li>
                                <li class="active"><span>Machinery Master2 Edit</span></li>
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
                                            <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Master/update_machinery_master2" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label mb-10" for="itemname">Machinery Master2 Name</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="master2" name="master2" placeholder="Machinery Master2 Name" data-validation="required" data-validation-error-msg="Please Enter Machinery Master2 Name" value="<?php echo $master2->master2_name?>">
                                                            <input type="hidden" name="key" value="<?php echo $master2->master2_rand ?>">
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        </div>
                                                    </div>
                                                    </div>



                                                    <div class="row">
                                                    <div class="form-group mb-0 col-md-12">
                                                        <button type="submit" class="btn btn-success btn-anim pull-right" id="but"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
                                                    </div>
                                                       </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
