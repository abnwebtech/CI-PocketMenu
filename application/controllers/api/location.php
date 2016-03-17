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

		$this->load->helper('form');
		$this->load->model('user_model');
		$this->load->model('location_model');
		$this->load->model('category_model');
	}

	function index()
	{
		$page_index = $_GET['page_index'];
		$locations_all = $this->location_model->get_locations();


		$locations = array();
		$real_count = count($locations_all);
		$down_index = ($page_index - 1) * 20;
		$top_index = $page_index * 20 - 1;

		if ($real_count < $down_index) {
			$locations = [];
		} else if ($real_count >= $down_index && $real_count < $top_index) {
			if($real_count == $down_index) {
				$locations = $locations_all;
			} else {
				for($i = $down_index; $i < $real_count; $i++) {
					$locations[] = $locations_all[$i];
				}	
			}
		} else if ($real_count >= $top_index){
			for($i = $down_index; $i < $top_index; $i++) {
				$locations[] = $locations_all[$i];
			}
		} 
		
		$res['state'] = '200';

		if (count($locations) == 0) {
			$res['message'] = "There is no locations to display";
		}

		$res['locations'] = $locations;

		echo(json_encode($res));

	}
}