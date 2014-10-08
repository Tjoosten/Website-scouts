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
		function Search() {
			$Values = array(
				"Start_datum" => $this->input->post('Term'),
				"Eind_datum"  => $this->input->post('Term'),
			);
			
			$this->db->select();
			$this->db->like($Values);
			
			$Query = $this->db->get('Verhuur');
			return $Query->Result();
		}
		
		function Wijzig_verhuur() {
			$Start = human_to_unix($this->input->post('Start'));
			$Eind  = human_to_unix($this->input->post('Eind'))
			
			$Values = array(
				"Start_datum" => $Start,
				"Eind_datum" => $Eind,
				"Groep" => $this->input->post('Groep'),
				"Email" => $this->input->post('Mail'),
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
		
		function Download_verhuringen() {
			$this->db->select('Start_datum, Eind_datum, Groep, Email, GSM');
			
			$query = $this->db->get('Verhuur');
			$data = $this->dbutil->csv_from_result($query, ';');
        
			force_download('Verhurings_data.csv', $data);
		}
		// -------- //
	}
