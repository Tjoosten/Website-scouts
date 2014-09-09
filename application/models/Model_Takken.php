<?php 
	Class Model_Takken extends CI_Model {
		function Kapoenen() {
			$this->db->select()
					 ->where('Tak', 'Kapoenen');

			$Query = $this->db->get('Takken');
			return $Query->result(); 
		}

		function Welpen() {
			$this->db->select()
					 ->where('Tak', 'Welpen');

			$Query = $this->db->get('Takken');
			return $Query->result(); 
		}

		function JongGivers() {
			$this->db->select()
					 ->where('Tak', 'JongGivers');

			$Query = $this->db->get('Takken');
			return $Query->result();
		}

		function Givers() {
			$this->db->select()
					 ->where('Tak', 'Givers');

			$Query = $this->db->get('Takken');
			return $Query->result(); 
		}

		function Jins() {
			$this->db->select()
					 ->where('Tak', 'Jins');

			$Query = $this->db->get('Takken');
			return $Query->result(); 
		}

		function Leiding() {
			$this->db->select()
					 ->where('Tak', 'Leiding');

			$Query = $this->db->get('Takken');
			return $Query->result(); 
		}
	}