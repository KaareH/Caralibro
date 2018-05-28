<?php
class Feed_model extends CI_Model {

  public function __construct()
  {
      $this->load->model('post_model');
  }

  public function get_feed()
  {
      
  }
}
