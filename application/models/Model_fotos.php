<?php
	Class Model_fotos extends CI_Model {
		function Select() {
			$this->db->select()
					     ->limit(9);
			
			$Query = $this->db->get('Photo_Gallery');
			return $Query->result();
		}
		
		function Insert($image_data = array()) {
			$Values = array(
				"Naam"      => $this->input->post('Naam'),
		    "Tak"       => $this->input->post('Tak'),			
				"Web_url"   => $this->input->post('URL'),
				"File_path" => "/assets/fotos/".$image_data['file_name'],
				"File_name" => $image_data['file_name'],
			);
			
			$this->db->insert('Photo_Gallery', $Values);
		}
		
		function Backend_select() {
			$this->db->select()
					     ->limit(25);
			
			$Query = $this->db->get('Photo_Gallery');
			return $Query->result();
		}
		
		function Delete() {
      $this->db->where('File_name', $this->uri->segment(3))
               ->delete('Photo_Gallery');
		}
	} 