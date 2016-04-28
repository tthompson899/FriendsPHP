<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
  }
	public function index()
	{
		$this->load->view('Login');
	}
  public function register()
  {
    $this->User->register($this->input->post());
  }

  public function login()
  {
    $this->User->login($this->input->post());
  }
}
