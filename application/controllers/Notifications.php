<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Notifications extends CI_Controller {
		// Constructor
		public $Session = array();

		function __construct() {
      parent::__construct();
      $this->load->model('Model_leiding','Leiding');
      $this->load->model('Model_notifications','Notification');

			$this->Session = $this->session->userdata('logged_in');
  	}
		// End constructor

		public function herstel_verhuur() {
			if($this->Session) {

				$Person = array(
					'Naam'  => $this->Auth['username'],
					'Email' => $this->Auth['Email'],
				);

				$this->Notification->Herstel_verhuur($Person);

				redirect('Verhuur/admin_verhuur');
			} else {
				// If no session found, redirect to login
				redirect('Admin','Refresh');
			}
		}

		function Verhuur_aan() {
			if($this->Session) {
				$this->Notification->Verhuur_aan();
				redirect('Verhuur/admin_verhuur');
			} else {
				// if no session found, redirect to login
				redirect('Admin','Refresh');
			}
		}

		function Verhuur_uit() {
			if($this->Session) {
				$this->Notification->Verhuur_uit();
				redirect('Verhuur/admin_verhuur');
			} else {
				// if no session found, redirect to login
				redirect($this->config->item('Redirect','Not_logged_in'),'Refresh');
			}
		}
	}
