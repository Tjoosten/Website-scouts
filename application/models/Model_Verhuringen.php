<?php 
	class Model_verhuringen extends CI_Model {
		
	/*
	 | Developer: Tim Joosten
	 | License: 4GPL
	 | Copyright: Sint-Joris Turnhout, Tim Joosten
	 */

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
				"Email" => $this->input->post('Email'),
				"GSM" => $this->input->post('GSM'),
				"Status" => "0",
				);

			$this->db->insert("Verhuur", $Values);
		}
		// -------- //

		// Admin side 
		function Wijzig_verhuur() {
			$Values = array(
				"Start_datum" => $this->input->post('Start'),
				"Eind_datum" => $this->input->post('Eind'),
				"Groep" => $this->input->post('Groep'),
				"Email" => $this->input->post('Email'),
				"GSM" => $this->input->post('GSM'),
				);

			$this->db->where("ID", $this->uri->segment(3))
			          ->update('Verhuur', $Values);
		}

		function Status_optie() {
			$Value = array(
					"Status" => "1",
				);

			$this->db->where("ID", $this->uri->segment(3))
					 ->update("Verhuur", $Value);
		}

		function Status_bevestigd() {
			$Value = array(
					"Status" => "2",
				); 

			$this->db->where("ID", $this->uri->segment(3))
					 ->update("Verhuur", $Value);
		}
		
		function Verhuur_delete() {
			$this->db->where('ID', $this->uri->segment(3))
					 ->delete('Verhuur'); 
		}
		
		function Verhuur_bevestigd() {
			$this->db->select(); 

			$Query = $this->db->get('Verhuur');
			return $Query->result();
		}

		function verhuur_info() {
			$this->db->select() 
					 ->where("ID", $this->uri->segment(3));

			$Query = $this->db->get('Verhuur'); 
			return $Query->result();
		}
		// -------- //
	}