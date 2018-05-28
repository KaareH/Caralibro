<?php
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('post_model');
        $this->load->helper(array('form', 'url'));
    }

    public function user($id = FALSE)
    {
        if($id == FALSE)
        {
            show_404();
        }
        $row = $this->user_model->get_user($id);
        if(empty($row))
        {
            show_404();
        }

        $data['title'] = "$row->firstname $row->lastname";

        $this->load->view('templates/header', $data);
        $posts = $this->post_model->get_posts_by_location($id);
        if(empty($posts) == TRUE)
        {
            echo 'No posts';
        }
        else {
            foreach ($posts as $post)
            {
                $this->load->view('posts/post', $post);
            }
        }
        $this->load->view('templates/footer', $data);

    }
}
