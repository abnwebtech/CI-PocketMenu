<?php

class User extends MY_Controller {

	function __construct() {

	    parent::__construct();
    
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->model('user_model');
	}
	
	function login() {		

	    $this->form_validation->set_rules('name', 'Username', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');	

	    if ($this->form_validation->run()){

			$username = $this->input->post('name');
			$password = $this->input->post('password');

			list($success, $msg) = $this->user_model->login($username, $password);

			if($success) {
				
				echo '<script>alert("' . $msg . '");</script>';
				
				redirect('admin/index');

			} else {
				echo '<script>alert("' . $msg . '")</script>';
			}
	      
   	 	}

   	 	$this->load->view('user/login');

	}

	function forgot() {

	}

	function profile() {

	}

	function signout() {
		
		$this->user_model->signout();

		redirect('welcome/index');
	}
}
