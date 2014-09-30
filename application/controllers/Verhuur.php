<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Verhuur extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('Model_verhuringen','Verhuringen');
						$this->load->model('Model_Log', 'Log');
            $this->load->library('email');
        }

		public function index() {
            $data['Title']  = "verhuur";
						$data['Active'] = "2";

            $this->load->view('components/header', $data);
            $this->load->view('components/navbar', $data);
            $this->load->view('client/verhuur_index');
            $this->load->view('components/footer');
        }

        public function verhuur_kalender() {
            $data['Title']  = "Verhuur kalender";
						$data['Active'] = "2";
						
            $DB['Verhuringen'] = $this->Verhuringen->Verhuring_kalender(); 

            $this->load->view('components/header', $data);
            $this->load->view('components/navbar', $data);
            $this->load->view('client/verhuur_kalender', $DB);
            $this->load->view('components/footer');
        }

        public function verhuur_aanvraag() {
            $data['Title'] = " Aanvraag verhuur"; 
						$data['Active'] = "2";

            $this->load->view('components/header', $data);
            $this->load->view('components/navbar', $data);
            $this->load->view('client/verhuur_aanvraag'); 
            $this->load->view('components/footer');
        }

        public function toevoegen_verhuur() {
            // Email template
            $this->email->from('contact@st-joris-turnhout.be', 'Contact st-joris turnhout');
            $this->email->to('Topairy@gmail.com'); 

            $this->email->subject('Nieuwe verhuring');
            $this->email->message('Er is een nieuwe verhuring aangevraagd op http://www.st-joris-turnhout.be');  

            $this->email->send();

            // echo $this->email->print_debugger();

            // Schrijft naar database
            $this->Verhuringen->InsertDB(); 
            redirect('Verhuur/Admin_verhuur');
        }

        // Admin side
				public function Download_verhuringen() {
					if($this->session->userdata('logged_in')) {
						$this->load->dbutil();
						$this->load->helper('download');
						
						$this->Verhuringen->Download_verhuringen();
						redirect('Verhuur/Admin_verhuur');			
					} else {
						// if no session, redirect to login page
						redirect('Admin');
					}
				}
				
				public function Search() {
					if($this->session->userdata('logged_in')) {
						$Session = $this->session->userdata('logged_in');
						
						// Session variables
						$data['Role'] = $Session['Admin'];
						
						// Global variables
						$data['Title'] = "Verhuringen";
						$data['Active'] = "2";
						
						// Database Variables
						$data['Bevestigd'] = $this->Verhuringen->Search();
						
						$this->load->view('components/admin_header', $data);
						$this->load->view('components/navbar_admin', $data);
						$this->load->view('admin/verhuur_index', $data);
						$this->load->view('components/footer');
					} else {
						// if no session, redirect to login page
						redirect('Admin','Refresh');
					}
				}
				
        public function Admin_verhuur() {
            if($this->session->userdata('logged_in'))  {
                $session_data = $this->session->userdata('logged_in');
                // Session variables
                $data['Role'] = $session_data['Admin'];

                // Gobal variables
                $data['Title']  = "Verhuringen";
								$data['Active'] = "2";

                // Database variabels
                $data['Bevestigd'] = $this->Verhuringen->Verhuur_bevestigd(); 

                $this->load->view('components/admin_header', $data);
                $this->load->view('components/navbar_admin', $data);
                $this->load->view('admin/verhuur_index', $data);
                $this->load->view('components/footer');
            } else {
                //If no session, redirect to login page
                redirect('Admin', 'refresh');
            }
        }

        public function verhuur_edit() {
            if($this->session->userdata('logged_in')) {
                // Global variables
                $data['Title']  = "Wijzig verhuring";
								$data['Active'] = "2";

                // Session Variables
                $session_data = $this->session->userdata('logged_in');
                $data['Role'] = $session_data['Admin'];

                // Database variables
                $data['Info'] = $this->Verhuringen->verhuur_info();

                $this->load->view('components/admin_header', $data);
                $this->load->view('components/navbar_admin', $data);
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
                $data['Title']  = "Verhuur info";
								$data['Active'] = "2";

                // Database variables
                $data['Info'] = $this->Verhuringen->verhuur_info();

                // Session variables
                $session_data = $this->session->userdata('logged_in'); // Load session
                $data['Role'] = $session_data['Admin'];

                $this->load->view('components/admin_header', $data); 
                $this->load->view('components/navbar_admin', $data);
                $this->load->view('admin/verhuur_info', $data); 
                $this->load->view('components/footer');
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'Refresh');
            }
        }
				
        public function Wijzig_verhuur() {
            if($this->session->userdata('logged_in')) {
                $this->Verhuringen->Wijzig_verhuur();
                redirect('Verhuur/Admin_verhuur');
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'Refresh');
            }
        }
				
        public function Change_optie() {
            if($this->session->userdata('logged_in')) {
                $this->Verhuringen->Status_optie();
								$this->Log->Verhuur_option();
                redirect('Verhuur/Admin_verhuur');
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }
        }

        public function Change_bevestigd() {
            if($this->session->userdata('logged_in')) {
								$this->Log->Verhuur_option();
                $this->Verhuringen->Status_bevestigd(); 
                redirect('Verhuur/Admin_verhuur');
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }
        }

        public function Verhuur_delete() {
            if($this->session->userdata('logged_in')) {
                $this->Verhuringen->Verhuur_delete();
								$this->Log->Verhuur_delete();
                redirect('Verhuur/Admin_verhuur');
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Verhuur/Admin_verhuur');
            }
        }
	}