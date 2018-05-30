<?php
class Post extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model('friend_model');
    }

    public function post($id = FALSE)
    {
        if($id == FALSE)
        {
            show_404();
        }
        $post = $this->post_model->get_post($id);
        if(empty($post))
        {
            show_404();
        }
        $data['title'] = 'Post';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/page_start');
        $this->load->view('posts/post', $post);
        $this->load->view('templates/page_end');
        $this->load->view('templates/footer', $data);
    }
}
