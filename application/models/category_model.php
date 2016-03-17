<?php

class Category_model extends CI_Model {

    
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_categories() {
        
        $this->db->where('isdeleted', 0);
    	$query = $this->db->get('categories');
        $categories = $query->result_array();
        
    	return $categories;
    }

    function get_categories_for_location($loc_id) {
        
        $session_data = array(
                'location_id' => $loc_id
            );

        $this->session->set_userdata($session_data); 

        $sql_query = "SELECT c.*, r.category_id FROM `categories` AS c, `relations` AS r WHERE c.category_id = r.category_id AND r.location_id = " . $loc_id . " AND c.isdeleted = 0";
        
        $query = $this->db->query($sql_query);
        
        $categories = $query->result_array();

        return $categories;
    }

    function add_category($cat_name) {

        $add_data = array(
                'category_name' => $cat_name
            );

        $result = $this->db->insert('categories', $add_data);

        if ($result == 1) {
            
            $query = " SELECT * FROM categories ORDER BY category_id DESC LIMIT 1 ";
            
            $category_id_temp = $this->db->query($query);
            
            $category_id = $category_id_temp->result_array();

            return $category_id[0]['category_id'];
            
        } else {
            return "fail";
        }
    }

    function edit_category($cat_data) {
        
        $cat_name = $cat_data['cat_name'];

        $edit_data = array(
                'category_name' => $cat_data['cat_name'],
                'ispublish' => $cat_data['cat_published']
            );
        
        $this->db->where('category_id', $cat_data['cat_id']);
 
        $result = $this->db->update('categories', $edit_data);

        if ($result == 1) {
            return "success";
        } else {
            return "fail";
        }
    }

    function delete_category($cat_id) {

        $update_data = array('isdeleted' => 1);

        $this->db->where('category_id', $cat_id);

        $result = $this->db->update('categories', $update_data);
        
        if ($result == 1) {
            return "success";
        } else {
            return "fail";
        }
    }

    function get_category_id($cat_name) {

        $temp_category = $this->db->get_where('categories', array('category_name' => $cat_name));

        $category = $temp_category->result_array();

        return ($category[0]['category_id']);
    }
}