<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Admin extends CI_Controller {
		function __construct() {
    		parent::__construct();
        $this->load->helper(array('form'));
  		}

  		public function index() {
  			if($this->session->userdata('logged_in')) {
  				redirect('backend','refresh');
  			} else {
    			$this->load->view('admin/login');
  			}
  		}
	}
