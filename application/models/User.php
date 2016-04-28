<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

  public function register($post_data)
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('alias', 'Alias', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[8]|matches[password]');

    if($this->form_validation->run() == FALSE)
    {
      $errors = validation_errors();
      $this->session->set_flashdata('errors', $errors);
      redirect("/");
    }
    else{
      //Set session data with registration data; add to database and redirect user to controller
      $this->add_user($this->input->post());
      $user_data = $this->get_user($this->input->post());

      $this->session->set_userdata('user_data', $user_data);

      //Redirect to Details controller, taking the session data
      redirect("/Details", $this->session->userdata('user_data', $user_data));
    }
  }

  public function login($post_data)
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

    if($this->form_validation->run() == FALSE)
    {
      $lerrors = validation_errors();
      $this->session->set_flashdata('lerrors', $lerrors);
      redirect("/");
    }
    else {
      //Verify user is the user in the database
      $user_data = $this->get_user($this->input->post());
      $valid = password_verify($this->input->post('password'), $user_data['password']);

      if($valid == TRUE)
      {
        $this->session->set_userdata('user_data', $user_data);
        redirect("/Details", $this->session->userdata('user_data', $user_data));
      }
      else{
        echo "Incorrect Email and Password given. Try again!";
      }
    }
  }

  public function add_user($post_data)
  {
    $query = "INSERT INTO users (name, alias, email, password, dob) VALUES (?,?,?,?,?)";
    $values = array($post_data['name'], $post_data['alias'],$post_data['email'], password_hash($post_data['password'], PASSWORD_DEFAULT), $post_data['dob']);

    $this->db->query($query, $values);
  }

  public function get_user($email)
  {
    $query = "SELECT * FROM users WHERE email = ?";
    $values = array($email['email']);
    return $this->db->query($query, $values)->row_array();
  }

}
