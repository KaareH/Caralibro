<?php
class Logout extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('user_model');
  }

  public function index()
  {
    $this->user_model->end_session();
    $this->session->set_userdata(array());
    $data['title'] = 'Logout';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/page_start');
    $message['message'] = 'Logout successful.';
    $this->load->view('message', $message);
    $this->load->view('templates/page_end');
    $this->load->view('templates/footer');
  }

}
