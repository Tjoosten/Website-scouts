<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Inschrijvingen extends CI_Controller {
		// Constructer 

    	function __construct(){
			 	parent::__construct();
				// Load model
				$this->load->library('Email');
				$this->load->helper('Email');
				$this->load->model('Model_inschrijvingen','Inschrijving');
    	}

		// Client side
		public function Ontbijt_beschrijving() {
			$Data['Title']  = "Inschrijvingen ontbijt";
			$Data['Active'] = "10";

			$this->load->view('components/header', $Data);
			$this->load->view('components/navbar', $Data);
			$this->load->view('client/ontbijt_beschrijving');
			$this->load->view('components/footer');
		}

		public function Ontbijt_inschrijving() {
			$Data['Title']  = "Inschrijving ontbijt"; 
			$Data['Active'] = "4";
			$DB['Datums']   = $this->Inschrijving->Get_dates(); 

			$this->load->view('components/header', $Data);
			$this->load->view('components/navbar', $Data);
			$this->load->view('client/ontbijt_inschrijving', $DB);
			$this->load->view('components/footer');
		}

		// Administrators side 
		public function Admin_ontbijt() {
			$Session = $this->session->userdata('logged_in');

			$Data['Title']  = "Admin inschrijvingen ontbijt";
			$Data['Active'] = "4";

			if($Session) {
				if($Session['Admin'] == 1) {
					// Session
	       	$Data['Role']  = $Session['Admin'];
					$Data['User']  = $Session['username'];
					$Data['Theme'] = $Session['Theme'];

					// Database values
					$DB['Ontbijt_datums'] = $this->Inschrijving->Get_Dates_Full(); 
					$DB['Inschrijvingen'] = $this->Inschrijving->Inschrijvingen_All(); 
					$DB['Datums']         = $this->Inschrijving->Get_dates();

					$this->load->view('components/admin_header', $Data);
					$this->load->view('components/navbar_admin', $Data);
					$this->load->view('admin/inschrijvingen_ontbijt', $DB);
					$this->load->view('components/footer');
				} else {

				}
			} else {
				redirect('Admin', 'Refresh');
			}
		}

		// Database handlings
		public function Insert_inschrijving() {
			if($this->session->userdata('logged_in')) {
				$this->Inschrijving->InsertDB();
				redirect('Inschrijvingen/Admin_ontbijt');
			} else {
				// Write to database
				$this->Inschrijving->InsertDB(); 

				// Variables User => Mail
				$Input['Naam']     = $this->input->post('Naam');
				$Input['Voornaam'] = $this->input->post('Voornaam');
				$Input['Email']    = $this->input->post('Email');
				$Input['Personen'] = $this->input->post('Personen');

				// View voor email
				$mail_ontbijt = $this->load->view('email/ontbijt_inschrijving', $Input , TRUE);

				// Mail voor bevestiging
				$this->email->from('contact@st-joris-turnhout.be', 'Contact st-joris turnhout');
        $this->email->to($this->input->post('Email')); 
        $this->email->subject('Bevestiging inschrijving ontbijt');
        $this->email->message($mail_ontbijt);
        $this->email->set_mailtype("html");  
        $this->email->send();
        
        $this->email->clear();

				// Redirect 
				redirect('Ontbijt_beschrijving');
			}
		}

		public function Ontbijt_Start() {
			$Session = $this->session->userdata('logged_in');

			if($Session) {
				if($Session['Admin'] == 1) {
					$this->Inschrijving->Start_inschrijving_ontbijt();
					redirect('Inschrijvingen/Admin_ontbijt');
				} else {
					$this->load->view('alerts/no_permission');
				}
			} else {
				// If no session, redirect to login
				redirect('Admin', 'Refresh');
			}
		}

		public function Ontbijt_Stop() {
			$Session = $this->session->userdata('logged_in');

			if($Session) {
				if($Session['Admin'] == 1) {
					$this->Inschrijving->Stop_inschrijving_ontbijt();
					redirect('Inschrijvingen/Admin_ontbijt');
				} else {
					$this->load->view('alerts/no_permission');
				}
			} else {
				// If no session, redirect to login
				redirect('Admin', 'Refresh');
			}
		}

		public function Delete_inschrijving() {
			$Session = $this->session->userdata('logged_in');

			if($Session) {
				if($Session['Admin'] == 1) {
					$this->Inschrijving->DeleteDB();
					redirect('Admin_ontbijt');
				} else {
					$this->load->view('alerts/no_permission');
				}
			} else {
				// If no session, redirect to login 
				redirect('Admin', 'Refresh');
			}
		}
	}