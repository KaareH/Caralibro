<?php
class Friends extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('friend_model');
        $this->load->helper(array('form', 'url'));
    }

    public function send_request()
    {
        if($this->user_model->is_logged_in() == FALSE) show_error(401, 401);
        $user = $this->user_model->get_this_user();
        $friend = $this->input->post('friend_id');
        $this->friend_model->send_request($user->id, $friend);
    }

    public function accept_request()
    {
        if($this->user_model->is_logged_in() == FALSE) show_error(401, 401);
        $user = $this->user_model->get_this_user();
        $friend = $this->input->post('friend_id');
        $this->friend_model->accept_request($user->id, $friend);
    }

    public function deny_request()
    {
        if($this->user_model->is_logged_in() == FALSE) show_error(401, 401);
        $user = $this->user_model->get_this_user();
        $friend = $this->input->post('friend_id');
        $this->friend_model->deny_request($user->id, $friend);
    }

    public function remove_friend()
    {
        if($this->user_model->is_logged_in() == FALSE) show_error(401, 401);
        $user = $this->user_model->get_this_user();
        $friend = $this->input->post('friend_id');
        $this->friend_model->remove_friends($user->id, $friend);
    }

    public function index() {
        if($this->user_model->is_logged_in() == FALSE) show_error(401, 401);

        $user = $this->user_model->get_this_user();

        $data['title'] = 'Friends';
        $this->load->view('templates/header', $data);

        $request_list = $this->friend_model->get_request_list($user->id);
        if(!empty($request_list))
        {
            foreach ($request_list as $request_row)
            {
                $sender = $this->user_model->get_user($request_row->sender);
                $sender->timestamp = $request_row->timestamp;
                $this->load->view('friends/request', $sender);
            }
        }

        $friend_list = $this->friend_model->get_friend_list($user->id);
        if(empty($friend_list)) {
            $message['message'] = 'You have no friends.';
            $this->load->view('message', $message);
        }
        else {
            foreach ($friend_list as $friend_row)
            {
                $friend = $this->user_model->get_user($friend_row->id);
                $friend->timestamp = $friend_row->timestamp;
                $this->load->view('friends/friend', $friend);
            }
        }
        $this->load->view('templates/footer', $data);

    }

}
