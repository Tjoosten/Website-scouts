<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Notifications extends CI_Controller {
		function __construct() {
            parent::__construct();
            $this->load->model('Model_leiding','Leiding');
            $this->load->model('Model_notifications','Notification');
        }

		public function herstel_verhuur() {
			$Session = $this->session->userdata('logged_in');

			if($Session) {

				$Person['Naam']  = $Session['username'];
				$Person['Email'] = $Session['Email']; 

				$this->Notification->Herstel_verhuur($Person);

				redirect('Verhuur/admin_verhuur');
			} else {
				// If no session found, redirect to login
				redirect('Admin','Refresh');
			}
		}

		function Verhuur_aan() {
			if($this->session->userdata('logged_in')) {
				$this->Notification->Verhuur_aan();
				redirect('Verhuur/admin_verhuur');
			} else {
				// if no session found, redirect to login
				redirect('Admin','Refresh');
			}
		}

		function Verhuur_uit() {
			if($this->session->userdata('logged_in')) {
				$this->Notification->Verhuur_uit();
				redirect('Verhuur/admin_verhuur');
			} else {
				// if no session found, redirect to login
				redirect('Admin','Refresh');
			}
		}
	}