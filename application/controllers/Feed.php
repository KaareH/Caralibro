<?php
class Feed extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('feed_model');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        if($this->user_model->is_logged_in())
        {
            $user = $this->user_model->get_this_user();
            $data['title'] = 'Feed';

            $this->load->view('templates/header', $data);
            $this->load->view('feed/feed', array('location' => $user->id));
            $this->load->view('templates/footer', $data);
        }
        else {
            redirect('login');
        }
    }
}
