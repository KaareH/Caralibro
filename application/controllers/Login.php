<?php
class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('user_model');
    $this->load->helper(array('form', 'url'));
  }

  public function index()
  {
    if($this->user_model->is_logged_in() == FALSE)
    {
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');

      $this->form_validation->set_rules('password', 'Password', 'trim|required',
        array('required' => 'You must provide a %s.')
      );
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

      if ($this->form_validation->run() == FALSE)
      {
        $data['title'] = 'Login';
        $this->load->view('templates/header', $data);
        $this->load->view('user/login_form');
        $this->load->view('templates/footer');
      }
      else
      {
        if($this->user_model->verify_login() === TRUE)
        {
          $row = $this->user_model->get_user_by_email($this->input->post('email'));
          $this->user_model->start_session($row->id);
          redirect('');
        }
        $data['title'] = 'Login';
        $this->load->view('templates/header', $data);
        $this->load->view('user/login_form');
        $this->load->view('templates/footer');
      }
    }
    else {
      $data['title'] = 'Login';
      $this->load->view('templates/header', $data);
      $this->load->view('user/already_logged_in');
      $this->load->view('templates/footer');
    }
  }

}
