<?php
class User_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
    $this->load->library('session');
  }

  public function is_logged_in()
  {
    if($this->session->userdata('logged_in')===TRUE)
    {
      return TRUE;
    }
    return FALSE;
  }

  public function get_this_user()
  {
      $id = $this->session->userdata('id');
      return $this->get_user($id);
  }

  public function get_user_id($email)
  {
    $query = $this->db->select('id')->from('users')->where('email', $email)->get();
    return $query->row()->id;
  }

  public function get_user($id)
  {
    $query = $this->db->select('id, firstname, lastname, picture, cover_picture, email, biography')->from('users')->where('id', $id)->get();
    return $query->row();
  }

  public function start_session($id)
  {
    $row = $this->get_user($id);

    $data = array(
      'logged_in' => TRUE,
      'id' => $id,
      'email' => $row->email,
      'firstname' => $row->firstname,
      'lastname' => $row->lastname
    );
    $this->session->set_userdata($data);
  }

  public function end_session()
  {
    $this->session->set_userdata(array('logged_in' => FALSE));
    $this->session->sess_destroy();
  }

  public function verify_login()
  {
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $query = $this->db->select('pass_hash')->from('users')->where('email', $email)->get();
      $row = $query->row();

      if(isset($row))
      {
          $pass_hash = $row->pass_hash;
          if(password_verify($password, $row->pass_hash))
          {
              return TRUE;
          }
      }
      return FALSE;
  }

  public function register_user()
  {
    $data = array(
      'firstname' => $this->input->post('firstname'),
      'lastname' => $this->input->post('lastname'),
      'email' => $this->input->post('email'),
      'pass_hash' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
    );

    return $this->db->insert('users', $data);
  }
}
