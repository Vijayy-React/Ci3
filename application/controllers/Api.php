<?php 
    class Api extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('user_model');
        }
    
        public function login() {
            echo 'funciton login';
        }
    }
    
?>