<?php
  /**
   * 
   */
  class Crud extends CI_Controller
  {
  	public function index(){
    //     echo "<pre>";
    //     print_r($this);
    //     echo "</pre>";
  		$this->load->view('index');
  	}

  	public function show(){
  		//echo "test";
  		$this->load->model('crud_model');
  		$result= $this->crud_model->selectData();
  		// echo "<pre>";
  		// print_r($result);
  		// echo "</pre>";
  		$this->load->view('show_view',array("xyz"=>$result)); //here we did that we call the page also the page name is show_view then we want in array data so we given key from this "xyz" key we pass the data


  	}
  	public function action_page(){
  		// print_r($_POST);
  		// $this->load->library('form_validation');
  		 $this->form_validation->set_rules('uemail','EMAILID','trim|required|valid_email|is_unique[users.uemail]');
  		$this->form_validation->set_rules('upass','PASSWORD','trim|required|min_length[4]|max_length[12]|alpha_numeric');

  		if($this->form_validation->run() == false){
  			//echo error;
  			$this->load->view('index');
  		}
  		else{
  			//echo "ok";
  			$_POST['upass'] = do_hash($_POST['upass']);
  			//print_r($_POST);
  			 $this->load->model('crud_model');//here this is crud_model is page then it at down line-->
  			if($this->crud_model->insertData($_POST)){ //here this crud_model become object then insertdata is the function which we call at application/model/Crud_model.php this page and this $_POST we taken as object and in the page of Crud_model we call as($ans)
  				echo "Record Added";
          redirect(base_url('index.php/crud/show'));
  			}


  		}
  		
  	}

    public function action_page1(){
      // print_r($_POST);
      // exit;
      // // $this->load->library('form_validation');
       $this->form_validation->set_rules('uemail','EMAILID','trim|required|valid_email|is_unique[users.uemail]');
      $this->form_validation->set_rules('upass','PASSWORD','trim|required|min_length[4]|max_length[12]|alpha_numeric');

      if($this->form_validation->run() == false){
        //echo error;
        // print_r(11);
        // exit;
        // $this->load->view('index');
        echo validation_errors();
      }
      else{
        //echo "ok";
        $_POST['upass'] = do_hash($_POST['upass']);
        //print_r($_POST);
         $this->load->model('crud_model');//here this is crud_model is page then it at down line-->
        if($this->crud_model->insertData($_POST)){ //here this crud_model become object then insertdata is the function which we call at application/model/Crud_model.php this page and this $_POST we taken as object and in the page of Crud_model we call as($ans)
         // echo "Record Added";
          echo "User Added";
          //redirect(base_url('index.php/crud/show'));
        }


      }
      
    }


    function deleteData($id){
      //echo 111;
      //echo $id;// at bottom showing id when we click on delete button
      $this->load->model('crud_model');
      if($this->crud_model->DeleteRecord($id))
      {
         redirect(base_url('index.php/crud/show'));

      }
    }
    function editData($id){
      //echo 111;
      //echo $id;
      //exit;
      $this->session->set_userdata("userid",$id);// here we use session because we given hidden to the password id in the page of edit_view so to avoid the hoidden part because programmer will edit the id by going to insepct eleemnt page cange id so that why we using session and set_userdata we set the session
      $this->load->model('crud_model');
      $response =$this->crud_model->editRecord($id);
      if(is_array($response)){
        //print_r($response);
        $this->load->view('edit_view',array("xyz"=>$response[0]));
      }// here we given key(xyz ) then we given respose obje now go to models /crud_model page
    }
    function action_update(){
      //print_r($_POST);
      $this->load->model('crud_model');
      $uid = $this->session->userdata("userid");// here we get the receive data
      $this->crud_model->updateRecord($_POST['uemail'],$_POST['uid']);
      redirect(base_url('index.php/crud/show'));
    } // now go to the model/crud_model page



}
?>