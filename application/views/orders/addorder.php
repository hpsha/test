<?php //print_r($customergroup);exit();   ?>
<body>
    <div class="right-sidebar-backdrop"></div>
    <!-- /Right Sidebar Backdrop -->
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Order Add</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Agencies/">Order List</a></li>
                        <li class="active"><span>Order Add</span></li>
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

                                    <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Orders/adddetails" method="POST" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Select Product</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="partno" name="partno" onchange="getprice()">
                                                        <option value="">Please Select Product </option>

                                                        <?php
                                                        foreach ($list as $product) {
                                                            ?>

                                                            <option value="<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left"> Qty</label>
                                                    <input type="text" class="form-control" placeholder="qty" name="qty" id="qty" value="1" >
                                                </div></div>

                                            <div class="col-md-3">
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left"> Price</label>
                                                    <input type="text" class="form-control" placeholder="price"readonly id="price" name="price" >
                                                </div></div>                                            

                                        </div> 
                                        <div class="form-group col-md-3 pull-right ">
                                            <div class="form-group " style="float:right">
                                                <button type="button" class="btn btn-warning" onclick="addproductohtc()">ADD</button>

                                            </div>
                                        </div>

                                        <span id="xx"></span>

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr><td>S.NO</td>
                                                    <td>Product Name</td>

                                                    <td>QTY</td>
                                                    <td>Price</td>
                                                    <td>Total</td>
                                                    <td>Action</td>
                                                </tr>

                                            </thead>
                                            <tbody id="mytable">


                                            </tbody>

                                        </table>
                                           <div class="row">
                                            <div class="col-md-4 col-md-offset-8">
                                                <div class="form-group row">
                                                    <label class="col-md-4 label-control" for="userinput2">Grand Total</label>


                                                    <div class=" col-md-8" style="">
                                                        <input type="text" style=""  class="form-control" readonly="readonly" id="grand_total" name="grand_total" >
                                                        <input type="hidden" style=""  class="form-control"  id="grand_totals" name="grand_totals" >
       </div>
                                                    <?php 
                                                       $user_id=$_SESSION['userdata']['emp_id'];
    $row=$this->db->query("select branch_id from tbl_agencies where agencies_id=$user_id")->row();
    
                                                    ?>
                                                        <input type="hidden" style=""  value="<?php echo $row->branch_id; ?>"class="form-control"  id="branch_id" name="branch" >


                                                </div>
                                            </div>  </div>

                                        <input type="hidden" class="form-control" id="rowslength" name="rowslength" value="0">

   <input type="hidden" value='' id="totaltableid" name="totaltableid">

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
                                                    //SCHEDULE page select2
                                                    $("#created_by").select2({
                                                        placeholder: "Agencies assigned to",
                                                        allowClear: true});
                                                    $("#names").select2({
                                                        placeholder: "Branch name",
                                                        allowClear: true});
                                                    $("#name").select2({
                                                        placeholder: "Agencies name",
                                                        allowClear: true});
                                                    $("#location").select2({
                                                        placeholder: "Locations name",
                                                        allowClear: true});

                                                    function getlocation() {

                                                        var id = $("#name").val();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: '<?php echo base_url(); ?>Agencies/get_location',
                                                            data: {
                                                                id: id,

                                                            },
                                                            success: function (data) {
                                                                $("#location").html('');
                                                                $("#location").html(data);

                                                            }
                                                        });
                                                    }

                                                    function getagencies() {

                                                        var id = $("#names").val();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: '<?php echo base_url(); ?>Agencies/getagencies',
                                                            data: {
                                                                id: id,

                                                            },
                                                            success: function (data) {

                                                                $("#name").html('');
                                                                $("#name").html(data);

                                                            }
                                                        });
                                                    }
                                               
                                                    var id = 0;
                                                    function addproductohtc() {

                                                        if ($("#partno").select2("val") == '')
                                                        {
                                                            $("#partno_error").html("Please Select Part No")
                                                            return false;
                                                        } else
                                                        {
                                                            var name = $("#partno option:selected").text();
var pno = $("#partno").val();
                                                            var qty = $("#qty").val();
                                                            var price = $("#price").val();
total= +qty * +price;


                                                            ids = id++;
                                                            idd = ids + 1;
                                                            var myarr = document.getElementsByName('mastersy[]');
                                                            $("#totaltableid").val(ids);
                                                            $("#mytable").append('<tr id="tr' + ids + '"><td style="display:none">\n\
                                <input type="hidden" name="partnos[]" id="partnos' + ids + '" value="' + pno + '">\n\\n\
<input type="hidden" name="qtysz[]" id="qtysz' + ids + '" value="' + qty + '">\n\\n\
<input type="hidden" name="pricesss[]" id="price' + ids + '" value="' + price + '">\n\
                                <input type="hidden" name="pd_total[]" id="pd_total' + ids + '" value="' + total + '">\n\
                                <td>' + idd + '</td><td>' + name + '</td>\n\
<td><input type="text"  class="form-control" onkeypress="return isNumberKey(this.value);" \n\
onkeyup="showSubTotal();" name="qtys[]" id="qtys' + ids + '" value="' + qty + '"></td>\n\
<td>' + price + '</td>\n\
<td id="pd_totals' + ids + '">' + total + '</td>\n\
<td><button type="button" data-repeater-delete onclick="deleteCurrentRow(this);" id="delet" class="btn btn-icon btn-danger" style="padding:2px 3px 2px 3px;" ><i class="fa fa-times"></i></button></td></tr>');

                                                          
                                                            showSubTotal();
                                                        }
                                                    }

                                                    function deleteCurrentRow(obj)
                                                    {

                                                        $(document.body).delegate("#delet", "click", function () {
                                                            var t = document.getElementById("mytable");
                                                            var l = $("#totaltableid").val();
                                                            for (i = 0; i <= l; i++) {
                                                                $(this).closest("#tr" + i).remove();
                                                                $(this).closest("#tb" + i).remove();
                                                            }

                                                            showSubTotal();
                                                        });
                                                    }
                                                     function showSubTotal() {
            var tbl = document.getElementById("mytable");
            var l = $("#totaltableid").val();
            console.log(l);
            var m = tbl.rows.length;
            var subtot = 0.00;
            var tot_qty = 0.00;
            var tot_gst = 0.00;
            if (m > 0) {
                for (i = 0; i <= l; i++) {

                    if ($("#qtys" + i).length != 0) {


                        var qtys = parseInt($("#qtys" + i).val());
                        var prd_mrp = parseFloat($("#price" + i).val());
                      
                        var grand_totals = +prd_mrp * +qtys;
                        var grand_totalsy = parseFloat(Number(grand_totals).toFixed(2));
                        $("#pd_totals" + i).html(grand_totalsy);
                        $("#pd_total" + i).val(grand_totalsy);
                         var subtot = +grand_totals + +subtot;
                        var subtoty = parseFloat(Number(subtot).toFixed(2));
                        $("#grand_total").val(subtoty);
                        $("#grand_totals").val(subtoty);
                       // calcamount();
                    }

                }

            } else {
                $("#grand_total").val('');
                $("#grand_totals").val('');
            }
          //  calcamount();
        }
         function getprice(){
             var branch=$("#branch_id").val();
              var pno=$("#partno").val();
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url(); ?>Orders/get_prices',
                    data: {
                        partno: pno,
                branch:branch
           
                    },
                    success: function (response) {

                        var data = $.parseJSON(response);
                        $("#price").val(data.distributor_price);
                    }
                });

        }
        </script>