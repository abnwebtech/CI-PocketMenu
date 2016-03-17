<?php

class User_model extends CI_Model {

    
    function __construct() {

        // Call the Model constructor
        parent::__construct();
    }
    
    function login($name, $password){

        $query = $this->db->get_where("admin", array('username' => $name, 'password' => $password));

        if ($query->num_rows() < 1) {
            # code...

            return array(false, 'User doesnot exist');
            
        } else {

            $user_info = $query->result_array();
            $id = $user_info[0]['id'];

            $session_data = array(
                'username'      =>      $name,
                      'id'      =>      $id,
                'logged_in'     =>      true
            );

            $this->session->set_userdata($session_data); 

            return array(true, 'Login Success');
        }
    }

    function api_login($email, $password) {

        $query = $this->db->get_where("admin", array('email' => $email));

        if ($query->num_rows() < 1) {
            # code...

            return array(false, 'User doesnot exist');
            
        } else {

            $query = $this->db->get_where("admin", array('email' => $email, 'password' => $password));

            if ($query->num_rows() < 1) {
                
                return array(false, 'Wrong password');
            }

            return array(true, 'Login Success');
        }
    }

    function get_user($id) {

        $query = $this->db->get_where("admin", array('id' => $id));
        $user = array_shift($query->result());

        return $user;
    }

    function signout() {

        $session_data = array(
            'username'  =>  '',
                  'id'  =>  '',
           'logged_in'  =>  false
        );
        
        $this->session->set_userdata($session_data);
    }
}

?>