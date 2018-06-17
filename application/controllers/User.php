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

    public function user($profile_id = FALSE)
    {
        if($profile_id == FALSE)
        {
            show_404();
        }
        $profile = $this->user_model->get_user($profile_id);
        if(empty($profile))
        {
            show_404();
        }

        $this->load->view('templates/header', array('title' => "$profile->firstname $profile->lastname"));
        $data['profile'] = new stdClass();
        $data['profile']->firstname = $profile->firstname;
        $data['profile']->lastname = $profile->lastname;
        $data['profile']->id = $profile->id;
        if(empty($user->picture)) {
            $data['profile']->picture = '/resources/images/no_picture.png';
        } else {
            $data['profile']->picture = $profile->picture;
        }
        $data['profile']->cover_picture = $profile->cover_picture;
        if(empty($profile->biography)) {
            $data['profile']->biography = 'This user has no biography.';
        } else {
            $data['profile']->biography = $profile->biography;
        }

        $data['profile']->buttons = array();
        if($this->user_model->is_logged_in())
        {
            $user = $this->user_model->get_this_user();
            if($user->id != $profile->id)
            {
                if($this->friend_model->is_friends($user->id, $profile->id))
                {
                    $data['profile']->buttons[] = $this->load->view('friends/remove_button', array('id' => $profile->id), TRUE);
                }
                else
                {
                    if($this->friend_model->has_sent_request($profile->id, $user->id))
                    {
                        $data['profile']->buttons[] = $this->load->view('friends/accept_button', array('id' => $profile->id), TRUE);
                        $data['profile']->buttons[] = $this->load->view('friends/reject_button', array('id' => $profile->id), TRUE);
                    }
                    else if ($this->friend_model->has_sent_request($user->id, $profile->id))
                    {
                        $data['profile']->buttons[] = $this->load->view('message', array('message' => 'Friendship requested'), TRUE);
                    }
                    else
                    {
                        $data['profile']->buttons[] = $this->load->view('friends/request_button', array('id' => $profile->id), TRUE);
                    }
                }
            }
        }

        $data['scripts'][] =
        "<script>
            App.posts = new App.PostCollection([], { data: $.param({ profile: $profile_id}) });
            App.postsView = new App.PostsView(App.posts);
            App.posts.fetch();
        </script>";

        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer', $data);

    }
}
