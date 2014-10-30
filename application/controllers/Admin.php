<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Admin extends CI_Controller {
		function __construct() {
    		parent::__construct();
  		}

  		public function index() {
  			if($this->session->userdata('logged_in')) {
  				redirect('backend','refresh');
  			} else {
  				$this->load->helper('form');
    			$this->load->view('admin/login');
  			}
  		}
	}