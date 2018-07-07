<div class="right-sidebar-backdrop"></div>
<!-- /Right Sidebar Backdrop -->
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Add Terms </h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php
                        echo base_url();
                        ?>Dashboard">Dashboard</a></li>
                    <li><a href="<?php
                        echo base_url();
                        ?>/Terms"><span>List Terms</span></a></li>
                    <li class="active"><span>edit</span></li>
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
                                <form data-toggle="validator" role="form" action="<?php
                                echo base_url();
                                ?>Terms/updateterms" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label class="control-label mb-10">Select  Company</label>
                                                <select class="form-control select2" id="company_terms" name="company"  data-validation="required" data-validation-error-msg="Please Select Terms">
                                                    <option></option>   <?php
                                                    foreach ($companies as $company) {
                                                        ?>
                                                        <option value="<?php
                                                        echo $company->company_id;
                                                        ?>" <?php
                                                                if ($company->company_id == $get_terms->company_id) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?php
                                                                    echo $company->company_name;
                                                                    ?></option>
                                                        <?php
                                                    }
                                                    ?> 
                                                </select>
                                            </div>
                                        </div>           
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-10" for="exampleInputuname_2">Terms and conditions</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="inputName" name="document_name" placeholder="Enter Terms and conditions" data-validation="required" data-validation-error-msg="Enter Terms and conditions" value="<?php echo $get_terms->term_condition_data; ?>"> 
                                                <div class="input-group-addon"><i class="fa fa-info"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-0 col-md-12">
                                            <input type="hidden" class="form-control" id="inputName" name="terms_rand" placeholder="Enter Terms and conditions" data-validation="required" data-validation-error-msg="Enter Terms and conditions" value="<?php echo $get_terms->term_condition_rand; ?>"> 

                                            <button type="submit" class="btn btn-success btn-anim pull-right"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
                                        </div> 
                                    </div>
                                </form>  
                            </div></div></div></div>
            </div>
        </div>
    </div>