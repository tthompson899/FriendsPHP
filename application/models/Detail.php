<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Model {

  public function other_users()
  {
    $query = "SELECT * FROM users WHERE id != ?";
    $values = array($this->session->userdata['user_data']['id']);

    return $this->db->query($query, $values)->result_array();
  }

  public function user($others_id)
  {
    $query = "SELECT name, alias, email FROM users WHERE id = ?";
    $values = array($others_id);

    return $this->db->query($query, $values)->row_array();
  }
  public function add($user_id)
  {
    $query = "INSERT INTO users_friends (user_id, added_friend_id) VALUES (?, ?)";
    $value = array($this->session->userdata['user_data']['id'],$user_id);

    $this->db->query($query, $value);
  }

  public function my_friends()
  {
    $query = "SELECT users.*, users_friends.*
              FROM users JOIN users_friends ON users_friends.added_friend_id = users.id
              JOIN users another ON another.id = users_friends.added_friend_id
              WHERE users_friends.added_friend_id != ?";
    $value = array($this->session->userdata['user_data']['id']);

    return $this->db->query($query, $value)->result_array();
  }

  public function remove($friend_id)
  {
    $query = "DELETE FROM users_friends WHERE added_friend_id = ?";
    $value = $friend_id;

    $this->db->query($query, $value); 
  }

}
