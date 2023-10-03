<?php
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->view('login_view');
    }

    public function process_login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user = $this->user_model->check_login($username, $password);

            if ($user) {
                echo 'welcome'; // You can replace this with a redirect to a dashboard or another page.
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password.');
                redirect('login');
            }
        }
    }
}
