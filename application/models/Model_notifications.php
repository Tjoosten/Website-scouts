<?php
	Class Model_notifications extends CI_Model {
		// Constructor
		public $Auth = array();

		function __construct() {
			parent::__construct();
			$this->Auth = $this->session->userdata('logged_in');
		}
		// End constructor

		function Herstel_verhuur($Person) {
			$Values = array(
				"Naam"    => $Person['Naam'],
				"Mail"    => $Person['Email'],
				"Verhuur" => "0"
				);

			$this->db->insert('Notifications', $Values);
		}

		function Get() {
			$this->db->select('Verhuur')
			         ->where('Naam', $this->Auth['username']);

			$Query = $this->db->get('Notifications');
			return $Query->result();
		}

		function Verhuur_aan() {
			$Values = array(
				"Verhuur" => "1",
				);

			$this->db->where('Naam', $this->Auth['username'])
					 ->update('Notifications', $Values);
		}

		function Verhuur_uit() {
			$Values = array(
				"Verhuur" => "0",
				);

			$this->db->where('Naam', $this->Auth['username'])
					 ->update('Notifications', $Values);
		}

		function Verhuur_mailing() {
			$this->db->select()
			         ->where('Verhuur','1');

			$Query = $this->db->get('Notifications');
			return $Query->result();
		}
	}
