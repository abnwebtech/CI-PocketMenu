<?php

/**
* author Song 
*/
class Product extends MY_Controller
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
		$this->load->model('location_model');
		$this->load->model('product_model');

		// get a current user
		$this->id = $this->session->userdata('id');
		$this->user = $this->user_model->get_user($this->id);
	}

	function all()
	{

		// get all categories for current user
		$products = $this->product_model->get_all();

		$this->load->view('admin/header', array('user' => $this->user));
		$this->load->view('admin/sidebar', array('active' => 'product', 'user' => $this->user));
		// var_dump($products);
		$this->load->view('admin/product', array('products' => $products));
		$this->load->view('admin/footer');		
	}

	function add()
	{
		$cat_name = $this->input->post('cat_name');

		$new_result = $this->category_model->add_category($cat_name);

		if ($new_result == "success") {
			echo json_encode("success");
		} else {
			echo json_encode("fail!");
		}
	}

	function edit() 
	{
		$prod_id = $this->input->post('prod_id');
		$prod_name = $this->input->post('prod_name');
		$prod_price = $this->input->post('prod_price');
		$prod_description = $this->input->post('prod_description');
		$prod_data = array(	
					"prod_id"			=> $prod_id,
					"prod_name"			=> $prod_name,
					"prod_price"		=> $prod_price,
					"prod_description"	=> $prod_description
				);

		$edit_result = $this->product_model->edit_product($prod_data);

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
		$prod_id = $this->input->post('prod_id');

		$del_result = $this->product_model->delete_product($prod_id);
		
		if ($del_result == "success") {
			echo json_encode("success");
		} else {
			echo json_encode("fail!");
		}
	}

	function xls_upload()
	{
		if(isset($_POST["add"]))
		{
			$filename = $_FILES["file"]["tmp_name"];

			if($_FILES["file"]["size"] > 0)
			{
				$objReader = PHPExcel_IOFactory::load($filename);
				$objWorksheet = $objReader->getActiveSheet();

				foreach ($objWorksheet->getRowIterator() as $row_key => $row) {
					if($row->getRowIndex() === 1) continue; // skip header row

					$data = array();
					foreach ($row->getCellIterator() as $cell_key => $cell) {
						if($cell_key == 'Z') break; // dont load past Z...
						$data[] = $cell->getValue();
					}

					// here can look up category name and location name from ID and insert
					$query = $this->db->get_where('locations', array('location_name' => $data[4]));
					$location = current($query->result());

					$query = $this->db->get_where('categories', array('category_name' => $data[3]));
					$category = current($query->result());

					if(!$location || !$category)
						continue;

					$this->product_model->add_product($data[0], $data[1], $data[2], $category->category_id, $location->location_id);
				}

				//echo json_encode("success");
				header('Location: /pocketmenu/product/all');
			}
			else
			{
				echo json_encode("fail!");
			}
		}


		// if(isset($_POST["submit"]))
		// {
		// 	$file = $_FILES['file']['tmp_name'];
		// 	$handle = fopen($file, "r");
		// 	$c = 0;
		// 	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		// 	{
		// 		$name = $filesop[0];
		// 		$email = $filesop[1];
				
		// 		$sql = mysql_query("INSERT INTO csv (name, email) VALUES ('$name','$email')");
		// 	}
			
		// 	if($sql){
		// 		echo "You database has imported successfully";
		// 	}else{
		// 		echo "Sorry! There is some problem.";
		// 	}
		// }
	}
}