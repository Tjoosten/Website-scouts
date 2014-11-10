<?php 
	Class Model_mailing extends CI_Model {
		// Mailing Lists
		function Mailing_Iedereen() {
			$this->db->select(); 

			$Query = $this->db->get('Mailing'); 
			return $Query->result();
		}

		function Mailing_VZW() {
			$this->db->select()
					 ->where('Vzw','1');

			$Query = $this->db->get('Mailing');
			return $Query->result();
		}

		function Mailing_Ouders() {
			$this->db->select()
			         ->where('Ouders','1');

			$Query = $this->db->get('Mailing'); 
			return $Query->result(); 
		}

		function Mailing_Leiding() {
			$this->db->select()
			         ->where('Leiding','1');

			$Query = $this->db->get('Mailing');
			return $Query->result();
		}

		function Mailing_Oudervergadering() {
			$this->db->select()
					 ->where('Oudervergadering','1'); 

			$Query = $this->db->get('Mailing');
			return $Query->result();
		}
		// END Mailing lists

		function Insert_address() {
			$Values = array(
				"Voornaam"         => $this->input->post('Voornaam'),
				"Achternaam"       => $this->input->post('Achternaam'),
				"Email"            => $this->input->post('Email'),
				"Vzw"              => "0",
				"Ouders"           => "0",
				"Leiding"          => "0",
				"Oudervergadering" => "0",
				); 

			$this->db->insert('Mailing', $Values);
		}

		function Delete_address() {
			$this->db->where('ID', $this->uri->segment(3))
               		 ->delete('Mailing');
		}

		function Mailing() {
			$this->db->select(); 

			$Query = $this->db->get('Mailing'); 
			return $Query->result();
		}

		function Actief() {
			$Values = array(
				$this->uri->segment(3) => "1",
				);

			$this->db->where('ID', $this->uri->segment(4))
					 ->update('Mailing', $Values);
		}

		function Inactief() {
			$Values = array(
				$this->uri->segment(3) => "0",
				); 

			$this->db->where('ID', $this->uri->segment(4))
					 ->update('Mailing', $Values);
		}
	}