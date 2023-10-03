<?php 
    // application/models/User_model.php

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Function to check if a user exists with the provided username and password
    public function check_login($username, $password) {
        $query = $this->db->get_where('login', array('username' => $username, 'password' => $password));      
        return $query->row_array();
    }
   


    public function insert_user($user_data) {
        // Insert user data into the 'users' table
        return $this->db->insert('login', $user_data);
    }
}
