<body>
            <div class="right-sidebar-backdrop"></div>
            <!-- /Right Sidebar Backdrop -->
            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5 class="txt-dark">ADD AGENT </h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                                <li><a href="<?php echo base_url(); ?>Agent/">Agent List Details</a></li>
                                <li class="active"><span>Agent Add</span></li>
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
                                            <form data-toggle="validator" role="form" action="<?php echo base_url(); ?>Agent/add" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputuname_2">Agent Name</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="agnt_name" name="agnt_name" placeholder="Agent Name" data-validation="required" data-validation-error-msg="Please Enter Agent Name">
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="Mobile Number">Mobile Number</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="agnt_number" name="agnt_number" placeholder="Enter Mobile Number" data-validation="length number" data-validation-length="10" data-validation-error-msg="Please enter Mobile Number">
                                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
                                                        <div class="input-group">
                                                            <input type="email" class="form-control" id="agnt_mail" name="agnt_mail" placeholder="Enter email" data-validation="email" data-validation-error-msg="Please enter a valid e-mail">
                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_2">Address line1</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="agnt_addr1" name="agnt_addr1" placeholder="Address line1" data-validation="required" data-validation-error-msg="Please enter Address line1">
                                                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_2">Address line2</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="agnt_addr2" name="agnt_addr2" placeholder="Address line2" data-validation="required" data-validation-error-msg="Please enter Address line2">
                                                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_3">Address line3</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="agnt_addr3" name="agnt_addr3" placeholder="Address line3" data-validation="required" data-validation-error-msg="Please enter Address line3">
                                                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Address line4</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="agnt_addr4" name="agnt_addr4" placeholder="Address line4" data-validation="required" data-validation-error-msg="Please enter Address line4">
                                                            <div class="input-group-addon"><i class="ti-location-pin"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Pincode</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="agnt_pin" name="agnt_pin" placeholder="Pincode" data-validation="length number" data-validation-length="6" data-validation-error-msg="Please enter Valid Pincode">
                                                            <div class="input-group-addon"><i class="ti-direction"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Additional Contact 1</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="additional_contact1" name="additional_contact1" placeholder="Additional Contact 1">
                                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Additional Contact 2</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="additional_contact2" name="additional_contact2" placeholder="Additional Contact 2">
                                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Additional Email 1</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="additional_email1" name="additional_email1" placeholder="Additional Email 1">
                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Additional Email 2</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="additional_email2" name="additional_email2" placeholder="Additional Email 2">
                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="row">
                                                    <div class="form-group mb-0 col-md-12">
                                                        <button type="submit" class="btn btn-success btn-anim pull-right"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
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
