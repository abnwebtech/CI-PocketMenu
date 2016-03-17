<?php

class Product_model extends CI_Model {

    
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_products($cat_id) {

        $sql_query = "SELECT p.*, l.location_name FROM `products` AS p, `locations` AS l WHERE p.location_id = l.location_id AND p.category_id = " . $cat_id . " AND p.isdeleted = 0";

        $query = $this->db->query($sql_query);

        $products = $query->result_array();

    	return $products;
    }

    function add_product($name, $description, $price, $category_id, $location_id) {
        $data = array(
            'product_name' => $name,
            'product_description' => $description,
            'product_price' => $price,
            'category_id' => $category_id,
            'location_id' => $location_id,
        );

        $this->db->insert('products', $data);
    }

    function edit_product($prod_data) {
        
        $edit_data = array(
                'product_name'          =>  $prod_data['prod_name'],
                'product_price'         =>  $prod_data['prod_price'],
                'product_description'   =>  $prod_data['prod_description']
            );

        $this->db->where('product_id', $prod_data['prod_id']);

        $result = $this->db->update('products', $edit_data);

        if ($result == 1) {
            return "success";
        } else {
            return "fail";
        }
    }

    function edit_product_api($product_id, $edit_data) {

        $this->db->where('product_id', $product_id);

        $result = $this->db->update('products', $edit_data);

        if ($result == 1) {
            return "success";
        } else {
            return "fail";
        }
    }

    function get_all() {

        $sql_query = "SELECT p.*, l.location_name FROM `products` AS p, `locations` AS l WHERE p.location_id = l.location_id AND p.isdeleted = 0";

        $query = $this->db->query($sql_query);

        $products = $query->result_array();

        return $products;
    }

    function delete_product($prod_id) {

        $update_data = array('isdeleted' => 1);

        $this->db->where('product_id', $prod_id);

        $result = $this->db->update('products', $update_data);
        // var_dump($result);
        
        if ($result == 1) {
            return "success";
        } else {
            return "fail";
        }
    }

    function delete_pro($loc_id)
    {
        $this->db->where('location_id', $loc_id);

        $result = $this->db->delete('products');

        if ($result) {
            return "success";
        } else {
            return "fail";
        }
    }

    function save_product($save_data)
    {
        $result = $this->db->insert('products', $save_data);

        if ($result) {
            return "success";
        } else {
            return "fail";
        }
    }
}