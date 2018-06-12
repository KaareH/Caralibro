<?php
class Search extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('feed_model');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
    }
