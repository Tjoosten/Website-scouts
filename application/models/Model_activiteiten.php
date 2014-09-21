<?php
 Class Model_activiteiten extends CI_Model {
   /* 
    | Developer: Tim Joosten
    | License: 4GPL
    | Copyright: Sint-Joris Turnhout, Tim Joosten
    */

   function Kapoenen() {
     $this->db->select() 
              ->where('Tak', 'Kapoenen')
              ->limit(5);

     $Query = $this->db->get('Activiteiten');
     return $Query->result();
   }

   function Welpen() {
     $this->db->select()
              ->where('Tak', 'Welpen')
              ->limit(5);

     $Query = $this->db->get('Activiteiten');
     return $Query->result(); 
   }

   function JongGivers() {
     $this->db->select()
              ->where('Tak', 'JongGivers')
              ->limit(5);

     $Query = $this->db->get('Activiteiten');
     return $Query->result(); 
   }

   function Givers() {
     $this->db->select()
               ->where('Tak', 'Givers')
               ->limit(5);

     $Query = $this->db->get('Activiteiten');
     return $Query->result(); 
   }

   function Jins() {
     $this->db->select()
              ->where('Tak', 'Jins')
              ->limit(5);

     $Query = $this->db->get('Activiteiten');
     return $Query->result();
   }
	 
	 function Insert() {
		 $Values = array(
			  "Tak" => $this->uri->segment(3),
			 	"Datum" => $this->input->post('Datum'),
				"Naam" => $this->input->post('Naam'),
				"Beschrijving" => $this->input->post('Beschrijving'),
		 	);
			
			$this->db->insert('Activiteiten', $Values);
	 }
 }