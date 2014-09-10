<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class leiding extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    if($this->session->userdata('logged_in'))  {
      $session_data = $this->session->userdata('logged_in');

      $data['Title'] = "test";
      
      $this->load->view('components/admin_header', $data);
      $this->load->view('components/navbar_admin');
      $this->load->view('admin/leiding');
      $this->load->view('components/footer');
    } else {
      //If no session, redirect to login page
      redirect('Admin', 'refresh');
	  }
  }

}