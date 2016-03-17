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

		$this->load->helper('form');
		$this->load->model('user_model');
		$this->load->model('category_model');
		$this->load->model('product_model');
		$this->load->model('location_model');
		$this->load->model('relation_model');
	}

	function index()
	{
		$location_id = $_GET['lid'];
		$page_index  = $_GET['page_index'];

		// get all categories for current user
		$categories_all = $this->category_model->get_categories_for_location($location_id);

		// var_dump($categories_all);

		$categories = array();
		// echo(json_encode($categories_all));
		$real_count = count($categories_all);
		// echo($real_count);
		// echo("<br>");
		$down_index = ($page_index - 1) * 20 ;
		// echo($down_index);
		// echo("<br>");
		$top_index = $page_index * 20 - 1;
		// echo $top_index;

		if ($real_count < $down_index) {
			$categories = [];
		} else if ($real_count >= $down_index && $real_count < $top_index) {

			if($real_count == $down_index) {
				$categories = $categories_all;
			} else {
				for($i = $down_index; $i < $real_count; $i++) {
					$categories[] = $categories_all[$i];
				}	
			}
		} else if ($real_count >= $top_index){
			for($i = $down_index; $i < $top_index; $i++) {
				$categories[] = $categories_all[$i];
			}
		} 

		$c_count = count($categories);
		
		$res['state'] = '200';

		if (count($categories) == 0) {
			$res['message'] = "There is no categories to display";
		}

		$res['categories'] = $categories;

		echo(json_encode($res));
		
	}

	function add()
	{
		$cat_name = $_REQUEST['cat_name'];
		$loc_id = $_REQUEST['loc_id'];

		// $loc_id = $this->location_model->get_location_id($loc_name);

		// var_dump($loc_id);

		$cat_id = $this->category_model->add_category($cat_name);

		// echo ($cat_id);

		$add_relation = $this->relation_model->add_relation($loc_id, $cat_id);

		if ($add_relation == "success") {
			// echo json_encode("success");
			$res['state'] = "200";
			$res['message'] = "Category added successfully";
		} else {
			$res['state'] = "400";
			$res['message'] = "Fail to add category";
		}

		echo json_encode($res);
	}

	function edit() 
	{
		$cat_id = $_REQUEST['cat_id'];
		$cat_name = $_REQUEST['cat_name'];
		$cat_published = $_REQUEST['cat_published'];

		$cat_data = array(	
					"cat_id"		=> $cat_id,
					"cat_name"		=> $cat_name,
					"cat_published"	=> $cat_published
				);

		$edit_result = $this->category_model->edit_category($cat_data);

		if ($edit_result == "success") {
			// echo json_encode("success");
			$res['state'] = "200";
			$res['message'] = "Category chagned successfully";
		} else {
			$res['state'] = "400";
			$res['message'] = "Fail to edit category";
		}

		echo json_encode($res);
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
		$cat_id = $_REQUEST['cat_id'];

		$del_result = $this->category_model->delete_category($cat_id);
		
		if ($del_result == "success") {
			
			$res['state'] = "200";
			$res['message'] = "Category removed successfully";
			
		} else {
			
			$res['state'] = "400";
			$res['message'] = "Fail to remove category";
			
		}

		echo json_encode($res);
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