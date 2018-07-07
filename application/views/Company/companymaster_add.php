
       
            <!-- Right Sidebar Backdrop -->
            <div class="right-sidebar-backdrop"></div>
            <!-- /Right Sidebar Backdrop -->

            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5 class="txt-dark">Add Company </h5>
                        </div>

                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                                <li><a href="<?php echo base_url(); ?>/Company"><span>List Company</span></a></li>
                                <li class="active"><span>Add</span></li>
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
                                            <form data-toggle="validator" role="form" action="<?php echo base_url(); ?>Company/adddetails" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputuname_2">Company Name</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="inputName" name="companyname" placeholder="Company Name" data-validation="required" data-validation-error-msg="Please Enter Company Name"> 
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
                                                        <div class="input-group">
                                                            <input type="email" class="form-control" id="exampleInputEmail_2" name="companymail" placeholder="Enter email" data-validation="email" data-validation-error-msg="Please enter a valid e-mail">
                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_2">Address line1</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="address1"  name="address1" placeholder="Address line1" data-validation="required" data-validation-error-msg="Please enter Address line1">
                                                            <div class="input-group-addon"><i class="icon-envelope"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_2">Address line2</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="address2" name="address2" placeholder="Address line2" data-validation="required" data-validation-error-msg="Please enter Address line2">
                                                            <div class="input-group-addon"><i class="icon-envelope"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_3">Address line3</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="address3" name="address3"  placeholder="Address line3" >
                                                            <div class="input-group-addon"><i class="icon-envelope"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Address line4</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="address4" name="address4" placeholder="Address line4" >
                                                            <div class="input-group-addon"><i class="icon-envelope"></i></div>
                                                        </div>
                                                    </div></div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Pincode</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="pincode" name="pincode"  placeholder="Pincode" data-validation="length number" data-validation-length="6" data-validation-error-msg="Please enter Valid Pin Number">
                                                            <div class="input-group-addon"><i class="icon-location-pin"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="Mobile Number">Mobile Number</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="mno"  name="mobile_no" placeholder="Enter Mobile Number" data-validation="length number" data-validation-length="10" data-validation-error-msg="Please enter Valid Mobile Number">
                                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="GST No" class="control-label mb-10">GST No</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="gstno" name="gstno" placeholder="Enter GST No"  pattern="[A-Z0-9]{15}" maxlength="15" data-validation="required"  data-minlength="15"  data-validation-error-msg="Please enter Valid GST Number">
                                                            <div class="input-group-addon"><i class="icon-notebook"></i></div>
                                                        </div></div></div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="PAN No" class="control-label mb-10">PAN No</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="panno" name="panno" placeholder="Enter PAN No" data-validation="alphanumeric" data-minlength="15" data-validation-error-msg="Please enter Valid PAN Number">
                                                            <div class="input-group-addon"><i class="icon-credit-card"></i></div>
                                                        </div></div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_2">Bank Name</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="bname" name="bname" placeholder="Bank Name" data-validation="required" data-validation-error-msg="Please enter Bank Name">
                                                            <div class="input-group-addon"><i class="icon-home"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_4">Branch Name</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" iid="brancname" name="brancname"  placeholder="Branch Name" data-validation="required" data-validation-error-msg="Please enter Branch Name">
                                                            <div class="input-group-addon"><i class="icon-home"></i></div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                <div class="row">
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_3">IFSC Code</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="ifsc" name="ifsc" placeholder="IFSC Code" data-validation="required" data-validation-error-msg="Please enter IFSC Code">
                                                            <div class="input-group-addon"><i class="icon-home"></i></div>
                                                        </div>
                                                    </div>
                                                      <div class="form-group col-md-4">
                                                        <label class="control-label mb-10" for="exampleInputEmail_3">Account No</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="accno" name="accno" placeholder="Account No" data-validation="required" data-validation-error-msg="Please enter Bank Account No">
                                                            <div class="input-group-addon"><i class="icon-home"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-30 col-md-4">
                                                        <label class="control-label mb-10 text-left">File upload</label>
                                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                            <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
                                                                <input type="file" name="logo" id="logo" accept=".png,.jpg,.jpeg" data-validation="required" data-validation-error-msg="Please select logo" >
                                                            </span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
                                                        </div>
                                                    </div></div>
                                                <div class="row">
                                                    
                                                    <div class="col-md-6">
                                                         <label class="control-label mb-10" for="exampleInputEmail_4">Terms & Conditions</label>
                                               
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

     
