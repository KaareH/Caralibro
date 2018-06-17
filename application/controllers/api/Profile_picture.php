<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Profile_picture extends REST_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
    }

    public function index_post() {
        if(!$this->user_model->is_logged_in()) {
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(401);
        }
        $user = $this->user_model->get_this_user();

        $config['encrypt_name']         = true;
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output($this->upload->display_errors());
        }
        else {
            $filename = $this->upload->data('file_name');

            if($this->user_model->update_profile_picture($user->id, $filename)) {
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array("file_name" => $this->upload->data('file_name'))));
            }
            else {
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400);
            }
        }
    }
}
