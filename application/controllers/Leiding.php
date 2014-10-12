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
    $this->load->model('Model_log', 'Log');
    $this->load->library('email');
		$this->load->helper('email');
  }

  function Leidingsploeg() {
    $data['Title']  = "Leidingsploeg";
    $data['Active'] = "1";

    $DB['ploeg'] = $this->Leiding->Ploeg(); 

    $this->load->view('components/header', $data);
    $this->load->view('components/navbar', $data);
    $this->load->view('client/leidingsploeg', $DB);
    $this->load->view('components/footer');
  }

  function index() {
    if($this->session->userdata('logged_in'))  {
      $Session = $this->session->userdata('logged_in');

      if($Session['Admin'] == 1) { 
        // General
        $data['Title']  = "Leiding";
			  $data['Active'] = "6";
      
        // Session
        $data['Role']  = $Session['Admin'];
			  $data['User']  = $Session['username'];
			  $data['Theme'] = $Session['Theme'];
 
        // Database
        $data['Admin']   = $this->Leiding->Administrators();
        $data['Leiding'] = $this->Leiding->Leiding();
      
        $this->load->view('components/admin_header', $data);
        $this->load->view('components/navbar_admin', $data);
        $this->load->view('admin/leiding', $data);
        $this->load->view('components/footer');
      } else {
        $this->load->view('alerts/no_permission');
      }
    } else {
      redirect('Admin', 'refresh');
	  }
  }
	
	function Settings() {
		if($this->session->userdata('logged_in')) {
			$Session = $this->session->userdata('logged_in');
			
			// General variables
			$data['Title'] =  "Account configuratie";
			$data['Active'] = "7";
			
			// Session variables
			$data['Role']  = $Session['Admin'];
			$data['User']  = $Session['username'];
			$data['Theme'] = $Session['Theme'];
			
			// Database variables 
			$DB['Account'] = $this->Leiding->Account();
			
			$this->load->view('components/admin_header', $data);
			$this->load->view('components/navbar_admin', $data);
			$this->load->view('admin/settings', $DB);
			$this->load->view('components/footer');
		} else {
			redirect('Admin', 'Refresh');
		}
	}

  // Database functies
	function Settings_edit() {
		if($this->session->userdata('logged_in')) {
			// Old Session 
			$Session = $this->session->userdata('logged_in');
			
			$data['id']    = $Session['id'];
			$data['Admin'] = $Session['Admin'];
			$data['User']  = $Session['username'];
			$data['Tak']   = $Session['Tak'];
			$data['Theme'] = $Session['Theme'];
			
			// New database
			$Update = array(
				"id"       => $data['id'],
				"Admin"    => $data['Admin'],
				"username" => $data['User'],
				"Tak"      => $data['Tak'],
				"Theme"    => $this->input->post('Theme'),
			);
			
			$this->session->set_userdata('logged_in', $Update);
			
			// Write to database  
			$this->Leiding->Settings_edit();
			redirect('Leiding', 'Refresh');
		} else {
			redirect('Admin', 'Refresh');
		}
	}
	
  function Insert_leiding() {
    if($this->session->userdata('logged_in')) {

			// Email the new user
			$this->email->from('Topairy@gmail.com', 'Your Name');
			$this->email->to('Topairy@gmail.com');
			$this->email->subject('Email Test');
			$this->email->message('test');	
			$this->email->send();		
			
			// Database Handlings
			$this->Log->Created_login();
      $this->Leiding->Leiding_insert();
      redirect('leiding');
    } else {
      redirect('Admin', 'refresh');
    }
  }

  function Leiding_block() {
    if($this->session->userdata('logged_in')) {
      $this->Leiding->Leiding_Block();
			$this->Log->block(); 
      redirect('leiding');
    } else {
      redirect('Admin', 'refresh');
    }
  }

  function Leiding_unblock() {
    if($this->session->userdata('logged_in')) {
      $this->Leiding->Leiding_unblock();
			$this->Log->Log_Unblock();
      redirect('leiding');
    } else {
      redirect('Admin', 'refresh');
    }
  }

  function Leiding_upgrade() {
    if($this->session->userdata('logged_in')) {
      $Session = $this->session->userdata('logged_in'); 
      
      if($Session['Admin'] == 1) { 
			  $this->Log->Add_admin();
        $this->Leiding->Leiding_upgrade();
        redirect('leiding');
      } else {
        $this->load->view('alerts/no_permission');
      }
    } else {
      redirect('Admin', 'refresh');
    }
  }

  function Leiding_downgrade() {
    if($this->session->userdata('logged_in')) {
      $Session = $this->session->userdata('logged_in'); 

      if($Session['Admin_role']  == 1 ) { 
			  $this->Log->Delete_admin();
        $this->Leiding->Leiding_downgrade(); 
        redirect('leiding');
      } else {
        $this->load->view('alerts/no_permission'); 
      }
    } else {
      redirect('Admin', 'refresh');
    }
  }

  function Leiding_delete() {
    if($this->session->userdata('logged_in')) {
      $Session = $this->session->userdata('logged_in'); 

      if($Session['Admin'] == 1) { 
			 $this->Log->Delete_login();
        $this->Leiding->Leiding_delete();
        redirect('leiding');
      } else {
        $this->load->view('alerts/no_permission');
      }
    } else {
      redirect('Admin', 'refresh');
    }
  }
}

