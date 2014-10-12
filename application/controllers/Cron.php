<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Cron extends CI_Controller {
 
    function __construct(){
		parent::__construct();
      // this controller can only be called from the command line
      if (!$this->input->is_cli_request()) show_error('Direct access is not allowed');
			// Load model
			$this->load->model('Model_cron','Cron');
    }
 
    function Optimize_DB() {
			$this->load->dbutil();
			$this->Cron->Optimize();
    }
}