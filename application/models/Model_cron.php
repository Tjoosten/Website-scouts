<?php
Class Model_cron extends CI_Model {
	function Optimize() {
		// DButil word geladen in controller
		$this->dbutil->optimize_database();
	}

	function Del_verhuringen() {
		$this->db->query('DELETE FROM Verhuur WHERE Eind_datum < UNIX_TIMESTAMP(NOW())');
		return $this->db->affected_rows();
	}

	function Del_activiteiten() {
		 $this->db->query('DELETE FROM Activiteiten WHERE Datum < UNIX_TIMESTAMP(NOW())'); 
		 return $this->db->affected_rows();
	} 
}