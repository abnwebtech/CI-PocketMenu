<?php

class Location_model extends CI_Model {

    
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_location_id ($location_name) {

        $temp_location = $this->db->get_where('locations', array('location_name' => $location_name));

        $location = $temp_location->result_array();

        var_dump($location);
        die();

        return ($location[0]['location_id']);
    }

    function get_locations() {
        
    	$query = $this->db->get('locations');
        $locations = $query->result_array();
        
    	return $locations;
    }

    function get_location() {

    }

    function add_location($loc_data) {

        $result = $this->db->insert('locations', $loc_data);

        if ($result == 1) {
            return "success";
        } else {
            return "fail";
        }
    }

    function edit_location($loc_data, $loc_id) {
        
        $this->db->where('location_id', $loc_id);
        $result = $this->db->update('locations', $loc_data);

        if ($result == 1) {
            return "success";
        } else {
            return "fail";
        }
    }

    function delete_location($loc_id) {

        $this->db->where('location_id', $loc_id);

        $result = $this->db->delete('locations');

        if ($result) {
            # code...
            return "success";
        } else {
            return "fail";
        }
    }
}