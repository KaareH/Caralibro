<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class User extends REST_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
    }

    public function index_get($id) {
        if($id) {
            $user = $this->user_model->get_user($id);
            if(empty($user)) {
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(404);
            }
            else {
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($user));
            }
        } else {
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(404);
        }
    }
}
