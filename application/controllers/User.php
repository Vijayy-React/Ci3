<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        // Display a form for adding a new user
        $this->load->view('add_user_view');
    }

    public function add_user() {
        // Validate form data
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, show errors
            $this->load->view('add_user_view');
        } else {
            // Form validation passed, insert the user
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $user_data = array(
                'username' => $username,
                'password' => $hashed_password
            );

            // Insert user data into the 'users' table using the model
            if ($this->user_model->insert_user($user_data)) {
                // Insertion successful
                redirect('user/success');
            } else {
                // Insertion failed
                $data['error_message'] = 'Failed to add user';
                $this->load->view('add_user_view', $data);
            }
        }
    }

    public function success() {
        // Display a success message after adding a user
        $this->load->view('success_view');
    }
}
