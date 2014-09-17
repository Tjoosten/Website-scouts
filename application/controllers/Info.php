<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Info extends CI_Controller {
		/* 
		 |
		 |
		 |
		 */

		public function index() {
			// Global variables 
			$data['Title'] = "Info - het uniform";

			$this->load->view('components/header', $data);
			$this->load->view('components/navbar'); 
			$this->load->view('components/footer'); 
		}
	} 