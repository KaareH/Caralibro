<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Post extends REST_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
        $this->load->model('feed_model');
    }

    public function index_post() {
        if(!$this->user_model->is_logged_in()) {
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(401);
        }

        $user = $this->user_model->get_this_user();
        $data = array(
            'owner' => $user->id,
            'location' => $this->post('location'),
            'body' => html_escape($this->post('body'))
        );
        $this->load->library('form_validation');
        $this->form_validation->set_data($data);

        $this->form_validation->set_rules('location', 'Location', 'trim|integer|required');
        $this->form_validation->set_rules('body', 'Body', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(400);
        }
        else {
            $this->post_model->create_post($data);

            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(201)
            ->set_output(json_encode("success"));
        }
    }

    public function index_get() {
        if($this->get('id')) {
            $array = $this->post_model->get_post($this->get('id'));
        } else {
            if($this->get('feed')) {
                if(!$this->user_model->is_logged_in()) {
                    return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(401);
                }
                $user = $this->user_model->get_this_user();
                $array = $this->feed_model->get_feed($user->id);
            } else if($this->get('profile')) {
                $array = $this->post_model->get_posts_by_location($this->get('profile'));
            }
        }

        if(empty($array)) {
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(404);
        } else {
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($array));
        }
    }
}
