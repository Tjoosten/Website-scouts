<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Upload_files extends CI_Controller {
		function __construct() {
			parent::__construct(); 
			$this->load->helper(array('form', 'url'));
		}
		
		public function index() {
			if($this->session->userdata('logged_in')) {
				$Session = $this->session->userdata('logged_in');
				
				// Global Variables
				$data['Title']  = "Wijzig groen'tje";
				$data['Active'] = "9";
				
				// Session Variables
				$data['id']    = $Session['id'];
				$data['Admin'] = $Session['Admin'];
				$data['User']  = $Session['username'];
				$data['Tak']   = $Session['Tak'];
				$data['Role']  = $Session['Admin']; 
				$data['Theme'] = $Session['Theme'];
				
				$this->load->view('components/admin_header', $data);
				$this->load->view('components/navbar_admin', $data);
				$this->load->view('admin/upload_planning', array('error' => ''));
				$this->load->view('components/footer');
			} else {
				// Geen sessie gevonden , ga naar login
				redirect('Admin', 'Refresh');
			}
		}
		
		public function do_upload() {
			if($this->session->userdata('logged_in')) {
				$config['upload_path'] = './assets/files/';
				$config['allowed_types'] = 'pdf';
				$config['file_name'] = 'Planning';
				$config['overwrite']= TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload()) {
					$Session = $this->session->userdata('logged_in');
					
					// Global Variables
					$data['Title']  = "Wijzig groen'tje";
					$data['Active'] = "9";
					
					// Session Variables
					$data['id']    = $Session['id'];
					$data['Admin'] = $Session['Admin'];
					$data['User']  = $Session['username'];
					$data['Tak']   = $Session['Tak'];
					$data['Role']  = $Session['Admin']; 
					$data['Theme'] = $Session['Theme'];
					
					// Error variable
					$error = array('error' => $this->upload->display_errors());
					
					$this->load->view('components/admin_header', $data);
					$this->load->view('components/navbar_admin', $data);
					$this->load->view('admin/upload_planning', $error);
					$this->load->view('components/footer');
					
				}	else {
						$this->load->view('alerts/upload_success');
					}
				} else {
					// geen sessie gevonden, ga naar login pagina
					redirect('Admin', 'Refresh');
			}
		}
	}