<?php
 
 class project_model extends CI_Model{
 	function getRecords($tablename){
 		$query = $this->db->get($tablename);
 		//print_r($query);
 		if($query->result_id->num_rows >0){
 			return $query->result();

 		}
 		else{
 			return 0;
 		}
 	}

 	function getAllProducts($extra=""){
 		$str ="select p_id,p_name,p_amount,p_discount,p_caid,p_brid,p_desc,p_imgpath,ca_name,br_name 
 		         from categories,brands,products where ca_id=p_caid and br_id=p_brid $extra order by p_id desc";
 		         $result = $this->db->query($str);
 		         //print_r($result);
 		         if($result->result_id->num_rows > 0){
 		         	return $result->result();
 		         }
 		         else{
 		         	return 0;
 		         }
 	}
 

 function getAllProductsCart($rec){
 		$str ="select p_id,p_name,p_amount,p_discount,p_caid,p_brid,p_desc,p_imgpath,ca_name,br_name 
 		         from categories,brands,products where ca_id=p_caid and br_id=p_brid and p_id in($rec) order by p_id desc";
 		         $result = $this->db->query($str);
 		         //print_r($result);
 		         if($result->result_id->num_rows > 0){
 		         	return $result->result();
 		         }
 		         else{
 		         	return 0;
 		         }
 	}
function insertData($table,$data){
	 $this->db->insert($table,$data);
	 return $this->db->insert_id();

}

function auth($data){
	//print_r($data);

	$result = $this->db->select("log_password")->get_where("login",array("log_email"=>$data['log_email']))->result_array();
	//print_r($result);

	if(count($result)>0){
		if($data['log_password']==$result[0]['log_password']){
			return true;

		}
		else{
			//invalid password\
			return false;
			}
	}
    else{
			return false;
		}
	}

	function getuserdata($email){
		return $this->db->get_where("login",array("log_email"=>$email))->
		result_array();
	}

	function update_status($status,$id){
		$this->db->where("log_id",$id);
		$data = array("log_status"=>$status);
		$this->db->update("login",$data);
	}

	function check_cpass($pass,$id){

		$ans = $this->db->select("log_password")->get_where("login"
			,array("log_id"=>$id))->result_array();
		return ($ans[0]['log_password'] == $pass)?true:false;
}

	function update_cpass($pass,$id){
                
                $data = array(
                	"log_password"=>$pass
                );
                $this->db->where("log_id",$id);
                return $this->db->update("login",$data);
	}
    
    function check_email($email){
    	return $this->db->select("log_mobile")->get_where("login",
             array("log_email"=>$email))->result_array();
    }

    function update_otp($email,$otp){
    	$data = array(
    		"log_otp"=>$otp);
    	$this->db->where("log_email",$email);
    	return $this->db->update("login",$data);
    }

    function check_otp($email,$otp){
    	return $this->db->select("log_otp")->get_where("login",array("log_email"=>
    		$email))->result_array();
    }

    function update_password_for_forgot($email,$pass){

    	$data = array(
          "log_password"=>$pass,
          "log_otp"=>""
    	);
    	$this->db->where("log_email",$email);
    	return $this->db->update("login",$data);
    }
}

?>