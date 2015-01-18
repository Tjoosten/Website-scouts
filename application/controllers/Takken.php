<?php defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * Takken controller
	 *
	 * @package Website
	 * @copyright Tim Joosten
	 * @since 2015
	 */

	class Takken extends CI_Controller {
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

		/**
		 * Output: Takken pagina
		 */
		public function index() {
			// Variable(s)
				// General
				$Data = [
					'Title'     => 'Takken',
					'Active'     => '1',
					'Limit'      => '40',
					'Kapoenen'   => $this->Takken->Kapoenen(),
					'Welpen'     => $this->Takken->Welpen(),
					'JongGivers' => $this->Takken->JongGivers(),
					'Givers'     => $this->Takken->Givers(),
					'Jins'       => $this->Takken->Jins(),
					'Leiding'    => $this->Takken->Leiding(),
				];
		  // == END Variables == //

			// View(s)
			$this->load->view('components/header', $Data);
			$this->load->view('components/navbar', $Data);
			$this->load->view('client/takken', $Data);
			$this->load->view('components/footer');
		}

		/**
		 * Output: Kapoenen pagina.
		 */
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
					'Activiteiten' => $this->Activiteiten->Kapoenen(5),
				);
      // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar', $Data);
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }


		/**
	 	 * Outputs Welpen page.
		 */
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
					'Activiteiten' => $this->Activiteiten->Welpen(5),
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
					'Activiteiten' => $this->Activiteiten->JongGivers(5),
				);
    	// == END Variables == //

    	  // View(s)
    	  $this->load->view('components/header', $Data);
    	  $this->load->view('components/navbar', $Data);
    	  $this->load->view('client/tak_pagina', $DB);
    	  $this->load->view('components/footer');
    }

		/**
		 * Output: Givers pagina
		 */
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
					'Activiteiten' => $this->Activiteiten->Givers(5),
				);
    	  // == END Variables == //

    	  // View(s)
    	  $this->load->view('components/header', $Data);
    	  $this->load->view('components/navbar', $Data);
    	  $this->load->view('client/tak_pagina', $DB);
    	  $this->load->view('components/footer');
    }

		/**
		 * Output: Jins pagina.
		 */
    public function Jins() {
			$Data = array(
				'Title'  => 'De Jins',
				'Active' => '1',
			);

			$DB = array(
				'Beschrijving' => $this->Takken->Jins(),
				'Activiteiten' => $this->Activiteiten->Jins(5),
			);

      $this->load->view('components/header', $Data);
      $this->load->view('components/navbar', $Data);
      $this->load->view('client/tak_pagina', $DB);
      $this->load->view('components/footer');
    }

		/**
		 * Output: Leiding pagina.
		 */
    public function Leiding() {
			$Data = array(
				'Title'        => 'De Leiding',
				'Active'       => '1',
				'Beschrijving' => $this->Takken->Leiding();
			);


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
