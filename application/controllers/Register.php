<?php
class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        if($this->user_model->is_logged_in() == FALSE)
        {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required',
            array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Register';
            $this->load->view('templates/header', $data);
            $this->load->view('user/register_form');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->user_model->register_user();
            $id = $this->user_model->get_user_id($this->input->post('email'));
            $this->user_model->start_session($id);

            $data['title'] = 'Register';
            $this->load->view('templates/header', $data);
            $this->load->view('user/success');
            $this->load->view('templates/footer');
        }
    }
    else
    {
        $data['title'] = 'Register';
        $this->load->view('templates/header', $data);
        $this->load->view('user/already_logged_in');
        $this->load->view('templates/footer');
    }
}
}
