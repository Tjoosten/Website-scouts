<?php 
	Class Model_notifications extends CI_Model {
		function Herstel_verhuur($Person) {
			$Values = array(
				"Naam"    => $Person['Naam'],
				"Mail"   => $Person['Email'],
				"Verhuur" => "0"
				);

			$this->db->insert('Notifications', $Values);
		} 

		function Get() {
			$Session = $this->session->userdata('logged_in');
			$this->db->select('Verhuur')
			         ->where('Naam', $Session['username']);

			$Query = $this->db->get('Notifications');
			return $Query->result();
		}

		function Verhuur_aan() {
			$Session = $this->session->userdata('logged_in');
			$Values = array(
				"Verhuur" => "1",
				);

			$this->db->where('Naam', $Session['username'])
					 ->update('Notifications', $Values);
		}

		function Verhuur_uit() {
			$Session = $this->session->userdata('logged_in');
			$Values = array(
				"Verhuur" => "0",
				);

			$this->db->where('Naam', $Session['username'])
					 ->update('Notifications', $Values);
		}

		function Verhuur_mailing() {
			$this->db->select()
			         ->where('Verhuur','1');

			$Query = $this->db->get('Notifications');
			return $Query->result();
		}
	}