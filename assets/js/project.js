$(document).ready(function(){
	$(".btn_register").click(function(){
		// alert(1)
		// console.log( $("#register_form") );
		record = $("#register_form").serialize();
		// console.log(record);

		$.post("register-action.php" , record, function(response){
			// console.log(response);
			$(".msg").html(response);
		})
	})

	$(".btn_login").click(function(){
		$.post("login-action.php" , $("#login_form").serialize(), function(response){
			// console.log(response);
			if(response=="ok"){
				window.location.href="index.php";
			}
			else{
				$(".msg1").html(response);
			}
		})
	})

	/*************************************/
	$("#forgot2_form,#forgot3_form").hide();
	$(".btn_forgot1").click(function(){
		$.post("forgot-action1.php" , $("#forgot1_form").serialize() ,function(response){
			if(response == "ok"){
				$(".msg").empty();
				$("#forgot1_form")[0].reset();
				$("#forgot2_form,#forgot1_form").slideToggle();
			}
			else{
				$(".msg").html(response);
			}
		})
	});

	$(".btn_forgot2").click(function(){
		$.post("forgot-action2.php" , $("#forgot2_form").serialize() ,function(response){
			if(response == "ok"){
				$(".msg").empty();
				$("#forgot2_form")[0].reset();
				$("#forgot2_form,#forgot3_form").slideToggle();
			}
			else{
				$(".msg").html(response);
			}
		})
	});

	$(".btn_forgot3").click(function(){
		$.post("forgot-action3.php" , $("#forgot3_form").serialize() ,function(response){
			if(response == "ok"){
				$("#forgot3_form")[0].reset();
				$(".msg").html("password updated");
			}
			else{
				$(".msg").html(response);
			}
		})
	});
	/*************************************/
	$(".btn_pass").click(function(){
		$.post("password-action.php",$("#password_form").serialize(),function(res){
			// console.log(res);
			if(res=="ok"){
				$(".msg").html("password updated");
				$("#password_form")[0].reset();
			}
			else{
				$(".msg").html(res);
			}
		})
	})
	/*************************************/
});