<?php
//print_r($company);exit();
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=employee.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1'>
  <thead>
    <th>S.No</th>
    <th>ROLE</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Mail</th>
    
    <th>Pincode</th>
    <th>Created on</th>
    <th>Updated on</th>
  </thead>
  <?php
  $i=1;
  foreach($employee as $Data){ 
  
  
  ?>
	  <tr>
	  <td><?php echo $i++; ?></td>
	  <td>Employee</td>
	  <td><?php echo $Data->employee_name; ?></td>
	  <td><?php echo $Data->employee_phone; ?></td>
	  <td><?php echo $Data->employee_email; ?></td>
	
	  <td><?php echo $Data->employee_pincode; ?></td>
	  <td><?php echo $Data->employee_created_on; ?></td>
	  <td><?php echo $Data->employee_updated_on; ?></td>
	  </tr>
	  
 <?php } ?>
  <tfoot>
     <th>S.No</th>
    <th>ROLE</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Mail</th>
    <th>Address Line1</th>
    <th>Address Line2</th>
    <th>Address Line3</th>
    <th>Address Line4</th>
    <th>Pincode</th>
    <th>Created on</th>
    <th>Updated on</th>
  </tfoot>
</table>