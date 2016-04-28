<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Detail");
  }
  public function index()
  {
    $other_users = $this->Detail->other_users();
    $my_friends = $this->Detail->my_friends();

    if(empty($my_friends))
    {
      $no_friends = "You don't have any friends yet";
      $this->session->set_flashdata('no_friends', $no_friends);
    }
    $this->load->view('/Dashboard', array('other_users' => $other_users, 'my_friends' => $my_friends));
  }

  public function logoff()
  {
    $this->session->sess_destroy();
    redirect("/");
  }

  public function user($others_id)
  {
    $show_user = $this->Detail->user($others_id);

    $this->load->view('/user', array('show_user'=> $show_user));

  }

  public function add($user_id)
  {
    $this->Detail->add($user_id);
    redirect("/Details");
  }

  public function remove($friend_id)
  {
    $this->Detail->remove($friend_id);
    redirect("/Details");
  }

}
