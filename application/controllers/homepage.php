<?php 
/**
* This class is for landing page
*/
class Homepage extends My_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	function index()
	{
		$this->render();
	}
}