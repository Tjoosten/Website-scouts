<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Verhuur extends CI_Controller {
  	function __construct() {
            parent::__construct();
            $this->load->model('Model_verhuringen','Verhuringen');
	        $this->load->model('Model_Log', 'Log');
            $this->load->model('Model_notifications', 'Not');
            $this->load->library(array('email'));
            $this->load->helper(array('email','date','text'));
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
					if($this->session->userdata('logged_in')) {
            $this->Verhuringen->InsertDB();
            redirect('Verhuur/Admin_verhuur');
          } else {
            // Email Variables
            $data['exec']  = $this->benchmark->elapsed_time();
            $data['Start'] = $this->input->post('Start_datum');
            $data['Eind']  = $this->input->post('Eind_datum');
            $data['GSM']   = $this->input->post('GSM');
            $data['Groep'] = $this->input->post('Groep');
            $data['Mail']  = $this->input->post('Email');
            
            $Mailing = $this->Not->Verhuur_mailing(); 

            foreach($Mailing as $Output) {
                $administrator = $this->load->view('email/verhuur', $data , TRUE);
            
                $this->email->from('contact@st-joris-turnhout.be', 'Contact st-joris turnhout');
                $this->email->to($Output->Mail); 
                $this->email->set_mailtype("html");
                $this->email->subject('Nieuwe verhuring');
                $this->email->message($administrator);  
                $this->email->send();
                $this->email->clear();
            }

            // Start mail naar client
            $client = $this->load->view('email/verhuur_client', $data, TRUE);

            $this->email->from('Verhuur@st-joris-turnhout.be', 'Verhuur St-joris Turnhout');
            $this->email->to($this->input->post('Email'));
            $this->email->subject('Verhuur aanvraag - St-joris, Turnhout');
            $this->email->message($client);
            $this->email->send();

            // echo $this->email->print_debugger();

            // Schrijft naar database
            $this->Verhuringen->InsertDB(); 
            redirect('Verhuur');
          }
        }

        // Admin side
				public function Download_verhuringen() {
          $Session = $this->session->userdata('logged_in');
          $Admin = $Session['Admin'];

					if($Session) {
            if ($Admin == 1) {
						  $this->load->dbutil();
						  $this->Verhuringen->Download_verhuringen();
						  redirect('Verhuur/Admin_verhuur');	
            } else {
              $this->load->view('alerts/no_permission');
            }		
					} else {
						// if no session, redirect to login page
						redirect('Admin');
					}
				}
				
				public function Search() {
          $Session = $this->session->userdata('logged_in');
          $Admin = $Session['Admin'];

					if($Session) {
						if($Admin == 1) {
						  // Session variables
						  $data['Role']  = $Session['Admin'];
						  $data['User']  = $Session['username'];
						  $data['Theme'] = $Session['Theme'];
						
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
              $this->load->view('alerts/no_permission');
            }
					} else {
						// if no session, redirect to login page
						redirect('Admin','Refresh');
					}
				}
				
        public function Admin_verhuur() {
            if($this->session->userdata('logged_in'))  {
							$Session = $this->session->userdata('logged_in');
              $Admin = $Session['Admin']; 
              $this->Not->Get();
              $data['Notification'] = $this->Not->Get();

              if($Admin == 1) {
                // Load Helpers & Drivers
							  $this->load->helper('email');
								
                $Session = $this->session->userdata('logged_in');
                
								// Session variables
                $data['Role']  = $Session['Admin'];
								$data['User']  = $Session['username'];
								$data['Theme'] = $Session['Theme'];

                // Gobal variables
                $data['Title']  = "Verhuringen";
								$data['Active'] = "2";

                // Database variabels
                $data['Bevestigd'] = $this->Verhuringen->Verhuur_api(); 

                $this->load->view('components/admin_header', $data);
                $this->load->view('components/navbar_admin', $data);
                $this->load->view('admin/verhuur_index', $data);
                $this->load->view('components/footer');
              } else {
                $this->load->view('alerts/no_permission');
              }
            } else {
                //If no session, redirect to login page
                redirect('Admin', 'refresh');
            }
        }

        public function verhuur_edit() {
            if($this->session->userdata('logged_in')) {
							$Session = $this->session->userdata('logged_in'); 
							$Admin = $Session['Admin']; 
							
							if($Admin == 1) {
                // Global variables
                $data['Title']  = "Wijzig verhuring";
								$data['Active'] = "2";

                // Session Variables
                $Session = $this->session->userdata('logged_in');
                
								$data['Role']  = $Session['Admin'];
								$data['User']  = $Session['username'];
								$data['Theme'] = $Session['Theme'];

                // Database variables
                $data['Info'] = $this->Verhuringen->verhuur_info();

                $this->load->view('components/admin_header', $data);
                $this->load->view('components/navbar_admin', $data);
                $this->load->view('admin/Verhuur_edit', $data); 
                $this->load->view('components/footer');
							} else {
								$this->load->view('alerts/no_permission');
							}
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }

        }

        public function verhuur_info() {
            if($this->session->userdata('logged_in')) {
							$Session = $this->session->userdata('logged_in');
							$Admin   = $Session['Admin'];
							
							if($Admin == 1) {
                // Global variables
                $data['Title']  = "Verhuur info";
								$data['Active'] = "2";

                // Database variables
                $data['Info'] = $this->Verhuringen->verhuur_info();

                // Session variables
                $Session = $this->session->userdata('logged_in'); // Load session
                
								$data['Role']  = $Session['Admin'];
								$data['User']  = $Session['Username'];
								$data['Theme'] = $Session['Theme'];

                $this->load->view('components/admin_header', $data); 
                $this->load->view('components/navbar_admin', $data);
                $this->load->view('admin/verhuur_info', $data); 
                $this->load->view('components/footer');
							} else {
								$this->load->view('alert/no_permission');
							}
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'Refresh');
            }
        }
				
        public function Wijzig_verhuur() {
            if($this->session->userdata('logged_in')) {
							$Session = $this->session->userdata('logged_in');
							$Admin = $Session['Admin']; 
							
						  if($Admin == 1 ) {
                $this->Verhuringen->Wijzig_verhuur();
                redirect('Verhuur/Admin_verhuur');
						  } else {
						  	$this->load->view('alert_no_permission');
						  }
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'Refresh');
            }
        }
				
        public function Change_optie() {
            if($this->session->userdata('logged_in')) {
							$Session = $this->session->userdata('logged_in'); 
							$Admin = $Session['Admin']; 
							
							if($Admin == 1) {
                $this->Verhuringen->Status_optie();
								$this->Log->Verhuur_option();
                redirect('Verhuur/Admin_verhuur');
							} else {
								redirect('alert/no_permission'); 
							}
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }
        }

        public function Change_bevestigd() {
            if($this->session->userdata('logged_in')) {
							$Session = $this->session->userdata('logged_in');
							$Admin = $Session['Admin'];
							
							if($Admin == 1) {
								$this->Log->Verhuur_option();
                $this->Verhuringen->Status_bevestigd(); 
                redirect('Verhuur/Admin_verhuur');
							} else {
								redirect('alerts/no_permission');
							}
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }
        }

        public function Verhuur_delete() {
            if($this->session->userdata('logged_in')) {
							// Session gedeelte
							$Session = $this->session->userdata('logged_in');
							$Admin = $Session['Admin'];
							
							if($Admin == 1) {
                $this->Verhuringen->Verhuur_delete();
								$this->Log->Verhuur_delete();
                redirect('Verhuur/Admin_verhuur');
							} else {
								$this->load->view('alerts/no_permission');
							}
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Verhuur/Admin_verhuur');
            }
        }
	}
