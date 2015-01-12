<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Takken extends CI_Controller {

   /*
    | Developer: Tim Joosten
    | License: 4GPL
    | Copyright: St-joris Turnhout, Tim Joosten
    */

		// Constructor
		public $Session  = array();
		public $Redirect = array();

    function __construct() {
      parent::__construct();
      $this->load->model('Model_Takken', 'Takken');
      $this->load->model('Model_activiteiten', 'Activiteiten');

			$this->Session  = $this->session->userdata('logged_in');
			$this->Redirect = $this->config->item('Redirect','Not_logged_in');
    }
		// End constructor

		public function index() {
			// Variable(s)
				// General
				$Data = array(
					'Title'  => 'Takken',
					'Active' => '1',
					'Limit'  => '40',
				);

				// Database
				$DB = array(
					'Kapoenen'   => $this->Takken->Kapoenen(),
					'Welpen'     => $this->Takken->Welpen(),
					'JongGivers' => $this->Takken->JongGivers(),
					'Givers'     => $this->Takken->Givers(),
					'Jins'       => $this->Takken->Jins(),
					'Leiding'    => $this->Takken->Leiding(),
				);
		  // == END Variables == //

			// View(s)
			$this->load->view('components/header', $Data);
			$this->load->view('components/navbar', $Data);
			$this->load->view('client/takken', $DB);
			$this->load->view('components/footer');
		}

    public function Kapoenen() {
    	// Variable(s)
    	  // General
				$Data = array(
					'Title'  => 'De Kapoenen',
					'Active' => '1',
				);

        // Database
				$DB = array(
					'Beschrijving' => $this->Takken->Kapoenen(),
					'Activiteiten' => $this->Activiteiten->Kapoenen(),
				);
      // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }

    public function Welpen() {
    	// Variable(s)
    	  // General
				$Data = array(
					'Title'  => 'De Welpen',
					'Active' => '1',
				);

    	  // Database
				$DB = array(
					'Beschrijving' => $this->Takken->Welpen(),
					'Activiteiten' => $this->Activiteiten->Welpen(),
				);
    	// == END Variables == //

    	  // View(s)
    	  $this->load->view('components/header', $Data);
    	  $this->load->view('components/navbar', $Data);
    	  $this->load->view('client/tak_pagina', $DB);
    	  $this->load->view('components/footer');
    }

    public function JongGivers() {
    	// Variable(s)
    	  // General
				$Data = array(
					'Title'  => 'De Jong-Givers',
					'Active' => '1',
				);

    	  // Database
				$DB = array(
					'Beschrijving' => $this->Takken->JongGivers(),
					'Activiteiten' => $this->Activiteiten->JongGivers(),
				);
    	// == END Variables == //

    	  // View(s)
    	  $this->load->view('components/header', $Data);
    	  $this->load->view('components/navbar', $Data);
    	  $this->load->view('client/tak_pagina', $DB);
    	  $this->load->view('components/footer');
    }

    public function Givers() {
    	// Variable(s)
    	  // General
				$Data = array(
					'Title'  => 'De Givers',
					'Active' => '1',
				);

    	  // Database
				$DB = array(
					'Beschrijving' => $this->Takken->Givers(),
					'Activiteiten' => $this->Activiteiten->Givers(),
				);
    	  // == END Variables == //

    	  // View(s)
    	  $this->load->view('components/header', $Data);
    	  $this->load->view('components/navbar', $Data);
    	  $this->load->view('client/tak_pagina', $DB);
    	  $this->load->view('components/footer');
    }

    public function Jins() {
    	// Variables
    	  // General
				$Data = array(
					'Title'  => 'De Jins',
					'Active' => '1',
				);

        // Database
				$DB = array(
					'Beschrijving' => $this->Takken->Jins(),
					'Activiteiten' => $this->Activiteiten->Jins(),
				);
      // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }

    public function Leiding() {
    	// Variables
    	  // General
				$Data = array(
					'Title'  => 'De Leiding',
					'Active' => '1',
				);

    	  // Database. Not an array because it's one variable.
    	  $DB['Beschrijving'] = $this->Takken->Leiding();
    		// == END Variables == //

    	  // View(s)
    	  $this->load->view('components/header', $Data);
    	  $this->load->view('components/navbar', $Data);
    	  $this->load->view('client/tak_leiding', $DB);
    	  $this->load->view('components/footer');
    }

    // Admin controllers
    public function Takken_edit() {
        if($this->Session) {
            $this->load->model('Model_takken', 'Takken');
            $this->Takken->Takken_edit();
            redirect('backend', 'refresh');
        } else {
            // If nos session found redirect to login
            redirect($this->Redirect, 'refresh');
        }
    }
}
