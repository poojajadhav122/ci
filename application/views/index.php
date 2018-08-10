<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.min.js';?>"></script><!-- here we add js file because ajax-->
</head>
<body>
	<div class="container">
		<a href="<?php echo base_url().'index.php/crud/show';?>">Show Data</a>
		<form method="post" action="<?php echo base_url('index.php/crud/action_page');?>">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" name="uemail" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="upass"class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
           <?php echo validation_errors(); ?>
	</div>
  <!-- this is another way to take form by going to the user guide in the helper folder then go to form helper-->
  <div class="container">
    <?php
    echo form_open('crud/action_page1',array("id"=>"formData"));
    echo form_input('uemail','');
    echo form_input('upass','');
    echo form_button('','Submit Post!',array("class"=>"btn btn_add"));
    echo form_close();
 ?>

    
  </div>
  <div class="err"></div>
<!-- here we did ajax function-->
  <script type="text/javascript">
    $(function(){
      $(".btn_add").click(function(){
        //alert(1);
        rec = $("#formData").serialize()
        //alert(rec)
        $.ajax({
          type:"post",
          data:rec,
          url:"<?php echo base_url();?>index.php/crud/action_page1",
          success:function(res){
            alert(res)
            $(".err").html(res)

          }
        })
      })
    })
  </script>
  <!-- now go to controller folder in curd.php folder-->
</body>
</html>