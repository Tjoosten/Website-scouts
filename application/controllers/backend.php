<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class backend extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Model_takken', 'Takken'); 
  }

  function index() {
    if($this->session->userdata('logged_in'))  {
      $session_data = $this->session->userdata('logged_in');

      $this->load->model('Model_takken','Takken');

      $data['Title'] = "Admin takken";

      $DB['Kapoenen']   = $this->Takken->Kapoenen();
      $DB['Welpen']     = $this->Takken->Welpen();
      $DB['JongGivers'] = $this->Takken->JongGivers();
      $DB['Givers']     = $this->Takken->Givers(); 
      $DB['Jins']       = $this->Takken->Jins();
      $DB['Leiding']    = $this->Takken->Leiding();
      
      $this->load->view('components/admin_header', $data);
      $this->load->view('components/navbar_admin');
      $this->load->view('admin/takken', $DB);
      $this->load->view('components/footer');
    } else {
      //If no session, redirect to login page
      redirect('Admin', 'refresh');
	  }
  }
  
  function logout() {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('Admin', 'refresh');
  }

}
