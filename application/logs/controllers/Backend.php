<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class backend extends CI_Controller {

  // Constructor
  public $Session = array();

  function __construct() {
    parent::__construct();
    $this->load->model('Model_takken', 'Takken');
		$this->load->model('Model_activiteiten', 'Activiteiten');
		$this->load->model('Model_Log', 'Log');

    $this->load->helper(array('logger'));
    $this->Session = $this->session->userdata('logged_in');
  }
  // END Constructor

  function index() {
    if($this->Session)  {

      $data = array(
        'Title'  => 'Admin Takken',
        'Active' => '1',
      );

			// Tak beschrijvingen
      $DB = array(
        'Kapoenen'   => $this->Takken->Kapoenen(),
        'Welpen'     => $this->Takken->Welpen(),
        'JongGivers' => $this->Takken->JongGivers(),
        'Givers'     => $this->Takken->Givers(),
        'Jins'       => $this->Takken->Jins(),
        'Leiding'    => $this->Takken->Leiding(),

        'Activiteiten_Kapoenen'    => $this->Activiteiten->Kapoenen(),
        'Activiteiten_Welpen'      => $this->Activiteiten->Welpen(),
        'Activiteiten_JongGivers'  => $this->Activiteiten->JongGivers(),
        'Activiteiten_Givers'      => $this->Activiteiten->Givers(),
        'Activiteiten_Jins'        => $this->Activiteiten->Jins(),
      );

      $this->load->view('components/admin_header', $data);
      $this->load->view('components/navbar_admin', $data);
      $this->load->view('admin/takken', $DB);
      $this->load->view('components/footer');
    } else {
      //If no session, redirect to login page
      redirect('Admin', 'refresh');
	  }
  }

  /**
   * Voeg een activiteit toe.
   */
	public function Insert_act() {
		if($this->Auth) {
      // Logging
      user_log($this->Session['username'], 'Heeft een activiteit toegevoegd');

			$this->Activiteiten->Insert();
			redirect('backend');
		} else {
			// If no session, redirect to login page
			redirect('Admin', 'refresh');
		}
	}

  /**
   * Log the gebruiker uit.
   */
  function logout() {
    // Logging
    user_log($this->Session['username'], 'Heeft zich uitgelogd.');
		$this->Log->Logged_out();

		$this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('Admin', 'refresh');
  }

}
