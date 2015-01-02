<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Welcome extends CI_Controller {
		public function index() {
			// Cache
			$this->output->cache(5);
			// END

			$Data['Title'] = "Index";
			$this->load->view('client/index', $Data);
		}
	}
