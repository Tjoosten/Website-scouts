<?php
	Class Model_inschrijvingen extends CI_Model {

    	function __construct(){
		  parent::__construct();
    	}

    	function Get_dates() {
    		$this->db->select()
    		         ->where('Status', '1');

    		$Query = $this->db->get('Ontbijt_datums');
    		return $Query->Result();
    	}

        function Get_Dates_Full() {
            $this->db->select();

            $Query = $this->db->get('Ontbijt_datums');
            return $Query->result();
        }

        function Download() {
            $Query = $this->db->get('Inschrijvingen_ontbijt');
            return $Query->result();
        }

				function Download_month() {
					$this->db->select()
									 ->where('Maand', $this->uri->segment(4));

					$Query = $this->db->get('Inschrijvingen_ontbijt');
					return $Query->result();
				}

        function Start_inschrijving_ontbijt() {
            $Value = array(
                "Status" => "1",
                );

            $this->db->where('ID', $this->uri->segment(3))
                     ->update('Ontbijt_datums', $Value);
        }

        function Stop_inschrijving_ontbijt() {
            $Value = array(
                "Status" => "0",
                );

            $this->db->where('ID', $this->uri->segment(3))
                     ->update('Ontbijt_datums', $Value);
        }

        function Inschrijvingen_All() {
            $this->db->select();

            $Query = $this->db->get('Inschrijvingen_ontbijt');
            return $Query->result();
        }

    	function InsertDB() {
    		// Calculate bedrag
    		$Aantal = $this->input->post('Personen');
    		$Prijs  = "3";
    		$Bedrag = $Aantal * $Prijs;

    		/**
				 * Start insert
				 * ------------------
				 * @var Naaam, STRING
				 * @var Voornaam, STRING
				 * @var Email, STRING
				 * @var Maand, STRING
				 * @var Personen, STRING
				 */
    		$Values = array(
    			"Naam"            => $this->input->post('Naam'),
    			"Voornaam"        => $this->input->post('Voornaam'),
    			"Email"           => $this->input->post('Email'),
    			"Maand"           => $this->input->post('Maand'),
    			"Aantal_Personen" => $this->input->post('Personen'),
    			"Te_betalen"	  => $Bedrag,
    			);

    		$this->db->insert('Inschrijvingen_ontbijt', $Values);
    	}

    	function DeleteDB() {

    	}
	}
