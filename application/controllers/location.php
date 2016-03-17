<?php

/**
* author Song 
*/
class Location extends MY_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();

		if(!($this->session->userdata('logged_in'))) {
			redirect('user/login');
		}

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('location_model');
		$this->load->model('relation_model');
		$this->load->model('category_model');
		$this->load->model('product_model');

		// get a current user
		$this->id = $this->session->userdata('id');
		$this->user = $this->user_model->get_user($this->id);
	}

	function add()
	{
		//validate form input
		$loc_name = $this->input->post('loc_name');
		$loc_address = $this->input->post('loc_address');
		$loc_city = $this->input->post('loc_city');
		$loc_state = $this->input->post('loc_state');
		$loc_zip_code = $this->input->post('loc_zip_code');
		$loc_phone = $this->input->post('loc_phone');
		$loc_lon = $this->input->post('loc_lon');
		$loc_lan = $this->input->post('loc_lan');

		$loc_data = array(
				"location_name"		=>	$loc_name,
				"location_address"	=>	$loc_address,
				"location_city"		=>	$loc_city,
				"location_state"	=>	$loc_state,
				"location_zip"		=>	$loc_zip_code,
				"location_phone"	=>	$loc_phone,
				"location_lon"		=>	$loc_lon,
				"location_lat"		=>	$loc_lan
			);

		$add_result = $this->location_model->add_location($loc_data);

		if($add_result == "success") {
			echo json_encode("success");
		} else {
			echo json_encode("fail");
		}
	}

	function edit() 
	{
		$loc_name = $this->input->post('loc_name');
		$loc_address = $this->input->post('loc_address');
		$loc_city = $this->input->post('loc_city');
		$loc_state = $this->input->post('loc_state');
		$loc_zip_code = $this->input->post('loc_zip_code');
		$loc_phone = $this->input->post('loc_phone');
		$loc_lon = $this->input->post('loc_lon');
		$loc_lan = $this->input->post('loc_lan');

		$loc_id = $this->input->post('loc_id');

		$loc_data = array(
				"location_name"		=>	$loc_name,
				"location_address"	=>	$loc_address,
				"location_city"		=>	$loc_city,
				"location_state"	=>	$loc_state,
				"location_zip"		=>	$loc_zip_code,
				"location_phone"	=>	$loc_phone,
				"location_lon"		=>	$loc_lon,
				"location_lat"		=>	$loc_lan
			);

		$edit_result = $this->location_model->edit_location($loc_data, $loc_id);

		if ($edit_result == "success") {
			echo json_encode("success");
		} else {
			echo json_encode("fail!");
		}
	}

	function show($loc_id) 
	{
		var_dump($loc_id);
		$categories = $this->category_model->get_categories_for_location($loc_id);

		$this->load->view('admin/header', array('user' => $this->user));
		$this->load->view('admin/sidebar', array('active' => 'dashboard', 'user' => $this->user));
		// var_dump($products);
		$this->load->view('admin/category', array('categories' => $categories));
		$this->load->view('admin/footer');	
	}

	function delete() 
	{
		$loc_id = $this->input->post('loc_id');

		$del_result = $this->location_model->delete_location($loc_id);
		
		if ($del_result == "success") {
			echo json_encode("success");
		} else {
			echo json_encode("fail!");
		}
	}

	function delete_relation()
	{
		$loc_id = $this->input->post('loc_id');

		$del_result = $this->relation_model->delete_relation($loc_id);

		if ($del_result == "success") {
			echo json_encode("success");
		} else {
			echo json_encode("fail!");
		}

	}

	function delete_production()
	{
		$loc_id = $this->input->post('loc_id');

		$del_result = $this->product_model->delete_pro($loc_id);

		if ($del_result == "success") {
			echo json_encode("success");
		} else {
			echo json_encode("fail!");
		}
	}

	function all()
	{
		$categories = $this->category_model->get_categories();

		$this->load->view('admin/header', array('user' => $this->user));
		$this->load->view('admin/sidebar', array('active' => 'category', 'user' => $this->user));
		$this->load->view('admin/category', array('categories' => $categories));
		$this->load->view('admin/footer');	
	}
}