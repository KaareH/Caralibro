<?php
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('post_model');
        $this->load->model('friend_model');
        $this->load->helper(array('form', 'url'));
    }

    public function user($id = FALSE)
    {
        if($id == FALSE)
        {
            show_404();
        }
        $user = $this->user_model->get_user($id);
        if(empty($user))
        {
            show_404();
        }

        $this->load->view('templates/header', array('title' => "$user->firstname $user->lastname"));
        $data['profile'] = new stdClass();
        $data['profile']->firstname = $user->firstname;
        $data['profile']->lastname = $user->lastname;
        if(empty($user->picture)) {
            $data['profile']->picture = '/resources/images/no_picture.png';
        } else {
            $data['profile']->picture = $user->picture;
        }
        $data['profile']->cover_picture = $user->cover_picture;
        if(empty($user->biography)) {
            $data['profile']->biography = 'This user has no biography.';
        } else {
            $data['profile']->biography = $user->biography;
        }

        $data['profile']->buttons = array();
        if($this->user_model->is_logged_in())
        {
            $this_user = $this->user_model->get_this_user();
            if($this_user->id != $user->id)
            {
                if($this->friend_model->is_friends($this_user->id, $user->id))
                {
                    $data['profile']->buttons[] = $this->load->view('friends/remove_button', array('id' => $user->id), TRUE);
                }
                else
                {
                    if($this->friend_model->has_sent_request($user->id, $this_user->id))
                    {
                        $data['profile']->buttons[] = $this->load->view('friends/accept_button', array('id' => $user->id), TRUE);
                        $data['profile']->buttons[] = $this->load->view('friends/reject_button', array('id' => $user->id), TRUE);
                    }
                    else if ($this->friend_model->has_sent_request($this_user->id, $user->id))
                    {
                        $data['profile']->buttons[] = $this->load->view('message', array('message' => 'Friendship requested'), TRUE);
                    }
                    else
                    {
                        $data['profile']->buttons[] = $this->load->view('friends/request_button', array('id' => $user->id), TRUE);
                    }
                }
            }
        }

        $this->load->view('user/profile_start', $data);

        if($this->user_model->is_logged_in())
        {
            $this->load->view('posts/create_post', array('location' => $user->id));
        }

        $posts = $this->post_model->get_posts_by_location($id);
        if(empty($posts) == TRUE)
        {
            $message['message'] = 'No posts!';
            $this->load->view('message', $message);
        }
        else {
            foreach ($posts as $post)
            {
                $this->load->view('posts/post', $post);
            }
        }
        $this->load->view('user/profile_end');
        $this->load->view('templates/footer', $data);

    }
}
