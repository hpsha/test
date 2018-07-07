<style> 
    table tr td {
        border:1px solid black
    }
    table tr th {
        border:1px solid black
    }
</style>
<?php
$product = $this->db->query("select product_id,product_name from tbl_product where product_act=1")->result();
$re = '';
foreach ($product as $products) {
    $re .= "<th>$products->product_name</th>";
}
$result = $this->db->query("select agencies_id,agencies_name,agencies_email_id from  tbl_agencies where agencies_act=1")->result();

foreach ($result as $agencies) {


    $data = '<table style="border:1px solid black"><thead><tr><th>Shop Name</th><th>Owner Name</th><th>Shop Contact No</th><th>shop location</th><th>City Name</th><th>Remarks</th>' . $re . '<th>Total Qty</th><th>Total Price</th></tr></thead>';



    $data .= "<tbody>";



    $userid = $agencies->agencies_id;
    $aa = $this->db->query("Select branch_id from tbl_agencies where agencies_id=$userid")->row();
    $date = date("Y-m-d");
    $orders = $this->db->query("select shop_id from tbl_order where created_on='$date' and shop_type!='3' and agencies_id=$userid group by  shop_id")->result();


    foreach ($orders as $order) {
        $data .= '<tr>';

        $shop_id = $order->shop_id;
        $shops = $this->db->query("select shop_name,shop_owner_name,shop_contact,address,shop_landline,shop_location,loc_id,remarks from tbl_shop where shop_id='$shop_id' and shop_act=1")->row();


        $data .= '<td  style="border:1px solid black">' . $shops->shop_name . '</td>';
        $data .= '<td  style="border:1px solid black">' . $shops->shop_owner_name . '</td>';
        $data .= '<td  style="border:1px solid black">' . $shops->shop_contact . '</td>';
        $data .= '<td  style="border:1px solid black">' . $shops->shop_landline . '</td>';
        $shops->loc_id;
        $q = $this->db->query("select location_name from tbl_location where location_id=$shops->loc_id")->row();

        $data .= '<td  style="border:1px solid black">' . $q->location_name . '</td>';
        $data .= '<td  style="border:1px solid black">' . $shops->remarks . '</td> ';
        foreach ($product as $products) {
            $id = $products->product_id;
            $bid = $aa->branch_id;

            $qty = $this->db->query("select sum(qty) as qtys from tbl_order where created_on='$date' and shop_type!='3' and shop_id=$shop_id and agencies_id=$userid and product_id=$id")->row();
            if ($qty->qtys != '') {
                $qtys = $qty->qtys;
            } else {
                $qtys = "0";
            }
            $data .= '<td  style="border:1px solid black">' . $qtys . '</td>';
        }
        $tqty = $this->db->query("select sum(qty) as qtys, sum(price) as prices from tbl_order where created_on='$date' and shop_type!='3' and shop_id=$shop_id and agencies_id=$userid")->row();
        if ($tqty->qtys != '') {
            $tqtys = $tqty->qtys;
        } else {
            $tqtys = "0";
        }
        if ($tqty->prices != '') {
            $tprices = round($tqty->prices, 2);
        } else {
            $tprices = "0";
        }
        $data .= '<td  style="border:1px solid black">' . $tqtys . '</td>';
        $data .= '<td  style="border:1px solid black">' . $tprices . '</td>';
        $data .= '</tr>';
    }

    $data .= '<tr style="background-color:#F4B084">';

    $data .= '<td style="background-color:#F4B084" colspan="6" >Total Qty</td>';
    foreach ($product as $products) {

        $id = $products->product_id;


        $qty = $this->db->query("select sum(qty) as qtys from tbl_order where created_on='$date' and shop_type!='3' and   agencies_id=$userid and product_id=$id")->row();
        if ($qty->qtys != '') {
            $rr = $qty->qtys;
        } else {
            $rr = 0;
        }
        $data .= '<td  style="border:1px solid black">' . $rr . '</td>';
    }
    $tqty = $this->db->query("select sum(qty) as qtys ,sum(price) as prices from tbl_order where created_on='$date' and shop_type!='3' and   agencies_id=$userid")->row();
    if ($tqty->qtys != '') {
        $tqtys = $tqty->qtys;
    } else {
        $tqtys = "0";
    }
    if ($tqty->prices != '') {
        $tprices = round($tqty->prices, 2);
    } else {
        $tprices = "0";
    }
    $data .= '<td  style="border:1px solid black">' . $tqtys . '</td>';
    $data .= '<td  style="border:1px solid black">' . $tprices . '</td>';
    $data .= "</tr>";
    $data .= '<tr style="background-color:#F4B084">';

    $data .= '<td style="border:1px solid black" colspan="6">Total Price</td>';
    foreach ($product as $products) {

        $id = $products->product_id;


        $price = $this->db->query("select sum(price) as price from tbl_order where created_on='$date' and shop_type!='3' and   agencies_id=$userid and product_id=$id")->row();
        if ($price->price != '') {
            $rr = round($price->price, 2);
        } else {
            $rr = 0;
        }
        $data .= '<td  style="border:1px solid black">' . $rr . '</td>';
    }
    $data .= "<td></td>";
    $data .= "<td></td>";

    $data .= "</tr>";
    $data .= '</tbody>';

    $data .= '</table>';

    $total = $this->db->query("select qty from tbl_order where created_on='$date' and shop_type!='3' and agencies_id=$userid")->num_rows();
    if ($total > 0) {
       

      
        $agenciesn = $agencies->agencies_name;
        $agenciesn = str_replace("/", ".", "$agencies->agencies_name");
        $agenciesn = str_replace(" ", "", "$agenciesn");
        $agenciesn .= '.xls';

        file_put_contents('excel/' . $agenciesn, $data);



        $this->load->library('email');

//SMTP & mail configuration
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'smtp@banyaninfotech.com',
            'smtp_pass' => 'Banyan@2k17@#',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        $from_mail = "manivannans@simta.com";

        $this->email->from($from_mail);
        //  $list=$agencies->agencies_email_id;
        $list = "hari@banyaninfotech.com";

        $this->email->to($list);


        //    $this->email->cc('ohtc@simta.com');


        $att = base_url() . 'excel/' . $agenciesn;

        $this->email->attach($att);

        $cname = "testsss";
        $subject = "EXCEL";
        $body = "TEST";
        $result = $this->email->from($from_mail, $cname);
        //$this->email->reply_to($cmail);
        $this->email->subject($subject);
        $this->email->message($body);
        $mm = $this->email->send();
        $this->email->clear($att);
        // $this->email->print_debugger();
    }
}
?>