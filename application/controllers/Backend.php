<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class backend extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Model_takken', 'Takken'); 
		$this->load->model('Model_activiteiten', 'Activiteiten');
		$this->load->model('Model_Log', 'Log');
  }

  function index() {
    if($this->session->userdata('logged_in'))  {
      $session_data = $this->session->userdata('logged_in');

      $data['Title']  = "Admin takken";
			$data['Active'] = "1";
			
			// Session
      $data['Role'] = $session_data['Admin'];
			$data['Tak']  = $session_data['Tak'];
			
			// Tak beschrijvingen
      $DB['Kapoenen']   = $this->Takken->Kapoenen();
      $DB['Welpen']     = $this->Takken->Welpen();
      $DB['JongGivers'] = $this->Takken->JongGivers();
      $DB['Givers']     = $this->Takken->Givers(); 
      $DB['Jins']       = $this->Takken->Jins();
      $DB['Leiding']    = $this->Takken->Leiding();
			
			// Tak activiteiten
			$DB['Activiteiten_Kapoenen']   = $this->Activiteiten->Kapoenen();
			$DB['Activiteiten_Welpen']     = $this->Activiteiten->Welpen();
			$DB['Activiteiten_JongGivers'] = $this->Activiteiten->JongGivers();
			$DB['Activiteiten_Givers']     = $this->Activiteiten->Givers();
			$DB['Activiteiten_Jins']       = $this->Activiteiten->Jins();
      
      $this->load->view('components/admin_header', $data);
      $this->load->view('components/navbar_admin', $data);
      $this->load->view('admin/takken', $DB);
      $this->load->view('components/footer');
    } else {
      //If no session, redirect to login page
      redirect('Admin', 'refresh');
	  }
  }
	
	public function Insert_act() {
		if($this->session->userdata('logged_in')) {
			$this->Activiteiten->Insert();
			redirect('backend');
		} else {
			// If no session, redirect to login page
			redirect('Admin', 'refresh');
		}
	}
  
  function logout() {
		$this->Log->Logged_out();
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('Admin', 'refresh');
  }

}
