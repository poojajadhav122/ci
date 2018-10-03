<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class project extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model');
		header('Access-Control-Allow-Origin: *');
	}
	public function index()
	{
		$this->load->view('index');

	}

	public function get_brands()
	{
		$this->load->model('project_model');
		$ans = $this->project_model->getRecords("brands");
		//print_r($ans);
		if(is_array($ans)){
			$str="";
			foreach($ans as $val){
				//print_r($val);
				$str = $str ."<li><a href='#' class='br_data' for='".$val->br_id."'>".$val->br_name."</a></li>";
			}
			echo $str;
		}
	}

	public function get_categories()
	{
		$this->load->model('project_model');
		$ans = $this->project_model->getrecords("categories");
		//print_r($ans);
		if(is_array($ans)){
			echo json_encode($ans);
		}
	}

	public function get_products()
	{
		$this->load->model('project_model');
		$ans =$this->project_model->getAllProducts();
		// print_r($ans);
		// echo 111;
		if(is_array($ans)){
			$str ="";
			foreach($ans as $val){
				//print_r($val);
				$str = $str ."<div class='col-sm-4'><div class='product-image-wrapper'><div class='single-products'><div class='productinfo text-center'><img src='".base_url().$val->p_imgpath."' alt='' />
<h2>".$val->p_amount."</h2><p>".$val->p_name."</p><a href='#' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a></div><div class='product-overlay'><div class='overlay-content'><h2>$56</h2><p>Easy Polo Black Edition</p><a href='#' class='btn btn-default add-to-cart' for='".$val->p_id."'><i class='fa fa-shopping-cart'></i>Add to cart</a></div></div></div><div class='choose'><ul class='nav nav-pills nav-justified'><li><a href='#'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>
<li><a href='#'><i class='fa fa-plus-square'></i>Add to compare</a></li></ul></div></div></div>";
			}

			echo $str;

		}

	}
public  function get_products_brandwise()
{
	// $data =$_POST['brid'];
	$data =$this->input->post('brid');
	echo $data;
	// exit;
	$this->load->model('project_model');
	$ans = $this->project_model->getAllProducts("and p_brid='$data'");

		if(is_array($ans)){
			$str ="";
			foreach($ans as $val){
				//print_r($val);
				$str = $str ."<div class='col-sm-4'><div class='product-image-wrapper'><div class='single-products'><div class='productinfo text-center'><img src='".base_url().$val->p_imgpath."' alt='' />
<h2>".$val->p_amount."</h2><p>".$val->p_name."</p><a href='#' class='btn btn-default add-to-cart' for='".$val->p_id."'><i class='fa fa-shopping-cart'></i>Add to cart</a></div><div class='product-overlay'><div class='overlay-content'><h2>$56</h2><p>Easy Polo Black Edition</p><a href='#' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a></div></div></div><div class='choose'><ul class='nav nav-pills nav-justified'><li><a href='#'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>
<li><a href='#'><i class='fa fa-plus-square'></i>Add to compare</a></li></ul></div></div></div>";
			}

			echo $str;

		}

}
function cart()
{
	//echo "test";
	//print_r($_POST);
	$data =$this->input->post('proid');
	//echo($data);
	$result = get_cookie("cartproduct");
	//print_r($result);
	//exit;
	if($result == ""){
		set_cookie("cartproduct",$data,time()+3600,"","/");
		$msg= "Product Added";
		$cnt=1;
	}
	else{
		$arr = explode(",", $result);
		// print_r($arr);
		
		$pos = in_array($data,$arr);
		// print_r($pos);
		// var_dump($pos);
		// exit;
		if($pos){
			$msg="product exist in cart";
			$cnt = count(explode(",",$result));
		}
		else{
			$newdata =$result.",".$data;
			set_cookie("cartproduct",$newdata,time()+3600,"","/");
			$msg="product updated";
			$cnt = count(explode(",",$newdata));
		}
	}
//1,2,3
	//[1,2,3]
echo $cnt."#".$msg;
}

public function get_cart_products()
	{

	// echo 11;
		// echo get_cookie("cartproduct");
		// exit;
		if( get_cookie("cartproduct") && get_cookie("cartproduct")!=""){
			$data = get_cookie("cartproduct");
			// echo $data;
			// exit;
			//1,2,3
		
		$this->load->model('project_model');
		$ans =$this->project_model->getAllProductscart($data);
		// print_r($ans);
		// echo 111;
		if(is_array($ans)){
			$str ="";
			foreach($ans as $val){
				//print_r($val);
				$str = $str ."<div class='col-sm-4'><div class='product-image-wrapper'><div class='single-products'><div class='productinfo text-center'><img src='".base_url().$val->p_imgpath."' alt='' />
<h2>".$val->p_amount."</h2><p>".$val->p_name."</p><a href='#' class='btn btn-default delete-to-cart'><i class='fa fa-shopping-cart'></i>delete</a></div><div class='product-overlay'><div class='overlay-content'><h2>$56</h2><p>Easy Polo Black Edition</p><a href='#' class='btn btn-default delete-to-cart' for='".$val->p_id."'><i class='fa fa-shopping-cart'></i>delete</a></div></div></div><div class='choose'><ul class='nav nav-pills nav-justified'><li><a href='#'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>
<li><a href='#'><i class='fa fa-plus-square'></i>Add to compare</a></li></ul></div></div></div>";
			}

			echo $str;

		}

	}
	else{
		echo "No Products IN Cart";
	}


}

