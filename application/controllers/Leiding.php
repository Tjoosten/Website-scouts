<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class leiding extends CI_Controller {

  /* 
   | Developer: Tim Joosten
   | Licence: 4GPL
   | Copyright: Sint-Joris Turnhout, Tim Joosten  
   */

  function __construct() {
    parent::__construct();
    $this->load->model('Model_leiding', 'Leiding');
    $this->load->model('Model_Log', 'Log');
  }

  function index() {
    if($this->session->userdata('logged_in'))  {
      $session_data = $this->session->userdata('logged_in');

      // General
      $data['Title']  = "Leiding";
			$data['Active'] = "6";
      
      // Session
      $data['Role'] = $session_data['Admin'];

      // Database
      $data['Admin']   = $this->Leiding->Administrators();
      $data['Leiding'] = $this->Leiding->Leiding();
      
      $this->load->view('components/admin_header', $data);
      $this->load->view('components/navbar_admin');
      $this->load->view('admin/leiding', $data);
      $this->load->view('components/footer');
    } else {
      //If no session, redirect to login page
      redirect('Admin', 'refresh');
	  }
  }

  // Database functies
  function Insert_leiding() {
    if($this->session->userdata('logged_in')) {
			$this->Log->Created_login();
      $this->Leiding->Leiding_insert();
      redirect('leiding');
    } else {
      // If nos session found redirect to login 
      redirect('Admin', 'refresh');
    }
  }

  function Leiding_block() {
    if($this->session->userdata('logged_in')) {
      $this->Leiding->Leiding_Block();
			$this->Log->Log_Block(); 
      redirect('leiding');
    } else {
      // Geen sessie gevonden,  ga naar login 
      redirect('Admin', 'refresh');
    }
  }

  function Leiding_unblock() {
    if($this->session->userdata('logged_in')) {
      $this->Leiding->Leiding_Unblock();
			$this->Log->Log_Unblock();
      redirect('leiding');
    } else {
      // Geen sessie gevonden, ga naar login 
      redirect('Admin', 'refresh');
    }
  }

  function Leiding_upgrade() {
    if($this->session->userdata('logged_in')) {
			$this->Log->Add_admin();
      $this->Leiding->Leiding_upgrade();
      redirect('leiding');
    } else {
      // Geen sessie gevonden, ga naar login
      redirect('Admin', 'refresh');
    }
  }

  function Leiding_downgrade() {
    if($this->session->userdata('logged_in')) {
			$this->Log->Delete_admin();
      $this->Leiding->Leiding_downgrade(); 
      redirect('leiding');
    } else {
      // Geen sessie gevinden, ga naar login
      redirect('Admin', 'refresh');
    }
  }

  function Leiding_delete() {
    if($this->session->userdata('logged_in')) {
			$this->Log->Delete_login();
      $this->Leiding->Leiding_delete();
      redirect('leiding');
    } else {
      // Geen sessie gevonden, ga naar login
      redirect('Admin', 'refresh');
    }
  }
}

