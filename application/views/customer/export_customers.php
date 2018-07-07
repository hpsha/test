<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>thead tr td{
        font-weight:bold;
    }</style>
<table border='1'>
    <thead>
    <tr>
        <th>ID</th>
        <td>Customer Name</th>
        <th>Customer Spindles</th>
        <th>Customer Area</th>
        <?php foreach ($companies as $company) { ?>
            <th><?php echo $company->company_name; ?></th>
        <?php } ?>
        <th>Phone No</th>
        <th>Email id</th>
        <th>GST No</th>
        <th>PAN No</th>
        <th>Address Line1</th>
        <th>Address Line2</th>
        <th>Address Line3</th>
        <th>Address Line4</th>
        <th>Pincode</th>
        <th>Billing Customer Name</th>
        <th>Billing Phone No</th>
        <th>Billing Email id</th>
        <th>Billing GST No</th>
        <th>Billing PAN No</th>
        <th>Billing Address Line1</th>
        <th>Billing Address Line2</th>
        <th>Billing Address Line3</th>
        <th>Billing Address Line4</th>
        <th>Billing Pincode</th>
        <th>Shipping Customer Name</th>
        <th>Shipping Phone No</th>
        <th>Shipping Email id</th>
        <th>Shipping Address Line1</th>
        <th>Shipping Address Line2</th>
        <th>Shipping Address Line3</th>
        <th>Shipping Address Line4</th>
        <th>Shipping Pincode</th>
        <th>Shipping GST No</th>
        <th>Shipping PAN No</th>
        <th>Customer Created On</th>

    </tr>
    </thead>
    <?php
    $i = 1;
    foreach ($customers as $customer) {
        ?>
        <tr>
            <td><?php echo $i++; ?></td>

            <td><?php echo $customer->customer_name; ?></td>
            <td><?php echo $customer->customer_spindles; ?></td>
            <td><?php echo $customer->customer_area; ?></td>
            <?php foreach ($companies as $company) { ?>
                <td><?php
                    $id = $company->company_id;
                    $c_id = $customer->customer_id;
                    $conditions = "customer_id='$c_id' and company_id='$id'";
                    $cus_sale = $this->db->select("customer_sale_type,customer_sale_agent,customer_sale_salesperson")->from("tbl_customer_sales")->where($conditions)->get()->row();
                    if ($cus_sale->customer_sale_type == '2') {
                         $agent_condition="agent_id=$cus_sale->customer_sale_agent";
                        $agent_name = $this->db->select("agent_name")->from("tbl_agent")->where($agent_condition)->get()->row();
                        

                        echo "<b>Agent</b>:$agent_name->agent_name";
                        echo "<br>";
                    }
                                            $employee_condition="employee_id='$cus_sale->customer_sale_salesperson'";

                    $employee_name = $this->db->select("employee_name")->from("tbl_employee")->where($employee_condition)->get()->row();

                    echo "<b>Sales Person</b>:$employee_name->employee_name";
                    ?>
                <?php } ?></td>

            <td><?php echo $customer->customer_phone; ?></td> 
            <td><?php echo $customer->customer_mail; ?></td>
            <td><?php echo $customer->customer_gst_no; ?></td>
            <td><?php echo $customer->customer_pan_no; ?></td>
            <td><?php echo $customer->customer_address_line1; ?></td>
            <td><?php echo $customer->customer_address_line2; ?></td>
            <td><?php echo $customer->customer_address_line3; ?></td>
            <td><?php echo $customer->customer_address_line4; ?></td>
            <td><?php echo $customer->customer_pincode; ?></td> 
            <td><?php echo $customer->customer_billing_name; ?></td>
            <td><?php echo $customer->customer_billing_phone; ?></td>
            <td><?php echo $customer->customer_billing_mail; ?></td>
            <td><?php echo $customer->customer_billing_address1; ?></td>
            <td><?php echo $customer->customer_billing_address2; ?></td>
            <td><?php echo $customer->customer_billing_address3; ?></td>
            <td><?php echo $customer->customer_billing_address4; ?></td>
            <td><?php echo $customer->customer_billing_pincode; ?></td> 
            <td><?php echo $customer->customer_billing_gst; ?></td>
            <td><?php echo $customer->customer_billing_pan; ?></td>
            <td><?php echo $customer->customer_shipping_name; ?></td>
            <td><?php echo $customer->customer_shipping_phone; ?></td>
            <td><?php echo $customer->customer_shipping_mail; ?></td>
            <td><?php echo $customer->customer_shipping_address1; ?></td>
            <td><?php echo $customer->customer_shipping_address2; ?></td>
            <td><?php echo $customer->customer_shipping_address3; ?></td>
            <td><?php echo $customer->customer_shipping_address4; ?></td>
            <td><?php echo $customer->customer_shipping_pincode; ?></td> 
            <td><?php echo $customer->customer_shipping_gst; ?></td>
            <td><?php echo $customer->customer_shipping_pan; ?></td>
            <td><?php echo $customer->customer_created_on; ?></td>
        </tr>
    <?php } ?>
</table>