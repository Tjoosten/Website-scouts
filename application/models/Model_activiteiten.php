<?php
 /**
  *
  */
  
 Class Model_activiteiten extends CI_Model {

    /**
     *
     */
   function Kapoenen($limit = NULL) {
     $this->db->select()
              ->where('Tak', 'Kapoenen')
              ->limit($limit);

     $Query = $this->db->get('Activiteiten');
     return $Query->result();
   }


   /**
    * Output: activiteiten van de welpen
    */
   function Welpen($limit = NULL) {
     $this->db->select()
              ->where('Tak', 'Welpen')
              ->limit($limit);

     $Query = $this->db->get('Activiteiten');
     return $Query->result();
   }

   /**
    * Output: activiteiten van de Jong-Givers.
    */
   function JongGivers($limit = NULL) {
     $this->db->select()
              ->where('Tak', 'JongGivers')
              ->limit($limit);

     $Query = $this->db->get('Activiteiten');
     return $Query->result();
   }

   /**
    * Output: activiteiten van de Givers.
    */
   function Givers($limit = NULL) {
     $this->db->select()
               ->where('Tak', 'Givers')
               ->limit($limit);

     $Query = $this->db->get('Activiteiten');
     return $Query->result();
   }

   /**
    *
    */
   function Jins($limit = NULL) {
     $this->db->select()
              ->where('Tak', 'Jins')
              ->limit($limit);

     $Query = $this->db->get('Activiteiten');
     return $Query->result();
   }

   /**
    *
    */
	 function Insert() {
      // Replace characters that can jam the timestamp
      $old_sep = array("/","-");
      $new_sep = ".";

      // Values
      $Datum = str_replace($old_sep, $new_sep, $this->input->post('Datum'));

		  $Values = array(
			  "Tak" => $this->uri->segment(3),
			 	"Datum" => $Datum,
				"Naam" => $this->input->post('Naam'),
				"Beschrijving" => $this->input->post('Beschrijving'),
		 	);

			$this->db->insert('Activiteiten', $Values);
      return $this->db->affected_rows();
	 }
 }
