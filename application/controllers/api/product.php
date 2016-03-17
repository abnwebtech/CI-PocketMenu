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

		$this->load->helper('form');
		$this->load->model('user_model');
		$this->load->model('category_model');
		$this->load->model('location_model');
		$this->load->model('product_model');
		$this->load->model('relation_model');

	}

	function all()
	{
		$cat_id = $_GET['cat_id'];
		$page_index = $_GET['page_index'];
		
		// get all categories for current user
		$products = $this->product_model->get_all();
	}

	function add()
	{
		$loc_id = $_POST['loc_id'];
		$cat_id = $_POST['cat_id'];
		$product_name = $_POST['prod_name'];
		$product_price = $_POST['prod_price'];
		$product_description = $_POST['prod_description'];
		$temp_img = $_FILES['prod_image'];

		$product_image = $temp_img['name'];

		if ($temp_img['name']) { 
        
            if(!$temp_img['error']) { // if no errors

                $type = explode('/', $temp_img['type'])[1];

                if ($type != "jpeg" && $type != "png" && $type != "jpg" && $type != "gif") {

                	$res['state'] = "400";
                	$res['message'] = 'format error, Please upload correct format';

                	echo(json_encode($res));

                	return;

                } else {

                    $file_new_name = basename($temp_img['tmp_name']) . "." . $type;    

                    if ($temp_img['size'] > 4048000) { // file size cannot be larger than 1M
                        
                        $valid_file = false;
                        
                        $res['state'] = "400";
                        $res['message'] = "File size is too large to upload";

                        echo(json_encode($res));

                        return;

                    } else {                    

                        //move the valid file to actual location on server
                        move_uploaded_file($temp_img['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/pocketmenu/images/upload/' . $product_image);
                    }
                }                
            }
        } else {
        	$res['state'] = "200";
        	$res['message'] = "Saved failed";
            // $message = 'Uploading fails';
            echo(json_encode($res));
            return;
        }

        $save_data = array(
        		'location_id' => $loc_id,
        		'category_id' => $cat_id,
        		'product_name' => $product_name,
        		'product_description' => $product_description,
        		'product_price'	=> $product_price,
        		'product_image'	=> $product_image
        	);
        $product_save = $this->product_model->save_product($save_data);

        if ($product_save == "success") {
        	
        	$res['state'] = "200";
        	$res['message'] = "Product saved successfully";

        } else {

        	$res['state'] = "400";
        	$res['message'] = "Product saved failed";
        }

        echo(json_encode($res));
	}

	function edit() 
	{
		$product_name = $_POST['prod_name'];
		$product_price = $_POST['prod_price'];
		$product_description = $_POST['prod_description'];
		$product_id = $_POST['prod_id'];
		$temp_img = $_FILES['prod_image'];

		$product_image = $temp_img['name'];

		if ($temp_img['name']) { 
        
            if(!$temp_img['error']) { // if no errors

                $type = explode('/', $temp_img['type'])[1];

                if ($type != "jpeg" && $type != "png" && $type != "jpg" && $type != "gif") {

                	$res['state'] = "400";
                	$res['message'] = 'format error, Please upload correct format';

                	echo(json_encode($res));

                	return;

                } else {

                    $file_new_name = basename($temp_img['tmp_name']) . "." . $type;    

                    if ($temp_img['size'] > 4048000) { // file size cannot be larger than 1M
                        
                        $valid_file = false;
                        
                        $res['state'] = "400";
                        $res['message'] = "File size is too large to upload";

                        echo(json_encode($res));

                        return;

                    } else {                    

                        //move the valid file to actual location on server
                        move_uploaded_file($temp_img['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/pocketmenu/images/upload/' . $product_image);
                    }
                }                
            }
        } else {
        	$res['state'] = "200";
        	$res['message'] = "Saved failed";
            // $message = 'Uploading fails';
            echo(json_encode($res));
            return;
        }
        
              	# code...
    	$edit_data = array(
    		'product_name' => $product_name,
    		'product_description' => $product_description,
    		'product_price'	=> $product_price,
    		'product_image'	=> $product_image
    	);
    

        $product_edit = $this->product_model->edit_product_api($product_id, $edit_data);

        if ($product_edit == "success") {
        	
        	$res['state'] = "200";
        	$res['message'] = "Product edited successfully";

        } else {

        	$res['state'] = "400";
        	$res['message'] = "Product edited failed";
        }

        echo(json_encode($res));
	}

	function index() 
	{
		$cat_id = $_GET['cat_id'];
		$page_index = $_GET['page_index'];

		$products_all = $this->product_model->get_products($cat_id);

		$products = array();

		$real_count = count($products_all);

		$down_index = ($page_index-1) * 20;
		$top_index = $page_index * 20 - 1;

		if ($real_count < $down_index) {
			# code...
			$products = [];
		} else if ($real_count >= $down_index && $real_count < $top_index) {
			
			if ($real_count == $down_index) {
				# code...
				$products = $products_all;
			} else {

				for ($i = $down_index; $i < $real_count; $i++) {
					$products[] = $products_all[$i];
				}
			}
		} else {

			for ($i = $down_index; $i < $top_index; $i++) {
				$products[] = $products_all[$i];
			}
		}

		$res['state'] = "200";

		if (count($products) == 0) 
		{
			$res['message'] = "There is no product to display";
		}

		$res['products'] = $products;

		echo json_encode($res);
	}

	function delete() 
	{
		$prod_id = $_POST['prod_id'];

		$del_result = $this->product_model->delete_product($prod_id);
		
		if ($del_result == "success") {
			
			$res['state'] = "200";
			$res['message'] = "Product deleted successfully";

		} else {
			
			$res['state'] = "400";
			$res['message'] = "Database error";

		}
		echo json_encode($res);
	}
}