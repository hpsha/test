<?php
//print_r($company);exit();
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=company.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1'>
  <thead>
    <th>S.No</th>
    <th>Company Name</th>
    <th>Company Phone</th>
    <th>Company Mail</th>
    <th>Company Address Line1</th>
    <th>Company Address Line2</th>
    <th>Company Address Line3</th>
    <th>Company Address Line4</th>
    <th>Company Pincode</th>
    <th>Company GST</th>
    <th>Company Bank Account Number</th>
    <th>Company Bank Name</th>
    <th>Company Bank Branch Name</th>
    <th>Company Bank IFSC</th>
    <th>Company PAN Number</th>
    <th>Created on</th>
    <th>Updated on</th>
  </thead>
  <?php
  $i=1;
  foreach($company as $Data){ 
  
  
  ?>
	  <tr>
	 <td><?php echo $i++; ?></td>
	  <td><?php echo $Data->company_name; ?></td>
	  <td><?php echo $Data->company_phone; ?></td>
	  <td><?php echo $Data->company_mail; ?></td>
	  <td><?php echo $Data->company_address; ?></td>
	  <td><?php echo $Data->company_address2; ?></td>
	  <td><?php echo $Data->company_address3; ?></td>
	  <td><?php echo $Data->company_address4; ?></td>
	  <td><?php echo $Data->company_pincode; ?></td>
	  <td><?php echo $Data->company_gst; ?></td>
	  <td><?php echo $Data->company_bank_account_no; ?></td>
	  <td><?php echo $Data->company_bank_name; ?></td>
	  <td><?php echo $Data->company_bank_branch_name; ?></td>
	  <td><?php echo $Data->company_bank_ifsc; ?></td>
	  <td><?php echo $Data->company_pan_no; ?></td>
	  <td><?php echo $Data->company_created_on; ?></td>
	  <td><?php echo $Data->company_updated_on; ?></td>
	  </tr>
	  
 <?php } ?>
  <tfoot>
    <th>S.No</th>
    <th>Company Name</th>
    <th>Company Phone</th>
    <th>Company Mail</th>
    <th>Company Address Line1</th>
    <th>Company Address Line2</th>
    <th>Company Address Line3</th>
    <th>Company Address Line4</th>
    <th>Company Pincode</th>
    <th>Company GST</th>
    <th>Company Bank Account Number</th>
    <th>Company Bank Name</th>
    <th>Company Bank Branch Name</th>
    <th>Company Bank IFSC</th>
    <th>Company PAN Number</th>
    <th>Created on</th>
    <th>Updated on</th>
  </tfoot>
</table>