<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
</head>
<body>
<div class="container">
	<?php

	  // echo "<pre>";
	  // print_r($xyz);
	  // echo "</pre>";
	?>
	<a href="<?php echo base_url();?>">Home page</a>
	 <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php
          foreach($xyz as $val):
      ?>
      <tr>
      	<td><?php echo $val['id'];?></td>
      	<td><?php echo $val['uemail'];?></td>
      	<td><?php echo $val['upass'];?></td>
        <td><a href="<?php echo base_url('index.php/crud/deleteData/'.$val['id']); ?>">Delete</a></td> <!-- here we make delete button and also given $val['id'] to show at bottom and now go to models/crud_model.php then go to controller/crud.php page-->
        <td><a href="<?php echo base_url('index.php/crud/editData/'.$val['id']); ?>">EDIT</a></td> <!-- here we make delete button and also given $val['id'] to show at bottom and now go to  controller/crud.php page then models/crud_model.php then go to-->
      </tr>
      <?php
       endforeach;
      ?>
    </tbody>
  </table>
	
</div>
</body>
</html>