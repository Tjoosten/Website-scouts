<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Mailing extends CI_Controller {

		// Constructor
		public $Session       = array();
		public $Error_heading = array();
		public $Error_message = array();

  	function __construct() {
      parent::__construct();
      $this->load->model('Model_mailing','Mailing');
      $this->load->helper(array('Email'));
      $this->load->library(array('Email'));

			$this->Session = $this->session->userdata('logged_in');
    }
		// END constructor

		public function index() {
			if($this->Session) {
				if($this->Session['Admin'] == 1) {
					$Data['Title']  = "Mailing";
					$Data['Active'] = "6";
					$Data['Mailing'] = $this->Mailing->Mailing();

					$this->load->view('components/admin_header', $Data);
					$this->load->view('components/navbar_admin', $Data);
					$this->load->view('admin/Mailing', $Data);
					$this->load->view('components/footer');
				} else {
					$Data['Heading'] = $this->Error_heading;
					$Data['Message'] = $this->Error_message;

					$this->load->view('errors/html/alert', $Data);
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
        $this->email->message(Parsedown::instance()->parse($text)); // Pasedown???? Bug possible!
        $this->email->send();
        $this->email->clear();
      }

      redirect('Mailing');
		}

		// Database Handlingss
		public function Add_address() {
			if($this->Session) {
				$this->Mailing->Insert_address();
				redirect('Mailing');
			} else {
				redirect('Admin', 'refresh');
			}
		}

		public function Delete_address() {
			if($this->Session) {
				$this->Mailing->Delete_address();
				redirect('Mailing');
			} else {
				redirect('Admin', 'refresh');
			}
		}

		public function Inactief() {
			if($this->Session) {
				$this->Mailing->Inactief();
				redirect('Mailing');
			} else {
				redirect('Admin','refresh');
			}
		}

		public function Actief() {
			if($this->Session) {
				$this->Mailing->Actief();
				redirect('Mailing');
			} else {
				redirect('Admin', 'refresh');
			}
		}
	}
