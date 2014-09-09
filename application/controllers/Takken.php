<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Takken extends CI_Controller {
		public function index() {
			// Model(s)
			$this->load->model('Model_Takken','Takken');

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
    	// Model(s)
    	$this->load->model('Model_Takken','Takken');
    	$this->load->model('Model_activiteiten', 'Activiteiten');

    	// Variable(s)
    	  // General
        $Data['Title']  = "De Kapoenen"; 

        // Database
        $DB['Beschrijving'] = $this->Takken->Kapoenen();
        $DB['Activiteiten'] = $this->Takken->Kapoenen(); 
      // == END Variables == //

        // View(s)
        $this->load->view('components/header', $Data);
        $this->load->view('components/navbar');
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }

    public function Welpen() {
    	// Model(s)
    	$this->load->model('Model_Takken', 'Takken');
    	$this->load->model('Model_activiteiten', 'Activiteiten');

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
    	// Model(s)
    	$this->load->model('Model_Takken', 'Takken');
    	$this->load->model('Model_activiteiten', 'Activiteiten');

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
    	// Model(s)
    	$this->load->model('Model_takken', 'Takken');
    	$this->load->model('Model_activteiten', 'Activiteiten');

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
    	// Model(s)
    	$this->load->model('Model_takken', 'Takken'); 
      $this->load->model('Model_activeiten', 'Activiteiten');
    	// Variables
    	  // General
    	  $Data['Title'] = "De Jins"; 

        // Database
        $DB['Beschrijving'] = $this->Takken->Jins();
        $DB['Activiteiten'] = $this->Activeiten->Jins();
      // == END Variables == //

        // View(s)
        $this->load->view('cvomponents/header', $Data);
        $this->load->view('components/navbar');
        $this->load->view('client/tak_pagina', $DB);
        $this->load->view('components/footer');
    }

    public function Leiding() {
    	// Model(s)
    	$this->load->model('Model_takken', 'Takken'); 

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
	}