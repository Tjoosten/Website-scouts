<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fotos extends CI_Controller {

  function __construct() {
    parent::__construct();
		$this->load->model('Model_fotos', 'Images');
		$this->load->helper(array('form', 'url'));
  }

	// Client side
  function index() {
    $data['Title']  = "Fotos"; 
		$data['Active'] = "3";
		
		// Database variables
		$data['Foto'] = $this->Images->select();

    $this->load->view('components/header', $data);
    $this->load->view('components/navbar', $data);
    $this->load->view('client/Fotos'); 
    $this->load->view('components/footer');
  }

	// Admin side
	function Index_admin() {
		if($this->session->userdata('logged_in')) {
			// Global Variables
			$data['Title']  = "Admin media";
			$data['Active'] = "3";
			$data['DB'] = $this->Images->Backend_select();
			
			// Session Variables
			$Session = $this->session->userdata('logged_in');
			
			$data['Role']  = $Session['Admin'];
			$data['User']  = $Session['username'];
			$data['Theme'] = $Session['Theme'];
			
			$this->load->view('components/admin_header', $data);
			$this->load->view('components/navbar_admin', $data);
			$this->load->view('admin/index_foto', array('error' => ''), $data);
			$this->load->view('components/footer');
		} else {
			// geen sessie gevonden, ga naar login
			redirect('Admin', 'Refresh');
		}
	}
	
	public function do_upload() {
		if($this->session->userdata('logged_in')) {
			$config['allowed_types'] = 'jpg';
			$config['upload_path'] = './assets/fotos/';

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
				
				// Database variables
				$data['DB'] = $this->Images->Backend_select();
				
				$this->load->view('components/admin_header', $data);
				$this->load->view('components/navbar_admin', $data);
				$this->load->view('admin/index_foto',array('error' => $this->upload->display_errors()),  $data);
				$this->load->view('components/footer');
				
			}	else {
					$this->Images->Insert($this->upload->data());
					$this->load->view('alerts/upload_success');
				}
			} else {
				// geen sessie gevonden, ga naar login pagina
				redirect('Admin', 'Refresh');
		}
	}
	
	function delete() {
		if($this->session->userdata('logged_in')) {
			
			unlink('./assets/fotos/'.$this->uri->segment(3));
			$this->Images->Delete();
			redirect('Fotos/Index_admin');
		} else {
			// geen sessie gevonden, ga naar login
			redirect('Admin', 'Refresh');
		}
	}
}
