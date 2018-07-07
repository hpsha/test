<style> 
    table tr td {
        border:1px solid black
    }
      table tr th {
        border:1px solid black
    }
</style>
<?php

 $product=$this->db->query("select product_id,product_name from tbl_product where product_act=1")->result();
 $re='';
foreach($product as $products){
    $re.="<th>$products->product_name</th>"; 
}
   $result=$this->db->query("select agencies_id,agencies_name from  tbl_agencies where agencies_act=1 limit 100")->result();
        foreach($result as $agencies){
           
      
$data='<table style="border:1px solid black"><thead><tr  style="border:1px solid black"><th>Shop Name</th><th>Owner Name</th><th>Shop Contact No</th><th>Address</th><th>shop location</th><th>City Name</th><th>orderamount</th><th>Remarks</th>'.$re.'</tr></thead>';



 $data.="<tbody>";
 
        
       
$userid=$agencies->agencies_id;
        $aa=$this->db->query("Select branch_id from tbl_agencies where agencies_id=$userid")->row();
        $date=date("Y-m-d");
      $orders=$this->db->query("select shop_id from tbl_order where created_on='$date' and shop_type!='3' and agencies_id=$userid group by  shop_id")->result();
      
     
        foreach($orders as $order){           
$data.='<tr  style="border:1px solid black">';

            $shop_id=$order->shop_id;
                $shops=$this->db->query("select shop_name,shop_owner_name,shop_contact,address,shop_landline,shop_location,loc_id,remarks from tbl_shop where shop_id='$shop_id' and shop_act=1")->row();
 
                    
           $data.='<td  style="border:1px solid black">'.$shops->shop_name.'</td>';   
           $data.='<td  style="border:1px solid black">'.$shops->shop_owner_name.'</td>';   
           $data.='<td  style="border:1px solid black">'.$shops->shop_contact.'</td>';   
           $data.='<td  style="border:1px solid black">'.$shops->address.'</td>'; 
           $data.='<td  style="border:1px solid black">'.$shops->shop_landline.'</td>';   
           $shops->loc_id;
           $q=$this->db->query("select location_name from tbl_location where location_id=$shops->loc_id")->row();
          
           $data.='<td  style="border:1px solid black">'.$q->location_name.'</td>';   
            $data.='<td  style="border:1px solid black">'.$shops->shop_location.'</td>';   
           $data.='<td  style="border:1px solid black">'.$shops->remarks.'</td> ';  
        foreach($product as $products){
    $id=$products->product_id;
    $bid=$aa->branch_id;

           $qty=$this->db->query("select sum(qty) as qtys from tbl_order where created_on='$date' and shop_type!='3' and shop_id=$shop_id and agencies_id=$userid and product_id=$id")->row();
           if($qty->qtys!=''){
    $qtys=$qty->qtys;
           }
           else{
             $qtys="0";  
           }
 $data.='<td  style="border:1px solid black">'.$qtys.'</td>';
 
}
         $data.='</tr>';
          
        }
        
$data.="<tr>";
   $data.='<td style="border:1px solid black"></td><td style="border:1px solid black"></td>   
           <td style="border:1px solid black" ></td><td  style="border:1px solid black"></td>   
           <td  style="border:1px solid black"></td><td  style="border:1px solid black"></td>   
            <td style="border:1px solid black"></td><td  style="border:1px solid black"></td>';
                foreach($product as $products){
               
            $id=$products->product_id;
       

           $qty=$this->db->query("select sum(qty) as qtys from tbl_order where created_on='$date' and shop_type!='3' and   agencies_id=$userid and product_id=$id")->row();
           if($qty->qtys!=''){
    $rr=$qty->qtys;
           }
           else{
             $rr=0;  
           }
            $data.='<td  style="border:1px solid black">'.$rr.'</td>';
            } 
            $data.="</tr>";
    $data.='</tbody>';
    
$data.='</table>';
$agenciesn=$agencies->agencies_name;
$agenciesn.='.xls';
  file_put_contents('excel/'.$agenciesn, $data);
         }



        
        ?>