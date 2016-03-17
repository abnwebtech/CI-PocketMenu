<?php
	/**
	* 
	*/
	class Relation_model extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}

		function delete_relation($loc_id) 
		{
			$this->db->where('location_id', $loc_id);

			$result = $this->db->delete('relations');

			if ($result) {
				return "success";
			} else {
				return "fail";
			}
		}

		function add_relation($loc_id, $cat_id)
		{
			$result = $this->db->insert('relations', array('location_id' => $loc_id, 'category_id' => $cat_id));

			if ($result) {
				return "success";
			} else {
				return "fail";
			}
		}

	}