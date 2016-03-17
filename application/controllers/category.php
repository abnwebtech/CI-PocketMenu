<?php

/**
* author Song 
*/
class Category extends MY_Controller
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
		$this->load->model('category_model');
		$this->load->model('product_model');
		$this->load->model('relation_model');

		// get a current user
		$this->id = $this->session->userdata('id');
		$this->user = $this->user_model->get_user($this->id);
	}

	function index()
	{
		// get all categories for current user
		$categories = $this->category_model->get_categories();

		$this->load->view('admin/header', array('user' => $this->user));
		$this->load->view('admin/sidebar', array('active' => 'dashboard', 'user' => $this->user));
		$this->load->view('admin/category', array('categories' => $categories));
		$this->load->view('admin/footer');	
	}

	function add()
	{
		$cat_name = $this->input->post('cat_name');

		$loc_id = $this->session->userdata('location_id');

		// var_dump($loc_id);

		$cat_id = $this->category_model->add_category($cat_name);

		// echo(json_encode($cat_id));

		// echo ($new_result);

		$add_relation = $this->relation_model->add_relation($loc_id, $cat_id);

		if ($add_relation == "success") {
			echo json_encode("success");
		} else {
			echo json_encode("fail!");
		}
	}

	function edit() 
	{
		$cat_id = $this->input->post('cat_id');
		$cat_name = $this->input->post('cat_name');
		$cat_published = $this->input->post('cat_published');

		$cat_data = array(	
					"cat_id"		=> $cat_id,
					"cat_name"		=> $cat_name,
					"cat_published"	=> $cat_published
				);

		$edit_result = $this->category_model->edit_category($cat_data);

		if ($edit_result == "success") {
			echo json_encode("success");
		} else {
			echo json_encode("fail!");
		}
	}

	function show($cat_id) 
	{
		
		$products = $this->product_model->get_products($cat_id);

		$this->load->view('admin/header', array('user' => $this->user));
		$this->load->view('admin/sidebar', array('active' => 'dashboard', 'user' => $this->user));
		// var_dump($products);
		$this->load->view('admin/product', array('products' => $products));
		$this->load->view('admin/footer');	
	}

	function delete() 
	{
		$cat_id = $this->input->post('cat_id');

		$del_result = $this->category_model->delete_category($cat_id);
		
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