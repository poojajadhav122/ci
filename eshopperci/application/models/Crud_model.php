<?php
/**
 * 
 */
class Crud_model extends CI_Model
{
	
	function insertData($ans)
	{
		// echo "test";
		$re = $this->db->insert('users',$ans);
		var_dump($re);
		return $re;
	}
	function selectData(){
		//return "testing";
		$query = $this->db->get('users');
		// echo "<pre>";
		// print_r($query);
		// echo "</pre>";

		if($query->result_id->num_rows >0){
			//echo ok;
			//$ans =$query->result();// this will return our output as a object
			$ans = $query->result_array();//thiswill return our output in array
		// 	echo "<pre>";
		// print_r($ans);
		//  echo "</pre>";
			return $ans;

		}
        else{
        	return 0;
        }
	}

	function DeleteRecord($id){
		//echo $id;
         return $this->db->delete('users',array('id'=>$id));
	}

	function editRecord($id){
		//echo $id;
		$this->db->select('id,uemail');// here we doing filter means on edit the form we have to show only id and emailid
		$query =$this->db->get_where('users',array('id'=>$id));// here we use get_where because we can give multiple conditions by using get_where
		//print_r($query);
        if($query->result_id->num_rows >0){
        	$ans = $query->result();
        	//print_r($ans);
        	return $ans;
        }
        else{
        	return 0;

        }// now go to view/edit_view page


	}
	function updateRecord($email,$id){
		$data = array(
               'uemail' =>$email,
		);
		$this->db->where('id',$id);
		return $this->db->update('users',$data);
	}
}


?>