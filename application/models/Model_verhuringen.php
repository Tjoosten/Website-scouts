<?php 
	class Model_verhuringen extends CI_Model {
		
		// Client side
		function Verhuring_kalender() {
			$this->db->select(); 

			$Query = $this->db->get('Verhuur'); 
			return $Query->result();
		}

		function InsertDB() {
			$Values = array(
				"Start_datum" => $this->input->post('Start_datum'),
				"Eind_datum" => $this->input->post('Eind_datum'), 
				"Groep" => $this->input->post('Groep'), 
				"Email" => $this->input->post('Mail'),
				"GSM" => $this->input->post('GSM'),
				"Status" => "0",
				);

			$this->db->insert("Verhuur", $Values);
		}
		// -------- //

		// Admin side 

		// -------- //
	}