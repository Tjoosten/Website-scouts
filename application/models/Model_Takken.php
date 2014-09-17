<?php 
	Class Model_Takken extends CI_Model {

		/* 
		 | Developer: Tim Joosten
		 | License: 4GPL
		 | Copyright: Sint-Joris Turnhout, Tim Joosten
		 */

		// Selecting Queries
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
		
		// Edit Query's
		function Takken_edit() {
			$Values = array(
				"Beschrijving" => $this->input->post('Beschrijving'),
				"Title" => $this->input->post('Title'),
				"Sub_title" => $this->input->post('Sub_title'),
				);

			$this->db->where('ID', $this->uri->segment(3))
			         ->update('Takken', $Values);
		}
	}
