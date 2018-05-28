<?php
class Test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('friend_model');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->friend_model->accept_request(1, 4);


    }
}
