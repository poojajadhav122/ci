<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
<body>
	<div class="container">
		<a href="<?php echo base_url().'index.php/crud/show';?>">Show Data</a>
    <!-- <?php print_r($xyz);?> -->
		<form method="post" action="<?php echo base_url('index.php/crud/action_update');?>">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" name="uemail" class="form-control" id="email" value="<?php echo $xyz->uemail;?>" >
  </div>
     <input type="hidden"  value="<?php echo $xyz->id;?>" name="uid"class="form-control" id="pwd">
  
  <button type="submit" class="btn btn-default">Update</button>
</form> 
          <!--now go tocontroller/crud.php page -->
	</div>
</body>
</html>