function deletecart()
{
	//print_r($_POST);
	$id = $_POST['proid'];
	//echo $id;
	$cookiedata = get_cookie("cartproduct");
	//echo $cookiedata;
   $result = explode(",",$cookiedata);
  // print_r($result);
   $pos = array_search($id,$result);
  // echo $pos;
   unset($result[$pos]);
   $newpro = implode(",",$result);
   //echo $newpro;
   set_cookie("cartproduct",$newpro,time()+3600,"","/");
   $msg="product updated";
   $cnt =count($result);
   echo $cnt."#".$msg;
} 

public function registerAction(){
	//print_r($_POST);
	$this->form_validation->set_rules('log_name','User name','trim|required|min_length[3]|alpha_numeric_spaces');

	$this->form_validation->set_rules('log_mobile','User Mobile','trim|required|regex_match[/^[1-9][0-9]{9}$/]|exact_length[10]');

	$this->form_validation->set_rules('log_email','User Email','trim|required|valid_email|is_unique[login.log_email]');

	$this->form_validation->set_rules('log_password','User Password','trim|required|alpha_numeric|min_length[4]|max_length[12]');

	$this->form_validation->set_rules('log_cpassword','Password Comfirmation','required|matches[log_password]');

	if($this->form_validation->run()== false){
		echo validation_errors();
	}
	else{
		//echo "ok";
		//$this->load->model('project_model');
		$_POST['log_password']=do_hash($_POST['log_password']);
		unset($_POST['log_cpassword']);
		print_r($_POST);
		$ans = $this->project_model->insertData("login",$_POST); 
		if($ans){

			$this->email->set_mailtype("html");
			$this->email->from('vishal@php-training.in','Vishal');
			$this->email->to($_POST['log_email']);

			$this->email->subject('Email Test');
			$base = base_url();
			$msg = "<a href='".$base."index.php/project/verifyAccount/1/$ans'>verify</a>";
			$this->email->message($msg);

			$re = $this->email->send();
			var_dump($re);

			echo "User Added";
		}
	}
}

public function verifyAccount($status,$id){
	$this->project_model->update_status($status.$id);

	redirect("http://localhost/eshopperci/login.html");
}
public function loginAction(){
	// print_r($_POST);

	$this->form_validation->set_rules('log_email','User Email','trim|required|valid_email');

	$this->form_validation->set_rules('log_password','User Password','trim|required|alpha_numeric|min_length[4]|max_length[12]');
	

	if($this->form_validation->run() == false){
		echo validation_errors();
	}
	else{
		
		//echo  "ok";
		$_POST['log_password']=do_hash($_POST['log_password']);
		if($this->project_model->auth($_POST))
		{
			//echo "valid";
			$ans_users=$this->project_model->getuserdata($_POST['log_email']);
			if($ans_users[0]['log_status']==0){
				echo "verfiy your account";

			}
			else{
				$this->session->set_userdata("log_id",$ans_users[0]['log_id']);
			$this->session->set_userdata("log_name",$ans_users[0]['log_name']);
			$this->session->set_userdata("log_mobile",$ans_users[0]['log_mobile']);
			$this->session->set_userdata("log_email",$ans_users[0]['log_email']);
			$this->session->set_userdata("log_status",$ans_users[0]['log_status']);
			echo "ok#".$ans_users[0]['log_status']."#".$ans_users[0][
				'log_name'];

			
			// print_r($ans_users);
			//$_SESSION[xyz]=111
			
		}
	}
		else{
			echo "Invalid login";
		}
	}

} 

function logout(){

	$this->session->unset_userdata("log_id");
			$this->session->unset_userdata("log_name");
			$this->session->unset_userdata("log_mobile");
			$this->session->unset_userdata("log_email");
			$this->session->unset_userdata("log_status");
			$this->session->sess_destroy();
			redirect("http://localhost/eshopperci/index.html");

}


function check_users(){
	if(!$this->session->userdata("log_id") && $this->session->userdata("log_id")==""){
		echo 0;

	}
	else{
		echo 1; 
	}
}



