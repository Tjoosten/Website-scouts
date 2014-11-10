<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Mailing extends CI_Controller {
  	function __construct() {
      parent::__construct();
      $this->load->model('Model_mailing','Mailing');
      $this->load->helper(array('Email'));
      $this->load->library(array('Email'));
    }
			
		public function index() {
			$Session = $this->session->userdata('logged_in'); 
			if($Session) {
				if($Session['Admin'] == 1) {
					// Global variables
					$Data['Title']  = "Mailing"; 
					$Data['Active'] = "6";
					// Session variables
					$Data['Role']  = $Session['Admin'];
					$Data['User']  = $Session['username'];
					$Data['Theme'] = $Session['Theme'];

					// Database variables
					$Data['Mailing'] = $this->Mailing->Mailing();

					$this->load->view('components/admin_header', $Data);
					$this->load->view('components/navbar_admin', $Data);
					$this->load->view('admin/Mailing', $Data);
					$this->load->view('components/footer');
				} else {
					$this->load->view('alerts/no_permission');
				}
			} else {
				redirect('Admin','Refresh');
			}
		}

		public function Mail() {
			$List = $this->input->post('List'); 

			// Switch statement
			switch ($List) {
   			case "Iedereen":
     			$Query = $this->Mailing->Mailing_Iedereen(); 
     				break;
   			
   			case "VZW":
     			$Query = $this->Mailing->Mailing_VZW();
     				break;

     		case "Ouders":
     			$Query = $this->Mailing->Mailing_Ouders();
     				break;

     		case "Leiding":
     			$Query = $this->Mailing->Mailing_Leiding(); 
     				break;

     		case "Oudervergadering":
     			$Query = $this->Mailing->Mailing_Oudervergadering();
     				break;

   			default:
     			echo "Kan niet bepalen naar welke lijst hij de mails moet sturen ;-(";
				}

			$text = $this->input->post('Message');

			// Mail message
      foreach($Query as $Output) {
      	$this->email->set_mailtype("html");
        $this->email->from('Mailing@st-joris-turnhout.be', 'Mailing st-joris turnhout');
        $this->email->to($Output->Email); 
        $this->email->subject($this->input->post('subject'));
        $this->email->message(Parsedown::instance()->parse($text));  
        $this->email->send();
        $this->email->clear();
      }

      redirect('Mailing');
		}

		// Database Handlingss
		public function Add_address() {
			if($this->session->userdata('logged_in')) {
				$this->Mailing->Insert_address();
				redirect('Mailing');
			} else {
				redirect('Admin', 'refresh');
			}
		}

		public function Delete_address() {
			if($this->session->userdata('logged_in')) {
				$this->Mailing->Delete_address();
				redirect('Mailing');
			} else {
				redirect('Admin', 'refresh');
			}
		}

		public function Inactief() {
			if($this->session->userdata('logged_in')) {
				$this->Mailing->Inactief();
				redirect('Mailing');
			} else {
				redirect('Admin','refresh');
			}
		}

		public function Actief() {
			if($this->session->userdata('logged_in')) {
				$this->Mailing->Actief();
				redirect('Mailing');
			} else {
				redirect('Admin', 'refresh');
			}
		}
	}