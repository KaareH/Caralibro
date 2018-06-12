<?php
class Profile_picture extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
    }

    public function update() {
        if(!$this->user_model->is_logged_in()) show_error(401,401);
        $user = $this->user_model->get_this_user();

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            show_error(400, 400);
        }
    }
}
