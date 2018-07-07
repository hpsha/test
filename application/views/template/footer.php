<footer class="footer container-fluid pl-30 pr-30">
    <div class="row">
        <div class="col-sm-12">
            <p><?php echo date("Y"); ?>&copy; Anil Foods . Developed by THE BANYAN INFOTECH</p>
        </div>
    </div>
</footer>
<!-- /Footer -->							
</div>			
<!-- /page-wrapper END -->		
</div>
<!-- wrapper box-layout theme-1-active pimary-color-green END -->
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js'); ?>"></script>
<!-- DATA TABLES -->
<script src="<?php echo base_url('app-assets/dist/js/export-table-data.js'); ?>"></script>

<!-- DATA TABLE -->
<script src="<?php echo base_url('app-assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/jszip/dist/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/pdfmake/build/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/pdfmake/build/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/dist/js/sweetalert-data.js'); ?>"></script> 		<!-- Slimscroll JavaScript -->
<script src="<?php echo base_url('app-assets/dist/js/jquery.slimscroll.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/dist/js/dropdown-bootstrap-extended.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/vendors/bower_components/switchery/dist/switchery.min.js'); ?>"></script>
<!-- GALLERY -->
<?php /*<script src="<?php echo base_url('app-assets/dist/js/isotope.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/dist/js/lightgallery-all.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/dist/js/froogaloop2.js'); ?>"></script>
<script src="<?php echo base_url('app-assets/dist/js/gallery-data.js'); ?>"></script> */ ?>
<!-- Select 2 -->

<script src="<?php echo base_url('app-assets/dist/js/jquery.repeater.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('app-assets/dist/js/form-repeater.js'); ?>"></script>


<!-- dashboard -->
<script src="<?php echo base_url('app-assets/dist/js/init.js'); ?>"></script>


<?php

if(!isset($from)){
    $from='';
}
if(!isset($to)){
    $to='';
}
/* <script src="<?php echo base_url('app-assets/dist/js/form-repeater.js'); ?>" type="text/javascript"></script>
 */ ?>
<!--VALIDATION SCRIPT -->
<script>$.validate({});</script>
<script>
 $("#model").select2({
                placeholder: "Select a model ",
                allowClear: true});
             $("#partno").select2({
                placeholder: "Select a product ",
                allowClear: true});
            
    $("#employee").select2({
        placeholder: "Select a Employee",
        allowClear: true});
    $("#employee").change(function () {
        $(this).valid()
    });
    

    
  
    $("#company_n").select2({
        placeholder: "Select a Company",
        allowClear: true});
    $("#prd_item_group").select2({
        placeholder: "Select a Item Group",
        allowClear: true});

    $("#prd_item_grade").select2({
        placeholder: "Select a Item Grade",
        allowClear: true});

    $("#prd_uom").select2({
        placeholder: "Select a UOM",
        allowClear: true});

    $("#prd_convertion_uom").select2({
        placeholder: "Select a Conversion UOM",
        allowClear: true});
$("#prd_hsn").select2({

		placeholder: "Select a HSN",

		allowClear: true});
    $("#prd_typ").select2({
        placeholder: "Select a Product type",
        allowClear: true});
     $("#make").select2({
        placeholder: "Select a Machine Make",
        allowClear: true});
    
    //Product page select2 END
    $("#year").select2({
        placeholder: "Select a year",
        allowClear: true});
    $("#year").change(function () {

        $(this).valid()
    });
 $("#master").select2({
                placeholder: "Select a Master ",
                allowClear: true});
            $("#warranty_type").select2({
                placeholder: "Select a Warranty Type",
                allowClear: true});
    $("#month").select2({
        placeholder: "Select a month",
        allowClear: true});
    $("#month").change(function () {
        $(this).valid()
    });
