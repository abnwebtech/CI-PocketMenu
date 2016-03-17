<?php

class Welcome extends MY_Controller {

	function __construct() {

		parent::__construct();
		$this->load->helper('form');	

	}
	
	function index() {		
		$this->load->view('welcome/index');
		// $this->render();
	}
}
