<?php
class Post extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
    }

    public function create() {
        if(!$this->user_model->is_logged_in()) show_error(401,401);
        $user = $this->user_model->get_this_user();
        $data = array(
            'owner' => $user->id,
            'location' => $this->input->post('location'),
            'body' => $this->input->post('body')
        );
        $this->post_model->create_post($data);
    }
}