$("#m_category").select2({
        placeholder: "Select a Category",
        allowClear: true});
    $("#m_category").change(function () {
        $(this).valid()
    });
     $("#category").select2({
                placeholder: "Select a Category",
                allowClear: true});
            
    $("#company").select2({
        placeholder: "Select a company",
        allowClear: true});
    $("#company").change(function () {
        $(this).valid()
    });

            $("#prd_convertion_uom").select2({
                placeholder: "Select a Conversion UOM",
                allowClear: true});
    $("#roles_category").select2({
        placeholder: "Select a Roles",
        allowClear: true});
    $("#roles_category").change(function () {
        $(this).valid()
    });
    $("#company_terms").select2({
        placeholder: "Select a company",
        allowClear: true});
    $("#company_terms").change(function () {
        $(this).valid()
    });
    $("#settarget").select2({
        placeholder: "Please Select Target Wise",
        allowClear: true});
    $("#settarget").change(function () {

        $(this).valid()
    });
    function datas() {
        $('#c_logo').prop('required', true);

    }
    function datas_icon() {
        $('#c_icon').prop('required', true);

    }

    function AlphaNumberKey(event) {
        var regex = new RegExp("^[A-Z0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    function emails(event) {
        var regex = new RegExp("^[A-Za-z0-9@_.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    function phone(event) {
        var regex = new RegExp("^[0-9+-]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode == 32) {
            return true;
        } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } else {
            return true;
        }
    }
      if ($("#attend").length != 0) {

   $('#examples').DataTable({
            "processing": true,
            "serverSide": true,
            "aLengthMenu": [[15, 30, 50, 100], [15, 30, 50, 100]],

            "iDisplayLength": 15,
            "ajax": {
                "url": "<?php echo base_url('Shop_list/posts') ?>",
                "dataType": "json",
                "type": "POST",
                "data": {
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                'from':'<?php echo $from; ?>',
                'to':'<?php echo $to; ?>',
                }
            },
            "columns": [
                      {"data": "sno"},
                {"data": "agent"},
                {"data": "shop"},
                {"data": "owner"},
                {"data": "contact"},
                {"data": "location"},
                {"data": "remarks"},
                {"data": "ordervalue"},
                 {"data": "orderdate"},
                {"data": "employee"},
                {"data": "action"},
            ],
             dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    title: 'Shop List'
                }, {
                    extend: 'print',
                    footer: true,
                    title: 'Shop List'
                }, 
                {
                    extend: 'excel',
                    footer: true,
                    title: 'Shop List'
                },{
                    extend: 'csv',
                    footer: true,
                    title: 'Shop List'
                },
            ]

        });
         $('#examples1').DataTable({
            "processing": true,
            "serverSide": true,
            "aLengthMenu": [[15, 30, 50, 100], [15, 30, 50, 100]],

            "iDisplayLength": 15,
            "ajax": {
                "url": "<?php echo base_url('Shop_list/posts') ?>",
                "dataType": "json",
                "type": "POST",
                "data": {
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                'from':'<?php echo $from; ?>',
                'to':'<?php echo $to; ?>',
                }
            },
            "columns": [
                      {"data": "sno"},
                {"data": "agent"},
                {"data": "shop"},
                {"data": "owner"},
                {"data": "contact"},
                {"data": "location"},
                {"data": "remarks"},
                {"data": "ordervalue"},
                 {"data": "orderdate"},
                {"data": "employee"},
                {"data": "action"},
            ],
             dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    title: 'Shop List'
                }, {
                    extend: 'print',
                    footer: true,
                    title: 'Shop List'
                }, 
                {
                    extend: 'excel',
                    footer: true,
                    title: 'Shop List'
                },{
                    extend: 'csv',
                    footer: true,
                    title: 'Shop List'
                },
            ]

        });
        
        }   
          if ($("#orderw").length != 0) {
        $('#orderw').DataTable({
            "processing": true,
            "serverSide": true,
            "aLengthMenu": [[15, 30, 50, 100], [15, 30, 50, 100]],

            "iDisplayLength": 15,
            "ajax": {
                "url": "<?php echo base_url('Orders/posts') ?>",
                "dataType": "json",
                "type": "POST",
                "data": {                                                                                                                                                               
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                'from':'<?php echo $from; ?>',
                'to':'<?php echo $to; ?>',
                }
            },
            "columns": [
          {"data": "ono"},
                {"data": "agent"},
                {"data": "shop"},
                {"data": "owner"},
                {"data": "contact"},
                {"data": "location"},
                {"data": "remarks"},
                {"data": "ordervalue"},
                 {"data": "orderdate"},
                {"data": "employee"},
                {"data": "action"},
            ],
             dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    title: 'Order List'
                }, {
                    extend: 'print',
                    footer: true,
                    title: 'Order List'
                }, 
                {
                    extend: 'excel',
                    footer: true,
                    title: 'Order List'
                },  {
                    extend: 'csv',
                    footer: true,
                    title: 'Order List'
                },
            ]

        });
        }
         if ($("#examples1").length != 0) {
         $('#examples1').DataTable({
            "processing": true,
            "serverSide": true,
            "aLengthMenu": [[15, 30, 50, 100], [15, 30, 50, 100]],

            "iDisplayLength": 15,
            "ajax": {
                "url": "<?php echo base_url('Shop_list/posts') ?>",
                "dataType": "json",
                "type": "POST",
                "data": {
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                'from':'<?php echo $from; ?>',
                'to':'<?php echo $to; ?>',
                }
            },
            "columns": [
                {"data": "agent"},
                {"data": "shop"},
                {"data": "owner"},
                {"data": "contact"},
                {"data": "location"},
                {"data": "remarks"},
                {"data": "ordervalue"},
                 {"data": "orderdate"},
                {"data": "employee"},
                {"data": "action"},
            ],
             dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    title: 'Shop List'
                }, {
                    extend: 'print',
                    footer: true,
                    title: 'Shop List'
                }, 
                {
                    extend: 'excel',
                    footer: true,
                    title: 'Shop List'
                }, {
                    extend: 'csv',
                    footer: true,
                    title: 'Shop List'
                },
            ]

        });
        }
        if ($("#examples1").length != 0) {
        $('#orderw1').DataTable({
            "processing": true,
            "serverSide": true,
            "aLengthMenu": [[15, 30, 50, 100], [15, 30, 50, 100]],

            "iDisplayLength": 15,
            "ajax": {
                "url": "<?php echo base_url('Orders/posts') ?>",
                "dataType": "json",
                "type": "POST",
                "data": {
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                'from':'<?php echo $from; ?>',
                'to':'<?php echo $to; ?>',
                }
            },
            "columns": [
                {"data": "agent"},
                {"data": "shop"},
                {"data": "owner"},
                {"data": "contact"},
                {"data": "location"},
                {"data": "remarks"},
                {"data": "ordervalue"},
                 {"data": "orderdate"},
                {"data": "employee"},
                {"data": "action"},
            ],
             dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    title: 'Order List'
                }, {
                    extend: 'print',
                    footer: true,
                    title: 'Order List'
                }, 
                {
                    extend: 'excel',
                    footer: true,
                    title: 'Order List'
                },  {
                    extend: 'csv',
                    footer: true,
                    title: 'Order List'
                },
            ]

        });
        }

</script>
</body>
</html>