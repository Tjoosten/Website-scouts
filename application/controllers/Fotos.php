<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fotos extends CI_Controller {

  // Constructor
  public $Session  = array();
  public $Redirect = array();

  function __construct() {
    parent::__construct();
		$this->load->model('Model_fotos', 'Images');
		$this->load->helper(array('form', 'url'));

    $this->Session  = $this->session->userdata('logged_in');
    $this->Redirect = $this->config->item('Redirect','Not_logged_in');
  }
  // End constructor

	// Client side
  function index() {
    $data = array(
      'Title'  => 'Fotos',
      'Active' => '3',
      'Foto'   => $this->Images->select(),
    );

    $this->load->view('components/header', $data);
    $this->load->view('components/navbar', $data);
    $this->load->view('client/Fotos', $data);
    $this->load->view('components/footer');
  }

  function Tak() {
    $data = array(
      'Title'  => 'Fotos',
      'Active' => '3',
      'Foto'   => $this->Images->select_tak();
    );

  	$this->load->view('components/header', $data);
  	$this->load->view('components/navbar', $data);
  	$this->load->view('client/Fotos', $data);
  	$this->load->view('components/footer');
  }

	// Admin side
	function Index_admin() {
		if($this->Session) {
      $data = array(
        'Title'  => 'Admin media',
        'Active' => '3',
        'DB'     => $this->Images->Backend_select();
      );

			$this->load->view('components/admin_header', $data);
			$this->load->view('components/navbar_admin', $data);
			$this->load->view('admin/index_foto', array('error' => ''), $data);
			$this->load->view('components/footer');
		} else {
			// geen sessie gevonden, ga naar login
			redirect($this->Redirect, 'Refresh');
		}
	}

	public function do_upload() {
		if($this->Session) {
      $config = array(
          'allowed_types' => 'jpg',
          'upload_path'   => './assets/fotos',
      );


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()) {
        $data = array(
          // Global variables
          'Title'  => 'Wijzig groentje',
          'Active' => '9',
          // Database veriables
          'DB' => $this->Images->Backend_select();
        );

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
				redirect($this->Redirect, 'Refresh');
		}
	}

	function delete() {
		if($this->Session) {

			unlink('./assets/fotos/'. $this->uri->segment(3));
			$this->Images->Delete();
			redirect('Fotos/Index_admin');
		} else {
			// geen sessie gevonden, ga naar login
			redirect($this->Redirect, 'Refresh');
		}
	}
}
