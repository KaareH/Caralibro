<?php
class Logout extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
  }

  public function index()
  {
    $this->load->model('user_model');
    $this->user_model->end_session();
    $data['title'] = 'Logout';

    $this->load->view('templates/header', $data);
    $message['message'] = 'Logout successful.';
    $this->load->view('message', $message);
    $this->load->view('templates/footer');
  }

}
