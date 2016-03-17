<?php

/**
* author Song 
*/
class User extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();

		$this->load->helper('form');
		$this->load->model('user_model');
		$this->load->model('category_model');
		$this->load->model('location_model');
		$this->load->model('product_model');
		$this->load->model('relation_model');

	}

	function login() 
	{
		$email = $_POST['email'];
		$password = $_POST['password'];


		list($success, $msg) = $this->user_model->api_login($email, $password);

		if ($success) {

			$res['state'] = "200";
			$res['message'] = $msg;

		} else {

			$res['state'] = "400";
			$res['message'] = $msg;
		}

		echo json_encode($res);
	}
}