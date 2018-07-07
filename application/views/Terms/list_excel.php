<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=shoplist.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1'>
    <thead>
        <tr>
            <th>SNo</th>
            <th>Agent Name</th>
            <th>Shop Name</th>
            <th>Shop Owner Name</th>
            <th>Shop contact</th>
            <th>Shop Location</th>
            <th>Employee</th>
            <th>Product Name</th>
            <th>Product group Name</th>
            <th>Product  Qty</th>
            <th>Product  Price</th>                        
            <th>Order Value</th>
            <th>Order On</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $s = 1;
        $pricesy = 0;
        foreach ($shop as $shop_details) {
            $price = 0;
            ?>
            <tr>
                <td><?php echo $s++; ?></td>
                <td><?php
        $iid = $shop_details->agency_id;
        $shop_id = $shop_details->shop_id;
        $where = "tbl_shop.shop_id=$shop_id and tbl_order.created_on between '$from' and '$to'";
        $count = $this->db->select('tbl_shop.shop_name,tbl_product.product_name,tbl_productgroup.productgroup_name,qty,price')
                        ->join('tbl_product', 'tbl_product.product_id=tbl_order.product_id')
                        ->join('tbl_productgroup', 'tbl_productgroup.productgroup_id=tbl_order.product_group_id')
                        ->join('tbl_shop', 'tbl_shop.shop_id=tbl_order.shop_id')->from('tbl_order')->where($where)->get()->num_rows();
        $q = $this->db->select('tbl_shop.shop_name,tbl_product.product_name,tbl_productgroup.productgroup_name,qty,price')
                        ->join('tbl_product', 'tbl_product.product_id=tbl_order.product_id')
                        ->join('tbl_productgroup', 'tbl_productgroup.productgroup_id=tbl_order.product_group_id')
                        ->join('tbl_shop', 'tbl_shop.shop_id=tbl_order.shop_id')->from('tbl_order')->where($where)->get()->result();
        $mss = $this->db->query("select agencies_name  from tbl_agencies where agencies_id=$iid")->row();
        echo $mss->agencies_name;
            ?></td>
                <td><?php echo $shop_details->shop_name; ?></td>
                <td><?php echo $shop_details->shop_owner_name; ?></td>
                <td><?php echo $shop_details->shop_contact; ?></td>
                <td><?php echo $shop_details->address; ?></td>
                <td><?php
                $iss = $shop_details->emp_id;
                $mm = $this->db->query("select employee_email from tbl_employee where employee_id=$iss")->row();
                echo $mm->employee_email;
                ?>
                </td>
                <td>
    <?php
    if ($count > 0) {
        $i = 1;
        foreach ($q as $data) {
            echo $i++;
            echo ".)";
            echo $data->product_name;
            echo "<br>";
        }
    } else {
        ?><?php
    }
    ?>
                </td>
                <td>
                    <?php
                    if ($count > 0) {
                        $i = 1;
                        foreach ($q as $data) {
                            echo $i++;
                            echo ".)";
                            echo $data->productgroup_name;
                            echo "<br>";
                        }
                    } else {
                    }
                    ?>
                </td>
                <td>
    <?php
    if ($count > 0) {
        $i = 1;
        foreach ($q as $data) {
            echo $i++;
            echo ".)";
            echo $data->qty;
            echo "<br>";
        }
    } else {
    }
    ?>
                </td><td>
                    <?php
                    if ($count > 0) {
                        $i = 1;
                        foreach ($q as $data) {
                            echo $i++;
                            echo ".)";
                            echo $prices = $data->price;
                            echo "<br>";
                            $price += $prices;
                        }
                    } else {
                        ?><?php } ?></td>
                <td><?php
                    $mss = $this->db->query("select sum(price) as t,created_on from tbl_order where shop_id=$shop_id and tbl_order.created_on between '$from' and '$to'")->row();
                    $msss = $this->db->query("select sum(price) as t from tbl_order where shop_id=$shop_id and tbl_order.created_on between '$from' and '$to'")->num_rows();
                    if ($msss > 0) {
                        $amt = round($mss->t, 2);
                    } else {
                        $amt = "0";
                    }
                    echo $amt;
                    $pricesy = $amt + $pricesy;
                    ?></td>
                    <?php
                    if ($mss->created_on != '') {
                        $cc = date("d-m-Y", strtotime($mss->created_on));
                    } else {
                        $cc = date("d-m-Y", strtotime($shop_details->shop_created_on));
                    }
                    ?>
                <td><?php echo $cc; ?></td>
            </tr>
                <?php } ?>
    </tbody>
</table>