<?php
class Feed_model extends CI_Model {

  public function __construct()
  {
      $this->load->model('post_model');
      $this->load->model('friend_model');
  }

  public function get_feed($user_id)
  {
      $friend_ids = $this->friend_model->get_friend_id_array($user_id);
      if(empty($friend_ids)) return;

      $query = $this->db->select('*')->from('posts')->where_in('owner', $friend_ids)->order_by('timestamp', 'DESC')->get();
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
