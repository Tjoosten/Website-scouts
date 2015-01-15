<?php

 /**
  * Model takken.
  *
  * @author Tim Joosten
  * @license: Closed license
  * @since 2015
  * @package Website-models
  */

	Class Model_Takken extends CI_Model {

		// Selecting Queries
		function Kapoenen() {
			$this->db->select()
					 ->where('Tak', 'Kapoenen');

			$Query = $this->db->get('Takken');
			return $Query->result();
		}

		/**
		 * Output: array's met takbeschrijving over the Welpen
		 */
		function Welpen() {
			$this->db->select()
					 ->where('Tak', 'Welpen');

			$Query = $this->db->get('Takken');
			return $Query->result();
		}

		/**
		 * Output: Array's met takbeschrijving over de Jong-givers.
	   */
		function JongGivers() {
			$this->db->select()
					 ->where('Tak', 'JongGivers');

			$Query = $this->db->get('Takken');
			return $Query->result();
		}

		/**
		 * Output: Array's met takbeeschrijving over de Givers
		 */
		function Givers() {
			$this->db->select()
					 ->where('Tak', 'Givers');

			$Query = $this->db->get('Takken');
			return $Query->result();
		}

		/**
		 * Output: Array's met takbeschrijving over de Jins.
		 */
		function Jins() {
			$this->db->select()
					 ->where('Tak', 'Jins');

			$Query = $this->db->get('Takken');
			return $Query->result();
		}

		/**
		 * Output: Array's met beschijving over de leiding.
		 */
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
				"Title"        => $this->input->post('Title'),
				"Sub_title"    => $this->input->post('Sub_title'),
				);

			$this->db->where('ID', $this->uri->segment(3))
			         ->update('Takken', $Values);
		}
	}
