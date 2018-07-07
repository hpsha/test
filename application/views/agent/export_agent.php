<?php
//print_r($Agent);exit();
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Agent.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1'>
  <thead>
    <th>S.No</th>
    <th>Agent Name</th>
    <th>Agent Phone</th>
    <th>Agent Mail</th>
    <th>Agent Address Line1</th>
    <th>Agent Address Line2</th>
    <th>Agent Address Line3</th>
    <th>Agent Address Line4</th>
    <th>Agent Pincode</th>
    <th>Agent GST</th>
    <th>Agent PAN </th>
    <th>Created on</th>
    <th>Updated on</th>
  </thead>
  <?php
  $i=1;
  foreach($agent as $Data){ 
  
  
  ?>
	  <tr>
		  <td><?php echo $i++; ?></td>
		  <td><?php echo $Data->agent_name; ?></td>
		  <td><?php echo $Data->agent_phone; ?></td>
		  <td><?php echo $Data->agent_email; ?></td>
		  <td><?php echo $Data->agent_address_line1; ?></td>
		  <td><?php echo $Data->agent_address_line2; ?></td>
		  <td><?php echo $Data->agent_address_line3; ?></td>
		  <td><?php echo $Data->agent_address_line4; ?></td>
		  <td><?php echo $Data->agent_pincode; ?></td>
		  <td><?php echo $Data->agent_gst; ?></td>
		  <td><?php echo $Data->agent_pan; ?></td>
		  <td><?php echo $Data->agent_created_on; ?></td>
		  <td><?php echo $Data->agent_updated_on; ?></td>
	  </tr>
	  
 <?php } ?>
  <tfoot>
   <th>S.No</th>
    <th>Agent Name</th>
    <th>Agent Phone</th>
    <th>Agent Mail</th>
    <th>Agent Address Line1</th>
    <th>Agent Address Line2</th>
    <th>Agent Address Line3</th>
    <th>Agent Address Line4</th>
    <th>Agent Pincode</th>
    <th>Agent GST</th>
    <th>Agent PAN </th>
    <th>Created on</th>
    <th>Updated on</th>
  </tfoot>
</table>