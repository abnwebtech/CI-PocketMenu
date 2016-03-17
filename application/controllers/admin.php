<?php

/**
* author Song 
*/
class Admin extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();

		if(!($this->session->userdata('logged_in'))) {
			redirect('user/login');
		}

		$this->load->helper('form');
		$this->load->model('user_model');
		$this->load->model('location_model');
		$this->load->model('category_model');
	}

	function index()
	{
		// get a current user
		$id = $this->session->userdata('id');
		$user = $this->user_model->get_user($id);

		// get all categories for current user
		$locations = $this->location_model->get_locations();

		$this->load->view('admin/header', array('user' => $user));
		$this->load->view('admin/sidebar', array('active' => 'dashboard', 'user' => $user));
		$this->load->view('admin/dashboard', array('locations' => $locations));
		$this->load->view('admin/footer');	
	}
}