function updateAction(){
	//print_r($_POST);

	$this->form_validation->set_rules('current_pass','current password','trim|required|alpha_numeric|min_length[4]|max_length[12]');

	$this->form_validation->set_rules('new_pass','new Password','trim|required|alpha_numeric|min_length[4]|max_length[12]');
   
   $this->form_validation->set_rules('cnew_pass','comfirm Password Comfirmation','required|matches[new_pass]');

	
	if($this->form_validation->run() == false){
		echo validation_errors();
	}
	else if($_POST['current_pass']==$_POST['new_pass']){
		echo "new pass is same as current pass";
	}
	else{
		print_r($_POST);
		$current = do_hash($_POST['current_pass']);
		$new = do_hash($_POST['new_pass']);
		if($this->project_model->check_cpass($current,$this->session->userdata("log_id"))){

			if($this->project_model->update_cpass($new,$this->session->userdata("log_id"))){
				echo "password Updated";
			}
		}
		else{
			echo "current password mismatch";
		}
	}

}
public function forgot1_action(){
	//print_r($_POST);
	//exit;
	$email = $this->input->post('log_email');
	$this->form_validation->set_rules('log_email','Email ID',
		'trim|required|valid_email');
	if($this->form_validation->run() == false){
		echo validation_errors();
	}
	else{
		$mob = $this->project_model->check_email($email);
		//print_r($mob);
		if(empty($mob)){
			echo "emailid doesnt exits";
		}
		else{
			$data = $mob[0]['log_mobile'];
			//echo $data;
			$rand = random_string('alnum',6);
			//echo $rand;

			//send sms

			if($this->project_model->update_otp($email,$rand))
			{
				$this->session->set_userdata("emailid_for_otp",$email);
				echo "ok";
			}
		}
	}
}

public function forgot2_action(){
	//print_r($_POST);
	$otp = $this->input->post('log_otp');
	if(empty($otp)){
		echo "please enter otp";
	}
	else{
		$email = $this->session->userdata("emailid_for_otp");
		$ans = $this->project_model->check_otp($email,$otp);
		//print_r($ans);
		if($otp == $ans[0]['log_otp']){
			echo "ok";
		}
		else{
			echo "invalid otp";
		}
	}
}

function forgot3_action(){


   $this->form_validation->set_rules('log_password','User Password','trim|required|alpha_numeric|min_length[4]|max_length[12]');
	
 $this->form_validation->set_rules('log_cpassword',' Password Comfirmation','required|matches[log_password]');

    if($this->form_validation->run() == false){
    	echo validation_errors();
    }
    else{
    	$pass = do_hash($this->input->post('log_cpassword'));
    	$email = $this->session->userdata("emailid_for_otp");
    	if($this->project_model->update_password_for_forgot($email,$pass)){
    		$this->session->unset_userdata("emailid_for_otp");
    		echo "ok";
    	}
    }

}

public function category_action(){
	$data = $this->input->post('ca_name');
	//print_r($data);
	if(empty($data)){
		echo "please enter category";
	}
	else{
		if($this->project_model->insertData("categories",$_POST))
		{
			echo "category Added";
		}
	}
}


public function product_action(){
	// pre($_POST);
	// pre($_FILES);
	 $this->form_validation->set_rules('p_name','product name','trim|required|regex_match[/^[a-zA-Z0-9][a-zA-Z0-9_\.]+[a-zA-Z0-9]$/]');
     $this->form_validation->set_rules('p_amount','product amount','trim|required|numeric');
	 $this->form_validation->set_rules('p_discount','product discount','trim|required|integer');
	 $this->form_validation->set_rules('p_caid','category name','trim|required');
	 $this->form_validation->set_rules('p_brid','brand name','trim|required');
	  $this->form_validation->set_rules('p_desc','product description','trim|required|regex_match[/^[a-zA-Z0-9][a-zA-Z0-9_\.]+[a-zA-Z0-9]$/]');
	  if($this->form_validation->run() == false){
	  	echo validation_errors();
	  }
	  else{
	        	$config['upload_path']          = './assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['remove_space']         = TRUE;
                $config['file_ext_tolower']     = TRUE;

                $this->upload->initialize($config);
                $unique = rand(1000,999).time();
                $_FILES['p_file']['name'] = $unique.$_FILES['p_file']['name'];

                 if ( ! $this->upload->do_upload('p_file'))
                {
                        $err = $this->upload->display_errors();

                        pre($err);
                }
                else
                {
                	echo "ok";
                }

	  }
}

public function get_brands_option()
	{
		//$this->load->model('project_model');
		$ans = $this->project_model->getRecords("brands");
		//print_r($ans);
		if(is_array($ans)){
			$str="";
			$str = $str ."<option value=''>please select brand</option>";
			foreach($ans as $val){
				//print_r($val);
				$str = $str . "<option value= '" .$val->br_id."'>".$val->br_name."</option>";
			}
			echo $str;
		}
	}

	public function get_categories_option()
	{
		//$this->load->model('project_model');
		$ans = $this->project_model->getrecords("categories");
		//print_r($ans);
		if(is_array($ans)){
		$str="";
			$str = $str ."<option value=''>please select categories</option>";
			foreach($ans as $val){
				//print_r($val);
				$str = $str . "<option value= '" .$val->ca_id."'>".$val->ca_name."</option>";
			}
			echo $str;
		}
	}	

}?>