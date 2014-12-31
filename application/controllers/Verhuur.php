<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Verhuur extends CI_Controller {

		// Constructor
		public $Session = array();
		public $Heading = array();
		public $Message = array();

  	function __construct() {
      parent::__construct();
      $this->load->model('Model_verhuringen','Verhuringen');
	    $this->load->model('Model_Log', 'Log');
      $this->load->model('Model_notifications', 'Not');
      $this->load->library(array('email','dompdf_gen'));
      $this->load->helper(array('email','date','text'));

			$this->Session = $this->session->userdata('logged_in');
			$this->Heading = "No permission";
			$this->Message = "U hebt geen rechten om deze handeling uit te voeren";
    }
		// End constructor

		  public function index() {
				$this->output->cache(5);

				$data = array(
					'Title' => 'Verhuur',
					'Active' => '2',
				);

        $this->load->view('components/header', $data);
      	$this->load->view('components/navbar', $data);
        $this->load->view('client/verhuur_index');
        $this->load->view('components/footer');
      }

      public function verhuur_kalender() {
				$this->output->cache(3);

				$data = array(
					'Title'  => 'Verhuur kalender',
					'Active' => '2',
				);
				
        $DB['Verhuringen'] = $this->Verhuringen->Verhuring_kalender();

        $this->load->view('components/header', $data);
        $this->load->view('components/navbar', $data);
        $this->load->view('client/verhuur_kalender', $DB);
        $this->load->view('components/footer');
      }

      public function verhuur_aanvraag() {
				$this->output->cache(5);

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
					$data = array(
						// Email variables
						'exec'  => $this->benchmark->elapsed_time();
						'Start' => $this->input->post('Start_datum');
						'Eind'  => $this->input->post('Eind_datum');
						'GSM'   => $this->input->post('GSM');
						'Groep' => $this->input->post('Groep');
						'Mail'  => $this->input->post('Email');
 					);

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

					// Debugging proposes
          // echo $this->email->print_debugger();

          // Schrijft naar database
          $this->Verhuringen->InsertDB();
          redirect('Verhuur');
        }
      }

      // Admin side
			public function Download_verhuringen() {
        if($this->Session) {
          if($this->Session['Admin'] == 1) {
					  $Data['Query'] = $this->Verhuringen->Download_verhuringen();

            $this->load->view('pdf/verhuur', $Data);
            $html = $this->output->get_output();

            // Convert to PDF
            $this->dompdf->set_paper('letter', 'landscape');
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("Onbijt_inschrijvingen.pdf");
          } else {
						$Data['Heading'] = $this->Heading;
						$Data['Message'] = $this->Message;
            $this->load->view('errors/html/alert', $Data);
          }
				} else {
					// if no session, redirect to login page
					redirect('Admin');
				}
			}

			public function Search() {
        if($this->Session) {
					if($this->Session['Admin'] == 1) {
					  // Global variables
					  $Data['Title'] = "Verhuringen";
					  $Data['Active'] = "2";

					  // Database Variables
						$Data['Notification'] = $this->Not->Get();
					  $Data['Bevestigd'] = $this->Verhuringen->Search();

					  $this->load->view('components/admin_header', $Data);
					  $this->load->view('components/navbar_admin', $Data);
					  $this->load->view('admin/verhuur_index', $Data);
					  $this->load->view('components/footer');
          } else {
						$Data['Heading'] = $this->Heading;
						$Data['Message'] = $this->Message;
            $this->load->view('errors/html/alert', $Data);
            }
					} else {
					// if no session, redirect to login page
					redirect('Admin','Refresh');
				}
			}

      public function Admin_verhuur() {
		   if($this->Session)  {
        $Data['Notification'] = $this->Not->Get();

        if($this->Session['Admin'] == 1) {
          // Gobal variables
          $Data['Title']  = "Verhuringen";
					$Data['Active'] = "2";

          // Database variabels
          $Data['Bevestigd'] = $this->Verhuringen->Verhuur_api();

          $this->load->view('components/admin_header', $Data);
          $this->load->view('components/navbar_admin', $Data);
          $this->load->view('admin/verhuur_index', $Data);
          $this->load->view('components/footer');
        } else {
					$Data = array(
						'Heading' => $this->Heading,
						'Message' => $this->Message,
					);

          $this->load->view('errors/html/alerts', $Data);
        }
      } else {
        // If no session, redirect to login page
        redirect('Admin', 'refresh');
      }
    }

        public function verhuur_edit() {
            if($this->Session) {
							if($this->Session['Admin'] == 1) {
								$data = array(
									// Global variables
									'Title' => 'Wijzig verhuring',
									'Active' => '2',
									// Database variables
									'Info' => $this->Verhuringen->verhuur_info(),
								);

                $this->load->view('components/admin_header', $data);
                $this->load->view('components/navbar_admin', $data);
                $this->load->view('admin/Verhuur_edit', $data);
                $this->load->view('components/footer');
							} else {
								$Data = array(
									'Heading' => $this->Heading,
									'Message' => $this->Message,
								);

								$this->load->view('errors/html/alert', $Data);
							}
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }

        }

        public function verhuur_info() {
            if($this->Session) {
							if($this->Session['Admin'] == 1) {
								$Data = array(
									// Global variables
									'Title'  => 'Verhuur Info',
									'Active' => '2',
									// Database variables
									'Info'   => $this->Verhuringen->verhuur_info(),
								);

                $this->load->view('components/admin_header', $Data);
                $this->load->view('components/navbar_admin', $Data);
                $this->load->view('admin/verhuur_info', $Data);
                $this->load->view('components/footer');
							} else {
								$Data = array(
									'Heading' => $this->Heading;
									'Message' => $this->Message;
								);

								$this->load->view('errors/html/alert', $Data);
							}
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'Refresh');
            }
        }

        public function Wijzig_verhuur() {
            if($this->Session) {
						  if($this->Session['Admin'] == 1 ) {
                $this->Verhuringen->Wijzig_verhuur();
                redirect('Verhuur/Admin_verhuur');
						  } else {
								$Data = array(
									'Heading' => $this->Heading,
									'Message' => $this->Message,
								);

						  	$this->load->view('errors/html/alert', $Data);
						  }
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'Refresh');
            }
        }

        public function Change_optie() {
            if($this->Session) {
							if($this->Session['Admin'] == 1) {
                $this->Verhuringen->Status_optie();
								$this->Log->Verhuur_option();
                redirect('Verhuur/Admin_verhuur');
							} else {
								$Data = array(
									'Heading' => $this->Heading,
									'Message' => $this->Message,
								);

								$this->load->view('errors/html/alert', $Data);
							}
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }
        }

        public function Change_bevestigd() {
            if($this->Session) {
							if($this->Session['Admin'] == 1) {
								$this->Log->Verhuur_option();
                $this->Verhuringen->Status_bevestigd();
                redirect('Verhuur/Admin_verhuur');
							} else {
								$Data = array(
									'Heading' => $this->Heading,
									'Message' => $this->Message,
								);

								$this->load->view('errors/html/alert', $Data);
							}
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Admin', 'refresh');
            }
        }

        public function Verhuur_delete() {
            if($this->Session) {
							if($this->Session['Admin'] == 1) {
                $this->Verhuringen->Verhuur_delete();
								$this->Log->Verhuur_delete();
                redirect('Verhuur/Admin_verhuur');
							} else {
								$Data = array(
									'Heading' => $this->Heading,
									'Message' => $this->Message,
								);

								$this->load->view('errors/html/alert', $Data);
							}
            } else {
                // Geen sessie gevonden, ga naar login pagina
                redirect('Verhuur/Admin_verhuur');
            }
        }
	}
