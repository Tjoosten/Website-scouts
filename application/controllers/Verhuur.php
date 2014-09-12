<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Verhuur extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('Model_verhuringen','Verhuringen');
        }

		public function index() {
            $data['Title'] = "verhuur";

            $this->load->view('components/header', $data);
            $this->load->view('components/navbar');
            $this->load->view('client/verhuur_index');
            $this->load->view('components/footer');
        }

        public function verhuur_kalender() {
            $data['Title'] = "Verhuur kalender";
            $DB['Verhuringen'] = $this->Verhuringen->Verhuring_kalender(); 

            $this->load->view('components/header', $data);
            $this->load->view('components/navbar');
            $this->load->view('client/verhuur_kalender', $DB);
            $this->load->view('components/footer');
        }

        public function verhuur_aanvraag() {
            $data['Title'] = " Aanvraag verhuur"; 

            $this->load->view('components/header', $data);
            $this->load->view('components/navbar');
            $this->load->view('client/verhuur_aanvraag'); 
            $this->load->view('components/footer');
        }

        public function toevoegen_verhuur() {
            $this->Verhuringen->InsertDB(); 
            redirect('verhuur');
        }

        // Admin side
        public function Admin_verhuur() {
            if($this->session->userdata('logged_in'))  {
                $session_data = $this->session->userdata('logged_in');

                // Gobal variables
                $data['Title'] = "Verhuringen";

                $this->load->view('components/admin_header', $data);
                $this->load->view('components/navbar_admin');
                $this->load->view('admin/verhuur_index');
                $this->load->view('components/footer');
            } else {
                //If no session, redirect to login page
                redirect('Admin', 'refresh');
            }
        }
	}