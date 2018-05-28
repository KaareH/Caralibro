<?php
class Post_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->model('user_model');
  }

  public function create_post($data)
  {
      return $query = $this->db->insert('posts', $data);
  }

  public function get_post($id)
  {
      $query = $this->db->select('*')->from('posts')->where('id', $id)->get();
      $result = $query->row();
      if(empty($result)) return;

      $result->owner = $this->user_model->get_user($result->owner);
      $result->location = $this->user_model->get_user($result->location);
      return $result;
  }

  public function get_posts_by_owner($owner)
  {
      $query = $this->db->select('*')->from('posts')->where('owner', $owner)->order_by('timestamp', 'DESC')->get();
      $results = $query->result();
      if(empty($results)) return;

      foreach ($results as $result)
      {
          $result->owner = $this->user_model->get_user($result->owner);
          $result->location = $this->user_model->get_user($result->location);
      }
      return $results;
  }

  public function get_posts_by_location($location)
  {
      $query = $this->db->select('*')->from('posts')->where('location', $location)->order_by('timestamp', 'DESC')->get();
      $results = $query->result();
      if(empty($results)) return;

      foreach ($results as $result)
      {
          $result->owner = $this->user_model->get_user($result->owner);
          $result->location = $this->user_model->get_user($result->location);
      }
      return $results;
  }

}
