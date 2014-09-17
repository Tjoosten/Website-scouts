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
                // Session variables
                $data['Role'] = $session_data['Admin'];

                // Gobal variables
                $data['Title'] = "Verhuringen";

                // Database variabels
                $data['Bevestigd'] = $this->Verhuringen->Verhuur_bevestigd(); 

                $this->load->view('components/admin_header', $data);
                $this->load->view('components/navbar_admin');
                $this->load->view('admin/verhuur_index', $data);
                $this->load->view('components/footer');
            } else {
                //If no session, redirect to login page
                redirect('Admin', 'refresh');
            }
        }

        public function Change_optie() {
            if($this->session->userdata('logged_in')) {
                $this->Verhuringen->Status_optie();
                redirect('Verhuur/Admin_verhuur');
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }
        }

        public function verhuur_edit() {
            if($this->session->userdata('logged_in')) {
                // Global variables
                $data['Title'] = "Wijzig verhuring";

                // Session Variables
                $session_data = $this->session->userdata('logged_in');
                $data['Role'] = $session_data['Admin'];

                // Database variables
                $data['Info'] = $this->Verhuringen->verhuur_info();

                $this->load->view('components/admin_header', $data);
                $this->load->view('components/navbar_admin');
                $this->load->view('admin/Verhuur_edit', $data); 
                $this->load->view('components/footer');

            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }

        }

        public function verhuur_info() {
            if($this->session->userdata('logged_in')) {
                // Global variables
                $data['Title'] = "Verhuur info";

                // Database variables
                $data['Info'] = $this->Verhuring->verhuur_info();

                // Session variables
                $session_data = $this->session->userdata('logged_in'); // Load session
                $data['Role'] = $session_data['Admin'];

                $this->load->view('components/admin_header', $data); 
                $this->load->view('components/navbar_admin');
                $this->load->view('admin/verhuur_info', $data); 
                $this->load->view('components/footer');
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'Refresh');
            }
        }

        public function Change_bevestigd() {
            if($this->session->userdata('logged_in')) {
                $this->Verhuringen->Status_bevestigd(); 
                redirect('Verhuur/Admin_verhuur');
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }
        }
	}