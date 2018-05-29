<?php
class Friend extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('friend_model');
        $this->load->model('user_model');
    }

    public function request_friendship()
    {
        if(!$this->user_model->is_logged_in()) show_error(401,401);
        $user = $this->user_model->get_this_user();

        $this->friend_model->send_request($user->id, $this->input->post('receiver_id'));
    }

    public function accept_friendship()
    {
        if(!$this->user_model->is_logged_in()) show_error(401,401);
        $user = $this->user_model->get_this_user();

        $this->friend_model->accept_request($this->input->post('sender_id'), $user->id);
    }

    public function reject_friendship()
    {
        if(!$this->user_model->is_logged_in()) show_error(401,401);
        $user = $this->user_model->get_this_user();

        $this->friend_model->reject_request($this->input->post('sender_id'), $user->id);
    }

    public function remove_friendship()
    {
        if(!$this->user_model->is_logged_in()) show_error(401,401);
        $user = $this->user_model->get_this_user();

        $this->friend_model->remove_friend($user->id, $this->input->post('friend_id'));
    }
}
