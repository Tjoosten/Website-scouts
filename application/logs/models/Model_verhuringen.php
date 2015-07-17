<?php
	class Model_verhuringen extends CI_Model {

	/**
	 *
	 */
	function Verhuring_kalender() {
		$this->db->select()
				 ->order_by("Start_datum", "asc");

		$Query = $this->db->get('Verhuur');
		return $Query->result();
	}

	function InsertDB() {
		// replace characters that can jam the timestamp
		$old_sep = array("/","-");
		$new_sep = ".";

		// Values
		$Start = str_replace($old_sep, $new_sep, $this->input->post('Start_datum'));
		$Eind  = str_replace($old_sep, $new_sep, $this->input->post('Eind_datum'));

		// start insert
		$Values = array(
			"Start_datum" => strtotime($Start),
			"Eind_datum"  => strtotime($Eind),
			"Groep"       => $this->input->post('Groep'),
			"Email"       => $this->input->post('Email'),
			"GSM"         => $this->input->post('GSM'),
			"Status"      => "0",
			);

		$this->db->insert("Verhuur", $Values);
	}

	/**
	 * Search - Zoekt voor een verhuring
	 */
	function Search() {
		// replace characters that can jam the timestamp
		$old_sep = array("/","-");
		$new_sep = ".";

		// Values
		$Term = str_replace($old_sep, $new_sep, $this->input->post('Term'));

		$Values = array(
			"Start_datum" => strtotime($Term),
			"Eind_datum"  => strtotime($Term),
		);

		$this->db->select()
				 ->like($Values);

		$Query = $this->db->get('Verhuur');
		return $Query->Result();
	}

	/**
	 * Wijzig een verhuring in de database.
	 */
	function Wijzig_verhuur() {
		// replace characters that can jam the timestamp
		$old_sep = array("/","-");
		$new_sep = ".";

		// Values
		$Start = str_replace($old_sep, $new_sep, $this->input->post('Start'));
		$Eind  = str_replace($old_sep, $new_sep, $this->input->post('Eind'));

		// start insert
		$Values = array(
			"Start_datum" => strtotime($Start),
			"Eind_datum"  => strtotime($Eind),
			"Groep"       => $this->input->post('Groep'),
			"Email"       => $this->input->post('Mail'),
			"GSM"         => $this->input->post('GSM'),
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

		return $this->db->affected_rows();
	}

	function Verhuur_api() {
		$this->db->select()
				 ->order_by("Start_datum", "asc");

		$Query = $this->db->get('Verhuur');
		return $Query->result();
	}

	/**
	 *
	 */
	function verhuur_info() {
		$this->db->select()
  					 ->where("ID", $this->uri->segment(3));

		$Query = $this->db->get('Verhuur');
		return $Query->result();
	}

	/**
	 * Download de verhuringen in een pdf
	 */
	function Download_verhuringen() {
		$this->db->select();

		$Query = $this->db->get('Verhuur');
		return $Query->result();
	}
	// -------- //
}
