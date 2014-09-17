<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Takken extends CI_Controller {
        /*
         | Developer: Tim Joosten 
         | License: 4GPL
         | Copyright: St-joris Turnhout, Tim Joosten
         */

        function __construct() { 
            parent::__construct();
            $this->load->model('Model_Takken', 'Takken');
            $this->load->model('Model_activiteiten', 'Activiteiten');
        }

		public function index() {
			// Variable(s)
				// General
				$Data['Title'] = "Takken";

				// Database
				$DB['Kapoenen']   = $this->Takken->Kapoenen();
				$DB['Welpen']     = $this->Takken->Welpen();
				$DB['JongGivers'] = $this->Takken->JongGivers();
				$DB['Givers']     = $this->Takken->Givers();
				$DB['Jins']       = $this->Takken->Jins();
				$DB['Leiding']    = $this->Takken->Leiding();
		  // == END Variables == //

			// View(s)
			$this->load->view('components/header', $Data);
			$this->load->view('components/navbar');
			$this->load->view('client/takken', $DB);
			$this->load->view('components/footer');
		}

    public function Kapoenen() {
    	// Variable(s)
    	  // General
        $Data['Title']  = "De Kapoenen"; 

        // Database
        $DB['Beschrijving'] = $this->Takken->Kapoenen();
        $DB['Activiteiten'] = $this->Activiteiten->Kapoenen(); 
      // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar');
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }

    public function Welpen() {
    	// Variable(s)
    	  // General
    	  $Data['Title'] = "De Welpen"; 

    	  // Database
    	  $DB['Beschrijving'] = $this->Takken->Welpen();
    	  $DB['Activiteiten'] = $this->Activiteiten->Welpen();
    	// == END Variables == //

    	  // View(s)
    	  $this->load->view('components/header', $Data);
    	  $this->load->view('components/navbar');
    	  $this->load->view('client/tak_pagina', $DB);
    	  $this->load->view('components/footer');
    }

    public function JongGivers() {
    	// Variable(s)
    	  // General 
    	  $Data['Title'] = "De Jong-Givers";

    	  // Database
    	  $DB['Beschrijving'] = $this->Takken->JongGivers();
    	  $DB['Activiteiten'] = $this->Activiteiten->JongGivers();
    	// == END Variables == // 

    	  // View(s)
    	  $this->load->view('components/header', $Data);
    	  $this->load->view('components/navbar');
    	  $this->load->view('client/tak_pagina', $DB);
    	  $this->load->view('components/footer');
    }

    public function Givers() {
    	// Variable(s)
    	  // General 
    	  $Data['Title'] = "De Givers";

    	  // Database
    	  $DB['Beschrijving'] = $this->Takken->Givers();
    	  $DB['Activiteiten'] = $this->Activiteiten->Givers(); 
    	  // == END Variables == //

    	  // View(s)
    	  $this->load->view('components/header', $Data);
    	  $this->load->view('components/navbar');
    	  $this->load->view('client/tak_pagina', $DB);
    	  $this->load->view('components/footer');
    }

    public function Jins() {
    	// Variables
    	  // General
    	  $Data['Title'] = "De Jins"; 

        // Database
        $DB['Beschrijving'] = $this->Takken->Jins();
        $DB['Activiteiten'] = $this->Activiteiten->Jins();
      // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar');
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }

    public function Leiding() {
    	// Variables
    	  // General
    	  $Data['Title'] = "De Leiding"; 

    	  // Database
    	  $DB['Beschrijving'] = $this->Takken->Leiding();
    	// == END Variables == // 

    	  // View(s)
    	  $this->load->view('components/header', $Data);
    	  $this->load->view('components/navbar');
    	  $this->load->view('client/tak_pagina', $DB);
    	  $this->load->view('components/footer');
    }

    // Admin controllers
    public function Takken_edit() {
        if($this->session->userdata('logged_in')) {
            $this->load->model('Model_takken', 'Takken');
            $this->Takken->Takken_edit();
            redirect('backend', 'refresh');
        } else {
            // If nos session found redirect to login 
            redirect('Admin', 'refresh');
        }
    }
}